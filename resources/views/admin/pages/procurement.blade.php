@extends('admin.layouts.navAdmin')
@section('content')
<div class=" ml-64 max-h-screen overflow-auto">
    <div class="p-5">
        <div class="max-w-full mx-auto">
            <div class="bg-white/95 rounded-3xl p-8 mb-5 shadow-xl">
                <div class="flex justify-between">
                    <h1 class="text-4xl font-bold mb-3">Manage Procurements</h1>
                    <button onclick="toggleModal('modal-tambah-procurement')">
                        <div class="py-2 px-3 hover:bg-green-600 bg-green-500 text-white rounded-md text-lg font-semibold">+ Add Procurement</div>
                    </button>
                </div>              
                <div class="col-span-12 pt-5">
                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-1">
                        <div class=" rounded-lg">
                            <div class="mt-4">
                                <div class="flex flex-col">
                                    <div class="-my-2 overflow-x-auto">
                                        <div class="py-2 align-middle inline-block min-w-full">
                                            <div class=" overflow-hidden  sm:rounded-lg bg-white">
                                                <table class="min-w-full divide-y divide-gray-200">
                                                    <thead class=" bg-green-500 text-xs leading-4 font-medium text-white uppercase tracking-wider">
                                                        <tr>
                                                            <th class="px-6 py-3">NO.</th>
                                                            <th>Supplier</th>
                                                            <th>Date</th>
                                                            <th>Medicine</th>
                                                            <th>Total Items</th>
                                                            <th>Total Price</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="bg-white divide-y divide-gray-200">
                                                        @foreach ($procurements as $key => $procurement)
                                                            <tr>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $key + 1 }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $procurement->supplier->name }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $procurement->date }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                                    {{ $procurement->procurement_details->map(fn($detail) => "{$detail->medicine->name} ({$detail->quantity} pcs)")->join(', ') }}
                                                                </td>
                                                                
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $procurement->procurement_details->count() }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">Rp {{ number_format($procurement->procurement_details->sum(function($detail) { return $detail->price * $detail->quantity; }), 0, ',', '.') }}</td>
                                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                                                    <div class="flex space-x-4">
                                                                        <form action="{{ route('procurement.destroy', $procurement->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
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

    <!-- Modal Tambah Procurement -->
    <div id="modal-tambah-procurement" class="fixed inset-0 bg-gray-800 bg-opacity-50 z-50 hidden">
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white rounded-lg shadow-lg w-2/3">
                <div class="px-6 py-4 flex justify-between items-center border-b">
                    <h2 class="text-xl font-semibold">Tambah Procurement</h2>
                    <button class="text-gray-600 hover:text-gray-800" onclick="toggleModal('modal-tambah-procurement')">&times;</button>
                </div>
                <form action="{{ route('procurement.store') }}" method="POST" class="px-6 py-4">
                    @csrf
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label for="supplier_id" class="block text-gray-700 text-sm font-semibold mb-2">Supplier</label>
                            <select id="supplier_id" name="supplier_id" required
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                                <option value="">Select Supplier</option>
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="date" class="block text-gray-700 text-sm font-semibold mb-2">Date</label>
                            <input type="date" id="date" name="date" required
                                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                        </div>
                    </div>

                    <div class="mb-4">
                        <h3 class="text-lg font-semibold mb-2">Procurement Details</h3>
                        <div id="details-container">
                            <div class="detail-row grid grid-cols-3 gap-4 mb-2">
                                <div>
                                    <select name="details[0][medicine_id]" required
                                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                                        <option value="">Select Medicine</option>
                                        @foreach($medicines as $medicine)
                                            <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <input type="number" name="details[0][quantity]" placeholder="Quantity" required min="1"
                                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                                </div>
                                <div class="flex">
                                    <input type="number" name="details[0][price]" placeholder="Price per unit" required min="1"
                                        class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                                    <button type="button" class="ml-2 px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="removeDetail(this)">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600" onclick="addDetail()">
                            + Add Medicine
                        </button>
                    </div>

                    <div class="flex justify-end">
                        <button type="button" class="px-4 py-2 mr-2 bg-gray-500 text-white rounded-md hover:bg-gray-600" onclick="toggleModal('modal-tambah-procurement')">Batal</button>
                        <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">Simpan</button>
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

let detailCount = 1;

function addDetail() {
    const container = document.getElementById('details-container');
    const newRow = document.createElement('div');
    newRow.className = 'detail-row grid grid-cols-3 gap-4 mb-2';
    
    newRow.innerHTML = `
        <div>
            <select name="details[${detailCount}][medicine_id]" required
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
                <option value="">Select Medicine</option>
                @foreach($medicines as $medicine)
                    <option value="{{ $medicine->id }}">{{ $medicine->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="number" name="details[${detailCount}][quantity]" placeholder="Quantity" required min="1"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
        </div>
        <div class="flex">
            <input type="number" name="details[${detailCount}][price]" placeholder="Price per unit" required min="1"
                class="w-full px-3 py-2 border rounded-md focus:outline-none focus:ring focus:ring-green-300">
            <button type="button" class="ml-2 px-3 py-2 bg-red-500 text-white rounded-md hover:bg-red-600" onclick="removeDetail(this)">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>
    `;
    
    container.appendChild(newRow);
    detailCount++;
}

function removeDetail(button) {
    const row = button.closest('.detail-row');
    if (document.querySelectorAll('.detail-row').length > 1) {
        row.remove();
    } else {
        alert('At least one medicine item is required');
    }
}
</script>

@endsection