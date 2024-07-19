<?php

namespace App\Http\Controllers\Public;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ContactUsModel;
use App\Models\FooterModel;
use App\Models\User;
use App\Models\HomeModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ContactUsController extends Controller
{

    public function getById($id)
    {
        return ContactUsModel::where('id', $id)->first();
    }

    public function getWithPaginate()
    {
        return ContactUsModel::paginate(10);
    }

    public function index()
    {
        $user = User::first();
        $home = HomeModel::first();
        $footer = FooterModel::first();

        return view('pages.public.contact_us', compact('user','footer', 'home'));
    }

    public function indexPaginate()
    {
        $user = User::first();
        $footer = FooterModel::first();
        $contact = $this->getWithPaginate();

        return view('pages.private.contact_response', compact('contact', 'user', 'footer'));
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telepon' => 'required|string|max:15',
            'pesan' => 'required|string'
        ]);

    try {
        DB::beginTransaction();

        // Simpan data ke database
        $contact = new ContactUsModel();
        $contact->nama_lengkap = $validatedData['nama_lengkap'];
        $contact->email = $validatedData['email'];
        $contact->telepon = $validatedData['telepon'];
        $contact->pesan = $validatedData['pesan'];
        $contact->save();

        // Kirim email
        $this->sendEmail($validatedData);

        DB::commit();
        return redirect()->route('contact')->with('success', 'Pesan Berhasil Dikirim.');
        } catch (\Exception $e) {
        DB::rollback();
        return redirect()->route('contact')->with('error', 'Pesan Tidak Berhasil Dikirim. Kesalahan: ' . $e->getMessage());
        }
    }

    private function sendEmail($data)
    {
        try {
            Mail::send('pages.public.email', $data, function($message) use ($data) {
                $message->to($data['email'], $data['nama_lengkap'])
                        ->subject('Email Form Contact Us');
            });
        } catch (\Exception $e) {
            throw new \Exception('Email tidak dapat dikirim. Kesalahan: ' . $e->getMessage());
        }
    }

    public function show($id)
    {
        $user = User::first();
        $footer = FooterModel::first();
        $contact = $this->getById($id);

        return view('pages.private.show_response', compact('contact', 'user', 'footer'));
    }

    public function destroy($id)
    {
        ContactUsModel::where('id', $id)->delete();

        return redirect()->route('contact_response');
    }
}
