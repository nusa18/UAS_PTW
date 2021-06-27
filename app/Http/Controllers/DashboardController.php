<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    public function index() {
        $orderbaru = DB::table('cart')->where('status_pembayaran', '=', "belum");
        $transaction = DB::table('cart');
        $members = DB::table('users')
        ->where('role', '=', "member");
        
        $product = DB::table('produk');
        $order=count(array($orderbaru));
        $produk=count(array($product));
        $member=count(array($members));
        
        
        $transaksi=count(array($transaction));
        $data = array('title' => 'Dashboard',
        'order' => $order,
        'produk'=> $produk,
        'member'=> $member,
        'transaksi'=> $transaksi
    );
        
        return view('dashboard.index', $data);
    }

}




    
    
