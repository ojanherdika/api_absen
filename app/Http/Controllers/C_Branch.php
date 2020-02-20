<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class C_Branch extends Controller
{
	public function index(){
        $data = [
            'status' => true,
            'message' => 'Data Ditemukan',
            'code' => 200,
            'hasil' => Branch::all()
        ];
        return [
            'data'=> $data
        ];
    }

    public function inputdata(Request $request ) {
        $this->validate($request, [
            'id_company'=>'required',
            'uniq_code'=>'required',
            'lokasi'=>'required',
            'latitude'=>'required',
            'longitude'=>'required',
            'created_by'=>'required',
            'id_karyawan'=>'required',
            
        ]);
        $inputan = Branch::create([
            'id_branch'=>Str::uuid()->toString('id_branch'),
            'id_company'=> $request->get('id_company'),
            'uniq_code'=> $request->get('uniq_code'),
            'lokasi'=> $request->get('lokasi'),
            'longitude'=> $request->get('longitude'),
            'latitude'=> $request->get('latitude'),
            'created_by'=> $request->get('created_by'),
            'id_karyawan'=> $request->get('id_karyawan'), 
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

    public function view($id_branch){
        $post = Branch::find($id_branch);
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

    public function update(Request $request, $id_branch){
        $post = Branch::find($id_branch);
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
	public function updatedata(Request $request, $id_branch){
	$this->validate($request,
    [
        'nama' =>'required',
        'kehadiran' =>'required'
    ]);
    $post = Branch::find($id_branch);
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

	public function delete($id_branch){
        $post = Branch::find($id_branch);
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