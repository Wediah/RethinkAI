<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RethinkAI | @yield('title')</title>
    <link rel="icon" href="{{ asset('assets/logo.jpg') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flow bite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['AvanteGarde', 'sans-serif'],
                    },
                    gridTemplateRows: {
                        auto: 'auto',
                    },
                    colors: {
                        'deep': '#224435',
                    },
                },
            },
        };
    </script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <style>
        /* Mobile menu styles */
        #mobile-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background-color: white;
            z-index: 40;
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            overflow-y: auto;
        }
        #mobile-menu.active {
            transform: translateX(0);
        }
        #mobile-menu ul li {
            padding: 1.5rem 0;
            border-bottom: 1px solid #e5e7eb;
            width: 100%;
            text-align: center;
        }
        #mobile-menu ul li a {
            font-size: 1.25rem;
            color: #1f2937;
        }
        #close-menu {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            color: #1f2937;
        }
        .no-scroll {
            overflow: hidden;
        }
        /* Ensure navbar remains transparent by default */
        #navbar {
            background-color: transparent !important;
        }
        #navbar.scrolled {
            background-color: white !important;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>
<body>
<nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300 text-white py-2 px-4 md:px-14">
    <div class="flex flex-wrap items-center justify-between mx-auto">
        <a href="/" class="flex items-center space-x-1 rtl:space-x-reverse">
{{--            <img id="white-logo" src="#" class="h-8" alt="pleasant Logo" />--}}
            <span id="big1" class="self-center text-xl font-semibold whitespace-nowrap ">RethinkAI</span>
        </a>

        <!-- Mobile menu button -->
        <button id="menu-toggle" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
            </svg>
        </button>

        <!-- Desktop Menu -->
        <div class="hidden w-full md:block md:w-auto" id="desktop-menu">
            <ul class="flex flex-col md:flex-row md:space-x-4 rtl:space-x-reverse md:mt-0 md:border-0 font-semibold  font-sans ">
                <li>
                    <a href="/" class="block py-2 px-3 md:hover:bg-transparent md:border-0 hover:text-yellow-400 md:p-0 text-sm">Home</a>
                </li>
                <li>
                    <a href="/about" class="block py-2 px-3 md:hover:bg-transparent md:border-0
                    hover:text-yellow-400 md:p-0 text-sm">About</a>
                </li>
                <li>
                    <a href="/impact" class="block py-2 px-3 md:hover:bg-transparent md:border-0 hover:text-yellow-400 md:p-0 text-sm">Impact</a>
                </li>
                <li>
                    <a href="/events" class="block py-2 px-3 md:hover:bg-transparent md:border-0 hover:text-yellow-400 md:p-0 text-sm">Events</a>
                </li>
                <li>
                    <a href="/contact" class="block py-2 px-3 md:hover:bg-transparent md:border-0 hover:text-yellow-400 md:p-0 text-sm">Contact</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Mobile Menu (Full Screen) -->
    <div id="mobile-menu">
        <button id="close-menu" type="button" class="p-2 rounded-lg hover:bg-gray-100">
            <svg class="w-6 h-6" fill="none" stroke="#fff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <ul class="flex flex-col items-center justify-center h-full pt-16">
            <li class="w-full text-center">
                <a href="/" class="block w-full py-4">Home</a>
            </li>
            <li class="w-full text-center">
                <a href="/about" class="block w-full py-4">About</a>
            </li>
            <li class="w-full text-center">
                <a href="/impact" class="block w-full py-4">Impact</a>
            </li>
            <li class="w-full text-center">
                <a href="/events" class="block w-full py-4">Events</a>
            </li>
            <li class="w-full text-center">
                <a href="/contact" class="block w-full py-4">Contact</a>
            </li>
        </ul>
    </div>
</nav>

<div class="">
    @yield('content')

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</div>

<footer class="bg-gray-500">
    <!-- Your existing footer content -->
    <div class="grid md:grid-cols-2 grid-col-1 py-3 px-4 md:px-14 text-white pt-6">
        <div class="flex flex-col gap-4">
            <h1 class="text-3xl font-bold">RethinkAI</h1>
            <p class="text-sm md:text-base">RethinkAI is a cutting-edge technology company dedicated to harnessing the power of artificial intelligence to drive innovation and transform industries. Our mission is to create intelligent solutions that enhance human capabilities and improve quality of life.</p>
        </div>
        <div class="flex flex-col md:flex-row gap-12 md:ml-auto mt-12 md:mt-0">
            <div class="flex flex-col ">
                <h3 class="mb-4 font-medium">Quick Links</h3>
                <ul class="flex flex-col gap-2 text-white sm:mt-0 text-sm">
                    <li>
                        <a href="/strategy" class="hover:underline">Strategy & Roadmap</a>
                    </li>
                    <li>
                        <a href="/vertical" class="hover:underline">Vertical Solutions</a>
                    </li>
                    <li>
                        <a href="/infra" class="hover:underline">Infrastructure & Governance</a>
                    </li>
                    <li>
                        <a href="/growth" class="hover:underline">Partnership & Growth</a>
                    </li>
                    <li>
                        <a href="/insights" class="hover:underline">Insights & Resources</a>
                    </li>
                    <li>
                        <a href="/talent" class="hover:underline">Talent & Innovation</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col">
                <h3 class="mb-4 font-medium">Helpful Links</h3>
                <ul class="flex flex-col gap-2 text-white">
                    <li>
                        <a href="/about" class="hover:underline">About</a>
                    </li>
                    <li>
                        <a href="/contact" class="hover:underline">Contact</a>
                    </li>
                    <li>
                        <a href="/privacy" class="hover:underline">Privacy Policy</a>
                    </li>
                </ul>
            </div>
            <div class="flex flex-col">
                <h3 class="mb-4 font-medium">Social</h3>
                <ul class="flex flex-col gap-2 text-white">
                    <li>
                        <a href="#" class="hover:underline">Instagram</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Facebook</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Tiktok</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">LinkedIn</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">X (Twitter)</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr class=" mx-4 md:mx-10 mt-6">

    <div class="flex justify-center items-center py-3">
        <p class="text-sm text-white">
            &copy; 2024 RethinkAI. All rights reserved.
        </p>
    </div>
</footer>

<script>
    // Mobile menu functionality
    const menuToggle = document.getElementById('menu-toggle');
    const closeMenu = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const body = document.body;

    menuToggle.addEventListener('click', function() {
        mobileMenu.classList.add('active');
        body.classList.add('no-scroll');
    });

    closeMenu.addEventListener('click', function() {
        mobileMenu.classList.remove('active');
        body.classList.remove('no-scroll');
    });

    // Close menu when clicking on a link
    document.querySelectorAll('#mobile-menu a').forEach(link => {
        link.addEventListener('click', function() {
            mobileMenu.classList.remove('active');
            body.classList.remove('no-scroll');
        });
    });

    // Scroll functionality
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbar');
        const navLogo = document.getElementById('big1');
        const navLinks = document.querySelectorAll('#desktop-menu a');

        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
            navLogo.classList.add('text-black');

            // Apply black text to desktop nav links
            navLinks.forEach(link => {
                link.classList.remove('text-white');
                link.classList.add('text-gray-900'); // Use 900 for true black
            });
        } else {
            navbar.classList.remove('scrolled');
            navLogo.classList.remove('text-black');

            // Revert to white text
            navLinks.forEach(link => {
                link.classList.remove('text-gray-900');
                link.classList.add('text-white');
            });
        }
    });
</script>
</body>
</html>
