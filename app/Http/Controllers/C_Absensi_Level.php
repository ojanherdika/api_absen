<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

use App\Models\Absensi_Level;
use Illuminate\Http\Request;

class C_Absensi_Level extends Controller
{
	public function index(){
        $data = [
            'status' => true,
            'message' => 'Data Ditemukan',
            'code' => 200,
            'hasil' => Absensi_Level::all()
        ];

        return [
            'data'=> $data
        ];
    }

    public function inputdata(Request $request) {
        $this->validate($request, [
            // 'id_absensi_Level' => 'required',
            'level'=> 'required', 
            'label'=> 'required',
        ]);
        $inputan = Absensi_Level::create([
            'id_absensi_level'=>Str::uuid()->toString('id_absensi_level'),
            'level'=> $request->get('level'), 
            'label'=> $request->get('label'),
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

    public function view($id_absensi_level){
        $post = Absensi_Level::where('id_absensi_level',$id_absensi_level)->get();
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
    public function update(Request $request, $id_absensi_level){
    
    $post = Absensi_Level::find($id_absensi_level)->first();
    if ($post) {
        $post->fill($request->all())->save();
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
	public function updatedata(Request $request, $id_absensi_level){
	$this->validate($request,
    [
        'level' =>'required',
        'label' =>'required'
    ]);
    $post = Absensi_Level::where('id_absensi_level',$id_absensi_level)->get();
    if ($post) {
        $post->update([
            'level'=> $request->get('level'), 
            'label'=> $request->get('label'),
        
        ]);
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

	public function delete($id_absensi_level){
        $post = Absensi_Level::find($id_absensi_level);

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