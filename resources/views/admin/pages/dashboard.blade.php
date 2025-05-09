@extends('admin.layouts.navAdmin')

@section('content')

<div class="ml-64 max-h-screen overflow-auto mt-5">
        <div class="px-5 pb-5">
            <div class="max-w-6xl mx-auto">
                <div class="bg-white rounded-3xl p-8 mb-5 shadow-xl bg-opacity-60">
                <h1 class="text-4xl font-bold mb-3">Dashboard</h1>
                <section class="py-6 overflow-hidden">
                    <div class="container flex flex-col justify-center px-4 mx-auto">
                        <div class="grid grid-cols-12 gap-6">
                            <a class="  hover:scale-105 transition duration-300 shadow-lg rounded-lg sm:col-span-6 xl:col-span-3 md:col-span-4  intro-y bg-white"
                                href="#">
                                <div class="p-5">
                                    <div class="flex justify-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-blue-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                        </svg>
                                    </div>
                                    <div class="ml-2 w-full flex-1">
                                        <div>
                                            <div class="mt-3 text-3xl font-bold leading-8">4.510</div>
    
                                            <div class="mt-1 text-base text-gray-600">Produk Terjual</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a class="  hover:scale-105 transition duration-300 shadow-lg rounded-lg  sm:col-span-6 xl:col-span-3 md:col-span-4 intro-y bg-white"
                                href="#">
                                <div class="p-5">
                                    <div class="flex justify-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-yellow-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                        </svg>
                                        
                                    </div>
                                    <div class="ml-2 w-full flex-1">
                                        <div>
                                            <div class="mt-3 text-3xl font-bold leading-8">4.510</div>
    
                                            <div class="mt-1 text-base text-gray-600">Pengguna</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a class="  hover:scale-105 transition duration-300 shadow-lg rounded-lg  sm:col-span-6 xl:col-span-3 md:col-span-4  intro-y bg-white"
                                href="#">
                                <div class="p-5">
                                    <div class="flex justify-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-pink-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z" />
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z" />
                                        </svg>
                                        
                                    </div>
                                    <div class="ml-2 w-full flex-1">
                                        <div>
                                            <div class="mt-3 text-3xl font-bold leading-8">4.510</div>
    
                                            <div class="mt-1 text-base text-gray-600">Total Produk</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a class="  hover:scale-105 transition duration-300 shadow-lg rounded-lg  sm:col-span-6 xl:col-span-3 md:col-span-4  intro-y bg-white"
                                href="#">
                                <div class="p-5">
                                    <div class="flex justify-between">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-green-400"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" />
                                        </svg>
                                        
                                    </div>
                                    <div class="ml-2 w-full flex-1">
                                        <div>
                                            <div class="mt-3 text-3xl font-bold leading-8">12.500.000</div>
    
                                            <div class="mt-1 text-base text-gray-600">Total Penjualan</div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </section>
                
    
                <hr class="my-10">
                
                
                </div>
            </div>
        </div>
</div>


@endsection