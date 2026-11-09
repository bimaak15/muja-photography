<!DOCTYPE html>
<html lang="id" class="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard') — MUJA PHOTOGRAPHY</title>

    <!-- Google Fonts: Bebas Neue, Inter, Cormorant Garamond -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Cormorant+Garamond:wght@400;500;600&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <!-- Tailwind CSS (via Vite) & Custom Admin CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="{{ asset('admin-dashboard.css') }}">

    @stack('styles')
</head>
<body class="admin-body min-h-screen flex flex-col md:flex-row antialiased custom-scrollbar">

    <!-- ==================== SIDEBAR (DESKTOP) ==================== -->
    <aside class="hidden md:flex flex-col w-64 border-r border-admin bg-[#0d0d0f] fixed inset-y-0 z-30 select-none">
        <!-- Logo Area -->
        <div class="h-20 flex items-center px-6 border-b border-admin-subtle">
            <a href="{{ route('admin.dashboard') }}" class="block">
                <span class="font-['Cormorant_Garamond'] text-xl font-semibold tracking-widest text-[#f5f5f7] block">MUJA</span>
                <span class="text-[0.62rem] tracking-[0.25em] text-admin-gold font-medium block -mt-1 uppercase">PHOTOGRAPHY STUDIO</span>
            </a>
        </div>

        <!-- Navigation Links -->
        <nav class="flex-1 py-6 px-3 space-y-1.5 overflow-y-auto custom-scrollbar">
            @php
                $currentRoute = Route::currentRouteName();
            @endphp

            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all duration-200
                      {{ $currentRoute === 'admin.dashboard'
                         ? 'bg-[#c9a96e]/15 text-admin-gold border-l-2 border-admin-gold'
                         : 'text-admin-muted hover:text-white hover:bg-white/[0.04]' }}">
                <i data-lucide="layout-grid" class="w-4 h-4 {{ $currentRoute === 'admin.dashboard' ? 'text-admin-gold' : 'text-admin-muted' }}"></i>
                <span>Dashboard</span>
            </a>

            <!-- Bookings -->
            <a href="{{ route('admin.booking') }}"
               class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all duration-200
                      {{ str_starts_with($currentRoute, 'admin.booking')
                         ? 'bg-[#c9a96e]/15 text-admin-gold border-l-2 border-admin-gold'
                         : 'text-admin-muted hover:text-white hover:bg-white/[0.04]' }}">
                <i data-lucide="calendar-check" class="w-4 h-4 {{ str_starts_with($currentRoute, 'admin.booking') ? 'text-admin-gold' : 'text-admin-muted' }}"></i>
                <span>Bookings</span>
            </a>

            <!-- Packages -->
            <a href="{{ route('admin.packages') }}"
               class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all duration-200
                      {{ str_starts_with($currentRoute, 'admin.packages')
                         ? 'bg-[#c9a96e]/15 text-admin-gold border-l-2 border-admin-gold'
                         : 'text-admin-muted hover:text-white hover:bg-white/[0.04]' }}">
                <i data-lucide="package" class="w-4 h-4 {{ str_starts_with($currentRoute, 'admin.packages') ? 'text-admin-gold' : 'text-admin-muted' }}"></i>
                <span>Packages</span>
            </a>

            <!-- Schedule -->
            <a href="{{ route('admin.schedule') }}"
               class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all duration-200
                      {{ str_starts_with($currentRoute, 'admin.schedule') || str_starts_with($currentRoute, 'admin.kalender')
                         ? 'bg-[#c9a96e]/15 text-admin-gold border-l-2 border-admin-gold'
                         : 'text-admin-muted hover:text-white hover:bg-white/[0.04]' }}">
                <i data-lucide="calendar" class="w-4 h-4 {{ str_starts_with($currentRoute, 'admin.schedule') ? 'text-admin-gold' : 'text-admin-muted' }}"></i>
                <span>Schedule</span>
            </a>

            <!-- Customer -->
            <a href="{{ route('admin.customer') }}"
               class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all duration-200
                      {{ str_starts_with($currentRoute, 'admin.customer')
                         ? 'bg-[#c9a96e]/15 text-admin-gold border-l-2 border-admin-gold'
                         : 'text-admin-muted hover:text-white hover:bg-white/[0.04]' }}">
                <i data-lucide="users" class="w-4 h-4 {{ str_starts_with($currentRoute, 'admin.customer') ? 'text-admin-gold' : 'text-admin-muted' }}"></i>
                <span>Customer</span>
            </a>

            <!-- Settings -->
            <a href="{{ route('admin.settings') }}"
               class="flex items-center gap-3.5 px-3.5 py-2.5 rounded-lg text-sm font-medium transition-all duration-200
                      {{ str_starts_with($currentRoute, 'admin.settings')
                         ? 'bg-[#c9a96e]/15 text-admin-gold border-l-2 border-admin-gold'
                         : 'text-admin-muted hover:text-white hover:bg-white/[0.04]' }}">
                <i data-lucide="settings" class="w-4 h-4 {{ str_starts_with($currentRoute, 'admin.settings') ? 'text-admin-gold' : 'text-admin-muted' }}"></i>
                <span>Settings</span>
            </a>
        </nav>

        <!-- Sidebar Footer: Log Out & Brand Tagline -->
        <div class="p-4 border-t border-admin-subtle">
            <a href="{{ route('home') }}" class="flex items-center gap-3 px-3 py-2 text-xs font-medium text-admin-muted hover:text-red-400 transition-colors">
                <i data-lucide="log-out" class="w-4 h-4"></i>
                <span>Log Out</span>
            </a>
            <div class="mt-3 px-3">
                <p class="font-['Cormorant_Garamond'] italic text-[0.8rem] text-admin-gold/70">Capture Your Best Moments</p>
            </div>
        </div>
    </aside>

    <!-- ==================== MOBILE TOPBAR ==================== -->
    <header class="md:hidden flex items-center justify-between px-4 py-3 bg-[#0d0d0f] border-b border-admin sticky top-0 z-40">
        <a href="{{ route('admin.dashboard') }}" class="block">
            <span class="font-['Cormorant_Garamond'] text-lg font-semibold tracking-wider text-[#f5f5f7]">MUJA STUDIO</span>
        </a>
        <div class="flex items-center gap-3">
            <button class="text-admin-muted p-1 hover:text-white">
                <i data-lucide="bell" class="w-5 h-5"></i>
            </button>
            <div class="w-8 h-8 rounded-full bg-admin-gold text-[#0d0d0d] font-bold text-xs flex items-center justify-center">
                MA
            </div>
        </div>
    </header>

    <!-- ==================== MAIN CONTENT WRAPPER ==================== -->
    <div class="flex-1 md:ml-64 flex flex-col min-h-screen">
        <!-- Desktop Header Bar -->
        <header class="hidden md:flex items-center justify-between h-20 px-8 border-b border-admin bg-[#0d0d0f]/80 backdrop-blur sticky top-0 z-20">
            <!-- Search Bar -->
            <div class="relative w-80">
                <i data-lucide="search" class="w-4 h-4 text-admin-dim absolute left-3.5 top-1/2 -translate-y-1/2 pointer-events-none"></i>
                <input type="text" placeholder="Search anything..."
                       class="admin-input pl-10 text-xs bg-[#151518] border-[#252528] focus:border-admin-gold rounded-full py-2">
            </div>

            <!-- Right Controls: Date, Notification, Profile -->
            <div class="flex items-center gap-4">
                <!-- Date Filter Pill -->
                <div class="flex items-center gap-2 bg-[#17171a] border border-[#26262a] px-3 py-1.5 rounded-lg text-xs text-admin-muted">
                    <i data-lucide="calendar" class="w-3.5 h-3.5 text-admin-gold"></i>
                    <span>26 Apr 2026 – 02 Mei 2026</span>
                    <i data-lucide="chevron-down" class="w-3 h-3 text-admin-dim"></i>
                </div>

                <!-- Notifications -->
                <button class="relative p-2 rounded-lg text-admin-muted hover:text-white hover:bg-white/[0.04] transition-colors">
                    <i data-lucide="bell" class="w-4 h-4"></i>
                    <span class="absolute top-1.5 right-1.5 w-2 h-2 rounded-full bg-admin-gold"></span>
                </button>

                <!-- Profile Dropdown Trigger -->
                <div class="flex items-center gap-2.5 pl-2 border-l border-admin-subtle">
                    <div class="w-8 h-8 rounded-full bg-gradient-to-tr from-[#c9a96e] to-[#edd9b2] text-[#0d0d0d] font-semibold text-xs flex items-center justify-center shadow-inner">
                        MA
                    </div>
                    <div class="text-left hidden lg:block leading-tight">
                        <p class="text-xs font-semibold text-white">Muja Ardiansyah</p>
                        <p class="text-[0.68rem] text-admin-gold">Owner</p>
                    </div>
                    <i data-lucide="chevron-down" class="w-3 h-3 text-admin-dim hidden lg:block"></i>
                </div>
            </div>
        </header>

        <!-- Page Specific Content -->
        <main class="flex-1 p-4 md:p-8 bg-[#0d0d0f] overflow-y-auto">
            @yield('content')
        </main>
    </div>

    <!-- ==================== MOBILE BOTTOM NAVBAR ==================== -->
    <nav class="md:hidden fixed bottom-0 inset-x-0 bg-[#101012] border-t border-admin flex items-center justify-around py-2 z-40">
        <a href="{{ route('admin.dashboard') }}" class="flex flex-col items-center py-1 {{ $currentRoute === 'admin.dashboard' ? 'text-admin-gold' : 'text-admin-dim' }}">
            <i data-lucide="layout-grid" class="w-5 h-5"></i>
            <span class="text-[0.62rem] mt-0.5">Dashboard</span>
        </a>
        <a href="{{ route('admin.booking') }}" class="flex flex-col items-center py-1 {{ str_starts_with($currentRoute, 'admin.booking') ? 'text-admin-gold' : 'text-admin-dim' }}">
            <i data-lucide="calendar-check" class="w-5 h-5"></i>
            <span class="text-[0.62rem] mt-0.5">Bookings</span>
        </a>
        <a href="{{ route('admin.packages') }}" class="flex flex-col items-center py-1 {{ str_starts_with($currentRoute, 'admin.packages') ? 'text-admin-gold' : 'text-admin-dim' }}">
            <i data-lucide="package" class="w-5 h-5"></i>
            <span class="text-[0.62rem] mt-0.5">Packages</span>
        </a>
        <a href="{{ route('admin.schedule') }}" class="flex flex-col items-center py-1 {{ str_starts_with($currentRoute, 'admin.schedule') ? 'text-admin-gold' : 'text-admin-dim' }}">
            <i data-lucide="calendar" class="w-5 h-5"></i>
            <span class="text-[0.62rem] mt-0.5">Schedule</span>
        </a>
        <a href="{{ route('admin.customer') }}" class="flex flex-col items-center py-1 {{ str_starts_with($currentRoute, 'admin.customer') ? 'text-admin-gold' : 'text-admin-dim' }}">
            <i data-lucide="users" class="w-5 h-5"></i>
            <span class="text-[0.62rem] mt-0.5">Customer</span>
        </a>
        <a href="{{ route('admin.settings') }}" class="flex flex-col items-center py-1 {{ str_starts_with($currentRoute, 'admin.settings') ? 'text-admin-gold' : 'text-admin-dim' }}">
            <i data-lucide="settings" class="w-5 h-5"></i>
            <span class="text-[0.62rem] mt-0.5">Settings</span>
        </a>
    </nav>

    <!-- Initialize Lucide Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (window.lucide) {
                window.lucide.createIcons();
            }
        });
    </script>
    @stack('scripts')
</body>
</html>

