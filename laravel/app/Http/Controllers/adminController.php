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
        $data = array('title' => 'form');
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
        $data = array('title' => 'list');
        return view('admin.list_buah', $data);
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


    public function store_buah()
    {

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
}
