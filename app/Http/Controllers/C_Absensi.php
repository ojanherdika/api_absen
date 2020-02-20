<?php

namespace App\Http\Controllers;

use App\Models\Absensi_Level;
use App\Models\Absensi;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class C_Absensi extends Controller
{
	public function index(){
        $data = [
            'status' => true,
            'message' => 'Data Ditemukan',
            'code' => 200,
            'hasil' => Absensi::all()
        ];
        return [
            'data'=> $data
        ];
    }

    public function inputdata(Request $request ) {
        $this->validate($request, [
            // 'id_absensi' => 'required',
            // 'checkin_date' => 'required', 
            // 'checkin_time' => 'required',
            // 'check_out_date' => 'required',
            // 'check_out_time' => 'required',
            'lattitude'=> 'required',
            'longitude'=> 'required',
            // 'id_level'=> 'required',
            // 'late_reason'=> 'required',
            // 'leave_reason'=> 'required',
        ]);
        // $cek = Absensi::select('checkin_time')->where('checkin_time','=',$request->checkin_time)->first();
        $cek = Carbon::now()->format('H:i:s');
        
        if($cek<="08:00:00"){
            $input = 1;
        }
        else if($cek>='08:00:00' && $cek<='08:30:00'){
            $input =2;
        }
        else if($cek>='08:30:00'&& $cek<='09:00:00'){
            $input = 3;
        }
        else if($cek>='09:00:00'){
            $input = 4;
            $this->validate($request, [
            'late_reason'=>'required'
            ]);
        }
        $inputan = Absensi::create([
            'id_absensi'=>Str::uuid()->toString('id_absensi'),
            'checkin_date'=> Carbon::now()->toDateString('checkin_date'), 
            'checkin_time'=> Carbon::now()->format('H:i:s'),
            'lattitude'=> $request->get('lattitude'),
            'longitude'=> $request->get('longitude'),
            'id_level'=> $input,
            'late_reason'=>$request->get('late_reason'),
            'leave_reason'=>$request->get('leave_reason')
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
    public function checkOut(Request $request ,$id_absensi){
        $cek = Carbon::now()->format('H:i:s');
        if($cek>='09:00:00' && $cek<='17:00:00'){
            $this->validate($request,[
                'leave_reason'=>'required'
            ]);
        }
        $post=Absensi::find($id_absensi);
        if($post){
            $post->update([
                'check_out_date'=> Carbon::now()->toDateString('check_out_date'),
                'check_out_time'=> Carbon::now()->format('H:i:s'),
                'leave_reason'=>$request->get('leave_reason')
            ]);
        }
        $data = [
            'status' => true,
            'message' => 'Berhasil Checkout',
            'code' => 200,
            'hasil' => $post
        ];
        return [
            'data' => $data
        ];
    }

    public function view($id_absensi){
        $post = Absensi::find($id_absensi);
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

    public function update(Request $request, $id_absensi){
    
    $post = Absensi::find($id_absensi);
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
	public function updatedata(Request $request, $id_absensi){
        $this->validate($request,
    [
        'nama' =>'required',
        'kehadiran' =>'required'
    ]);
    $post = Absensi::find($id_absensi);
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

	public function delete($id_absensi){
        $post = Absensi::find($id_absensi);

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