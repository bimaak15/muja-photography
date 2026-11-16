<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login Admin — MUJA PHOTOGRAPHY</title>

    <!-- Google Fonts: Bebas Neue, Inter, Cormorant Garamond -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cormorant+Garamond:wght@400;500;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google reCAPTCHA v2 API -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <!-- Tailwind CSS (via Vite) & Custom Admin CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('admin-dashboard.css') }}">
</head>
<body class="admin-body min-h-screen flex items-center justify-center p-4 relative overflow-x-hidden antialiased select-none">

    <!-- Ambient Gold Glow in Background -->
    <div class="fixed inset-0 pointer-events-none flex items-center justify-center">
        <div class="w-[500px] h-[500px] rounded-full bg-[#c9a96e]/10 blur-[130px]"></div>
    </div>

    <!-- Main Container -->
    <div class="w-full max-w-md relative z-10 my-8">

        <!-- Header / Logo Area -->
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-block transition-transform hover:scale-[1.02]">
                <img src="{{ asset('img/logo-muja.webp') }}"
                     alt="MUJA PHOTOGRAPHY"
                     class="h-20 sm:h-24 w-auto mx-auto object-contain drop-shadow-md">
            </a>
            <p class="font-['Cormorant_Garamond'] italic text-sm text-admin-gold/70 mt-2">Capture Your Best Moments</p>
        </div>

        <!-- Login Card -->
        <div class="bg-admin-card border border-admin rounded-2xl p-6 sm:p-8 shadow-2xl backdrop-blur-sm"
             x-data="{ showPassword: false }">

            <div class="mb-6">
                <h1 class="text-xl font-bold text-white tracking-wide">Portal Admin</h1>
                <p class="text-xs text-admin-dim mt-1">Masuk untuk mengelola booking, galeri showcase, dan keuangan studio.</p>
            </div>

            <!-- Flash Notification Messages -->
            @if (session('success'))
                <div class="mb-5 p-3.5 rounded-lg bg-green-500/10 border border-green-500/25 text-green-400 text-xs flex items-center gap-2.5">
                    <i data-lucide="check-circle" class="w-4 h-4 shrink-0"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->has('email') && ! $errors->has('password') && ! $errors->has('g-recaptcha-response'))
                <div class="mb-5 p-3.5 rounded-lg bg-red-500/10 border border-red-500/25 text-red-400 text-xs flex items-center gap-2.5">
                    <i data-lucide="alert-circle" class="w-4 h-4 shrink-0"></i>
                    <span>{{ $errors->first('email') }}</span>
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}" class="space-y-4">
                @csrf

                <!-- Email Input -->
                <div>
                    <label for="email" class="block text-xs font-medium text-admin-muted mb-1.5">Alamat Email</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-admin-dim">
                            <i data-lucide="mail" class="w-4 h-4"></i>
                        </div>
                        <input id="email"
                               type="email"
                               name="email"
                               value="{{ old('email') }}"
                               required
                               autofocus
                               autocomplete="username"
                               placeholder="admin@mujaphotography.com"
                               class="w-full pl-10 pr-3.5 py-2.5 bg-[#0d0d0f] border rounded-lg text-sm text-white placeholder-admin-dim/60 focus:outline-none focus:border-admin-gold focus:ring-1 focus:ring-admin-gold transition-colors
                                      {{ $errors->has('email') ? 'border-red-500/60' : 'border-admin' }}">
                    </div>
                </div>

                <!-- Password Input -->
                <div>
                    <div class="flex items-center justify-between mb-1.5">
                        <label for="password" class="block text-xs font-medium text-admin-muted">Kata Sandi</label>
                    </div>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-admin-dim">
                            <i data-lucide="lock" class="w-4 h-4"></i>
                        </div>
                        <input id="password"
                               :type="showPassword ? 'text' : 'password'"
                               name="password"
                               required
                               autocomplete="current-password"
                               placeholder="••••••••••••"
                               class="w-full pl-10 pr-10 py-2.5 bg-[#0d0d0f] border rounded-lg text-sm text-white placeholder-admin-dim/60 focus:outline-none focus:border-admin-gold focus:ring-1 focus:ring-admin-gold transition-colors
                                      {{ $errors->has('password') ? 'border-red-500/60' : 'border-admin' }}">
                        <button type="button"
                                @click="showPassword = !showPassword"
                                class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-admin-dim hover:text-white transition-colors"
                                tabindex="-1">
                            <i :data-lucide="showPassword ? 'eye-off' : 'eye'" class="w-4 h-4"></i>
                        </button>
                    </div>
                    @error('password')
                        <p class="text-xs text-red-400 mt-1.5">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me Checkbox -->
                <div class="flex items-center justify-between pt-1">
                    <label class="flex items-center gap-2 cursor-pointer select-none">
                        <input type="checkbox"
                               name="remember"
                               class="rounded border-admin bg-[#0d0d0f] text-admin-gold focus:ring-admin-gold/40 focus:ring-offset-0 w-3.5 h-3.5">
                        <span class="text-xs text-admin-muted">Ingat saya di perangkat ini</span>
                    </label>
                </div>

                <!-- Google reCAPTCHA v2 Checkbox Widget -->
                <div class="pt-2">
                    <div class="flex flex-col items-center justify-center p-3 rounded-xl bg-[#0d0d0f]/60 border border-admin-subtle">
                        <div class="g-recaptcha"
                             data-sitekey="{{ config('services.recaptcha.site_key') }}"
                             data-theme="dark">
                        </div>
                    </div>
                    @error('g-recaptcha-response')
                        <p class="text-xs text-red-400 mt-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="pt-2">
                    <button type="submit" class="btn-admin-gold w-full justify-center py-2.5 text-sm font-semibold tracking-wide">
                        <i data-lucide="log-in" class="w-4 h-4"></i>
                        <span>Masuk ke Dashboard</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Back to Home Link -->
        <div class="text-center mt-6">
            <a href="{{ route('home') }}" class="inline-flex items-center gap-1.5 text-xs text-admin-dim hover:text-admin-gold transition-colors">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                <span>Kembali ke Website Utama</span>
            </a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }
        });
    </script>
</body>
</html>

