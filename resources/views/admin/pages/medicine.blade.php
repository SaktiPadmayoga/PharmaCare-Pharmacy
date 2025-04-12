@extends('admin.layouts.navAdmin')

@section('content')

<div class="ml-64 max-h-screen overflow-auto">
    <div class="px-5 pt-5 pb-7">
        <div class=" max-w-full mx-auto">
            <div class="bg-white/95 rounded-3xl p-8 shadow-xl">
                
                <div class="flex justify-between">
                    <h1 class="text-4xl font-bold mb-3">Manage Medicines</h1>
                    <button onclick="toggleModal('modal-add-medicine')" class="py-2 px-3 hover:bg-green-600 bg-green-500 text-white rounded-md text-lg font-semibold">
                        + Add Medicine
                    </button>
                </div>
                
                <div class="col-span-12 pt-4">
                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                        <div class="mt-8 rounded-lg">
                            <div class="">
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto">
                                        <div class="align-middle inline-block min-w-full">
                                            <div class=" overflow-hidden sm:rounded-lg bg-white">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <thead>
                                                        <tr>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">NO.</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-5 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">Medicine Name</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">Description</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">Category</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">Price/pcs</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">Stock</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">Image</span>
                                                                </div>
                                                            </th>
                                                            <th class="px-6 py-3 bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                                <div class="flex cursor-pointer">
                                                                    <span class="mr-2">Action</span>
                                                                </div>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200">
                                                        @foreach ($medicines as $key => $medicine)
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">{{ ($medicines->currentPage() - 1) * $medicines->perPage() + $key + 1 }}</td>
                                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">{{ $medicine->name }}</td>
                                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 ">{{ $medicine->description }}</td>
                                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">
                                                                    @foreach($medicine->categories as $category)
                                                                    <span class="bg-green-100 text-green-800 text-xs font-semibold mr-1 px-2.5 py-0.5 rounded">
                                                                        {{ $category->name }}
                                                                    </span>
                                                                @endforeach</td>
                                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">Rp {{ number_format($medicine->price , 0, ',', '.') }}</td>
                                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5">{{ $medicine->stock }}</td>
                                                                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 relative">
                                                                    <div class="group inline-block">
                                                                        <!-- Gambar Kecil -->
                                                                        <img src="{{ asset( $medicine->image) }}" alt="{{ $medicine->image }}" class=" h-16">
                                                                    </div>
                                                                </td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                                    <div class="flex space-x-4">
                                                                        <a href="javascript:void(0)" onclick="setUpdateForm('{{ route('medicine.update', $medicine['id']) }}', '{{ $medicine['name'] }}', '{{ $medicine['description'] }}', '{{ $medicine['price'] }}','{{ $medicine['image'] }}')" class="text-blue-500 hover:text-blue-600">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                            </svg>
                                                                            <p>Edit</p>
                                                                        </a>
                                                                        <form action="{{ route('medicine.destroy', $medicine['id']) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
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
                
                <!-- Pagination -->
                <div class="mt-6">
                    {{ $medicines->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Add Medicine -->
<div id="modal-add-medicine" class="fixed inset-0 bg-gray-800 bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-lg w-1/3">
            <div class="px-6 py-4 flex justify-between items-center border-b">
                <h2 class="text-xl font-semibold">Add Medicine</h2>
                <button class="text-gray-600 hover:text-gray-800" onclick="toggleModal('modal-add-medicine')">&times;</button>
            </div>
            <form action="{{ route('medicine.store') }}" method="POST" enctype="multipart/form-data" class="px-6 py-4">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-semibold mb-2">Medicine Name</label>
                    <input type="text" id="name" name="name" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-semibold mb-2">Description</label>
                    <textarea id="description" name="description" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300"></textarea>
                </div>
                <div class="mb-4">
                    <label for="category" class="block text-gray-700 text-sm font-semibold mb-2">Category</label>
                    <select id="category" name="categories[]" multiple required
                        class="category-select w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-gray-700 text-sm font-semibold mb-2">Price/pcs</label>
                    <input type="number" id="price" name="price" step="0.01" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-gray-700 text-sm font-semibold mb-2">Image</label>
                    <input type="file" id="image" name="image" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div class="flex justify-end">
                    <button type="button" class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-md hover:bg-gray-600" onclick="toggleModal('modal-add-medicine')">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Update Medicine -->
<div id="modal-update-medicine" class="fixed inset-0 bg-gray-800 bg-opacity-50 z-50 hidden">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white rounded-lg shadow-lg w-1/3">
            <div class="px-6 py-4 flex justify-between items-center border-b">
                <h2 class="text-xl font-semibold">Update Medicine</h2>
                <button class="text-gray-600 hover:text-gray-800" onclick="toggleModal('modal-update-medicine')">&times;</button>
            </div>
            <form id="update-medicine-form" method="POST" enctype="multipart/form-data" class="px-6 py-4">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="update-name" class="block text-gray-700 text-sm font-semibold mb-2">Medicine Name</label>
                    <input type="text" id="update-name" name="name" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div class="mb-4">
                    <label for="update-description" class="block text-gray-700 text-sm font-semibold mb-2">Description</label>
                    <textarea id="update-description" name="description" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300"></textarea>
                </div>
                <div class="mb-4">
                    <label for="update-price" class="block text-gray-700 text-sm font-semibold mb-2">Price/pcs</label>
                    <input type="number" id="update-price" name="price" step="0.01" required
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                </div>
                <div class="mb-4">
                    <label for="update-image" class="block text-gray-700 text-sm font-semibold mb-2">Image</label>
                    <div class="mb-2">
                        <img id="current-image-preview" src="" alt="Current Medicine Image" class="h-16">
                        <p class="text-xs text-gray-500 mt-1">Current image</p>
                    </div>
                    <input type="file" id="update-image" name="image"
                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                    <p class="text-xs text-gray-500 mt-1">Leave empty to keep current image</p>
                </div>
                <div class="flex justify-end">
                    <button type="button" class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-md hover:bg-gray-600" onclick="toggleModal('modal-update-medicine')">Cancel</button>
                    <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Update</button>
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

function setUpdateForm(updateUrl, name, description, price, image) {
    // Set form action URL
    document.getElementById('update-medicine-form').action = updateUrl;
    
    // Set form field values
    document.getElementById('update-name').value = name;
    document.getElementById('update-description').value = description;
    document.getElementById('update-price').value = price;
    
    const imageUrl = "{{ asset('storage/') }}" + "/" + image;
    document.getElementById('current-image-preview').src = imageUrl;
    
    toggleModal('modal-update-medicine');

}

document.querySelectorAll(".category-select").forEach((el) => {
    new TomSelect(el, {
        plugins: ['remove_button'],
        persist: false,
        create: false,
        maxItems: null,
        placeholder: "Pilih kategori",
    });
});
</script>
    
@endsection
