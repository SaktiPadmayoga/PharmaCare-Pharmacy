<?php

namespace App\Http\Controllers;

use App\Models\Procurement;
use App\Models\Procurement_Detail;
use App\Models\Medicine;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProcurementController extends Controller
{
    public function index()
    {
        $Procurement = Procurement::with('supplier', 'procurement_details.medicine')->get();
        $suppliers = Supplier::all();
        $medicines = Medicine::all();
        return view('admin.pages.procurement', compact('Procurement','suppliers', 'medicines'));
    }

    public function store(Request $request)
    {   
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'date' => 'required|date',
            'details' => 'required|array',
            'details.*.medicine_id' => 'required|exists:medicines,id',
            'details.*.quantity' => 'required|integer|min:1',
            'details.*.price' => 'required|numeric|min:1',
        ]);

        // Buat pengadaan baru
        $procurement = Procurement::create([
            'supplier_id' => $request->supplier_id,
            'date' => $request->date,
        ]);

        // Tambahkan detail pengadaan dan update stok obat
        foreach ($request->details as $detail) {
            Procurement_Detail::create([
                'procurement_id' => $procurement->id,
                'medicine_id' => $detail['medicine_id'],
                'quantity' => $detail['quantity'],
                'price' => $detail['price'],
            ]);

            // Update stok obat
            $medicine = Medicine::findOrFail($detail['medicine_id']);
            $medicine->increment('stock', $detail['quantity']);
        }
        return redirect()->back()->with('success', 'Pengadaan berhasil dibuat dan stok diperbarui.');
    }

    public function show($id)
    {
        $procurement = Procurement::with('supplier', 'procurement_details.medicine')->findOrFail($id);
        return view('Procurement.show', compact('procurement'));
    }

    public function update(Request $request, $id)
    {
        $procurement = Procurement::findOrFail($id);

        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'date' => 'required|date',
            'details' => 'required|array',
            'details.*.medicine_id' => 'required|exists:medicines,id',
            'details.*.quantity' => 'required|integer|min:1',
            'details.*.price' => 'required|numeric|min:1',
        ]);

        // Update pengadaan
        $procurement->update([
            'supplier_id' => $request->supplier_id,
            'date' => $request->date,
        ]);

        // Hapus detail lama
        $procurement->procurement_details()->delete();

        // Simpan detail baru
        foreach ($request->details as $detail) {
            Procurement_Detail::create([
                'procurement_id' => $procurement->id,
                'medicine_id' => $detail['medicine_id'],
                'quantity' => $detail['quantity'],
                'price' => $detail['price'],
            ]);
        }

        return redirect()->back()->with('success', 'Pengadaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $procurement = Procurement::findOrFail($id);

        // Kembalikan stok sebelum menghapus pengadaan
        foreach ($procurement->procurement_details as $detail) {
            $medicine = Medicine::findOrFail($detail->medicine_id);
            $medicine->decrement('stock', $detail->quantity);
        }

        // Hapus pengadaan dan detailnya
        $procurement->procurement_details()->delete();
        $procurement->delete();

        return redirect()->back()->with('success', 'Pengadaan dihapus dan stok diperbarui.');
    }

}
