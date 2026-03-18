<div class="px-4 pt-6 bg-white xl:grid-cols-3 xl:gap-4 dark:bg-gray-900">
    <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
        <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" role="tablist">
            <li class="me-2">
                <a href="javascript:;" wire:click="setActiveTab('superadminPaymentSetting')"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300", 'border-transparent' => ($activeTab != 'superadminPaymentSetting'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeTab == 'superadminPaymentSetting')]); ?>"><?php echo app('translator')->get('menu.superadminPaymentSetting'); ?></a>
            </li>
            <li class="me-2">
                <a href="javascript:;" wire:click="setActiveTab('adminPaymentSetting')"
                class="<?php echo \Illuminate\Support\Arr::toCssClasses(["inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:text-gray-400 dark:hover:text-gray-300", 'border-transparent' => ($activeTab != 'adminPaymentSetting'), 'active border-skin-base dark:text-skin-base dark:border-skin-base text-skin-base' => ($activeTab == 'adminPaymentSetting')]); ?>"><?php echo app('translator')->get('menu.adminPaymentSetting'); ?></a>
            </li>
        </ul>
    </div>
    <!-- Tab content -->
    <div id="profile-tabs-content">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($activeTab === 'superadminPaymentSetting'): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.superadmin-payment-settings', []);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-573769232-0', null);

$__html = app('livewire')->mount($__name, $__params, $key);

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        <?php elseif($activeTab === 'adminPaymentSetting'): ?>
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('settings.admin-payment-settings', []);

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-573769232-1', null);

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
<?php /**PATH C:\Users\denji\Documents\tuftable\tuftable\resources\views/livewire/settings/restaurant-payment-settings.blade.php ENDPATH**/ ?>