<?php $__env->startSection('content'); ?>
    <div class="px-4 py-6">
        <div class="mx-auto">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">
                    <?php echo app('translator')->get('modules.modifier.addModifierGroup'); ?>
                </h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">
                    <?php echo app('translator')->get('modules.modifier.addModifierGroupDescription'); ?>
                </p>
            </div>

            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.create-modifier-group');

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-4242462785-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\denji\Downloads\TableTrack v1.2.70 Nulled\script\script\resources\views\modifier_groups\create.blade.php ENDPATH**/ ?>