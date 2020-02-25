<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class C_Gender extends Controller
{
	public function index(){
        $data = [
            'status' => true,
            'message' => 'Data Ditemukan',
            'code' => 200,
            'hasil' => Gender::all()
        ];
        return [
            'data'=> $data
        ];
    }

    public function inputdata(Request $request ) {
        $this->validate($request, [
            'gender_description'=>'required'
        ]);
        $inputan = Gender::create([
            'id_gender'=>Str::uuid()->toString('id_gender'),
            'gender_description'=> $request->get('gender_description')
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

    public function view($id_gender){
        $post = Gender::find($id_gender);
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

    public function update(Request $request, $id_gender){
        $post = Gender::find($id_gender);
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
	public function updatedata(Request $request, $id_gender){
	$this->validate($request,
    [
        'gender_description'=>'required'
    ]);
    $post = Gender::find($id_gender);
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

	public function delete($id_gender){
        $post = Gender::find($id_gender);
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