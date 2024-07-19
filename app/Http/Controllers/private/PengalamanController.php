<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\PengalamanModel;
use App\Models\FooterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengalamanController extends Controller
{
    public function getById($id)
    {
        return PengalamanModel::where('id', $id)->first();
    }

    public function getWithPaginate()
    {
        return PengalamanModel::paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_pt' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'mulai' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pengalaman = new PengalamanModel();
        $pengalaman->nama_pt = $request->nama_pt;
        $pengalaman->posisi = $request->posisi;
        $pengalaman->mulai = $request->mulai;
        $pengalaman->lokasi = $request->lokasi;
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $pengalaman->file = $filePath;
        }
        $pengalaman->save();

        return redirect()->route('admin_profile')->with('success', 'Data pengalaman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $footer = FooterModel::first();
        $pengalaman = $this->getById($id);

        return view('pages.private.update_pengalaman', compact('pengalaman', 'footer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pt' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'mulai' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pengalaman = PengalamanModel::find($id);
        $pengalaman->nama_pt = $request->nama_pt;
        $pengalaman->posisi = $request->posisi;
        $pengalaman->mulai = $request->mulai;
        $pengalaman->lokasi = $request->lokasi;

       if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Hapus file lama jika ada
            if ($pengalaman->file && Storage::disk('public')->exists($pengalaman->file)) {
                Storage::disk('public')->delete($pengalaman->file);
            }
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file->storeAs('uploads', $fileName, 'public');
            $pengalaman->file = $filePath;
        }

        $pengalaman->save();

        return redirect()->route('admin_profile')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        PengalamanModel::where('id', $id)->delete();

        return redirect()->route('admin_profile');
    }
}
