<?php $__env->startSection('title', 'Create Account - ' . (global_setting()->name ?? '')); ?>
<?php $__env->startSection('content'); ?>

<div class="account-section bg-light-2" style="padding-top:60px;padding-bottom:80px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-10">

                <div class="account-heading" style="margin-bottom:28px;">
                    <h2 class="account-heading__title heading-md">Create an account</h2>
                    <p>Enter the information below to create your account</p>
                </div>

                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('forms.restaurantSignup');

$key = null;

$key ??= \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::generateKey('lw-3011709398-0', null);

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
    </div>
</div>

<style>
/* Fix black input fields on signup page */
.account-section input[type="text"],
.account-section input[type="email"],
.account-section input[type="password"],
.account-section input[type="tel"],
.account-section input[type="number"],
.account-section textarea,
.account-section select {
    background-color: #ffffff !important;
    color: #111827 !important;
    border: 1px solid #d1d5db !important;
}
.account-section input::placeholder,
.account-section textarea::placeholder {
    color: #9ca3af !important;
}
</style>

<?php $__env->startPush('scripts'); ?>
<script>
// Pre-fill email from CTA redirect
(function() {
    var params = new URLSearchParams(window.location.search);
    var email = params.get('email');
    if (!email) return;
    var fill = function() {
        var el = document.getElementById('email');
        if (el) { el.value = email; el.dispatchEvent(new Event('input')); return true; }
        return false;
    };
    if (!fill()) {
        var t = setInterval(function() { if (fill()) clearInterval(t); }, 200);
        setTimeout(function() { clearInterval(t); }, 5000);
    }
})();
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('partials.landing-footer', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.landing-page', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Priyam\Documents\GitHub\tuftable\resources\views/auth/restaurant_signup.blade.php ENDPATH**/ ?>