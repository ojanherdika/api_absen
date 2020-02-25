<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class C_Skill extends Controller
{
	public function index(){
        $data = [
            'status' => true,
            'message' => 'Data Ditemukan',
            'code' => 200,
            'hasil' => Skill::all()
        ];
        return [
            'data'=> $data
        ];
    }

    public function inputdata(Request $request ) {
        $this->validate($request, [
            'skill_name'=>'required',
            'description'=>'required',
            'id_karyawan'=>'required',
            'score'=>'required'
        ]);
        $inputan = Skill    ::create([
            'id_skill'=>Str::uuid()->toString('id_skill'),
            'skill_name'=> $request->get('skill_name'),
            'description'=> $request->get('description'),
            'id_karyawan'=> $request->get('id_karyawan'),
            'score'=> $request->get('score')
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

    public function view($id_skill){
        $post = Skill   ::find($id_skill);
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

    public function update(Request $request, $id_skill){
        $post = Skill   ::find($id_skill);
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
	public function updatedata(Request $request, $id_skill){
	$this->validate($request,
    [
        'skill_name'=>'required',
        'description'=>'required',
        'id_karyawan'=>'required',
        'score'=>'required'
    ]);
    $post = Skill::find($id_skill);
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

	public function delete($id_skill){
        $post = Skill   ::find($id_skill);
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