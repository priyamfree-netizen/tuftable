
    <?php
        $universal = \Nwidart\Modules\Facades\Module::find('UniversalBundle');
        $plugins = \Froiden\Envato\Functions\EnvatoUpdate::plugins();
        $versionArray = [];

      foreach ($plugins as $value) {
           $versionArray[$value['envato_id']] = $value['version'];
      }

      $version = $versionArray;
    ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($universal && config(strtolower($universal) . '.envato_item_id')): ?>
      <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($version[config(strtolower($universal) . '.envato_item_id')] > \Illuminate\Support\Facades\File::get($universal->getPath() . '/version.txt') && (config(strtolower($universal) . '.setting')::first()?->notify_update)): ?>
        <?php if (isset($component)) { $__componentOriginalb5e767ad160784309dfcad41e788743b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb5e767ad160784309dfcad41e788743b = $attributes; } ?>
<?php $component = App\View\Components\Alert::resolve(['type' => 'info'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
            <div class="flex justify-between items-center w-full">
                <div class="inline-flex items-center gap-2">
                    <svg class="fa-gift w-6 pb-1" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="gift" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z"></path></svg>
                    <?php echo app('translator')->get('app.newModuleUpdateMessage', ['name' => $universal->getName()]); ?>
                    <span
                        class="text-xs font-medium px-2 py-1 rounded uppercase tracking-wide whitespace-nowrap bg-green-100 text-green-800 dark:bg-gray-700 dark:text-green-400 border border-green-400"><?php echo e($version[config(strtolower($universal) . '.envato_item_id')]); ?></span>
                </div>
                <div>
                    <?php if (isset($component)) { $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-link','data' => ['href' => ''.e(route('superadmin.custom-modules.index') . '?tab=custom').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('superadmin.custom-modules.index') . '?tab=custom').'']); ?>
                        <?php echo app('translator')->get('modules.update.updateNow'); ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $attributes = $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $component = $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>
                </div>
            </div>
         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $attributes = $__attributesOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__attributesOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $component = $__componentOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__componentOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>
      <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php else: ?>

        <?php
            $allModules = \Nwidart\Modules\Facades\Module::allEnabled();

        ?>
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php $__currentLoopData = $allModules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(config(strtolower($module) . '.envato_item_id') && $version[config(strtolower($module) . '.envato_item_id')] > \Illuminate\Support\Facades\File::get($module->getPath() . '/version.txt') && (config(strtolower($module) . '.setting')::first()?->notify_update)): ?>

                <?php if (isset($component)) { $__componentOriginalb5e767ad160784309dfcad41e788743b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb5e767ad160784309dfcad41e788743b = $attributes; } ?>
<?php $component = App\View\Components\Alert::resolve(['type' => 'info'] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\Alert::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                    <div class="flex justify-between items-center w-full">
                        <div class="inline-flex items-center gap-2">
                            <svg class="fa-gift w-6 pb-1" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="gift" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M32 448c0 17.7 14.3 32 32 32h160V320H32v128zm256 32h160c17.7 0 32-14.3 32-32V320H288v160zm192-320h-42.1c6.2-12.1 10.1-25.5 10.1-40 0-48.5-39.5-88-88-88-41.6 0-68.5 21.3-103 68.3-34.5-47-61.4-68.3-103-68.3-48.5 0-88 39.5-88 88 0 14.5 3.8 27.9 10.1 40H32c-17.7 0-32 14.3-32 32v80c0 8.8 7.2 16 16 16h480c8.8 0 16-7.2 16-16v-80c0-17.7-14.3-32-32-32zm-326.1 0c-22.1 0-40-17.9-40-40s17.9-40 40-40c19.9 0 34.6 3.3 86.1 80h-86.1zm206.1 0h-86.1c51.4-76.5 65.7-80 86.1-80 22.1 0 40 17.9 40 40s-17.9 40-40 40z"></path></svg>
                            <?php echo app('translator')->get('app.newModuleUpdateMessage', ['name' => $module->getName()]); ?>
                            <span
                                class="text-xs font-medium px-2 py-1 rounded uppercase tracking-wide whitespace-nowrap bg-green-100 text-green-800 dark:bg-gray-700 dark:text-green-400 border border-green-400"><?php echo e($version[config(strtolower($module) . '.envato_item_id')]); ?></span>
                        </div>
                        <div>
                            <?php if (isset($component)) { $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-link','data' => ['href' => ''.e(route('superadmin.custom-modules.index') . '?tab=custom').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-link'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['href' => ''.e(route('superadmin.custom-modules.index') . '?tab=custom').'']); ?>
                                <?php echo app('translator')->get('modules.update.updateNow'); ?>
                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $attributes = $__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__attributesOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f)): ?>
<?php $component = $__componentOriginalecbfaf65020c31547e71f42b3a8afb5f; ?>
<?php unset($__componentOriginalecbfaf65020c31547e71f42b3a8afb5f); ?>
<?php endif; ?>
                        </div>
                        
                    </div>
                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $attributes = $__attributesOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__attributesOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $component = $__componentOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__componentOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php /**PATH C:\Users\denji\Downloads\TableTrack v1.2.70 Nulled\script\script\resources\views\dashboard\update-message-module-dashboard.blade.php ENDPATH**/ ?>