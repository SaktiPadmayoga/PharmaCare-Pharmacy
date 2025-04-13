<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Category;
use App\Models\Medicine;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getRandomMedicine()
    {
        $medicine = Medicine::inRandomOrder()->get();

        return view('user.pages.home', compact('medicine'));
    }

    public function getAllMedicine()
    {
        $medicines = Medicine::with('categories')->get();
        $categories = Category::all(); 

        return view('user.pages.catalogue', compact('medicines','categories'));
    }

    public function sortByCategory(Request $request)
{
    $medicines = Medicine::whereHas('categories', function ($query) use ($request) {
        $query->where('categories.id', $request->category);
    })->inRandomOrder()->get();

    $categories = Category::all(); 

    return view('user.pages.catalogue', compact('medicines', 'categories'));
}

}
