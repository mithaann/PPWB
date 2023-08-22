<?php

namespace App\Http\Controllers;
use App\Models\ProdukPromo;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Slideshow;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
     public function index() {
        $data = array('title' => 'Homepage');
        return view('homepage.index', $data);
    }
}
