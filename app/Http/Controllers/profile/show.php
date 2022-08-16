<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class show extends Controller
{
    public function index(Request $request){
        
        $path = $this-> getPath($request);

        return view('profile.show', [
            'path' => $path
        ]);
    }
}
