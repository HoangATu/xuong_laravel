<?php

namespace App\Http\Controllers\Api;

use App\Models\BaiViet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BaiVietRequest;
use App\Http\Resources\BaiVietResource;
use Illuminate\Support\Facades\Storage;

class ApiBaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $baiViet = BaiViet::query()->get();
        return BaiVietResource::collection($baiViet);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BaiVietRequest $request)
    {
        $params = $request->all();
        // dd($params);
        if($request -> hasFile('hinh_anh')) {
            $filename = $request->file('hinh_anh')->store('uploads/baiviet', 'public');
            $params['hinh_anh'] = $filename;
        }

        $baiViet = BaiViet::create($params);
        return response()->json([
            'data' => new BaiVietResource($baiViet),
            'status'=> true,
            'message' => 'Bai Viet da duoc them thanh cong'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $baiViet = BaiViet::query()->findOrFail($id);
        return new BaiVietResource($baiViet);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $baiViet = BaiViet::query()->findOrFail($id);
        $params = $request->all();
        //Xử lý hình ảnh
        if($request->hasFile('hinh_anh')) {
            if($baiViet->hinh_anh && Storage::disk('public')->exists($baiViet->hinh_anh)){
                Storage::disk('public')->delete($baiViet->hinh_anh);
            }
            $filename = $request->file('hinh_anh')->store('uploads/baiviet', 'public');
            $params['hinh_anh'] = $filename;
        }
        $baiViet->update($params);
        return response()->json([
            'data' => new BaiVietResource($baiViet),
            'status'=> true,
            'message' => 'Bai Viet da duoc sưa thanh cong'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $baiViet = BaiViet::query()->findOrFail($id);
       
            if($baiViet->hinh_anh && Storage::disk('public')->exists($baiViet->hinh_anh)){
                Storage::disk('public')->delete($baiViet->hinh_anh);
            }

        $baiViet->delete();
        return response()->json([
            'data' => new BaiVietResource($baiViet),
            'status'=> true,
            'message' => 'Xoa Bai Viet thanh cong'
        ], 200);

    }
}
