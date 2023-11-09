<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiodataController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show()
    {
        //Mengambil data user yang sedang login
        $user = auth()->user();
        //Mengambil biodata user
        $biodata = $user->biodata; //Pemanggilan Eloquent Relationship
        //Jika biodata user belum ada, maka buat biodata baru
        if (!$biodata) {
            //Buat data biodata untuk user x, karena secara default data biodata masih kosong
            Biodata::create([
                'user_id' => auth()->user()->id
            ]);
            $biodata = auth()->user()->biodata;
        }
        return view('biodata.show', compact('user', 'biodata'));
    }

    public function edit()
    {
        $user = auth()->user();
        $biodata = $user->biodata;
        return view('biodata.edit', compact('user', 'biodata'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'phone_number' => 'required|string|max:15',
            'date_of_birth' => 'required|date',

            'about_me' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'website' => 'required|string|max:255',
            'instagram' => 'required|string|max:100',
        ]);
        //Mengambil biodata user yang sedang login
        $user = Auth::user();

        //Update data user
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone_number' => $validated['phone_number'],
            'date_of_birth' => $validated['date_of_birth'],
        ]);

        $user->biodata()->update([
            'about_me' => $validated['about_me'],
            'address' => $validated['address'],
            'website' => $validated['website'],
            'instagram' => $validated['instagram'],
        ]);
        return redirect()->route('biodata.show')->with('success', 'Biodata berhasil diupdate');
    }
}
