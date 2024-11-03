<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function dashboard()
    {
        $data = Book::all();
        return view('admin.dashboard', compact('data'));
    }
    public function add()
    {
        $kategori = Book::select('kategori')->distinct()->get();
        return view('admin.add', compact('kategori'));
    }

    public function insert(Request $request)
    {
        $validateData = $request->validate([
            'id' => 'nullable|integer|exists:table_name,id',
            'judul' => 'required|string|max:255',
            'isbn' => 'required|string',
            'penulis' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'tahun' => 'required|date_format:Y',
            'harga' => 'required|numeric',
            'kategori' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'oldimage' => 'nullable',
        ]);
        if ($request->file('image')) {
            $validateData['image'] = $request->file('image')->store('sampul');
        }
        Book::create($validateData);
        return redirect()->route('admin')->with('success', 'Buku berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $data = Book::find($id);
        $kategori = Book::select('kategori')->distinct()->get();
        return view('admin.edit', compact('data', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $data = Book::find($id);
        $data->update($request->except('image', 'oldImage'));
        if ($request->hasFile('image')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $imageName = $request->file('image')->store('sampul');
            $data->update(['image' => $imageName]);
        }
        return redirect()->route('admin')->with('success', 'Buku berhasil diUpdate!');
    }

    public function delete($id)
    {
        $data = Book::find($id);
        if ($data->image) {
            Storage::delete($data->image);
        }
        Book::destroy($data->id);
        return redirect()->route('admin')->with('success', 'Buku berhasil diHapus!');
    }
}
