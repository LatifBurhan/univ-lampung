<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\FormProfilPegawai;
use App\Http\Controllers\Controller;
use App\Models\User;

class PegawaiController extends Controller
{
    public function pegawai(Request $request) {

        $pegawai_profil = FormProfilPegawai::all();

        return view('dashboard.pegawai',compact('pegawai_profil'),['title' => 'Pegawai']);
    }

    public function PegawaiInputProfile(Request $request) {
        try {

            $validateData = $request->validate([
                'nip_pegawai' => 'required',
                'nama_pegawai' => 'required',
                'ttl_pegawai' => 'required',
                'jenis_kelamin' => 'required',
                'email_pegawai' => 'required|email',
                'website_pegawai' => 'required',
                'keahlian' => 'required',
                'pas_foto' => 'mimes:jpeg,png,gif,jfif,jpg|max:2042',
            ], [
                'email_pegawai.required' => 'Masukan Email terlebih dahulu',
            ]);

            $file = $request->file('pas_foto');

            if ($file) {
                $fileName = time() . '_' . $file->getClientOriginalName();
                $fileType = $file->getClientOriginalExtension();

                $file->storeAs('file-pegawai/', $fileName, 'public');

                $validateData['file_name'] = $fileName;
                $validateData['file_type'] = $fileType;
            }

            $user = User::create([
                'username' => $request->nama_pegawai,
                'email' => $request->email_pegawai,
                'password' => bcrypt('Admin'),
                'remember_token' => Str::random(60),
            ]);

            $pegawai_profile = FormProfilPegawai::create($validateData);
            $user->profile_pegawai()->associate($pegawai_profile); // Menghubungkan profil Pegawai dengan User
            $user->save();


            return redirect()->back();
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Terjadi kesalahan: ' . $th->getMessage()]);
        }
    }
}
