<?php

namespace App\Http\Controllers\Clients;

use App\Models\User;
use App\Models\SanPham;
use App\Models\BinhLuan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $listSanPham = SanPham::orderBy('id')->get();
        return view('clients.shop', compact('listSanPham'));
    }

    
    

    public function account()
    {
        return view('clients.account');
    }

    public function showForm()
    {
        return view('clients.login'); 
    }

    public function register(Request $request){ 
        $request->merge(['chuc_vu_id' => $request->input('chuc_vu_id', 1)]);
        $data = $request->validate([
            'email' => 'required|string|email|max:255',
            'name' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'so_dien_thoai' => ['required', 'string', 'max:20', 'regex:/^[0-9]+$/'],
            'dia_chi' => ['required', 'string'],
            'chuc_vu_id' => ['required', 'integer', 'exists:chuc_vus,id'],
        ]);

        $user = User::query()->create($data);
        Auth::login($user);
        // return redirect()->intended('login');
        
    }

    public function login(Request $request){
        $user = $request->validate([
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string']
        ]);

        // dd($user); 

        if(Auth::attempt($user)){
            return redirect()->intended('/sanpham');
        }

        return redirect()->back()->withErrors([
            'email' => 'Thông tin người dùng không đúng'
        ]);
    }

    public function reviews(String $id)
    {
        $sanPham = SanPham::findOrFail($id);
        $list = SanPham::all();
        $reviews = BinhLuan::where('san_pham_id', $id)->get();

        return view('clients.detail', compact('sanPham', 'reviews', 'list'));
    
    }

 
    public function pay()
    {
        return view('clients.pay');
    }

    // public function detail(String $id)
    // {
    //     $sanPham = SanPham::findOrFail($id);
    //     $list = SanPham::get();
    //     return view('clients.detail', compact('sanPham', 'list'));
    // }

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
