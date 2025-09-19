<?php

namespace App\Http\Controllers\PublicDisplay;

use App\Http\Controllers\Controller;
use App\Services\DiagramSasaran;
use Illuminate\Support\Facades\Cache;

class PublicDisplayController extends Controller
{
    public function arsitekturKinerja()
    {
        $cacheKey = md5(json_encode([
            __METHOD__,
            request()->all(),
            getTahunKinerja(),
        ]));

        $data = Cache::remember($cacheKey, 60, function () {
            $data = DiagramSasaran::getCompact(satuanKerjaId: null);

            return $data;
        });

        return response()->json($data);
    }
}
