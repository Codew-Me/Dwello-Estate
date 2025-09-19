<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dwello') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'sans': ['Poppins', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'Noto Sans', 'sans-serif'],
                    },
                    colors: {
                        'dwello-brown': '#36211A',
                        'dwello-beige': '#FDF8F5',
                        'dwello-light-beige': '#EADCD2',
                        'dwello-tan': '#EADED4',
                    }
                }
            }
        }
    </script>
    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-dwello-beige">
        <!-- Navigation -->
        <nav class="bg-dwello-beige">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <!-- Logo -->
                        <div class="flex-shrink-0 flex items-center">
                            <img src="{{ asset('logo.png') }}" alt="Dwello Logo" class="h-8 w-auto">
                        </div>

                        <!-- Navigation Links -->
                        <div class="hidden md:ml-10 md:flex md:space-x-8">
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="/" class="text-dwello-brown hover:text-gray-900 px-3 py-2 text-sm font-bold">Home</a>
                                    <a href="{{ route('admin.users.index') }}" class="text-dwello-brown hover:text-gray-900 px-3 py-2 text-sm font-bold">View Users</a>
                                    <a href="{{ route('admin.inquiries.index') }}" class="text-dwello-brown hover:text-gray-900 px-3 py-2 text-sm font-bold">View Inquiries</a>
                                    <a href="{{ route('admin.messages.index') }}" class="text-dwello-brown hover:text-gray-900 px-3 py-2 text-sm font-bold">View Messages</a>
                                @else
                                    <a href="/" class="text-dwello-brown hover:text-gray-900 px-3 py-2 text-sm font-bold">Home</a>
                                    <a href="/#popular-residences" class="text-dwello-brown hover:text-gray-900 px-3 py-2 text-sm font-bold">Properties</a>
                                    <a href="{{ route('agents.index') }}" class="text-dwello-brown hover:text-gray-900 px-3 py-2 text-sm font-bold">Agents</a>
                                    <a href="{{ route('contact') }}" class="text-dwello-brown hover:text-gray-900 px-3 py-2 text-sm font-bold">Contact</a>
                                @endif
                            @else
                                <a href="/" class="text-dwello-brown hover:text-gray-900 px-3 py-2 text-sm font-bold">Home</a>
                                <a href="/#popular-residences" class="text-dwello-brown hover:text-gray-900 px-3 py-2 text-sm font-bold">Properties</a>
                                <a href="{{ route('agents.index') }}" class="text-dwello-brown hover:text-gray-900 px-3 py-2 text-sm font-bold">Agents</a>
                                <a href="{{ route('contact') }}" class="text-dwello-brown hover:text-gray-900 px-3 py-2 text-sm font-bold">Contact</a>
                            @endauth
                        </div>
                    </div>

                    <div class="flex items-center space-x-4">
                        <!-- Mobile menu button -->
                        <div class="md:hidden">
                            <button type="button" class="text-dwello-brown hover:text-gray-900 focus:outline-none focus:text-gray-900" onclick="toggleMobileMenu()">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>

                        <!-- Search and Profile Icons -->
                        <div class="hidden md:flex items-center space-x-4">
                            <a href="{{ route('search') }}" class="text-dwello-brown hover:text-gray-900 transition duration-300">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            </a>
                            @auth
                                @if(auth()->user()->role === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="text-dwello-brown hover:text-gray-900 transition duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <circle cx="12" cy="8" r="4"/>
                                            <path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>
                                        </svg>
                                    </a>
                                @else
                                    <a href="{{ route('user.dashboard') }}" class="text-dwello-brown hover:text-gray-900 transition duration-300">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <circle cx="12" cy="8" r="4"/>
                                            <path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>
                                        </svg>
                                    </a>
                                @endif
                            @else
                                <a href="{{ route('login') }}" class="text-dwello-brown hover:text-gray-900 transition duration-300">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="8" r="4"/>
                                        <path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>
                            </svg>
                                </a>
                            @endauth
                        </div>

                        @auth
                            <form method="POST" action="{{ route('logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="bg-dwello-brown text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-opacity-90">
                                    Logout
                                </button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="bg-dwello-brown text-white px-4 py-2 rounded-lg text-sm font-bold hover:bg-opacity-90">
                                Sign up
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
            
            <!-- Mobile menu -->
            <div class="md:hidden hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 bg-dwello-beige border-t border-gray-200">
                    <!-- Mobile Search and Profile -->
                    <div class="px-3 py-2 flex items-center justify-between">
                        <a href="{{ route('search') }}" class="text-dwello-brown hover:text-gray-900 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                            Search Properties
                        </a>
                        @auth
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('admin.dashboard') }}" class="text-dwello-brown hover:text-gray-900 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="8" r="4"/>
                                        <path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>
                                    </svg>
                                    Admin Dashboard
                                </a>
                            @else
                                <a href="{{ route('user.dashboard') }}" class="text-dwello-brown hover:text-gray-900 flex items-center gap-2">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <circle cx="12" cy="8" r="4"/>
                                        <path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>
                                    </svg>
                                    My Dashboard
                                </a>
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="text-dwello-brown hover:text-gray-900 flex items-center gap-2">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="8" r="4"/>
                                    <path d="M6 21v-2a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v2"/>
                                </svg>
                                Login
                            </a>
                        @endauth
                    </div>
                    @auth
                        @if(auth()->user()->role === 'admin')
                            <a href="/" class="text-dwello-brown hover:text-gray-900 block px-3 py-2 text-base font-medium">Home</a>
                            <a href="{{ route('admin.users.index') }}" class="text-dwello-brown hover:text-gray-900 block px-3 py-2 text-base font-medium">View Users</a>
                            <a href="{{ route('admin.inquiries.index') }}" class="text-dwello-brown hover:text-gray-900 block px-3 py-2 text-base font-medium">View Inquiries</a>
                            <a href="{{ route('admin.messages.index') }}" class="text-dwello-brown hover:text-gray-900 block px-3 py-2 text-base font-medium">View Messages</a>
                        @else
                            <a href="/" class="text-dwello-brown hover:text-gray-900 block px-3 py-2 text-base font-medium">Home</a>
                            <a href="/#popular-residences" class="text-dwello-brown hover:text-gray-900 block px-3 py-2 text-base font-medium">Properties</a>
                            <a href="{{ route('agents.index') }}" class="text-dwello-brown hover:text-gray-900 block px-3 py-2 text-base font-medium">Agents</a>
                            <a href="{{ route('contact') }}" class="text-dwello-brown hover:text-gray-900 block px-3 py-2 text-base font-medium">Contact</a>
                        @endif
                    @else
                        <a href="/" class="text-dwello-brown hover:text-gray-900 block px-3 py-2 text-base font-medium">Home</a>
                        <a href="/#popular-residences" class="text-dwello-brown hover:text-gray-900 block px-3 py-2 text-base font-medium">Properties</a>
                        <a href="{{ route('agents.index') }}" class="text-dwello-brown hover:text-gray-900 block px-3 py-2 text-base font-medium">Agents</a>
                        <a href="{{ route('contact') }}" class="text-dwello-brown hover:text-gray-900 block px-3 py-2 text-base font-medium">Contact</a>
                    @endauth
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main>
            @yield('content')
        </main>
    </div>

    <script>
        function toggleMobileMenu() {
            const mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
            }
        }
    </script>
</body>
</html>
