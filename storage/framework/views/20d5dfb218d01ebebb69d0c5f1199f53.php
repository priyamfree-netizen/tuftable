<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" dir="<?php echo e(session('customer_is_rtl') ? 'rtl' : 'ltr'); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(global_setting()->logoUrl); ?>">
    <link rel="manifest" href="<?php echo e(asset('manifest.json')); ?>">

    <meta name="keywords" content="<?php echo e(global_setting()->meta_keyword ?? global_setting()->name); ?>">
    <meta name="description" content="<?php echo e(global_setting()->meta_description ?? global_setting()->name); ?>">

    <title><?php echo $__env->yieldContent('title', global_setting()->meta_title ?? global_setting()->name); ?></title>

    <!-- Masco template CSS -->
    <link rel="stylesheet" href="<?php echo e(asset('landing_new_assets/index-c46ffb0e.css')); ?>" />

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>


    <?php echo $__env->make('sections.theme_style', [
        'baseColor' => global_setting()->theme_rgb,
        'baseColorHex' => global_setting()->theme_hex,
    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(File::exists(public_path() . '/css/app-custom.css')): ?>
        <link href="<?php echo e(asset('css/app-custom.css')); ?>" rel="stylesheet">
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if ($__env->exists('sections.custom_script_landing')) echo $__env->make('sections.custom_script_landing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body class="font-sans antialiased bg-white dark:bg-gray-900">

    <?php echo $__env->make('partials.landing-header', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <!-- Prevent React bundle from mounting (we only need its CSS/AOS) -->
    <div id="root" style="display:none;"></div>
    <!-- Masco JS bundle for AOS animations and interactions -->
    <script type="module" crossorigin src="<?php echo e(asset('landing_new_assets/index-3f204186.js')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Priyam\Videos\tuftable\resources\views/layouts/landing-page.blade.php ENDPATH**/ ?>