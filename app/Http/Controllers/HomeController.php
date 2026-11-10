<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Tampilkan halaman beranda dengan hero section dan preview galeri dinamis.
     */
    public function index(): View
    {
        $galleryItems = GalleryItem::where('is_active', true)
            ->orderBy('position')
            ->get()
            ->keyBy('position');

        return view('home', compact('galleryItems'));
    }
}
