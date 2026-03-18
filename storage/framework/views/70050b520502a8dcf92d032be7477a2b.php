<a  class="flex gap-2 items-center text-xl font-medium dark:text-white app-logo">
    <img src="<?php echo e(global_setting()->logoUrl); ?>" class="h-8" alt="<?php echo e(global_setting()->name); ?> Logo" /> 
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(global_setting()->show_logo_text): ?>
    <span><span style="color:#C8F135;">Tuf</span><span style="color:#0D0D0D;" class="dark:text-white">Table</span></span>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
</a>
<?php /**PATH C:\Users\denji\Documents\tuftable\tuftable\resources\views/components/authentication-card-logo.blade.php ENDPATH**/ ?>