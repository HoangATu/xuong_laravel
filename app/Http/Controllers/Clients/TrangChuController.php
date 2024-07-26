<?php

namespace App\Http\Controllers\Clients;

use App\Models\SanPham;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrangChuController extends Controller
{
    /** 
     * Display a listing of the resource.
     */
    public $san_phams;
    public function __construct(){
        $this->san_phams=new SanPham ();
    }
    public function index()
    {
        $listSanPham = SanPham::orderBy('id')->get();
        return view('clients.index', compact('listSanPham'));
    }

    public function wishlist()
    {
        return view('clients.wishlist');
    }

    public function shop()
    {
        return view('clients.shop');
    }

    public function cart()
    {
        return view('clients.cart');
    }

    public function account()
    {
        return view('clients.account');
    }

    public function login()
    {
        return view('clients.login');
    }

    public function pay()
    {
        return view('clients.pay');
    }

    public function detail()
    {
        return view('clients.detail');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
