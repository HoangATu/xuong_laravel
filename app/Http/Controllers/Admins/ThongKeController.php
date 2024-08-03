<?php

namespace App\Http\Controllers\Admins;

use App\Models\DonHang;
use Illuminate\Http\Request;
use App\Models\ChiTietDonHang;
use App\Http\Controllers\Controller;

class ThongKeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $homNay = DonHang::whereDate('created_at', today())->count();
        $homQua = DonHang::whereDate('created_at', today()->subDay())->count();
        $tile = $homQua > 0 ? (($homNay - $homQua) / $homQua) * 100 : 0; 
        $statusClass = $tile > 0 ? 'text-success' : 'text-danger';
        $trendIcon = $tile > 0 ? 'trending-up' : 'trending-down';
        $statusText = $tile > 0 ? 'Increased' : 'Decreased';


        $totalSoLuong = ChiTietDonHang::whereDate('created_at', today())->sum('so_luong');
        $totalSoLuongs = ChiTietDonHang::whereDate('created_at', today()->subDay())->sum('so_luong');
        $tileSoLuong = $totalSoLuongs > 0 ? (($totalSoLuong - $totalSoLuongs) / $totalSoLuongs) * 100 : 0; 
        $statusClass = $tileSoLuong > 0 ? 'text-success' : 'text-danger';
        $trendIcon = $tileSoLuong > 0 ? 'trending-up' : 'trending-down';
        $statusText = $tileSoLuong > 0 ? '' : '';


        $totalTien = ChiTietDonHang::whereDate('created_at', today())->sum('thanh_tien');
        $totalTiens = ChiTietDonHang::whereDate('created_at', today()->subDay())->sum('thanh_tien');
        $tileTien = $totalTiens > 0 ? (($totalTien - $totalTiens) / $totalTiens) * 100 : 0; 
        $statusClass = $tileTien > 0 ? 'text-success' : 'text-danger';
        $trendIcon = $tileTien > 0 ? 'trending-up' : 'trending-down';
        $statusText = $tileTien > 0 ? '' : '';


        $totalThang = ChiTietDonHang::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('thanh_tien');
        $ThangTruoc = ChiTietDonHang::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->sum('thanh_tien');
        $tileThang = $ThangTruoc > 0 ? (($totalThang - $ThangTruoc) / $ThangTruoc) * 100 : 0;
        $formattedPercentageChange = number_format($tileThang, 2);
        $statusClass = $tileThang > 0 ? 'text-success' : 'text-danger';
        $trendIcon = $tileThang > 0 ? 'trending-up' : 'trending-down';
        $statusText = $tileThang > 0 ? '' : '';


        $listDonHang = DonHang::query()->orderByDesc('id')->get();
        return view('admins.index', compact('listDonHang','homNay', 'tile',  'totalSoLuong', 'totalTien', 'totalThang', 'statusClass','trendIcon','statusText', 'tileSoLuong', 'tileTien', 'formattedPercentageChange'));
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
