<header id="site-main-header" style="position:sticky;top:0;z-index:9999;background:#111827;height:52px;display:flex;align-items:center;border-bottom:1px solid #374151;">
    <div style="max-width:1280px;width:100%;margin:0 auto;padding:0 1.5rem;display:flex;align-items:center;justify-content:space-between;">

        {{-- Logo --}}
        <a href="{{ route('home') }}" style="display:flex;align-items:center;gap:10px;text-decoration:none;flex-shrink:0;">
            <img src="{{ global_setting()->logoUrl }}" alt="TufTable" style="height:30px;width:auto;">
            <span style="font-weight:700;font-size:1rem;color:#fff;white-space:nowrap;">TufTable</span>
        </a>

        {{-- Desktop Nav --}}
        <nav style="display:flex;align-items:center;gap:2.5rem;" id="landing-desktop-nav">
            <a href="{{ route('landing.about') }}" style="font-size:0.875rem;font-weight:500;color:#9ca3af;text-decoration:none;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#9ca3af'">About Us</a>
            <a href="{{ route('landing.blog') }}" style="font-size:0.875rem;font-weight:500;color:#9ca3af;text-decoration:none;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#9ca3af'">Blog</a>
            <a href="{{ route('landing.contact') }}" style="font-size:0.875rem;font-weight:500;color:#9ca3af;text-decoration:none;" onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#9ca3af'">Contact</a>
        </nav>

        {{-- Auth Buttons --}}
        <div style="display:flex;align-items:center;gap:0.75rem;" id="landing-auth-nav">
            @auth
                {{-- Logged in: Dashboard + Logout --}}
                <a href="{{ route('dashboard') }}"
                   style="padding:6px 18px;font-size:0.875rem;font-weight:600;color:#fff;background:#4f46e5;border-radius:999px;text-decoration:none;">
                    Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    <button type="submit"
                        style="padding:6px 18px;font-size:0.875rem;font-weight:500;color:#9ca3af;background:none;border:1px solid #374151;border-radius:999px;cursor:pointer;"
                        onmouseover="this.style.color='#fff';this.style.borderColor='#6b7280'"
                        onmouseout="this.style.color='#9ca3af';this.style.borderColor='#374151'">
                        Logout
                    </button>
                </form>
            @else
                {{-- Logged out: Login + Sign Up --}}
                <a href="/login"
                   style="font-size:0.875rem;font-weight:500;color:#9ca3af;text-decoration:none;"
                   onmouseover="this.style.color='#fff'" onmouseout="this.style.color='#9ca3af'">
                    Login
                </a>
                <a href="{{ route('restaurant_signup') }}"
                   style="padding:6px 18px;font-size:0.875rem;font-weight:600;color:#fff;background:#4f46e5;border-radius:999px;text-decoration:none;">
                    Sign Up
                </a>
            @endauth
        </div>

        {{-- Mobile hamburger --}}
        <button id="lh-mobile-btn" style="display:none;background:none;border:none;cursor:pointer;padding:4px;" aria-label="Menu">
            <svg width="22" height="22" fill="none" stroke="#9ca3af" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    {{-- Mobile Nav --}}
    <div id="lh-mobile-menu" style="display:none;position:absolute;top:52px;left:0;right:0;background:#111827;border-top:1px solid #374151;padding:0.75rem 1.5rem;flex-direction:column;gap:0.25rem;z-index:9998;">
        <a href="{{ route('landing.about') }}" style="display:block;padding:10px 0;font-size:0.875rem;color:#9ca3af;text-decoration:none;border-bottom:1px solid #1f2937;">About Us</a>
        <a href="{{ route('landing.blog') }}" style="display:block;padding:10px 0;font-size:0.875rem;color:#9ca3af;text-decoration:none;border-bottom:1px solid #1f2937;">Blog</a>
        <a href="{{ route('landing.contact') }}" style="display:block;padding:10px 0;font-size:0.875rem;color:#9ca3af;text-decoration:none;border-bottom:1px solid #1f2937;">Contact</a>
        @auth
            <a href="{{ route('dashboard') }}" style="display:block;padding:10px 0;font-size:0.875rem;color:#818cf8;text-decoration:none;border-bottom:1px solid #1f2937;">Dashboard</a>
            <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                @csrf
                <button type="submit" style="display:block;padding:10px 0;font-size:0.875rem;color:#9ca3af;background:none;border:none;cursor:pointer;text-align:left;width:100%;">Logout</button>
            </form>
        @else
            <a href="/login" style="display:block;padding:10px 0;font-size:0.875rem;color:#9ca3af;text-decoration:none;border-bottom:1px solid #1f2937;">Login</a>
            <a href="{{ route('restaurant_signup') }}" style="display:block;padding:10px 0;font-size:0.875rem;color:#818cf8;text-decoration:none;">Sign Up</a>
        @endauth
    </div>
</header>

<style>
    .site-header { display: none !important; }
    @@media (max-width: 768px) {
        #landing-desktop-nav { display: none !important; }
        #landing-auth-nav { display: none !important; }
        #lh-mobile-btn { display: block !important; }
    }
</style>

<script>
    (function() {
        var btn = document.getElementById('lh-mobile-btn');
        var menu = document.getElementById('lh-mobile-menu');
        if (btn && menu) {
            btn.addEventListener('click', function() {
                menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
            });
        }
    })();
</script>
