<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.pages.index', compact('users'));
    }

    public function showProfile()
    {
        return view('user.pages.profile');
    }

     // Menampilkan hanya pembeli
    public function showCustomers()
    {
        $customers = User::whereHas('role', function ($query) {
            $query->where('name', 'Pembeli'); 
        })->get();

        return view('admin.pages.customer', compact('customers'));     
    }

     // Menampilkan hanya admin
    public function showStafs()
    {
        $stafs = User::whereDoesntHave('role', function ($query) {
            $query->where('name', 'Pembeli'); 
        })->get();

        return view('admin.pages.staf', compact('stafs'));
    }
    

    public function show($id)
    {
        $stafs = User::with('role')->findOrFail($id);
        
        $roleName = strtolower($stafs->role->name); 

        return view("admin.pages.{$roleName}", compact('stafs'));
    }
    

    // Menyimpan pengguna baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'phone' => 'nullable|string|max:255',
            'role_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_id' => $request->role_id,
        ]);

        return redirect()->back()->with('success', 'Pengguna berhasil ditambahkan.');
    }

    // Menampilkan form edit pengguna

    // Memperbarui data pengguna
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
        ]);

        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        return redirect()->back()->with('success', 'Staff berhasil diperbarui.');
    }

    // Menghapus pengguna
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
