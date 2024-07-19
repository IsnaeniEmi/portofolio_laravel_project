<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\HomeModel;
use App\Models\FooterModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $home = HomeModel::first();
        $footer = FooterModel::first();

        return view('pages.private.setting', compact('home', 'footer'));
    }

    public function storeHome(Request $request)
    {
        $request->validate([
            'judul_besar' => 'required|string|max:255',
            'deskripsi_judul' => 'required|string|max:255',
            'deskripsi_about' => 'required|string|max:255',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $home = new HomeModel();
        $home->judul_besar = $request->judul_besar;
        $home->deskripsi_judul = $request->deskripsi_judul;
        $home->deskripsi_about = $request->deskripsi_about;

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $home->file = $filePath;
        }

        $home->save();

        return redirect()->route('admin_setting')->with('success', 'Data berhasil ditambahkan.');
    }

    public function updateHome(Request $request, $id)
    {
        $request->validate([
            'judul_besar' => 'required|string|max:255',
            'deskripsi_judul' => 'required|string|max:255',
            'deskripsi_about' => 'required|string|max:255',
            'file' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $home = HomeModel::find($id);
        $home->judul_besar = $request->judul_besar;
        $home->deskripsi_judul = $request->deskripsi_judul;
        $home->deskripsi_about = $request->deskripsi_about;

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            // Hapus file lama jika ada
            if ($home->file && Storage::disk('public')->exists($home->file)) {
                Storage::disk('public')->delete($home->file);
            }
            $fileName = time() . '_' . $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('uploads', $fileName, 'public');
            $home->file = $filePath;
        }

        $home->save();

        return redirect()->route('admin_setting')->with('success', 'Data berhasil Diubah.');
    }

    public function destroyHome($id)
    {
        HomeModel::where('id', $id)->delete();

        return redirect()->route('admin_setting');
    }

    public function storeFooter(Request $request)
    {
        $footer = new FooterModel();
        $footer->link_footer = $request->link_footer;
        $footer->save();

        return redirect()->route('admin_setting');
    }

    public function updateFooter(Request $request, $id)
    {
        FooterModel::where('id', $id)->update([
            'link_footer' => $request->link_footer,
        ]);

        return redirect()->route('admin_setting');
    }

    public function destroyFooter($id)
    {
        FooterModel::where('id', $id)->delete();

        return redirect()->route('admin_setting');
    }
}
