<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\Hash;
use DateTime;

class C_User extends Controller
{
	public function index(){
        $data = 
        [
            'status' => true,
            'message' => 'Data Ditemukan',     
            'code' => 200,       
            'hasil' => User::all()
        ];

        return [
            'data'=> $data
        ];
    }

    public function inputdata(Request $request) {
        $this->validate($request, [
            // 'id_user' => 'required',
            'nama'=> 'required', 
            'email'=> 'required',
            'password'=> 'required',
            // 'role'=> 'required',
            // 'created_by'=> 'required',
            // 'created_date'=> 'required',
            // 'status'=> 'required',
        ]);
        $id_user=Str::uuid()->toString('id_user');
        $inputan = User::create([
            'id_user'=>$id_user,
            'nama'=> $request->get('nama'), 
            'email'=> $request->get('email'),
            'password'=> Hash::make($request->get('password')),
            'role'=> $request->get('role'),
            'created_by'=> $request->get('created_by'),
            'created_date'=> Carbon::now()->toDateString('created_date'),
            'status'=> $request->get('status')
        ]);
        $id_karyawan=Str::uuid()->toString('id_karyawan');
        Karyawan::create([
            'id_karyawan'=>$id_karyawan,
            'id_user'=>$id_user
        ]);
        $id_company=Str::uuid()->toString('id_company');
        Company::create([
            'id_company'=>$id_company,
            'id_karyawan'=>$id_karyawan
        ]);
        $id_branch=Str::uuid()->toString('id_branch');
        Branch::create([
            'id_branch'=>$id_branch,
            'id_company'=>$id_company,
            'id_karyawan'=>$id_karyawan
        ]);
        $id_departement=Str::uuid()->toString('id_departement');
        Departement::create([
            'id_departement'=>$id_departement,
            'id_company'=>$id_company,
            'id_branch'=>$id_branch,
            'id_karyawan'=>$id_karyawan
        ]);
        $data = 
        [
            'status' => true,
            'message' => 'Berhasil Ditambahkan',
            'code' => 200,        
            'hasil' => $inputan
        ];
        return [
            'data' => $data
        ];}

    public function view($id_user){
        $post = User::find($id_user);
        if (! $post) {
            return response()->json([
                'message' => 'post not found'
            ]);
        }

        $data = 
    	['status' => true,
         'message' => 'Data Ditemukan',
         'code' => 200,
         'hasil' => $post];

        return [
            'data' => $data
        ];}

    public function update(Request $request, $id_user){
    
    $post = User::find($id_user);
    if ($post) {
        $post->update([
            'nama'=> $request->get('nama'), 
            'email'=> $request->get('email'),
            'password'=> Hash::make($request->get('password')),
            'role'=> $request->get('role'),
            'created_by'=> $request->get('created_by'),
            'created_date'=> Carbon::now()->toDateString('created_date'),
            'status'=> $request->get('status')
        ]);

        $data = 
    	['status' => true,
         'message' => 'Data Berhasil Diupdate',
         'code' => 200,
         'hasil' => $post];

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
	public function updatedata(Request $request, $id_user){
	 $this->validate($request,
    [
        'nama'=> 'required', 
        'email'=> 'required',
        'password'=> 'required',
        'role'=> 'required',
        'created_by'=> 'required',
        'created_date'=> 'required',
        'status'=> 'required',
    ]);
    $post = User::find($id_user);
    if ($post) {
        $post->update($request->all());

        $data = 
    	['status' => true,
         'message' => 'Data Berhasil Diupdate',
         'code' => 200,
         'hasil' => $post];

        return response()->json([
        	'data' => $data
        ]);}
    return response()->json([
        'status' => false,
        'message' => 'Data Gagal Diupdate',
        'code' => 404,
        'hasil' => null
    ]);}

	public function delete($id_user){
        $post = User::find($id_user);

        if ($post) {
            $post->delete();

        $data = 
    		['status' => true,
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
        ], 404);}
}