<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Auth;



class UserController extends Controller
{
    public function index() {
        $histori=DB::table('cart')
                    ->where('user_id','=',Auth::user()->id)
                    ->paginate(20)
                    ->first();
        $data = array('title' => 'User Profil',
                    'histori'=>$histori);
        return view('user.index', $data)->with('no');
    }

    public function setting($id) {
        $itemuser = DB::table('users')
                    ->where('id','=',$id)
                    ->first();
        $data = array('title' => 'Setting Profil',
                    'itemuser' => $itemuser);
        return view('user.setting', $data);
    }

    public function uploadimage(Request $request) {
        $this->validate($request, [
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required',
        ]);
        
        $itemuser = User::where('id', $request->user_id)
                                ->first();
        if ($itemuser) {
            $fileupload = $request->file('image');
            $folder = 'assets/images';
            $itemgambar = (new ImageController)->upload($fileupload, $itemuser, $folder);
            $inputan['foto'] = $itemgambar->url;//ambil url file yang barusan diupload
            $itemuser->update($inputan);
            return back()->with('success', 'Image berhasil diupload');
        } else {
            return back()->with('error', 'User tidak ditemukan');
        }
    }

    public function update(Request $request){
        $update = DB::table('users')
        ->where('id',$request->user_id)
        ->update([
           'email' => $request->email,
           'name' => $request->name,
           'alamat' => $request->alamat,
           'phone' => $request->phone
         ]);
         $data = array('title' => 'User Profil',
                'update'=>$update);
        return view('user.index', $data);
        }
}
