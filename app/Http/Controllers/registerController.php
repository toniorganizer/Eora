<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\Student;
use App\Donatur;
use Hash;

class registerController extends Controller
{
    public function donatur(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users|email',
            'nama' => 'required',
            'pekerjaan' => 'required',
            'alamat_don' => 'required',
            'nohp_don' => 'required',
            'password' => 'required|same:password_confirmation|min:6',
            'password_confirmation' => 'required|same:password',
            'image' => 'mimes:jpg,jpeg|max:2000'
        ]);
        
        if($request->hasFile('image')){
        $image = $request->file('image');
        $nama_image = time()."_".$image->getClientOriginalName();

        $tujuan_upload = 'assets/images/avatars';

        $image->move($tujuan_upload,$nama_image);

        $user = new user;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->image = $nama_image;
        $user->role1 = $request->role;
        $user->sudah = $request->sudah;
        $user->bantu_umum = 0;
        $user->role_donasi = 0;
        $user->role_infak = 0;
        $user->role_bantu = 0;
        $user->role_langsung = 0;
        $user->password = Hash::make($request->password);
        $user->save();
        
        $tambah = new donatur;
        $tambah->nama_don = $request->nama;
        $tambah->email_mhs = $request->email_mhs;
        $tambah->pekerjaan = $request->pekerjaan;
        $tambah->alamat_don = $request->alamat_don;
        $tambah->nohp_don = $request->nohp_don;
        $tambah->image = $nama_image;
        $tambah->role= $request->role;
        $tambah->email = $request->email;
        $tambah->save();
        }

        return redirect('registerDonatur')->with('status','Register berhasil, silahkan anda login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function student(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users|email',
            'password' => 'required|same:password_confirmation|min:6',
            'password_confirmation' => 'required|same:password',
            'image' => 'mimes:jpg,jpeg|max:2000'
        ]);

        if($request->hasFile('image')){
        $image = $request->file('image');
        $nama_image = time()."_".$image->getClientOriginalName();

        $tujuan_upload = 'assets/images/avatars';

        $image->move($tujuan_upload,$nama_image);

        $user = new user;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->image = $nama_image;
        $user->sudah = $request->sudah;
        $user->role1 = $request->role;
        $user->bantu_umum = 0;
        $user->role_donasi = 0;
        $user->role_infak = 0;
        $user->role_bantu = 0;
        $user->role_langsung = 0;
        $user->password = Hash::make($request->password);
        $user->save();
        
        $tambah = new student;
        $tambah->nim = $request->nim;
        $tambah->nama = $request->nama;
        $tambah->jurusan = $request->jurusan;
        $tambah->alamat_mhs = $request->alamat_mhs;
        $tambah->nohp_mhs = $request->nohp_mhs;
        $tambah->image_mhs = $nama_image;
        $tambah->role= $request->role;
        $tambah->email_mhs = $request->email;
        $tambah->email_donatur = 0;
        $tambah->nama_ayah = 0;
        $tambah->nama_ibu = 0;
        $tambah->pekerjaan_ayah = 0;
        $tambah->pekerjaan_ibu = 0;
        $tambah->norek = 0;
        $tambah->ket_tambahan = 0;
        $tambah->save();
        }

        return redirect('registerMahasiswa')->with('status','Register berhasil dilakukan, Silahkan login');

    }
}
