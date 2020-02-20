<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class C_Company extends Controller
{
	public function index(){
        $data = [
            'status' => true,
            'message' => 'Data Ditemukan',
            'code' => 200,
            'hasil' => Company::all()
        ];
        return [
            'data'=> $data
        ];
    }

    public function inputdata(Request $request ) {
        $this->validate($request, [ 
            'nama' => 'required',
            'telepon'=>'required',
            'alamat'=>'required',
            'website'=>'required',
            'email'=>'required',
            'created_by'=>'required',
            'id_karyawan'=>'required'
        ]);
        $inputan = Company::create([
            'id_company'=>Str::uuid()->toString('id_company'),
            'nama'=> $request->get('nama'), 
            'telepon'=>$request->get('telepon'),
            'alamat'=>$request->get('alamat'),
            'webiste'=>$request->get('website'),
            'email'=>$request->get('email'),
            'created_by'=>$request->get('created_by'),
            'created_time'=> Carbon::now()->format('H:i:s')
        ]);
        
        $data = [
            'status' => true,
            'message' => 'Berhasil Ditambahkan',
            'code' => 200,
            'hasil' => $inputan
        ];
        return [
            'data' => $data
        ];
    }

    public function view($id_company){
        $post = Company::find($id_company);
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
        ];
    }

    public function update(Request $request, $id_company){
        $post = Company::find($id_company);
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

    //update with post
	public function updatedata(Request $request, $id_company){
	$this->validate($request,
    [
        'nama' =>'required',
        'kehadiran' =>'required'
    ]);
    $post = Company::find($id_company);
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

	public function delete($id_company){
        $post = Company::find($id_company);
        if ($post) {
        $post->delete();
        $data = [
            'status' => true,
            'message' => 'Data Berhasil Dihapus',
            'code' => 200,
            'hasil' => $post
        ]; 
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