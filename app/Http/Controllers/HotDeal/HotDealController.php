<?php

namespace App\Http\Controllers\HotDeal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Goutte\Client;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\Panther\Client as PantherClient;
use Illuminate\Support\Facades\Log;


class HotDealController extends Controller
{
    public function index (Request $request)
    {

        $path = $this->getPath($request);


        return view('hotdeal.hotdeal', [
            'path' => $path,
        ]);

    }
}
