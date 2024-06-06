<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\FAQ;

use Illuminate\Http\Request;

class PasienDashboardController extends Controller
{
    public function index()
    {
        $faqs = FAQ::all();
        $articles = Artikel::latest()->take(3)->get(); // Adjust 'Article' to your actual model name and fetch the latest 5 articles
        return view('Pasien.dashboard', compact('faqs', 'articles'));
    }

}
