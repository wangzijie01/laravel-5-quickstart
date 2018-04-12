<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function index(Request $request)
    {
        $file = $request->file('file');
        if (! $file) {
            return response()->json([
                'status_code' => '201',
                'message' => '没有获取到上传文件',
            ]);
        }

        $mimeType = $file->getClientMimeType();
        if (! str_contains($mimeType, 'image/')) {
            return response()->json([
                'status_code' => '201',
                'message' => '图片格式错误',
            ]);
        }
        $path = 'images/'.date('Ymd');
        $filePath = $file->store($path);

        return response()->json([
            'status_code' => '200',
            'url' => Storage::url($filePath),
        ]);
    }
}
