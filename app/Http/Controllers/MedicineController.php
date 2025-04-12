<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MedicineController extends Controller
{
    public function index()
    {
        $medicines = Medicine::with('categories')->paginate(5);
        $categories = Category::all(); 

        return view('admin.pages.medicine', compact('medicines','categories'));
    }

    public function search(Request $request)
    {
        $query = Medicine::with('categories');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }

        $medicines = $query->paginate(10)->appends(['search' => $request->search]);
        $categories = Category::all();

        // Cek apakah request berasal dari admin atau user biasa
        if ($request->has('admin')) {
            return view('admin.pages.medicine', compact('medicines', 'categories'));
        } else {
            return view('user.pages.catalogue', compact('medicines', 'categories'));
        }
    }


    public function store(Request $request)
{
    $request->validate([
        'name'        => 'required|string|max:255',
        'description' => 'required|string',
        'price'       => 'required|numeric',
        'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'categories'  => 'required|array',
        'categories.*' => 'exists:categories,id',
    ]);

    if ($request->hasFile('image')) {
        $originalName = 'medicines/' . $request->file('image')->getClientOriginalName();
        $imagePath = 'storage/' . $request->file('image')->store('medicines', 'public');
    } else {
        $imagePath = null;
    }

    $medicine = Medicine::create([
        'name'        => $request->name,
        'description' => $request->description,
        'price'       => $request->price,
        'image'       => $imagePath,
    ]);

    $medicine->categories()->attach($request->categories);

        $medicine->categories()->sync($request->categories);
        return redirect()->back()->with('success', 'Obat berhasil ditambahkan.');

    }

    public function show(Request $request)
    {
        $id = $request->id_medicine;
        $medicines = Medicine::with('categories')->findOrFail($id);
        return view('user.pages.medicine-view', compact('medicines'));
    }

    public function update(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'price'       => 'required|numeric',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $originalName = 'medicines/' . $request->file('image')->getClientOriginalName();
            $imagePath = 'storage/' . $request->file('image')->store('medicines', 'public');
        } else {
            $imagePath = null;
        }

        $medicine->update([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'image'       => $imagePath,
        ]);

        return redirect()->back()->with('success', 'Obat berhasil diperbarui.');
    }

    public function destroy($id)
{
    $medicine = Medicine::findOrFail($id);
    
    // Hapus gambar jika ada
    if ($medicine->image) {
        Storage::disk('public')->delete($medicine->image);
    }
    
    $medicine->categories()->detach();
    $medicine->delete();

    return redirect()->back()->with('success', 'Obat berhasil dihapus.');
}
}
