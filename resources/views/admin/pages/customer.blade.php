@extends('admin.layouts.navAdmin')

@section('content')

<div class="ml-64 max-h-screen overflow-auto">
    <div class="p-5">
        <div class="max-w-full mx-auto">
            <div class="bg-white/95 rounded-3xl p-8 mb-5 shadow-xl">
                <h1 class="text-4xl font-bold">Customers</h1>
                
                <div class="col-span-12 pt-5">
                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                        <div class=" rounded-lg">
                            <div class="mt-4">
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto">
                                        <div class="py-2 align-middle inline-block min-w-full">
                                            <div class=" overflow-hidden  sm:rounded-lg bg-white">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <thead>
                                                        <tr>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">NO.</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">Name</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">email</span>
                                                                </div>
                                                            </th>
                                                        
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">Phone</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200">
                                                        
                                                        @foreach ($customers as $key => $customer)
                                                        <tr>
                                                            <td class="px-6 py-4 whitespace-no-wrap">{{ $key + 1 }}</td>
                                                            <td class="px-6 py-4 whitespace-no-wrap">{{ $customer->name }}</td>
                                                            <td class="px-6 py-4 whitespace-no-wrap">{{ $customer->email }}</td>
                                                            <td class="px-6 py-4 whitespace-no-wrap">{{ $customer->phone }}</td>
                                                        </tr>
                                                        @endforeach                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
            </div>
        </div>
    </div>

@endsection
