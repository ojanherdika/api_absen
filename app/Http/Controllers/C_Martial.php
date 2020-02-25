<?php

namespace App\Http\Controllers;

use App\Models\Martial;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class C_Martial extends Controller
{
	public function index(){
        $data = [
            'status' => true,
            'message' => 'Data Ditemukan',
            'code' => 200,
            'hasil' => Martial::all()
        ];
        return [
            'data'=> $data
        ];
    }

    public function inputdata(Request $request ) {
        $this->validate($request, [
            'martial_description'=>'required'
        ]);
        $inputan = Martial::create([
            'id_martial'=>Str::uuid()->toString('id_martial'),
            'martial_description'=> $request->get('martial_description')
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

    public function view($id_martial){
        $post = Martial::find($id_martial);
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

    public function update(Request $request, $id_martial){
        $post = Martial::find($id_martial);
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
	public function updatedata(Request $request, $id_martial){
	$this->validate($request,
    [
        'martial_description'=>'required'
    ]);
    $post = Martial::find($id_martial);
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

	public function delete($id_martial){
        $post = Martial::find($id_martial);
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