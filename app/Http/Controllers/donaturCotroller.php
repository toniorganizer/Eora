<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\user;
use App\Donatur;
use App\Donasi;
use App\Student;
use App\infak;
use App\langsung;
use Auth;
use DB;
use File;

class donaturCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('donatur');
    }
    
    public function index()
    {
        $data['title'] = 'Profile';
        $data['data'] = DB::table('donaturs')->where('email',auth::user()->email)->get();
        return view('donatur.profile',$data);
    }

    public function sliderMahasiswa()
    {
        $data['title'] = 'Data mahasiswa';
        $data['data'] = DB::table('kriterias')
        ->select('*')
        ->join('students','kriterias.email_mhs','=','students.email_mhs')
        ->join('users','users.email','=','students.email_mhs')
        ->join('hasils','hasils.email_mhs','=','students.email_mhs')
        ->orderBy('hasil','DESC')->get();
        return view('donatur.mahasiswa',$data);
    }

    public function mahasiswa()
    {
        $data['title'] = 'Data mahasiswa';

        $data['data'] = DB::table('kriterias')
        ->select('*')
        ->join('students','kriterias.email_mhs','=','students.email_mhs')
        ->join('users','users.email','=','students.email_mhs')
        ->join('hasils','hasils.email_mhs','=','students.email_mhs')
        ->orderBy('hasil','DESC')->get();

        return view('donatur.listMahasiswa', $data);
    }

    public function detailMahasiswa($id){
        $data['title'] = 'Detail Mahasiswa';

        $data['data'] = DB::table('students')
        ->select('*')
        ->join('kriterias','students.email_mhs','=','kriterias.email_mhs')
        ->where('nim',$id)->get();
        $data['donatur'] = DB::table('donaturs')->where('email',Auth::user()->email)->get();

        return view('donatur.detailMahasiswa',$data);
    }

    public function bantuMahasiswa(Request $request){

        // $tambah = new donasi;
        // $tambah->email_mhs = $request->id_mhs;
        // $tambah->emailDonatur = $request->id_donatur;
        // $tambah->jumlah_Mnasi = $request->jumlah;
        // $tambah->save();

        Student::where('email_mhs',$request->email)->update([
            'email_donatur' => $request->email_donatur,
        ]);

        Donatur::where('id',$request->id_donatur)->update([
            'email_mhs' => $request->email,
        ]);

        User::where('email', $request->email)->update([
            'sudah' => $request->sudah,
            'role_donasi' => 2,
        ]);

        User::where('email', $request->email_donatur)->update([
            'sudah' => $request->sudahh,
            'role_bantu' => 1,
        ]);

        return redirect('/bantuanMhs')->with('status','Selamat, mahasiswa berhasil dipilih');
    }

    public function bantuanMhs(){
        $data['title'] = 'Bantuan';
        $nim = DB::table('students')->where('email_donatur', Auth::user()->email)->first();
        // $data['donatur'] = DB::table('donaturs')->where('email',Auth::user()->email)->get(); 
        $data['data'] = DB::table('students')
        ->select('*')
        ->join('kriterias','students.email_mhs','=','kriterias.email_mhs')
        ->where('nim',$nim->nim)->get();   
        return view('donatur.bantuanMhs',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Edit profile';
        $data['d'] = DB::table('donaturs')->where('id',$id)->get();
        return view('donatur.prosesEdit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'image' => 'mimes:jpg,jpeg|max:5000',
        ]);

        $data = DB::table('donaturs')->find($request->id);
        // return var_dump($data->image);
        
        if($request->hasFile('image')){
        File::delete('assets/images/avatars/'. $data->image);
        $image = $request->file('image');
        $nama_image = time()."_".$image->getClientOriginalName();

        $tujuan_upload = 'assets/images/avatars';

        $image->move($tujuan_upload,$nama_image);

        Donatur::where('id',$request->id)->update([
            'nama_don' => $request->nama,
            'pekerjaan' => $request->pekerjaan,
            'alamat_don' => $request->alamat_don,
            'nohp_don' => $request->nohp_don,
            'image' => $nama_image,
        ]);

         User::where('email',Auth::user()->email)->update([
            'name' => $request->nama,
            'image' => $nama_image,
        ]);

         }else{
             Donatur::where('id',$request->id)->update([
            'nama_don' => $request->nama_don,
            'pekerjaan' => $request->pekerjaan,
            'alamat_don' => $request->alamat_don,
            'nohp_don' => $request->nohp_don,
            'image' => auth::user()->image,
        ]);

         User::where('email',Auth::user()->email)->update([
            'name' => $request->nama,
            'image' => auth::user()->image,
        ]);
        }

        return redirect('/profileDon')->with('status','Proses edit data berhasil dilakukan');

    }

    public function editPasswordDonatur(){
        $data['title'] = 'Edit Password';
        return view('donatur.editPasswordDonatur',$data);
    }

    public function changePasswordDonatur(Request $request){
        if(!(Hash::check($request->get('current'),Auth::user()->password))){
            return back()->with('status','Password lama tidak cocok dengan password sebelumnya');
        }
        if(strcmp($request->get('current'),$request->get('password_baru')) == 0){
            return back()->with('status','Password baru tidak boleh sama dengan password lama');
        }
        $request->validate([
            'current' => 'required',
            'password_baru' => 'required|min:6',
            'konfirmasi_password' => 'required|min:6|same:password_baru',
        ]);
        User::where('email', auth()->user()->email)->update(['password' => Hash::make($request->password_baru)]);
        return back()->with('status','Password berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function bantuUmum()
    {
        $data['title'] = 'Bantuan umum';
        $data['data'] = DB::table('donasis')->where('email_donatur',Auth::user()->email)->get();
        return view('donatur.bantuanUmum',$data);
    }

    public function prosesUmum(Request $request)
    {
        $tambah = new donasi;
        $tambah->email_mhs = 0;
        $tambah->email_donatur = $request->email_don;
        $tambah->jumlah_donasi = $request->jumlah;
        $tambah->rolee = 1;
        $tambah->total = 0;
        $tambah->save();

        User::where('email',Auth::user()->email)->update([
            'role_donasi' => $request->role_donasi
        ]);

        return redirect('/bantuanUmum')->with('status','Silahkan upload bukti transfer');
    }

    public function hitungBantuan(Request $request)
    {
        Donasi::where('id',$request->id)->update([
            'total' => $request->total
        ]);

        User::where('email',Auth::user()->email)->update([
            'role_donasi' => 0
        ]);

         return redirect('/jumlahUmum')->with('status','Selamat, Bantuan umum berhasil disalurkan');
    }

    public function jumlahBantuan()
    {
        $data['title'] = 'Bantuan umum';
        
        $data['data'] = DB::table('donasis')->get();
        $data['hasil'] = DB::table('students')->where('email_donatur', '0')->get();
        $data['mahasiswa'] = DB::table('students')->where('email_donatur', '0')->count();
        return view('donatur.jumlahBantuan',$data);
    }

    public function bantuAdmin()
    {
        $data['title'] = 'Infak admin';
        $data['data'] = DB::table('infaks')->get();
        return view('donatur.infakAdmin',$data);
    }

    public function infakAdmin(Request $request)
    {
        $add = new infak;
        $add->email_donatur = $request->email_don;
        $add->besaran = $request->infak;
        $add->jumlah_infak = 0;
        $add->save();

        User::where('email',Auth::user()->email)->update([
            'role_infak' => 1,
        ]);

        return redirect('/bantuAdmin')->with('status','Silahkan upload bukti transfer');
    }

    public function hitungInfak(Request $request)
    {
        Infak::where('id', $request->id)->update([
            'jumlah_infak' => $request->jumlah
        ]);

        User::where('email',Auth::user()->email)->update([
            'role_infak' => 0
        ]);

        return redirect('/bantuAdmin')->with('status','Selamat, infak admin berhasil disalurkan');
    }

    public function history()
    {
        $data['title'] = 'History';
        $data['data'] = DB::table('distribusis')->join('students','students.email_mhs','=','distribusis.email_mahasiswa')->paginate(5);
        return view('donatur.history',$data);
    }

    public function cariHistory(Request $request)
    {

        $cari = $request->cari;
        $data['title'] = 'History';
        $data['data'] = DB::table('distribusis')->join('students','students.email_mhs','=','distribusis.email_mahasiswa')->where('waktu','like',"%".$cari."%")->paginate(5);
        return view('donatur.history',$data);
    }

    public function bantuanLangsung()
    {
        $data['title'] = 'Data bantuan langsung';
        return view('donatur.bantuanLangsung',$data);
    }

    public function beriLangsung(Request $request){

        
        $bukti = $request->file('bukti');

        $nama_file_bukti = time()."_".$bukti->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/file_upload';
                // upload file
        $bukti->move($tujuan_upload,$nama_file_bukti);

        $add = new Langsung;
        $add->email_donatur = $request->emailDon;
        $add->email_mahasiswa = $request->emailMhs;
        $add->jumlah_donasi = $request->jumlah;
        $add->total = 0;
        $add->aturan = 0;
        $add->bukti = $nama_file_bukti;
        $add->save();

        User::where('email',Auth::user()->email)->update([
            'role_langsung' => 1,
        ]);

        User::where('role1','Administrator')->update([
            'role_langsung' => 0,
        ]);

        return redirect('bantuanMhs')->with('status','Proses pemberian bantuan berhasil dilakukan');
    }
}
