<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pharmacare - Produk Page</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

        <style>    
            body {
                background-image: url('{{ asset('storage/BG.png') }}');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                min-height: 100vh;
            }
            
            html {
                scroll-behavior: smooth;
            }
        </style>
    </head>
    @include('user.layouts.navbar') 
    <body>
        <div class="mt-28 flex flex-col justify-center items-center mb-20">
            <div class="max-w-7xl bg-white bg-opacity-40 backdrop-blur-2xl p-3 rounded-lg shadow-xl h-80">
                <div x-data="carousel" class="relative h-full w-auto overflow-hidden rounded-lg">
                    <!-- Carousel container -->
                    <img src="{{ asset("img/banner-2.png") }}" alt="">
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-5 lg:max-w-7xl mt-5">
                <!-- Sidebar -->
                <div class="col-span-2">
                    <div class="">
                        <div class="bg-green-600 text-white font-semibold py-2 px-4 rounded w-full text-center flex justify-center items-center">
                            Categories
                        </div>
                        
                        <ul class="bg-white shadow-md rounded mt-2">
                            <li>
                                <a href="{{ route('catalogue') }}" class="px-4 py-2 hover:bg-green-100 text-black inline-block w-full">
                                    Show All
                                </a>
                            </li>
                            @foreach($categories as $category)
                                <li class="block px-4 py-2 hover:bg-green-100 active:bg-green-300 ">
                                    <form action="{{ route('catalogue.filter') }}" method="GET">
                                        <input type="hidden" name="category" value="{{ $category->id }}">
                                        <button type="submit" class="w-full text-left">
                                            {{ $category->name }}
                                        </button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                        
                    </div>
                </div>
        
                <!-- Main Content -->
                <div class="col-span-10">

                    <form action="{{ route('medicines.search') }}" method="GET" class="mb-4 flex">
                        <input type="text" name="search" placeholder="Search medicine..." 
                                value="{{ request('search') }}" 
                                class="w-full p-2 border rounded-lg focus:ring focus:ring-blue-300">
                        <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded-lg ml-1">Search</button>
                    </form>
                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2">
                        
                        @forelse($medicines as $item)
                        
                        <form action="{{route('medicine.show')}}" method="GET" class="">
                            <input type="text" value="{{$item->id}}" name="id_medicine" hidden>
                            <button type="submit" class="rounded">
                                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md bg-opacity-65 transition-transform transform hover:-translate-y-2 hover:shadow-lg h-fit-content">
                                    <img class="object-cover object-center w-full rounded-md h-auto p-3" src="{{asset( $item->image)}}" alt="{{ $item->image }}">
                                    <span class="flex ml-3">
                                        @foreach($item->categories as $category)
                                            <span class="bg-gray-100 text-green-800 text-xs font-semibold mr-1 px-1 py-0.5 rounded truncate">
                                                {{ $category->name }}
                                            </span>
                                        @endforeach
                                    </span>
                                    <p class=" font-semibold tracking-wide justify-start truncate flex ml-3">
                                        {{$item->name}}
                                        </p>
                                    
                                    <p class="text-green-600 text-lg font-extrabold text-start mb-3 flex ml-3">Rp{{ number_format($item->price, 0, ',', '.') }}</p>
                                    
                                </div>
                            </button>
                        </form>
                        @empty
                        <div class="col-span-full text-center bg-red-100 text-red-600 py-4 rounded-lg">
                            Obat Tidak tersedia
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        @include('user.layouts.footer') 
    </body>
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
    </script>

</html>