<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\student;
use App\user;
use App\Kriteria;
use DB;
use Auth;
use Storage;
use File;

class StudentCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('mahasiswa');
    }

    public function index()
    {
        $data['title'] = 'Profile saya';
        $data['data'] = DB::table('students')->where('email_mhs',Auth::user()->email)->get();
        return view('mahasiswa.profile',$data);
        // return $data['data'];
    }

    public function lengkapiS(){
        $data['title'] = 'Lengkapi persyaratan';
        $data['data'] = DB::table('students')->where('email_mhs',auth::user()->email)->get();
        return view('mahasiswa.lengkapi',$data);
    }

    public function prosesLengkapi(Request $request){

        $this->validate($request, [
            'file_nilai' => 'required|file|mimes:jpeg,jpg,pdf|max:300',
            'file_tanggungan' => 'required|file|mimes:jpeg,jpg,pdf|max:300',
            'file_penghasilan' => 'required|file|mimes:jpeg,jpg,pdf|max:300',
            'file_penon' => 'nullable|file|mimes:jpeg,jpg,pdf|max:300',
            'file_pekad' => 'nullable|file|mimes:jpeg,jpg,pdf|max:300',
            'file_ukt' => 'file|mimes:jpeg,jpg,pdf|max:300',
        ]);
        
        $file_nilai = $request->file('file_nilai');
        $file_tanggungan = $request->file('file_tanggungan');
        $file_penghasilan = $request->file('file_penghasilan');
        $file_pekad = $request->file('file_pekad');
        $file_penon = $request->file('file_penon');
        $file_ukt = $request->file('file_ukt');

        $nama_file_nilai = time()."_".$file_nilai->getClientOriginalName();
        $nama_file_tanggungan = time()."_".$file_tanggungan->getClientOriginalName();
        $nama_file_penghasilan = time()."_".$file_penghasilan->getClientOriginalName();
        
        if($file_pekad){
            $nama_file_pekad = time()."_".$file_pekad->getClientOriginalName();
        }

        if($file_penon){
            $nama_file_penon = time()."_".$file_penon->getClientOriginalName();
        }
        
        $nama_file_ukt = time()."_".$file_ukt->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'assets/file_upload';
                // upload file
        $file_tanggungan->move($tujuan_upload,$nama_file_tanggungan);
        $file_nilai->move($tujuan_upload,$nama_file_nilai);
        $file_penghasilan->move($tujuan_upload,$nama_file_penghasilan);
        if($file_pekad){$file_pekad->move($tujuan_upload,$nama_file_pekad);}
        if($file_penon){$file_penon->move($tujuan_upload,$nama_file_penon);}
        $file_ukt->move($tujuan_upload,$nama_file_ukt);

        $data =  new kriteria;
        $data->email_mhs = $request->id_mhs;
        $data->id_adm = $request->id_adm;
        $data->role_kriteria = $request->role;
        $data->nilai = $request->nilai;
        $data->file_nilai = $nama_file_nilai;
        $data->penghasilan = $request->penghasilan;
        $data->file_penghasilan = $nama_file_penghasilan;
        $data->tanggungan = $request->tanggungan;
        $data->file_tanggungan = $nama_file_tanggungan;
        $data->ukt = $request->ukt;
        $data->file_ukt = $nama_file_ukt;
        $data->prestasi_akd = $request->prestasi_akd;
        if($file_pekad){$data->file_pekad = $nama_file_pekad;}else{$data->file_pekad = 'Tidak ada';}
        $data->prestasi_nonakd = $request->prestasi_nonakd;
        if($file_penon){$data->file_penon = $nama_file_penon;}else{$data->file_penon = 'Tidak ada';}
        $data->save();

        User::where('id',auth::user()->id)->update([
            'sudah' => $request->sudah,
        ]);

        Student::where('email_mhs',auth::user()->email)->update([
            'nama_ayah' => $request->nama_ayah,
            'nama_ibu' => $request->nama_ibu,
            'pekerjaan_ayah' => $request->pekerjaan_ayah,
            'pekerjaan_ibu' => $request->pekerjaan_ibu,
            'norek' => $request->norek,
            'ket_tambahan' => $request->keterangan_tambahan,

        ]);

        return redirect('/lengkapi')->with('status','Proses melengkapi data berhasil');
    }

    public function statusPendaftaran(){
        $data['title'] = 'Status pendaftaran';
        $data['data'] = DB::table('donaturs')
        ->join('langsungs','langsungs.email_donatur','=','donaturs.email')
        ->where('email_mhs',auth::user()->email)->get();

        return view('mahasiswa.statusPendaftaran',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Register Mahasiswa';
        return view('auth.registerStudent',$data);
    }


    public function tambahNew(Request $request){

    $user = new user;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->image = $request->image;
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
        $tambah->image_mhs = $request->image;
        $tambah->role= $request->role;
        $tambah->email_mhs = $request->email;
        $tambah->email_donatur = 0;
        $tambah->save();

        return redirect('dataPendaftar')->with('status','Tambah data berhasil dilakukan');
    }

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
        $data['title'] = 'Edit data';
        $data['d'] = DB::table('students')->where('email_mhs',$id)->get();
        return view('mahasiswa.edit',$data); 
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

        $data = DB::table('students')->find($request->id);
        // return var_dump($data->image);
        
        if($request->hasFile('image')){
        File::delete('assets/images/avatars/'. $data->image_mhs);
        $image = $request->file('image');
        $nama_image = time()."_".$image->getClientOriginalName();

        $tujuan_upload = 'assets/images/avatars';

        $image->move($tujuan_upload,$nama_image);

        Student::where('id',$request->id)->update([
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'email_mhs' => $request->email_mhs,
            'nohp_mhs' => $request->nohp_mhs,
            'alamat_mhs' => $request->alamat,
            'image_mhs' => $nama_image,
        ]);

        User::where('email',Auth::user()->email)->update([
            'name' => $request->nama,
            'image' => $nama_image,
        ]);

        }else{
            Student::where('email_mhs',Auth::user()->email)->update([
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'email_mhs' => $request->email_mhs,
            'nohp_mhs' => $request->nohp_mhs,
            'alamat_mhs' => $request->alamat,
            'image_mhs' => auth::user()->image,
            ]);

            User::where('email',Auth::user()->email)->update([
            'name' => $request->nama,
            'image' => auth::user()->image,
        ]);
        }

        return redirect('/profileMah')->with('status','Proses edit data berhasil dilakukan');
    }

    public function editPasswordStudent(){
        $data['title']='Edit Password';
        return view('mahasiswa.editPasswordStudent',$data);
    }

    public function changePasswordStudent(Request $request){
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

    public function editLengkapi($email){
        $data['title'] = 'Edit persyaratan';
        $data['data'] = DB::table('kriterias')->where('email_mhs',$email)->get();
        return view('mahasiswa.editSyarat',$data);
    }

    public function editSyarat(Request $request){
        $id = $request->id_edit;
        $data = DB::table('kriterias')->find($id);

        $this->validate($request, [
            'file_nilai' => 'nullable|file|mimes:jpeg,jpg,pdf|max:300',
            'file_tanggungan' => 'nullable|file|mimes:jpeg,jpg,pdf|max:300',
            'file_penghasilan' => 'nullable|file|mimes:jpeg,jpg,pdf|max:300',
            'file_penon' => 'nullable|file|mimes:jpeg,jpg,pdf|max:300',
            'file_pekad' => 'nullable|file|mimes:jpeg,jpg,pdf|max:300',
        ]);

        if($request->hasFile('file_tanggungan')){
            File::delete('assets/file_upload/'. $data->file_tanggungan);
            $file_tanggungan = $request->file('file_tanggungan');
            $nama_file_tanggungan = time()."_".$file_tanggungan->getClientOriginalName();
            $tujuan_upload = 'assets/file_upload';
            $file_tanggungan->move($tujuan_upload,$nama_file_tanggungan);
            
            Kriteria::where('id',$id)->update([
                'tanggungan' => $request->tanggungan,
                'file_tanggungan' => $nama_file_tanggungan
            ]);
        }

        if($request->hasFile('file_nilai')){
            File::delete('assets/file_upload/'. $data->file_nilai);
            $file_nilai = $request->file('file_nilai');
            $nama_file_nilai = time()."_".$file_nilai->getClientOriginalName();
            $tujuan_upload = 'assets/file_upload';
            $file_nilai->move($tujuan_upload,$nama_file_nilai);
            
            Kriteria::where('id',$id)->update([
                'nilai' => $request->nilai,
                'file_nilai' => $nama_file_nilai
            ]);
        }

        if($request->hasFile('file_penghasilan')){
            File::delete('assets/file_upload/'. $data->file_penghasilan);
            $file_penghasilan = $request->file('file_penghasilan');
            $nama_file_penghasilan = time()."_".$file_penghasilan->getClientOriginalName();
            $tujuan_upload = 'assets/file_upload';
            $file_penghasilan->move($tujuan_upload,$nama_file_penghasilan);
            
            Kriteria::where('id',$id)->update([
                'penghasilan' => $request->penghasilan,
                'file_penghasilan' => $nama_file_penghasilan
            ]);
        }

        if($request->hasFile('file_pekad')){
            File::delete('assets/file_upload/'. $data->file_pekad);
            $file_pekad = $request->file('file_pekad');
            $nama_file_pekad = time()."_".$file_pekad->getClientOriginalName();
            $tujuan_upload = 'assets/file_upload';
            $file_pekad->move($tujuan_upload,$nama_file_pekad);
            
            Kriteria::where('id',$id)->update([
                'prestasi_akd' => $request->prestasi_akd,
                'file_pekad' => $nama_file_pekad
            ]);
        }

        if($request->hasFile('file_penon')){
            File::delete('assets/file_upload/'. $data->file_penon);
            $file_penon = $request->file('file_penon');
            $nama_file_penon = time()."_".$file_penon->getClientOriginalName();
            $tujuan_upload = 'assets/file_upload';
            $file_penon->move($tujuan_upload,$nama_file_penon);
            
            Kriteria::where('id',$id)->update([
                'prestasi_nonakd' => $request->prestasi_nonakd,
                'file_penon' => $nama_file_penon
            ]);
        }
        
        return redirect('/lengkapi')->with('status','Update data persyaratan berhasil dilakukan');
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

    public function bantuanUmum()
    {
        $data['title'] = 'Bantuan umum';
        $data['data'] = DB::table('distribusis')->where('email_mahasiswa',Auth::user()->email)->get();
        return view('mahasiswa.bantuanUmum',$data);
    }
}
