<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacare-Navbar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@material-tailwind/html@latest/dist/material-tailwind.min.css" rel="stylesheet">
    <style>
        .dropdown-transition {
            transition: all 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <nav class="bg-green-900 bg-opacity-95 max-w-7xl rounded-lg mt-6 fixed mx-auto z-50 top-0 inset-x-0 backdrop-blur-lg shadow-lg px-3">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto py-3">
            <a href="/" class="flex items-center space-x-3">
                <img class="w-12 h-12" src="{{ asset('img/logo.png') }}" alt="PharmaCare logo">
                <span class="text-white text-2xl font-semibold whitespace-nowrap">PharmaCare</span>
            </a>

            <div class="flex md:order-2 items-center space-x-4">
                @auth
                    {{-- Keranjang --}}
                    <a href="{{ url('/cart') }}" class="text-gray-300 hover:text-white">
                        <i class="fas fa-shopping-cart text-xl {{ Request::is('cart') ? 'text-white' : 'text-gray-300' }}"></i>
                    </a>

                    {{-- Avatar --}}
                    <div class="relative">
                        <i id="avatarButton" class="fas fa-user text-xl bg-gray-400  hover:text-white rounded-full px-2.5 py-1 {{ Request::is('profile*') ? 'text-white  bg-gray-100' : 'text-gray-300' }}"></i>
                        <div id="userDropdown" class="absolute right-0 mt-2 hidden bg-white rounded-lg shadow w-44 dropdown-transition">
                            <div class="px-4 py-3 text-sm text-gray-900">
                                <div class="font-medium truncate">{{ auth()->user()->name }}</div>
                                <div class=" truncate">{{ auth()->user()->email }}</div>
                            </div>
                            <ul class="py-2 text-sm text-gray-700">
                                <li>
                                    <a href="{{ url('/profile') }}" class="block px-4 py-2 hover:bg-gray-100">Profile</a>
                                </li>
                            </ul>
                            <form action="{{ route('logout') }}" method="POST" class="py-1 ">
                                @csrf
                                <button type="submit" class="flex w-full px-4 py-2 text-sm justify-start text-gray-700 hover:bg-gray-100">Logout</button>
                            </form>
                        </div>
                    </div>
                @endauth

                @guest
                    <a href="{{ url('/register') }}" class="text-gray-300 border-2 border-gray-300 hover:bg-green-600 hover:text-white hover:border-white font-medium rounded-lg text-sm px-5 py-2 text-center">Daftar</a>
                    <a href="{{ url('/login') }}" class="text-gray-300 hover:bg-green-600 hover:text-white font-medium rounded-lg text-sm px-5 py-2 text-center">Masuk</a>
                @endguest

                <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex md:hidden text-gray-500 rounded-lg w-10 h-10 p-2 hover:bg-gray-100 focus:ring-2 focus:ring-gray-200" aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 17 14">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                    </svg>
                </button>
            </div>

            {{-- Navigasi utama --}}
            <div class="hidden md:flex md:w-auto" id="navbar-sticky">
                <ul class="flex flex-col md:flex-row md:space-x-8 p-4 md:p-0 font-medium bg-gray-50 md:bg-transparent rounded-lg md:rounded-none border border-gray-100 md:border-0 mt-4 md:mt-0">
                    <li>
                        <a href="{{ url('/Pharmacare') }}" class="flex items-center space-x-2 px-3 py-2 {{ Request::is('Pharmacare') ? 'text-white  ' : 'text-gray-300' }}">
                            <i class="fas fa-home"></i><span>Homepage</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/Pharmacare/Catalogue') }}" class="flex items-center space-x-2 px-3 py-2 {{ Request::is('Pharmacare/Catalogue') || Request::is('medicine*') ? 'text-white ' : 'text-gray-300' }}">
                            <i class="fas fa-pills"></i><span>Product Catalogue</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('artikel') }}" class="flex items-center space-x-2 px-3 py-2 {{ Request::is('artikel') ? 'text-white  ' : 'text-gray-300' }}">
                            <i class="fas fa-newspaper"></i><span>Article</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('about') }}" class="flex items-center space-x-2 px-3 py-2 {{ Request::is('about') ? 'text-white  ' : 'text-gray-300' }}">
                            <i class="fas fa-info-circle"></i><span>About Us</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const avatarButton = document.getElementById('avatarButton');
            const userDropdown = document.getElementById('userDropdown');

            avatarButton?.addEventListener('click', () => {
                userDropdown.classList.toggle('hidden');
                userDropdown.classList.toggle('dropdown-transition');
            });

            window.addEventListener('click', (event) => {
                if (!avatarButton?.contains(event.target) && !userDropdown?.contains(event.target)) {
                    userDropdown?.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
