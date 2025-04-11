@extends('admin.layouts.navAdmin')

@section('content')

<div class="ml-64 max-h-screen overflow-auto">
    <div class="p-5">
        <div class="max-w-full mx-auto">
            <div class="bg-white/95 rounded-3xl p-8 mb-5 shadow-xl">
                <div class="flex justify-between">
                    <h1 class="text-4xl font-bold mb-3">Staffs</h1>
                    <button onclick="toggleModal('modal-tambah-staf')">
                        <div class="py-2 px-3 hover:bg-green-600 bg-green-500 text-white rounded-md text-lg font-semibold">+ Tambah Staf</div>
                    </button>
                </div>
                
                <div class="col-span-12 pt-5">
                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                        <div class=" rounded-lg">
                            <div class="mt-4">
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto">
                                        <div class="py-2 align-middle inline-block min-w-full">
                                            <div class=" overflow-hidden sm:rounded-lg bg-white">
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
                                                                    <span class="mr-2">NAME</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">EMAIL</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">PHONE</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">ROLE</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">action</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200">
                                                            @foreach ($stafs as $key => $staf)
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $key + 1 }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $staf->name }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $staf->email }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $staf->phone }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $staf->role->name }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                                    <div class="flex space-x-4">
                                                                        <a href="javascript:void(0)" onclick="setUpdateForm('{{ route('users.update', $staf->id) }}', '{{ $staf->name }}', '{{ $staf->phone }}')" class="text-blue-500 hover:text-blue-600">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                            </svg>
                                                                            <p>Edit</p>
                                                                        </a>
                                                                        <form action="{{ route('users.destroy', $staf->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button type="submit" class="text-red-500 hover:text-red-600">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1 ml-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                                                </svg>
                                                                                <p>Delete</p>
                                                                            </button>
                                                                        </form>
                                                                    </div>
                                                                </td>
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
    <!-- Modal Tambah Staf -->
<div id="modal-tambah-staf" class="fixed inset-0 bg-gray-800 bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-lg w-1/3">
            <div class="px-6 py-4 flex justify-between items-center border-b">
                <h2 class="text-xl font-semibold">Tambah Staf</h2>
                <button class="text-gray-600 hover:text-gray-800" onclick="toggleModal('modal-tambah-staf')">&times;</button>
            </div>
            <form action="{{ route('users.store') }}" method="POST" class="px-6 py-4">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                    <input type="email" id="email" name="email" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-semibold mb-2">Password</label>
                    <input type="password" id="password" name="password" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 text-sm font-semibold mb-2">Phone</label>
                    <input type="number" id="phone" name="phone" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div class="mb-4">
                    <label for="role" class="block text-gray-700 text-sm font-semibold mb-2">Role</label>
                    <select id="role" name="role_id" required 
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                        <option value="" disabled selected>Pilih Role</option>
                        <option value="1">Admin</option>
                        <option value="2">Owner</option>
                        <option value="4">Customer Service</option>
                        <option value="5">Gudang</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-md hover:bg-gray-600" onclick="toggleModal('modal-tambah-staf')">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update Staf -->
<div id="modal-update-staf" class="fixed inset-0 bg-gray-800 bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-lg w-1/3">
            <div class="px-6 py-4 flex justify-between items-center border-b">
                <h2 class="text-xl font-semibold">Update Staf</h2>
                <button class="text-gray-600 hover:text-gray-800" onclick="toggleModal('modal-update-staf')">&times;</button>
            </div>
            <form id="update-staf-form" method="POST" class="px-6 py-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="update-name" class="block text-gray-700 text-sm font-semibold mb-2">Nama</label>
                    <input type="text" id="update-name" name="name" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div class="mb-4">
                    <label for="update-phone" class="block text-gray-700 text-sm font-semibold mb-2">Phone</label>
                    <input type="number" id="update-phone" name="phone" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-blue-300">
                </div>
                <div class="flex justify-end">
                    <button type="button" class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-md hover:bg-gray-600" onclick="toggleModal('modal-update-staf')">Batal</button>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function toggleModal(modalId) {
    const modal = document.getElementById(modalId);
    if (modal.classList.contains('hidden')) {
        modal.classList.remove('hidden');
    } else {
        modal.classList.add('hidden');
    }
}

function setUpdateForm(updateUrl, name, phone) {
    // Set form action URL
    document.getElementById('update-staf-form').action = updateUrl;
    
    // Set form field values
    document.getElementById('update-name').value = name;
    document.getElementById('update-phone').value = phone;
    
    // Show the modal
    toggleModal('modal-update-staf');
}
</script>

@endsection