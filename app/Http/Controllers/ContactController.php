<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'noHp' => 'required|string|max:255',
            'respon' => 'required|string|max:255'
        ]);

        Contact::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'noHp' => $request->noHp,
            'respon' => $request->respon
        ]);

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }

    public function index(){
        $contacts = Contact::paginate(5);
        return view('admin.contactAdmin', compact('contacts'));
    }
}
