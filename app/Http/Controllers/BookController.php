<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{

    public function index()
    {
        $data = Book::latest()->take(4)->get();

        // Prepare SEO data
        $page_title = 'Penerbitan Termurah 2024 - Penerbit Lentera Ilmu Madani';
        $page_description = 'Terbitkan bukumu di Lentera Ilmu Madani dan wujudkan impian menjadi penulis hebat.Apakah Anda memiliki karya yang ingin diterbitkan? Jangan ragu lagi! Kirim naskah Anda sekarang dan kami akan membantu Anda menerbitkannya dengan kualitas terbaik.';
        $page_url = url()->current();
        return view('app.beranda', compact('data', 'page_title', 'page_description', 'page_url'));
    }
    public function terbitan(Request $request)
    {

        if ($request->has('search')) {
            // Mulai query
            $query = Book::query();

            // Jika ada input untuk judul
            if ($request->filled('judul')) {
                $query->where('judul', 'LIKE', '%' . $request->judul . '%');
            }

            // Jika ada input untuk kategori
            if ($request->filled('kategori')) {
                $query->where('kategori', 'LIKE', '%' . $request->kategori . '%');
            }
            if ($request->filled('tahun')) {
                $query->whereYear('tahun', $request->tahun); // atau sesuaikan dengan nama kolom tahun
            }
            $data = $query->get();
        } else {
            $data = Book::all();
        }
        $kategori = Book::select('kategori')->distinct()->get();

        // Prepare SEO data
        $page_title = 'Buku Terbaik 2024 - Penerbit Lentera Ilmu Madani';
        $page_description = 'Temukan buku-buku terbaik yang diterbitkan oleh Penerbit Lentera Ilmu Madani di tahun 2024. Kirim naskahmu dan wujudkan impian menjadi penulis hebat.';
        $page_url = url()->current();
        return view('app.terbitan', compact('data', 'page_title', 'page_description', 'page_url', 'kategori'));
    }

    public function kontak()
    {
        return view('app.kontak');
    }
    public function detailBook($id)
    {
        $data = Book::find($id);
        $title = 'Buku ' . $data->judul;
        $kategori = $data->kategori;
        $rek = Book::where('kategori', $kategori)->get();
        return view('app.buku', compact('data', 'title', 'rek'));
    }
    public function kirimNaskah()
    {
        return view('app.kirim');
    }
    public function submitNaskah(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'nama_penulis' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'judul_naskah' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'file_naskah' => 'required|mimes:pdf,doc,docx'
        ]);

        // Mengirim email
        Mail::send([], [], function ($message) use ($validatedData, $request) {
            $message->from($validatedData['email'], $validatedData['nama_penulis']);
            $message->to('publisher@example.com') // Ganti dengan email penerima
                ->subject('Pengiriman Naskah Baru: ' . $validatedData['judul_naskah'])
                ->setBody(
                    'Nama Penulis: ' . $validatedData['nama_penulis'] . "\n" .
                        'Email: ' . $validatedData['email'] . "\n" .
                        'Judul Naskah: ' . $validatedData['judul_naskah'] . "\n" .
                        'Deskripsi: ' . $validatedData['deskripsi'],
                    'text/plain'
                );

            // Lampirkan file naskah
            $message->attach($request->file('file_naskah')->getRealPath(), [
                'as' => $request->file('file_naskah')->getClientOriginalName(),
                'mime' => $request->file('file_naskah')->getMimeType(),
            ]);
        });

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'Naskah berhasil dikirim!');
    }
}
