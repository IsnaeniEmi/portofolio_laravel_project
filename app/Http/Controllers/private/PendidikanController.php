<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\PendidikanModel;
use App\Models\FooterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PendidikanController extends Controller
{
    public function getById($id)
    {
        return PendidikanModel::where('id', $id)->first();
    }

    public function getWithPaginate()
    {
        return PendidikanModel::paginate(10);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_institusi' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'angkatan' => 'required|integer',
            'jurusan' => 'required|string|max:255',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pendidikan = new PendidikanModel();
        $pendidikan->nama_institusi = $request->nama_institusi;
        $pendidikan->jenjang = $request->jenjang;
        $pendidikan->angkatan = $request->angkatan;
        $pendidikan->jurusan = $request->jurusan;
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $pendidikan->file = $filePath;
        }
        $pendidikan->save();

        return redirect()->route('admin_profile')->with('success', 'Data pendidikan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $footer = FooterModel::first();
        $pendidikan = $this->getById($id);

        return view('pages.private.update_pendidikan', compact('pendidikan', 'footer'));
    }

     public function update(Request $request, $id)
    {
        $request->validate([
            'nama_institusi' => 'required|string|max:255',
            'jenjang' => 'required|string|max:255',
            'angkatan' => 'required|integer',
            'jurusan' => 'required|string|max:255',
            'file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $pendidikan = PendidikanModel::find($id);
        $pendidikan->nama_institusi = $request->nama_institusi;
        $pendidikan->jenjang = $request->jenjang;
        $pendidikan->angkatan = $request->angkatan;
        $pendidikan->jurusan = $request->jurusan;

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Hapus file lama jika ada
            if ($pendidikan->file && Storage::disk('public')->exists($pendidikan->file)) {
                Storage::disk('public')->delete($pendidikan->file);
            }
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file->storeAs('uploads', $fileName, 'public');
            $pendidikan->file = $filePath;
        }

        $pendidikan->save();

        return redirect()->route('admin_profile')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        PendidikanModel::where('id', $id)->delete();

        return redirect()->route('admin_profile');
    }
}
