<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class C_Departement extends Controller
{
	public function index(){
        $data = [
            'status' => true,
            'message' => 'Data Ditemukan',
            'code' => 200,
            'hasil' => Departement::all()
        ];
        return [
            'data'=> $data
        ];
    }

    public function inputdata(Request $request ) {
        $this->validate($request, [
            'id_company'=>'required',
            'id_branch'=>'required',
            'alias'=>'required',
            'nama'=>'required',
            'created_by'=>'required',
            'id_karyawan'=>'required',
            'type'=>'required'
            
        ]);
        $inputan = Departement::create([
            'id_departement'=>Str::uuid()->toString('id_departement'),
            'id_company'=> $request->get('id_company'),
            'id_branch'=> $request->get('id_branch'),
            'alias'=> $request->get('alias'),
            'nama'=> $request->get('nama'),
            'created_by'=> $request->get('created_by'),
            'id_karyawan'=> $request->get('id_karyawan'),
            'created_time'=> Carbon::now()->format('H:i:s'),
            'type'=> $request->get('type')
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

    public function view($id_departement){
        $post = Departement::find($id_departement);
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

    public function update(Request $request, $id_departement){
        $post = Departement::find($id_departement);
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
	public function updatedata(Request $request, $id_departement){
	$this->validate($request,
    [
        'nama' =>'required',
        'kehadiran' =>'required'
    ]);
    $post = Departement::find($id_departement);
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

	public function delete($id_departement){
        $post = Departement::find($id_departement);
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