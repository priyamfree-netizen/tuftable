<div>

    <div class="flex flex-col px-4 my-4">
        <!-- General Settings Section -->
        <div class="mb-6">
            <h2 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                <?php echo app('translator')->get('modules.reservation.generalSettings'); ?>
            </h2>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.reservation-general-settings', []);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3606010772-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>

        <!-- Time Slots Settings Section -->
        <div class="mb-6">
            <h2 class="mb-4 text-xl font-semibold text-gray-900 dark:text-white">
                <?php echo app('translator')->get('modules.reservation.timeSlotsSettings'); ?>
            </h2>

            <!-- Card Section -->
            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-7 sm:gap-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $reservationSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Card -->
                <a
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(['group flex flex-col border shadow-sm rounded-lg hover:shadow-md transition', 'bg-skin-base dark:bg-skin-base dark:border-skin-base' => ($weekDay == $item->day_of_week), 'bg-white dark:bg-gray-700 dark:border-gray-600' => ($weekDay != $item->day_of_week)]); ?>"
                wire:key='menu-<?php echo e($key . microtime()); ?>' wire:click="showItems('<?php echo e($item->day_of_week); ?>')"
                    href="javascript:;">
                    <div class="p-3">
                        <div class="flex items-center justify-center">
                            <h3 wire:loading.class.delay='opacity-50'
                                class="<?php echo \Illuminate\Support\Arr::toCssClasses(['font-semibold dark:group-hover:text-neutral-400 dark:text-neutral-200 text-sm', 'text-gray-800 group-hover:text-skin-base' => ($weekDay != $item->day_of_week), 'text-white group-hover:text-white' => ($weekDay == $item->day_of_week)]); ?>">
                                <?php echo e(__('app.' . $item->day_of_week)); ?>

                            </h3>
                        </div>
                    </div>
                </a>
                <!-- End Card -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            </div>
            <!-- End Card Section -->

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($menuItems): ?>
                <div class="w-full">
                    <div class="flex items-center gap-4 my-4">
                        <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"><?php echo e(__('app.' . $weekDay)); ?></h1>
                    </div>
                </div>

                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.reservation-day-settings', ['weekDay' => $weekDay]);

$key = 'week-item-'.e(microtime()).'';

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3606010772-1', 'week-item-'.e(microtime()).'');

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </div>

</div>
<?php /**PATH C:\Users\denji\Downloads\TableTrack v1.2.70 Nulled\script\script\resources\views\livewire\settings\reservation-settings.blade.php ENDPATH**/ ?>