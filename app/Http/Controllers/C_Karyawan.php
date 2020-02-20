<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class C_Karyawan extends Controller
{
	public function index(){
        $data = [
            'status' => true,
            'message' => 'Data Ditemukan',
            'code' => 200,
            'hasil' => Karyawan::all()
        ];

        return [
            'data'=> $data
        ];}

    public function view($id_karyawan){
        $post = Karyawan::find($id_karyawan);
        if (! $post) {
            return response()->json([
                'message' => 'post not found'
            ]);
        }

        $data = [
            'status' => true,
            'message' => 'Data Ditemukan',
            'code' => 200,
            'hasil' => $post
        ];
        return [
            'data' => $data
        ];}

    public function update(Request $request, $id_karyawan){
    
    $post = Karyawan::find($id_karyawan);
    if ($post) {
        $post->update($request->all());

        $data = [
            'status' => true,
            'message' => 'Data Berhasil Diupdate',
            'code' => 200,
            'hasil' => $post
        ];
        return response()->json([
            'data' => $data
        ]);
    }
    return response()->json([
        'status' => false,
        'message' => 'Data Gagal Diupdate',
        'code' => 404,
        'hasil' => null
    ]);}

    //update with post
	public function updatedata(Request $request, $id_karyawan){
        $this->validate($request,
    [
        'nama' =>'required',
        'kehadiran' =>'required'
    ]);
    $post = Karyawan::find($id_karyawan);
    if ($post) {
        $post->update($request->all());
        $data = [
            'status' => true,
            'message' => 'Data Berhasil Diupdate',
            'code' => 200,
            'hasil' => $post
        ];
        return response()->json([
            'data' => $data
        ]);
    }
    return response()->json([
        'status' => false,
        'message' => 'Data Gagal Diupdate',
        'code' => 404,
        'hasil' => null
    ]);
}

	public function delete($id_karyawan){
        $post = Karyawan::find($id_karyawan);

        if ($post) {
            $post->delete();

        $data = [
            'status' => true,
            'message' => 'Data Berhasil Dihapus',
            'code' => 200,
            'hasil' => $post]; 
            return response()->json([
                'data' => $data
            ]);
        }
        return response()->json([
            'status' => false,
            'message' => 'Data Gagal Dihapus',
            'code' => 404,
            'hasil' => null
        ], 404);
    }

}

// public function inputdata(Request $request) {
    //     $this->validate($request, [
    //         // 'id_karyawan' => 'required',
    //         // 'nama_lengkap'=> 'required', 
    //         // 'nama_panggilan'=> 'required',
    //         // 'alamat_domisili'=> 'required',
    //         // 'negara_domisili'=> 'required',
    //         // 'provinsi_domisili'=> 'required',
    //         // 'kota_domisili'=> 'required',
    //         // 'tempat_lahir'=> 'required',
    //         // 'tanggal_lahir'=> 'required',
    //         // 'agama'=> 'required',
    //         // 'gol_darah'=> 'required',
    //         // 'alamat_asal'=> 'required',
    //         // 'negara_asal'=> 'required',
    //         // 'provinsi_asal'=> 'required',
    //         // 'kota_asal'=> 'required',
    //         // 'nik'=> 'required',
    //         // 'kewarganegaraan'=> 'required',
    //         // 'no_passport'=> 'required',
    //         // 'status_perkawinan'=> 'required',
    //         // 'gender'=> 'required',
    //         // 'suku_bangsa'=> 'required',
    //         // 'id_posisi'=> 'required',
    //         // 'id_user'=> 'required',
    //     ]);
    //     $inputan = Karyawan::create([
            
    //         'nama_lengkap'=> $request->get('nama_lengkap'),
    //         'nama_panggilan'=>$request->get('nama_panggilan'),
    //         'alamat_domisili'=>$request->get('alamat_domisili'),
    //         'negara_domisili'=>$request->get('negara_domisili'),
    //         'provinsi_domisili'=>$request->get('provinsi_domisili'),
    //         'kota_domisili'=>$request->get('kota_domisili'),
    //         'tempat_lahir'=>$request->get('tempat_lahir'),
    //         'tanggal_lahir'=>$request->get('tanggal_lahir'),
    //         'agama'=>$request->get('agama'),
    //         'gol_darah'=>$request->get('gol_darah'),
    //         'alamat_asal'=>$request->get('alamat_asal'),
    //         'negara_asal'=>$request->get('negara_asal'),
    //         'provinsi_asal'=>$request->get('provinsi_asal'),
    //         'kota_asal'=>$request->get('kota_asal'),
    //         'nik'=>$request->get('nik'),
    //         'kewarganegaraan'=>$request->get('kewarganegaraan'),
    //         'no_passport'=>$request->get('no_passport'),
    //         'status_perkawinan'=>$request->get('status_perkawinan'),
    //         'gender'=>$request->get('gender'),
    //         'suku_bangsa'=>$request->get('suku_bangsa'),
    //         'id_posisi'=>$request->get('id_posisi'),
    //     ]);
    //     $data = 
    // 	['status' => true,
    //      'message' => 'Berhasil Ditambahkan',
    //      'code' => 200,
    //      'hasil' => $inputan];

    //     return [
    //         'data' => $data
    //     ];}
