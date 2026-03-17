<?php

$dir = __DIR__ . '/database/migrations';
$files = glob($dir . '/*.php');

$replacementsCount = 0;
$filesFixed = 0;

foreach ($files as $file) {
    $content = file_get_contents($file);
    $originalContent = $content;

    // We need to match Schema::table('table_name', function (Blueprint $table) { ... })
    // and replace inside it.
    // A simpler approach: Look for any $table->enum('column', [...])->...->change();
    // And try to extract the nearest preceding Schema::table('name'
    
    // Regex to find $table->enum('col', [...])->...->change();
    $pattern = '/\$table\s*->\s*enum\s*\(\s*[\'"]([^\'"]+)[\'"]\s*,[^\)]+\)\s*(?:->[a-zA-Z0-9_\-]+\s*\((?:[^()]*|\([^()]*\))*\)\s*)*->change\s*\(\s*\)\s*;/s';

    $content = preg_replace_callback('/Schema::table\s*\(\s*[\'"]([^\'"]+)[\'"]\s*,\s*function\s*\([^)]+\)\s*\{(.+?)\}\s*\);/is', function ($matches) use (&$replacementsCount, $pattern) {
        $tableName = $matches[1];
        $body = $matches[2];
        
        $newBody = preg_replace_callback($pattern, function ($enumMatches) use ($tableName, &$replacementsCount) {
            $colName = $enumMatches[1];
            $originalStmt = $enumMatches[0];
            
            // Reconstruct the string definition by replacing enum with string
            // We just replace enum('col', [...]) with string('col')
            $temp = preg_replace('/enum\s*\(\s*[\'"]([^\'"]+)[\'"]\s*,\s*\[[^\]]+\]\s*\)/s', "string('$1')", $originalStmt);
            $stringStmt = $temp;
            
            $replacementsCount++;
            
            return <<<PHP
if (\DB::getDriverName() === 'mysql') {
                $originalStmt
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE {$tableName} DROP CONSTRAINT IF EXISTS {$tableName}_{$colName}_check");
                $stringStmt
            }
PHP;
        }, $body);
        
        return "Schema::table('$tableName', function (Blueprint \$table) {" . $newBody . "\n\t\t});";
    }, $content);

    if ($originalContent !== $content) {
        file_put_contents($file, $content);
        $filesFixed++;
    }
}

echo "Fixed $replacementsCount enum->change() statements across $filesFixed files.\n";

// Also fix DB::statement occurrences of ALTER TABLE MODIFY COLUMN ENUM
foreach ($files as $file) {
    $content = file_get_contents($file);
    $originalContent = $content;
    
    $pattern = '/DB::statement\s*\(\s*[\'"]ALTER\s+TABLE\s+([a-zA-Z0-9_]+)\s+MODIFY\s+COLUMN\s+([a-zA-Z0-9_]+)\s+ENUM\(([^\)]+)\)(.*?)[\'"]\s*\)\s*;/is';
    
    $content = preg_replace_callback($pattern, function ($matches) use (&$replacementsCount) {
        $tableName = $matches[1];
        $colName = $matches[2];
        $enumValues = $matches[3];
        $rest = $matches[4];
        $originalStmt = $matches[0];
        
        $replacementsCount++;
        
        return <<<PHP
if (\DB::getDriverName() === 'mysql') {
                $originalStmt
            } else {
                \Illuminate\Support\Facades\DB::statement("ALTER TABLE {$tableName} DROP CONSTRAINT IF EXISTS {$tableName}_{$colName}_check");
            }
PHP;
    }, $content);

    if ($originalContent !== $content) {
        file_put_contents($file, $content);
        $filesFixed++;
    }
}

echo "Total replacements done: $replacementsCount.\n";
