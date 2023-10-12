<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data product & product_gallery berdasarkan yg terbaru
        $products = Product::with(['galleries'])->latest()->get();

        return view('pages.frontend.index', compact('products'));
    }

    public function details(Request $request, $slug)
    {
        // mengambil data gallery menggunakan relasi dengan table product, berdasarkan nama slug, dan jika data tidak ada maka tampilkan halaman 404
        $product = Product::with(['galleries'])->where('slug',$slug)->firstOrFail();

        return view('pages.frontend.details', compact('product'));
    }

    public function cart(Request $request)
    {
        return view('pages.frontend.cart');
    }

    public function success(Request $request)
    {
        return view('pages.frontend.success');
    }
}
