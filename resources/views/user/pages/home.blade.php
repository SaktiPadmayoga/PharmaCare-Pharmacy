<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pharmacare-Home-Page</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
        {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>
    
    
        <style>    
                body {
                    background-image: url('{{ asset('storage/BG.png') }}');
                    background-size: cover ;
                    background-position: center;
                    background-repeat: no-repeat;
                    
                    min-height: 100vh;
                }
                html {
                    scroll-behavior: smooth;
                }
    
                @keyframes right {
                    0% {
                        transform: translateX(calc(-240px * 5));
                    }
                    100% {
                        transform: translateX(0);
                    }
                }
                
                .animate-scroll-right {
                    animation: right 50s linear infinite;
                }
    
                .animate-scroll-right:hover {
                    animation-play-state: paused;
                }
    
                @keyframes scroll {
                    0% {
                        transform: translateX(0);
                    }
                    100% {
                        transform: translateX(calc(-240px * 5));
                    }
                }
                .animate-scroll {
                    animation: scroll 50s linear infinite;
                }
                
                .animate-scroll:hover {
                    animation-play-state: paused;
                }
    
                @keyframes fadeInUp {
                    from {
                        opacity: 0;
                        transform: translateY(0);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(30px);
                    }
                }
    
                .fade-in-up {
                    animation: fadeInUp 1s ease-out forwards;
                }
    
                /* Hide elements before animation */
                .animate-on-scroll {
                    opacity: 0;
                }
    
                /* Custom utility classes */
                .animate-delay-100 {
                    animation-delay: 100ms;
                }
    
                .animate-delay-200 {
                    animation-delay: 200ms;
                }
    
        </style>
    
    </head>
    @include('user.layouts.navbar')  

    <main class="">
        <div class="flex justify-center items-center mt-20">
            <div class="grid grid-cols-12 gap-4 max-w-7xl w-full h-96">
                <!-- First container: takes 4 columns -->
                <div class="col-span-4 bg-white bg-opacity-40 backdrop-blur-2xl p-6 rounded-lg shadow-xl h-96 animate-on-scroll">
                    <div class="text-center">
                        <p class=" inline-block py-px my-5 font-semibold tracking-wider uppercase rounded-full bg-teal-accent-400">
                            Selamat Datang di PharmaCare
                        </p>
                    </div>
                    <h2 class="text-center max-w-7xl mb-20 font-sans text-2xl leading-7 sm:text-4xl md:mx-auto font-semibold">
                        <span class="relative inline-block">
                            <span class="relative">Solusi Kesehatan Anda, Langsung di Ujung Jari. Dapatkan Obat dan Produk Kesehatan anda di PharmaCare.</span>
                        </span>
                    </h2>
                </div>
        
                <!-- Second container: takes 8 columns, Carousel -->
                <div class="col-span-8 bg-white bg-opacity-40 backdrop-blur-2xl p-6 rounded-lg shadow-xl h-96 animate-on-scroll animate-delay-100">
                    <div x-data="carousel" class="relative h-full w-full overflow-hidden rounded-lg">
                        <!-- Carousel container -->
                        <div class="relative h-full w-full">
                            <!-- Slides -->
                            <template x-for="(slide, index) in slides" :key="index">
                                <div x-show="currentSlide === index" 
                                     x-transition:enter="transition ease-out duration-300"
                                     x-transition:enter-start="opacity-0 transform translate-x-full"
                                     x-transition:enter-end="opacity-100 transform translate-x-0"
                                     x-transition:leave="transition ease-in duration-300"
                                     x-transition:leave-start="opacity-100 transform translate-x-0"
                                     x-transition:leave-end="opacity-0 transform -translate-x-full"
                                     class="absolute inset-0 w-full h-full">
                                    <img :src="slide.image" :alt="slide.title" class="object-cover w-full h-full rounded-lg">
                                </div>
                            </template>
        
                            <!-- Navigation buttons -->
                            <button @click="previousSlide" class="absolute left-2 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-30 hover:bg-opacity-50 rounded-full p-1.5 focus:outline-none">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                                </svg>
                            </button>
                            <button @click="nextSlide" class="absolute right-2 top-1/2 transform -translate-y-1/2 bg-white bg-opacity-30 hover:bg-opacity-50 rounded-full p-1.5 focus:outline-none">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </button>
        
                            <!-- Indicators -->
                            <div class="absolute bottom-2 left-1/2 transform -translate-x-1/2 flex space-x-1.5">
                                <template x-for="(slide, index) in slides" :key="index">
                                    <button @click="currentSlide = index" 
                                            :class="{'bg-white': currentSlide === index, 'bg-white/50': currentSlide !== index}"
                                            class="w-2 h-2 rounded-full transition-all duration-300 focus:outline-none">
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="  justify-center mx-auto grid grid-cols-2 items-center max-w-7xl gap-4 pb-5 mt-5 animate-on-scroll">
            <div class="grid col-span-1 bg-white bg-opacity-40 backdrop-blur-2xl p-6 rounded-lg shadow-xl ">
                <h3 class="text-xl mb-2 font-bold">Kenal kami lebih jauh</h3>
                <div class="w-full flex mx-auto items-center space-x-10">
                    <img src="img/company.png" alt="" class="w-14 h-14 ml-5">
                    <div class="flex flex-col ">
                        <p class=" font-semibold text-lg">Ragu? Yuk berkenalan dengan kami!</p>
                        <p class="">Temukan profil kami, FAQ, dan lainnya.</p>
                    </div>
                    <a href="{{ url('about') }}" class="h-10 px-2 bg-green-700 text-white text-sm rounded-md flex justify-center items-center">Tentang Kami</a>
                </div>
            </div>
            <div class="grid col-span-1 bg-white/40  backdrop-blur-2xl p-6 rounded-lg shadow-xl">
                <h3 class="text-xl mb-2 font-bold">Temukan Promo Menarik</h3>
                <div class="w-full flex mx-auto justify-center items-center space-x-10">
                    <img src="img/article.png" alt="" class="w-14 h-14">
                    <div class="flex flex-col">
                        <p class=" font-semibold text-lg">Temukan Promo Menarik dari Kami</p>
                        <p class="">Belanja dengan promo yang menguntungkan.</p>
                    </div>
                    <a href="{{ url('produk') }}" class="h-10 px-5 bg-gray-300 text-sm rounded-md flex justify-center items-center">Cari Tahu</a>
                </div>
            </div>
        </div>
        
        <div class="mb-5 bg-transparent">
            <div class="container mx-auto px-4 max-w-7xl bg-white bg-opacity-40 backdrop-blur-2xl p-6 rounded-lg shadow-xl grid grid-cols-12 gap-4 animate-on-scroll mb-5">
                <div class="col-span-7">
                    <div class="relative overflow-hidden px-5 py-4">
                        <div class="flex animate-scroll whitespace-nowrap">
                            
                            @forelse($medicine as $item)
                            {{-- <form action="{{route('detailObat')}}" method="GET" > --}}
                                <input type="text" value="{{$item->id}}" name="id_obat" hidden>
                                <button type="submit" class="rounded">
                                    <div class="flex-none w-52 h-auto pb-2 mx-3 rounded-md bg-white bg-opacity-65 justify-center transition-all duration-300 shadow-lg hover:-translate-y-2" 
                                    style="box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                                            transition: transform 0.2s, box-shadow 0.2s;"
                                    onmouseover="this.style.boxShadow='0 20px 25px -5px rgba(34, 197, 94, 0.5), 0 10px 10px -5px rgba(34, 197, 94, 0.1)'"
                                    onmouseout="this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)'">
                                        <img class="object-cover object-center w-full rounded-md h-auto p-3" src="{{asset( $item->image)}}" alt="{{ $item->image }}">
                                        <span class="flex ml-3 ">
                                            @foreach($item->categories as $category)
                                                <span class="bg-gray-100 text-green-800 text-xs font-semibold mr-1 px-1 py-0.5 rounded truncate">
                                                    {{ $category->name }}
                                                </span>
                                            @endforeach
                                            </span>
                                        <p class=" font-semibold tracking-wide justify-start truncate flex ml-3 mt-2">
                                            {{$item->name}}
                                            </p>
                                        
                                        <p class="text-green-600 text-lg font-extrabold text-start mb-3 flex ml-3">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                    </div>
                                </button>
                            {{-- </form> --}}
                            @empty
                            <div class="col-span-full text-center bg-red-100 text-red-600 py-4 rounded-lg">
                                Obat Tidak tersedia
                            </div>
                            @endforelse

                            @forelse($medicine as $item)
                            {{-- <form action="{{route('detailObat')}}" method="GET" > --}}
                                <input type="text" value="{{$item['id']}}" name="id_obat" hidden>
                                <button type="submit" class="rounded">
                                    <div class="flex-none w-52 h-auto pb-2 mx-3 rounded-md bg-white bg-opacity-65 justify-center transition-all duration-300 shadow-lg hover:-translate-y-2" 
                                    style="box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                                            transition: transform 0.2s, box-shadow 0.2s;"
                                    onmouseover="this.style.boxShadow='0 20px 25px -5px rgba(34, 197, 94, 0.5), 0 10px 10px -5px rgba(34, 197, 94, 0.1)'"
                                    onmouseout="this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)'">
                                        <img class="object-cover object-center w-full rounded-md h-auto p-3" src="{{asset( $item->image)}}" alt="{{ $item->image }}">
                                        <span class="flex ml-3">
                                            @foreach($item->categories as $category)
                                                <span class="bg-gray-100 text-green-800 text-xs font-semibold mr-1 px-1 py-0.5 rounded truncate">
                                                    {{ $category->name }}
                                                </span>
                                            @endforeach
                                            </span>
                                        <p class=" font-semibold tracking-wide justify-start truncate flex ml-3 mt-2">
                                            {{$item->name}}
                                            </p>
                                        
                                        <p class="text-green-600 text-lg font-extrabold text-start mb-3 flex ml-3">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                    </div>
                                </button>
                            {{-- </form> --}}
                            @empty
                            <div class="col-span-full text-center bg-red-100 text-red-600 py-4 rounded-lg">
                                Obat Tidak tersedia
                            </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="relative overflow-hidden px-5 py-4">
                        <div class="flex animate-scroll-right whitespace-nowrap">
                            @forelse($medicine as $item)
                            {{-- <form action="{{route('detailObat')}}" method="GET" > --}}
                                <input type="text" value="{{$item['id']}}" name="id_obat" hidden>
                                <button type="submit" class="rounded">
                                    <div class="flex-none w-52 h-auto pb-2 mx-3 rounded-md bg-white bg-opacity-65 justify-center transition-all duration-300 shadow-lg hover:-translate-y-2" 
                                    style="box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                                            transition: transform 0.2s, box-shadow 0.2s;"
                                    onmouseover="this.style.boxShadow='0 20px 25px -5px rgba(34, 197, 94, 0.5), 0 10px 10px -5px rgba(34, 197, 94, 0.1)'"
                                    onmouseout="this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)'">
                                        <img class="object-cover object-center w-full rounded-md h-auto p-3" src="{{asset( $item->image)}}" alt="{{ $item->image }}">
                                        <span class="flex ml-3">
                                            @foreach($item->categories as $category)
                                                <span class="bg-gray-100 text-green-800 text-xs font-semibold mr-1 px-1 py-0.5 rounded truncate">
                                                    {{ $category->name }}
                                                </span>
                                            @endforeach
                                            </span>
                                        <p class=" font-semibold tracking-wide justify-start truncate flex ml-3 mt-2">
                                            {{$item->name}}
                                            </p>
                                        
                                        <p class="text-green-600 text-lg font-extrabold text-start mb-3 flex ml-3">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                    </div>
                                </button>
                            {{-- </form> --}}
                            @empty
                            <div class="col-span-full text-center bg-red-100 text-red-600 py-4 rounded-lg">
                                Obat Tidak tersedia
                            </div>
                            @endforelse

                            @forelse($medicine as $item)
                            {{-- <form action="{{route('detailObat')}}" method="GET" > --}}
                                <input type="text" value="{{$item['id']}}" name="id_obat" hidden>
                                <button type="submit" class="rounded">
                                    <div class="flex-none w-52 h-auto pb-2 mx-3 rounded-md bg-white bg-opacity-65 justify-center transition-all duration-300 shadow-lg hover:-translate-y-2" 
                                    style="box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
                                            transition: transform 0.2s, box-shadow 0.2s;"
                                    onmouseover="this.style.boxShadow='0 20px 25px -5px rgba(34, 197, 94, 0.5), 0 10px 10px -5px rgba(34, 197, 94, 0.1)'"
                                    onmouseout="this.style.boxShadow='0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)'">
                                        <img class="object-cover object-center w-full rounded-md h-auto p-3" src="{{asset( $item->image)}}" alt="{{ $item->image }}">
                                        <span class="flex ml-3">
                                            @foreach($item->categories as $category)
                                                <span class="bg-gray-100 text-green-800 text-xs font-semibold mr-1 px-1 py-0.5 rounded truncate">
                                                    {{ $category->name }}
                                                </span>
                                            @endforeach
                                            </span>
                                        <p class=" font-semibold tracking-wide justify-start truncate flex ml-3 mt-2">
                                            {{$item->name}}
                                            </p>
                                        
                                        <p class="text-green-600 text-lg font-extrabold text-start mb-3 flex ml-3">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                    </div>
                                </button>
                            {{-- </form> --}}
                            @empty
                            <div class="col-span-full text-center bg-red-100 text-red-600 py-4 rounded-lg">
                                Obat Tidak tersedia
                            </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-span-5 flex flex-col justify-center items-center">
                    <h1 class=" mt-10 font-sans text-3xl font-bold text-center">Pilihan Terbaik untuk Kesehatan Anda - Obat Terlaris dari PharmaCare!</h1>
                    <div class="">
                        <img src="img/penjualan.png" alt="" class=" h-5/6">
                    </div>
                    <a href="{{ url('produk') }}" class="-mt-20 inline-flex items-center px-3 py-2 text-xl font-medium text-center bg-yellow-300 rounded-lg hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-300 ">
                        Temukan Produk Lainnya
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="flex justify-center items-center mb-5">
            <div class="grid grid-cols-12 gap-4 max-w-7xl w-full h-96 ">
                <!-- First container: takes 4 columns -->
                <div class="col-span-3 flex-col bg-white bg-opacity-40 backdrop-blur-2xl p-6 rounded-lg shadow-xl h-96 animate-on-scroll">
                    <div class="max-w-sm bg-green-800 border border-green-800 rounded-lg shadow ">
                        <a href="#">
                            <img class="rounded-t-lg" src="https://cdn1.katadata.co.id/media/images/thumb/2021/10/25/Sawi_putih-2021_10_25-15_41_11_9c1d0726d75669156a651dd6851d18b9_960x640_thumb.jpg" alt="" />
                        </a>
                        <div class="p-5">
                            <p class="mb-3 font-normal text-white">Ini manfaat rutin mengkonsumsi sawi putih untuk kesehatan</p>
                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 ">
                                Selengkapnya
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
        
                <div class="col-span-6 h-96">
                    <div class="flex flex-col gap-4">
                        <div class="bg-yellow-300 backdrop-blur-2xl p-6 rounded-lg shadow-xl h-28 flex flex-col justify-center items-center animate-on-scroll">
                            <h1 class="text-3xl font-bold">Temukan Artikel Kesehatan Kami </h1>
                            <p class="text-xs justify-center text-center">PharmaCare menyediakan beragam artikel kesehatan untuk menambah pengetahuan Anda!</p>
                        </div>
                        <div class="bg-white bg-opacity-40 backdrop-blur-2xl p-6 rounded-lg shadow-xl  h-64 animate-on-scroll">
                            <div class="relative w-full glide-04 ">
                                <!-- Slides -->
                                <div class="overflow-hidden w-full -mt-2" data-glide-el="track">
                                    <ul class="relative w-full h-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                                        <li><a href="#" class="flex flex-col items-center bg-green-800 border border-green-800 h-full rounded-lg shadow md:flex-row md:max-w-xl hover:bg-green-900">
                                            <img class="object-cover w-full rounded-t-lg h-full md:h-52 md:w-52 md:rounded-none md:rounded-l-lg" src="https://images.unsplash.com/photo-1637370988123-41bd9a6bcd48?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8cGxhdHRlcnxlbnwwfHwwfHx8Mg%3D%3D" alt="">
                                            <div class=" justify-between p-4 leading-normal">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Ketahui Kadar Kolesterol Normal berdasarkan Usia dan Jenis Kelamin</h5>
                                                <p class=" inline-flex items-center px-3 py-2 text-sm font-medium text-start text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 w-auto shrink-0">
                                                    Selengkapnya
                                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                                    </svg>
                                                </p>
                                            </div>
                                        </a></li>
                                        <li><a href="#" class="flex flex-col items-center bg-green-800 border border-green-800 h-full rounded-lg shadow md:flex-row md:max-w-xl hover:bg-green-900">
                                            <img class="object-cover w-full rounded-t-lg h-full md:h-full md:w-52 md:rounded-none md:rounded-l-lg" src="https://images.unsplash.com/photo-1549978113-29eb25c8177f?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cGVhbnV0fGVufDB8fDB8fHwy" alt="">
                                            <div class=" p-4 leading-normal text-start">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">11 Manfaat Kacang Tanah yang Jarang Diketahui</h5>
                                                <p class="inline-flex items-center px-3 py-2 text-sm font-medium text-start justify-start text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 shrink-0">
                                                    Selengkapnya
                                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                                    </svg>
                                                </p>
                                            </div>
                                        </a></li>
                                        <li><a href="#" class="flex flex-col items-center bg-green-800 border border-green-800 h-full rounded-lg shadow md:flex-row md:max-w-xl hover:bg-green-900">
                                            <img class="object-cover w-full rounded-t-lg h-full md:h-full md:w-52 md:rounded-none md:rounded-l-lg" src="https://images.unsplash.com/photo-1632053652571-a6a45052bbbd?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cHJlZ25hbnQlMjBkb2N0b3J8ZW58MHx8MHx8fDI%3D" alt="">
                                            <div class=" p-4 leading-normal text-start">
                                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-white">Ini Penanganan Gawat Janin untuk Mencegah Komplikasi Kehamilan</h5>
                                                <p class="inline-flex items-center px-3 py-2 text-sm font-medium text-start justify-start text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 shrink-0">
                                                    Selengkapnya
                                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                                    </svg>
                                                </p>
                                            </div>
                                        </a></li>
                                    </ul>
                                </div>
                                <!-- Controls -->
                                <div class="flex items-center justify-center w-full gap-1" data-glide-el="controls">
                                    <button class="inline-flex items-center justify-center w-8 h-8 transition duration-300 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir="<" aria-label="prev slide">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <title>prev slide</title>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                                        </svg>
                                    </button>
                                    <button class="inline-flex items-center justify-center w-8 h-8 transition duration-300  text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir=">" aria-label="next slide">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                            <title>next slide</title>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-span-3 bg-white bg-opacity-40 backdrop-blur-2xl p-6 rounded-lg shadow-xl h-96 animate-on-scroll">
                    <div class="max-w-sm bg-green-800 border border-green-800 rounded-lg shadow ">
                        <a href="#">
                            <img class="rounded-t-lg" src="https://images.unsplash.com/photo-1517130038641-a774d04afb3c?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjR8fGZpdG5lc3N8ZW58MHx8MHx8fDI%3D" alt="" />
                        </a>
                        <div class="p-5">
                            <p class="mb-3 font-normal text-white">13 Cara menurunkan berat badan dengan cepat dan alami</p>
                            <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 ">
                                Selengkapnya
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ml-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>                                                                                                 

        <div class="w-full max-w-7xl mx-auto mb-10 mt-14 px-6 md:px-0 animate-on-scroll" id="unggul">
            <h2 class=" md:text-3xl font-semibold w-full sm:text-center sm:mb-6 sm:text-2xl">Mengapa Memilih PharmaCare</h2> 
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Card 1 -->
                <div class="bg-white bg-opacity-40 backdrop-blur-2xl rounded-lg shadow-lg p-6 flex flex-col items-center">
                    <div class="bg-teal-100 rounded-full p-3 mb-4">
                        <img src="img/mengapa-1.png" alt="" class="h-44">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Aman & Terpercaya</h3>
                    <p class="text-gray-600 text-center">Seluruh obat yang kami jual telah melalui uji lab resmi dan terjamin layak dipasarkan.</p>
                </div>
                
                <!-- Card 2 -->
                <div class="bg-white bg-opacity-40 backdrop-blur-2xl rounded-lg shadow-lg p-6 flex flex-col items-center">
                    <div class="bg-teal-100 rounded-full p-3 mb-4">
                        <img src="img/mengapa-2.png" alt="" class="h-44">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Produk Lengkap</h3>
                    <p class="text-gray-600 text-center">Tersedia lebih dari 1000 jenis obat untuk memenuhi kebutuhan anda</p>
                </div>
                
                <!-- Card 3 -->
                <div class="bg-white bg-opacity-40 backdrop-blur-2xl rounded-lg shadow-lg p-6 flex flex-col items-center">
                    <div class="bg-teal-100 rounded-full p-3 mb-4">
                        <img src="img/mengapa-3.png" alt="" class="h-44">
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Kapan Saja & Dimana Saja</h3>
                    <p class="text-gray-600 text-center">Dapatkan obat anda kapan saja dan dimana saja</p>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 max-w-7xl bg-white bg-opacity-50 backdrop-blur-2xl p-6 rounded-lg shadow-xl grid grid-cols-12 gap-4 h-2/3 mb-20 animate-on-scroll">
            <div class="col-span-12">
                <div class="relative overflow-hidden w-full col-span-12">
                    <div class="flex justify-center items-center mb-4">
                        <h1 class="text-3xl font-bold">Dipercaya oleh Perusahaan Farmasi Terkemuka </h1>
                    </div>
                    <div class="flex animate-scroll-right whitespace-nowrap">
                        <!-- Set 1 -->
                        <div class="flex-none mx-8 w-40 h-24 flex items-center justify-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaVt5ZiE2XwIaz8vQz1jbYPMH-V0_XRMX3iQ&s" alt="Kalbe Farma" class="object-contain h-full">
                        </div>
                        <div class="flex-none mx-8 w-40 h-24 flex items-center justify-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTywz28oxH6tyr89JssStPv1swsjC8XgpKprg&s" alt="Kimia Farma" class="object-contain h-full">
                        </div>
                        <div class="flex-none mx-8 w-40 h-24 flex items-center justify-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNJBDapYu5kWHeFgx7I_7JKTfDp3QVeuz_Rg&s" alt="Sanbe Farma" class="object-contain h-full">
                        </div>
                        <div class="flex-none mx-8 w-40 h-24 flex items-center justify-center">
                            <img src="https://www.dexagroup.com/wp-content/uploads/2022/04/dexagroup-2022-logo-dexa-medica-hires-768x288.png" alt="Dexa Medica" class="object-contain h-full">
                        </div>
                        <div class="flex-none mx-8 w-40 h-24 flex items-center justify-center">
                            <img src="https://upload.wikimedia.org/wikipedia/id/thumb/2/29/Logo_Bio_Farma.svg/640px-Logo_Bio_Farma.svg.png" alt="Biofarma" class="object-contain h-full">
                        </div>
            
                        <!-- Set 2 (Duplicate for infinite scroll) -->
                        <div class="flex-none mx-8 w-40 h-24 flex items-center justify-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaVt5ZiE2XwIaz8vQz1jbYPMH-V0_XRMX3iQ&s" alt="Kalbe Farma" class="object-contain h-full">
                        </div>
                        <div class="flex-none mx-8 w-40 h-24 flex items-center justify-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTywz28oxH6tyr89JssStPv1swsjC8XgpKprg&s" alt="Kimia Farma" class="object-contain h-full">
                        </div>
                        <div class="flex-none mx-8 w-40 h-24 flex items-center justify-center">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSNJBDapYu5kWHeFgx7I_7JKTfDp3QVeuz_Rg&s" alt="Sanbe Farma" class="object-contain h-full">
                        </div>
                        <div class="flex-none mx-8 w-40 h-24 flex items-center justify-center">
                            <img src="https://www.dexagroup.com/wp-content/uploads/2022/04/dexagroup-2022-logo-dexa-medica-hires-768x288.png" alt="Dexa Medica" class="object-contain h-full">
                        </div>
                        <div class="flex-none mx-8 w-40 h-24 flex items-center justify-center">
                            <img src="https://upload.wikimedia.org/wikipedia/id/thumb/2/29/Logo_Bio_Farma.svg/640px-Logo_Bio_Farma.svg.png" alt="Biofarma" class="object-contain h-full">
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        @include('user.layouts.footer')      
    </main>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('carousel', () => ({
                currentSlide: 0,
                slides: [
                    {
                        image: '{{ asset('img/banner-1.png') }}',
                        title: 'Slide 1'
                    },
                    {
                        image: '{{ asset('img/banner-2.png') }}',
                        title: 'Slide 2'
                    },
                    {
                        image: '{{ asset('img/banner-3.png') }}',
                        title: 'Slide 3'
                    }
                ],
                nextSlide() {
                    this.currentSlide = (this.currentSlide + 1) % this.slides.length;
                },
                previousSlide() {
                    this.currentSlide = (this.currentSlide - 1 + this.slides.length) % this.slides.length;
                },
                init() {
                    setInterval(() => this.nextSlide(), 5000);
                }
            }));
        });

        var glide04 = new Glide('.glide-04', {
        type: 'slider',
        focusAt: 'center',
        perView: 1,
        autoplay: 3500,
        animationDuration: 700,
        gap: 0,
        classes: {
            activeNav: '[&>*]:bg-slate-700',
        },

        });
        glide04.mount();

        document.addEventListener('DOMContentLoaded', function() {
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.1
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('fade-in-up');
                        observer.unobserve(entry.target);
                    }
                });
            }, observerOptions);

            // Observe all elements with animate-on-scroll class
            document.querySelectorAll('.animate-on-scroll').forEach((element) => {
                observer.observe(element);
            });
        });

    </script>
</html>