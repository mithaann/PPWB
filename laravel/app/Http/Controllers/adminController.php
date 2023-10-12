<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\benua;
use App\Models\negara;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class adminController extends Controller
{
    public function index()
    {
        $data = array('title' => 'Admin');
        return view('admin.index', $data);
    }

    public function form_buah()
    {
        $benua = benua::all();
        $negara = Negara::all();
        $data = [
            'title' => 'form',
            'negara' => $negara,
            'benua' => $benua
            // Change 'benuas' to 'negara' to match the variable name in the view
        ];
        return view('admin.form_buah', $data);
    }
    public function form_negara()
    {
        $benuas = Benua::all(); // Retrieve all benuas
        $data = [
            'title' => 'form',
            'benuas' => $benuas,
            // Pass the $benuas variable to the view
        ];

        return view('admin.form_negara', $data);
    }

    public function list_buah()
    {
        $negara = Negara::latest()->paginate(7); // Paginate negara records
        $buahs = produk::all();
        return view('admin.list_buah', compact('buahs', 'negara'));
    }

    public function list_negara()
    {
        $benuas = Benua::all(); // Retrieve all benuas
        $negara = Negara::latest()->paginate(7); // Paginate negara records

        return view('admin.list_negara', compact('benuas', 'negara'));
    }
    public function update_page_negara(string $id): View
    {
        $benuas = Benua::all(); // Retrieve all benuas
        $negara = Negara::findOrFail($id); // Find the specific negara record by ID

        return view('admin.update_negara', compact('benuas', 'negara'));
    }

    public function update_page_buah(int $id): View
    {
        $negara = Negara::all(); // Retrieve all negaras
        $buahs = Produk::findOrFail($id); // Find the specific buah record by ID

        return view('admin.update_buah', compact('buahs', 'negara'));
    }


    public function store_buah(Request $request): RedirectResponse
    {
        // Validate the request data
        $this->validate($request, [
            'buah_nama' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'negara_id' => 'required|exists:negaras,id',
            'stock' => 'required|numeric',
            'keterangan' => 'required',
        ]);

        // Upload image
        $imagePath = $request->file('gambar')->store('public/fruit');
        $imageFileName = basename($imagePath);

        // Create a new Buah record in the database
        $buah = produk::create([
            'buah_gambar' => $imageFileName,
            'buah_nama' => $request->buah_nama,
            'harga' => $request->harga,
            'negara_id' => $request->negara_id,
            'stock' => $request->stock,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect to a view or route after successfully creating the record
        return redirect()->route('list_buah')->with(['success' => 'Data Buah Berhasil Disimpan!']);
    }

    public function store_negara(Request $request): RedirectResponse
    {
        // Validate the request data
        $this->validate($request, [
            'negara_name' => 'required',
            'negara_image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'benua_id' => 'required|exists:benuas,id',
        ]);

        // Upload image
        $imagePath = $request->file('negara_image')->store('public/country');
        $imageFileName = basename($imagePath);

        // Create a new Negara record in the database
        $negara = Negara::create([
            'negara_name' => $request->negara_name,
            'negara_image' => $imageFileName,
            'benua_id' => $request->benua_id,
        ]);

        // Redirect to a view or route after successfully creating the record
        return redirect()->route('list_negara')->with(['success' => 'Data Negara Berhasil Disimpan!']);
    }

    public function edit_negara(Request $request, $id): RedirectResponse
    {
        // Validate the form
        $this->validate($request, [
            'negara_name' => 'required',
            'negara_image' => 'image|mimes:jpeg,jpg,png|max:2048',
            'benua_id' => 'required|exists:benuas,id',
        ]);

        // Get Negara by ID
        $negara = Negara::findOrFail($id);

        // Check if image is uploaded
        if ($request->hasFile('negara_image')) {
            // Upload new image
            $imagePath = $request->file('negara_image')->store('public/country');
            $imageFileName = basename($imagePath);

            // Delete old image if it exists
            if ($negara->negara_image) {
                Storage::delete('public/country/' . $negara->negara_image);
            }

            // Update Negara with new image
            $negara->update([
                'negara_name' => $request->negara_name,
                'negara_image' => $imageFileName,
                'benua_id' => $request->benua_id,
            ]);
        } else {
            // Update Negara without changing the image
            $negara->update([
                'negara_name' => $request->negara_name,
                'benua_id' => $request->benua_id,
            ]);
        }

        // Redirect to index
        return redirect()->route('list_negara')->with(['success' => 'Data Negara Berhasil Diubah!']);
    }

    public function edit_buah(Request $request, $id): RedirectResponse
    {
        // Validate the form
        $this->validate($request, [
            'buah_nama' => 'required',
            'harga' => 'required|numeric',
            'gambar' => 'image|mimes:jpeg,jpg,png|max:2048',
            'negara_id' => 'required|exists:negaras,id',
            'stock' => 'required|numeric',
            'keterangan' => 'required',
        ]);

        // Get Buah by ID
        $buah = Produk::findOrFail($id);

        // Check if image is uploaded
        if ($request->hasFile('gambar')) {
            // Upload new image
            $imagePath = $request->file('gambar')->store('public/fruit');
            $imageFileName = basename($imagePath);

            // Delete old image if it exists
            if ($buah->buah_gambar) {
                Storage::delete('public/fruit/' . $buah->buah_gambar);
            }

            // Update Buah with new image
            $buah->update([
                'buah_nama' => $request->buah_nama,
                'harga' => $request->harga,
                'buah_gambar' => $imageFileName,
                'negara_id' => $request->negara_id,
                'stock' => $request->stock,
                'keterangan' => $request->keterangan,
            ]);
        } else {
            // Update Buah without changing the image
            $buah->update([
                'buah_nama' => $request->buah_nama,
                'harga' => $request->harga,
                'negara_id' => $request->negara_id,
                'stock' => $request->stock,
                'keterangan' => $request->keterangan,
            ]);
        }

        // Redirect to index
        return redirect()->route('list_buah')->with(['success' => 'Data Buah Berhasil Diubah!']);
    }

    public function negara_hapus($id): RedirectResponse
    {
        // Get negara by ID
        $negara = Negara::findOrFail($id);

        // Delete image if it exists
        Storage::delete('public/country/' . $negara->negara_image);

        // Delete the negara
        $negara->delete();

        // Redirect to index
        return redirect()->route('list_negara')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function buah_hapus($id): RedirectResponse
    {
        // Get negara by ID
        $buahs = produk::findOrFail($id);

        // Delete image if it exists
        Storage::delete('public/fruit/' . $buahs->negara_image);

        // Delete the negara
        $buahs->delete();

        // Redirect to index
        return redirect()->route('list_buah')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
