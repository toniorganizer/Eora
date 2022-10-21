<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
use auth;
use App\user;
use App\kriteria;
use App\student;
use App\Donatur;
use App\Hasil;  
use App\distribusi;
use App\donasi;
use App\langsung;
use PDF;
use File;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data['title'] = 'Profile administrator';
        $data['data'] = DB::table('users')->where('id',Auth::user()->id)->get();
        return view('admin.profileAdm',$data);
    }

    public function hasil(Request $request){
        $tambah = new hasil;
        $tambah->email_mhs = $request->email_mhs;
        $tambah->id_adm = $request->id_adm;
        $tambah->role = $request->role;
        $tambah->hasil = $request->hasil;
        $tambah->save();

        Kriteria::where('email_mhs',$request->email_mhs)->update([
            'role_kriteria' => $request->role,
        ]);

        User::where('email',$request->email_mhs)->update([
            'sudah' => 3,
        ]);

        return redirect('/pendaftarNew')->with('status','Proses terima data pendaftar berhasil');
    }

    public function dataPendaftar(){
        $data['title'] = 'Data mahasiswa';
        // $data['data'] = DB::table('students')->get();
        // $data['kriteria'] = DB::table('kriterias')->get();

        $data['kriteria'] = DB::table('students')->select('*')->join('kriterias','kriterias.email_mhs','=','students.email_mhs')->get();

        return view('admin.dataPendaftar',$data);
    }

    public function pendaftar(){
        $data['title'] = 'Data pendaftar';
        $data['data'] = DB::table('students')->get();
        return view('admin.Pendaftar',$data);
    }

    public function detailPendaftar($id){
        $data['title'] = 'Detail data pendaftar';
        $data['data'] = DB::table('students')->select('*')->join('kriterias','kriterias.email_mhs','=','students.email_mhs')->where('nim',$id)->get();
        return view('admin.detailPendaftar',$data);
    }
    public function donatur(){
        $data['title'] = 'Data donatur';
        $data['data'] = DB:: table('donaturs')->get();
        return view('admin.dataDonatur',$data);
    }

    public function addDonatur()
    {
        $data['title'] = 'Tambah data donatur';
        return view('donatur.tambahDonatur',$data);
    }

    public function addDon(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users|email',
            'nama' => 'required',
            'pekerjaan' => 'required',
            'alamat_don' => 'required',
            'nohp_don' => 'required',
            'password' => 'required|same:password_confirmation|min:6',
            'password_confirmation' => 'required|same:password'
        ]);

        $user = new user;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->image = $request->image;
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
        $tambah->image = $request->image;
        $tambah->role= $request->role;
        $tambah->email = $request->email;
        $tambah->save();

        return redirect('/dataDonatur')->with('status','Tamba data donatur berhasil dilakukan');
    }

    public function bantu(){
        $data['title'] = 'Data Bantuan';
        $data['data'] = DB::table('students')->select('*')
        ->join('donaturs','donaturs.email_mhs','=','students.email_mhs')
        ->join('langsungs','langsungs.email_donatur','=','donaturs.email')->get();
        return view('admin.bantuan',$data);
    }

    public function cetakBantu(){
        $data['title']='cetak data';
        $data['data'] = DB::table('students')->select('*')->join('donaturs','donaturs.email_mhs','=','students.email_mhs')->get();
        $pdf=PDF::loadview('admin.cetak.cetakBantu',$data);
        return $pdf->stream('laporan-Bantu-donatur');
    }

    public function editPassword(){
        $data['title'] = 'Edit Password';
        return view('admin.editPassword',$data);
    }

    public function changePassword(Request $request){
        if(!(Hash::check($request->get('current'),Auth::user()->password))){
            return back()->with('status','Password lama yang anda masukan tidak cocok dengan password sebelumnya');
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['title'] = 'Edit profile';
        $data['data'] = DB::table('users')->find($id);
        return view('admin.editAdm',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        $data = DB::table('users')->find($request->id);
        
        if($request->hasFile('image')){
        File::delete('assets/images/avatars/'. $data->image);
        $image = $request->file('image');
        $nama_image = time()."_".$image->getClientOriginalName();

        $tujuan_upload = 'assets/images/avatars';

        $image->move($tujuan_upload,$nama_image);

        User::where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => $nama_image,
        ]);

        }else{

        User::where('id',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'image' => Auth::user()->image,
        ]);
        }


        return redirect('/profileAdm')->with('status','Edit data berhasil dilakukan');
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

    public function hapusMhs($id)
    {
        $id_user = DB::table('students')->where('email_mhs',$id)->first();
        $data = DB::table('students')->find($id_user->id);
        File::delete('assets/images/avatars/'. $data->image_mhs);
        DB::table('students')->where('email_mhs',$id)->delete();
        DB::table('users')->where('email',$id)->delete();
        return redirect('/dataPendaftar')->with('status','Hapus data pendaftar berhasi dilakukan');
    }

    public function EditMhs($id)
    {
        $data['title'] = 'Edit data Pendaftar';
        $data['data'] = DB::table('students')->where('email_mhs',$id)->get();
        return view('admin.editMhs',$data);
    }

    public function prosesMhs(Request $request)
    {
        Student::where('email_mhs',$request->email_mhs)->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email_mhs' => $request->email_mhs,
            'jurusan' => $request->jurusan,
            'nohp_mhs' => $request->nohp_mhs,
            'alamat_mhs' => $request->alamat_mhs,
        ]);

        User::where('email',$request->email_mhs)->update([
            'name' => $request->nama,
            'email' => $request->email_mhs,
        ]);

        return redirect('/dataPendaftar')->with('status','Proses edit data berhasil dilakukan');
    }

    public function hapusDonatur($id){
        $id_user = DB::table('donaturs')->where('email',$id)->first();
        $data = DB::table('donaturs')->find($id_user->id);
        File::delete('assets/images/avatars/'. $data->image);
        DB::table('donaturs')->where('email',$id)->delete();
        DB::table('users')->where('email',$id)->delete();
        return redirect('/dataDonatur')->with('status','Proses hapus data donatur berhasil dilakukan');
    }

    public function editDonatur($id){
        $data['title'] = 'Edit data donatur';
        $data['data'] = DB::table('donaturs')->where('email',$id)->get();
        return view('admin.editDonatur',$data);
    }

    public function prosesEditDonatur(Request $request){

        Donatur::where('email',$request->email)->update([
            'nama' => $request->nama,
            'pekerjaan' => $request->pekerjaan,
            'alamat_mhs' => $request->alamat_mhs,
            'nohp_mhs' => $request->nohp_mhs,
        ]);

        User::where('email',$request->email)->update([
            'name' => $request->nama,
            'email' => $request->email,
        ]);

        return redirect('/dataDonatur')->with('status','Proses edit data donatur berhasil dilakukan');
    }

    public function dataBantuanUmum()
    {
        $data['title'] = 'Bantuan umum';
        $data['data'] = DB::table('donasis')->get();
        $data['hasil'] = DB::table('students')->where('email_donatur', '0')->get();
        $data['mahasiswa'] = DB::table('students')->where('email_donatur', '0')->count();
        return view('admin.data_bantuUmum',$data);
    }

    public function distribusi(Request $request)
    {
        $data=$request->all();
        // dd($data);

        foreach($data['email_mhs'] as $item => $value){
            $data2 = array(
                'email_mahasiswa' => $data['email_mhs'][$item],
                'jumlah_donasi' => $data['jumlah_donasi'][$item],
                'jumlah_distribusi' => $data['jumlah_distribusi'][$item],
                'waktu' => $data['waktu'][$item],
            );
            distribusi::create($data2);
        }

        donasi::where('email_mhs','0')->update([
            'jumlah_donasi' => 0,
            'total' => 0,
        ]);

        foreach($data['email_mhs'] as $itemm => $valuee){
        $data3 = array(
            'email_mahasiswa' => $data['email_mhs'][$itemm],
        );
            user::where('email', $data3)->update([
                'role_donasi' => 1,
            ]);
        }
        
        return redirect('/dataBantuanUmum')->with('status','Proses distribusi berhasil dilakukan');

    }

    public function infakAdmin()
    {
        $data['title'] = 'Infak admin';
        $data['data'] = DB::table('infaks')->get();
        return view('admin.infakAdmin',$data);
    }

    public function dataBantuanLangsung()
    {
        $data['title'] = 'Data bantuan langsung';
        return view('admin.bantuanLangsung',$data);
    }

    public function validasiLangsung(Request $request)
    {
        $data['title'] = 'Data bantuan langsung';

        user::where('email', $request->email_don)->update([
                'role_langsung' => 2,
            ]);
        
        langsung::where('email_donatur', $request->email_don)->update([
                'total' => $request->jumlah,
                'aturan' => 1,
            ]);

        user::where('email', $request->email_mhs)->update([
                'role_langsung' => 2,
            ]);

        user::where('role1', 'Administrator')->update([
                'role_langsung' => 1,
            ]);
        return redirect('dataBantuan')->with('status','Proses validasi berhasil dilakukan');
    }

}
