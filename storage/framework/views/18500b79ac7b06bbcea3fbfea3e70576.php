<?php $__env->startComponent('mail::layout'); ?>

<?php $__env->slot('header'); ?>
<?php $__env->startComponent('mail::header', ['url' => route('shop_restaurant', ['hash' => $settings->hash])]); ?>
<?php echo e($settings->name); ?>

<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>

## <?php echo e(__('app.hello')); ?> <?php echo e($notifiable->name); ?>,

<?php echo e(__('email.sendMenuPdf.text1_general')); ?> **<?php echo e($settings->name); ?>**!

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($menu): ?>
<?php echo e(__('email.sendMenuPdf.text1', ['menu_name' => $menu->menu_name])); ?>

<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($menuItems && $menuItems->isNotEmpty()): ?>
<?php echo e(__('email.sendMenuPdf.text2', ['count' => $menuItems->count()])); ?>

<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

<?php echo e(__('email.sendMenuPdf.text3')); ?>


<?php $__env->startComponent('mail::button', ['url' => $downloadUrl ?? '#']); ?>
<?php echo e(__('email.sendMenuPdf.downloadPdf')); ?>

<?php echo $__env->renderComponent(); ?>

<?php echo app('translator')->get('app.regards'); ?>,<br>
<?php echo e($settings->name); ?>



<?php $__env->slot('footer'); ?>
<?php $__env->startComponent('mail::footer'); ?>
    © <?php echo e(date('Y')); ?> <?php echo e($settings->name); ?>. <?php echo app('translator')->get('app.allRightsReserved'); ?>
<?php echo $__env->renderComponent(); ?>
<?php $__env->endSlot(); ?>
<?php echo $__env->renderComponent(); ?>
<?php /**PATH C:\Users\denji\Downloads\TableTrack v1.2.70 Nulled\script\script\resources\views\emails\menu-pdf.blade.php ENDPATH**/ ?>