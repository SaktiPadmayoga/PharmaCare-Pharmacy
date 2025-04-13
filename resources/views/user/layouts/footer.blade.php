<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pharmacare-Footer</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
</head>
<body>
    <footer class="bg-green-900  divide-y mt-auto">
        <div class="container px-6 py-10 mx-auto">
            <div class="grid grid-cols-1 gap-1 lg:grid-cols-12">
                <!-- Logo and Contact Section -->
                <div class="lg:col-span-5 w-full">
                    <div class="flex flex-col sm:flex-row lg:flex-col xl:flex-row items-center space-y-4 sm:space-y-0 sm:space-x-4 justify-center lg:justify-start">
                        <div class="w-24 h-24 lg:w-32 lg:h-32">
                            <img src="img/logo.png" alt="logo" class="w-full h-full">
                        </div>
                        <div class="text-center sm:text-left">
                            <span class="text-2xl lg:text-4xl font-semibold text-white">PharmaCare</span>
                            <ul class="mt-2 space-y-2">
                                <li>
                                    <a href="mailto:pharmacare@gmail.com" class="text-white hover:underline flex items-center justify-center sm:justify-start space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        <span>pharmacare@gmail.com</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:021-5086-8840" class="text-white hover:underline flex items-center justify-center sm:justify-start space-x-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                        <span>021-5086-8840</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Navigation and Social Media Links -->
                <div class="lg:col-span-7">
                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-8">
                        <!-- Products Section -->
                        {{-- <div class="space-y-3">
                            <h3 class="tracking-wide uppercase text-lg text-white">Produk</h3>
                            <hr class="border-white/20 w-16">
                            <ul class="space-y-1">
                                <li>
                                    <a rel="noopener noreferrer" href="#" class="text-white hover:underline">Obat tanpa resep dokter</a>
                                </li>
                                <li>
                                    <a rel="noopener noreferrer" href="#" class="text-white hover:underline">Obat dengan resep dokter</a>
                                </li>
                            </ul>
                        </div> --}}

                        <!-- About Us Section -->
                        <div class="space-y-3">
                            <h3 class="tracking-wide uppercase text-lg text-white"> About Us</h3>
                            <hr class="border-white/20 w-16">
                            <ul class="space-y-1">
                                <li>
                                    <a rel="noopener noreferrer" href="#" class="text-white hover:underline">FAQ</a>
                                </li>
                                <li>
                                    <a rel="noopener noreferrer" href="#" class="text-white hover:underline">Privacy</a>
                                </li>
                                <li>
                                    <a rel="noopener noreferrer" href="#" class="text-white hover:underline">Terms of Service</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Social Media Section -->
                        <div class="space-y-3">
                            <h3 class="tracking-wide uppercase text-lg text-white">Social Media</h3>
                            <hr class="border-white/20 w-16">
                            <ul class="space-y-2">
                                <li>
                                    <a rel="noopener noreferrer" href="#" class="flex items-center text-white hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 32 32" class="w-5 h-5">
                                            <path d="M32 16c0-8.839-7.167-16-16-16-8.839 0-16 7.161-16 16 0 7.984 5.849 14.604 13.5 15.803v-11.177h-4.063v-4.625h4.063v-3.527c0-4.009 2.385-6.223 6.041-6.223 1.751 0 3.584 0.312 3.584 0.312v3.937h-2.021c-1.984 0-2.604 1.235-2.604 2.5v3h4.437l-0.713 4.625h-3.724v11.177c7.645-1.199 13.5-7.819 13.5-15.803z"></path>
                                        </svg>
                                        <span class="ml-2">Facebook</span>
                                    </a>
                                </li>
                                <li>
                                    <a rel="noopener noreferrer" href="#" class="flex items-center text-white hover:underline">
                                        <svg viewBox="0 0 512 512" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                            <path fill="currentColor" d="M412.19,118.66a109.27,109.27,0,0,1-9.45-5.5,132.87,132.87,0,0,1-24.27-20.62c-18.1-20.71-24.86-41.72-27.35-56.43h.1C349.14,23.9,350,16,350.13,16H267.69V334.78c0,4.28,0,8.51-.18,12.69,0,.52-.05,1-.08,1.56,0,.23,0,.47-.05.71,0,.06,0,.12,0,.18a70,70,0,0,1-35.22,55.56,68.8,68.8,0,0,1-34.11,9c-38.41,0-69.54-31.32-69.54-70s31.13-70,69.54-70a68.9,68.9,0,0,1,21.41,3.39l.1-83.94a153.14,153.14,0,0,0-118,34.52,161.79,161.79,0,0,0-35.3,43.53c-3.48,6-16.61,30.11-18.2,69.24-1,22.21,5.67,45.22,8.85,54.73v.2c2,5.6,9.75,24.71,22.38,40.82A167.53,167.53,0,0,0,115,470.66v-.2l.2.2C155.11,497.78,199.36,496,199.36,496c7.66-.31,33.32,0,62.46-13.81,32.32-15.31,50.72-38.12,50.72-38.12a158.46,158.46,0,0,0,27.64-45.93c7.46-19.61,9.95-43.13,9.95-52.53V176.49c1,.6,14.32,9.41,14.32,9.41s19.19,12.3,49.13,20.31c21.48,5.7,50.42,6.9,50.42,6.9V131.27C453.86,132.37,433.27,129.17,412.19,118.66Z"/>
                                        </svg>
                                        <span class="ml-2">TikTok</span>
                                    </a>
                                </li>
                                <li>
                                    <a rel="noopener noreferrer" href="#" class="flex items-center text-white hover:underline">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" class="w-5 h-5">
                                            <path fill="currentColor" d="M16 0c-4.349 0-4.891 0.021-6.593 0.093-1.709 0.084-2.865 0.349-3.885 0.745-1.052 0.412-1.948 0.959-2.833 1.849-0.891 0.885-1.443 1.781-1.849 2.833-0.396 1.020-0.661 2.176-0.745 3.885-0.077 1.703-0.093 2.244-0.093 6.593s0.021 4.891 0.093 6.593c0.084 1.704 0.349 2.865 0.745 3.885 0.412 1.052 0.959 1.948 1.849 2.833 0.885 0.891 1.781 1.443 2.833 1.849 1.020 0.391 2.181 0.661 3.885 0.745 1.703 0.077 2.244 0.093 6.593 0.093s4.891-0.021 6.593-0.093c1.704-0.084 2.865-0.355 3.885-0.745 1.052-0.412 1.948-0.959 2.833-1.849 0.891-0.885 1.443-1.776 1.849-2.833 0.391-1.020 0.661-2.181 0.745-3.885 0.077-1.703 0.093-2.244 0.093-6.593s-0.021-4.891-0.093-6.593c-0.084-1.704-0.355-2.871-0.745-3.885-0.412-1.052-0.959-1.948-1.849-2.833-0.885-0.891-1.776-1.443-2.833-1.849-1.020-0.396-2.181-0.661-3.885-0.745-1.703-0.077-2.244-0.093-6.593-0.093zM16 2.88c4.271 0 4.781 0.021 6.469 0.093 1.557 0.073 2.405 0.333 2.968 0.553 0.751 0.291 1.276 0.635 1.844 1.197 0.557 0.557 0.901 1.088 1.192 1.839 0.22 0.563 0.48 1.411 0.553 2.968 0.072 1.688 0.093 2.199 0.093 6.469s-0.021 4.781-0.099 6.469c-0.084 1.557-0.344 2.405-0.563 2.968-0.303 0.751-0.641 1.276-1.199 1.844-0.563 0.557-1.099 0.901-1.844 1.192-0.556 0.22-1.416 0.48-2.979 0.553-1.697 0.072-2.197 0.093-6.479 0.093s-4.781-0.021-6.48-0.099c-1.557-0.084-2.416-0.344-2.979-0.563-0.76-0.303-1.281-0.641-1.839-1.199-0.563-0.563-0.921-1.099-1.197-1.844-0.224-0.556-0.48-1.416-0.563-2.979-0.057-1.677-0.084-2.197-0.084-6.459 0-4.26 0.027-4.781 0.084-6.479 0.083-1.563 0.339-2.421 0.563-2.979 0.276-0.761 0.635-1.281 1.197-1.844 0.557-0.557 1.079-0.917 1.839-1.199 0.563-0.219 1.401-0.479 2.964-0.557 1.697-0.061 2.197-0.083 6.473-0.083zM16 7.787c-4.541 0-8.213 3.677-8.213 8.213 0 4.541 3.677 8.213 8.213 8.213 4.541 0 8.213-3.677 8.213-8.213 0-4.541-3.677-8.213-8.213-8.213zM16 21.333c-2.948 0-5.333-2.385-5.333-5.333s2.385-5.333 5.333-5.333c2.948 0 5.333 2.385 5.333 5.333s-2.385 5.333-5.333 5.333zM26.464 7.459c0 1.063-0.865 1.921-1.923 1.921-1.063 0-1.921-0.859-1.921-1.921 0-1.057 0.864-1.917 1.921-1.917s1.923 0.86 1.923 1.917z"></path>
                                        </svg>
                                        <span class="ml-2">Instagram</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-6 text-sm text-center text-white">© 2024 PharmaCare. All rights reserved.</div>
    </footer>
</body>
</html>