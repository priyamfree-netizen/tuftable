@extends('layouts.landing')

@section('content')
<script>
    // Spoof the URL for React Router to trigger the Masco Sign-Up component
    window.history.replaceState({}, '', '/sign-up');
</script>

<div id="root"></div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const observer = new MutationObserver((mutations, obs) => {
        // Find the Masco Auth form
        const authForm = document.querySelector('form[action="#"]') || document.querySelector('form');
        
        if (authForm && window.location.pathname === '/sign-up') {
            const inputs = Array.from(authForm.querySelectorAll('input'));
            
            // Map the inputs intuitively based on type or placeholder
            const email = inputs.find(i => i.type === 'email');
            const password = inputs.find(i => i.type === 'password');
            const textFields = inputs.filter(i => i.type === 'text');
            const name = textFields.length > 0 ? textFields[0] : null;

            if (email && password) {
                if (name) name.name = "name";
                email.name = "email";
                password.name = "password";

                authForm.action = "{{ route('register') }}";
                authForm.method = "POST";

                // Inject Laravel CSRF token
                const csrf = document.createElement('input');
                csrf.type = 'hidden';
                csrf.name = '_token';
                csrf.value = "{{ csrf_token() }}";
                authForm.appendChild(csrf);
                
                // Inject fake password confirmation so Laravel accepts the registration happily
                // even if the template didn't include one natively.
                const confirmPassword = document.createElement('input');
                confirmPassword.type = 'hidden';
                confirmPassword.name = 'password_confirmation';
                authForm.appendChild(confirmPassword);

                // Clone form to destroy React Synthetic onSubmit
                const newForm = authForm.cloneNode(true);
                authForm.parentNode.replaceChild(newForm, authForm);

                // Re-fetch the cloned form's elements for event hooking
                const newPassword = newForm.querySelector('input[name="password"]');
                const newConfirmPassword = newForm.querySelector('input[name="password_confirmation"]');
                
                // Listen to actual submit event to sync the fake password confirmation value
                newForm.addEventListener('submit', (e) => {
                    newConfirmPassword.value = newPassword.value;
                });

                // Rewrite visual 'Sign In' links below the form to navigate to Laravel's /login
                const loginLink = document.querySelector('a[href*="sign-in"]');
                if (loginLink) {
                    loginLink.href = "/login";
                }

                @if ($errors->any())
                    const errorBox = document.createElement('div');
                    errorBox.style.color = 'red';
                    errorBox.style.padding = '10px';
                    errorBox.innerHTML = `<strong>{{ $errors->first() }}</strong>`;
                    newForm.prepend(errorBox);
                @endif
                
                obs.disconnect();
            }
        }
    });

    observer.observe(document.body, { childList: true, subtree: true });
});
</script>
@endsection
