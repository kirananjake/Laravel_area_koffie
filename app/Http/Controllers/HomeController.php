<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Kategori;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showMenu()
    {
        $categories = Kategori::with('menus')->get(); // Mengambil semua kategori beserta menu terkait
        return view('welcome', compact('categories'));
    }
    
}