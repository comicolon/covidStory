<?php

namespace App\Http\Controllers\covidInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\covidNews;
use Illuminate\Support\Facades\Auth;

class covidNewsController extends Controller
{
    public function index(Request $request){
        
        $path = $this-> getPath($request);
        $covidNews = covidNews::latest()->get();

        return view('covidInfo.covidNews.covidNewsIndex', [
            'path' => $path,
            'covidNews' => $covidNews,
        ]);
    }

    public function create(Request $request){

        $path = $this-> getPath($request);
        return view('covidInfo.covidNews.covidNewsCreate', [
            'path' => $path
        ]);
    }

    public function store(Request $request)
    {
        $validation = $request -> validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'content' => 'required',
            'source' => 'required'
        ]);

        $news = new covidNews();
        $news -> u_id = Auth()->user()->id;
        $news -> u_nickname = Auth()->user()->nickname;
        $news -> title = $validation['title'];
        $news -> content = $validation['content'];
        $news -> source = $validation['source'];

        if($request -> hasFile('image')){
            $fileName = time().'_'.$request -> file('image') -> getClientOriginalName();
            $path = $request -> file('image') -> storeAs('public/images/news', $fileName);
            $news -> image_name = $fileName;
            $news -> image_path = $path;
        }
        $news -> save();

        // return redirect('/covidNews/'.$news -> id);
        return redirect('/covidNews/');
    }

    public function show(Request $request, covidNews $covidNews){

        $path = $this-> getPath($request);
        return view('covidInfo.covidNews.covidNewsShow', [
            'path' => $path,
            'covidNews' => $covidNews
        ]);
    }

    public function edit(Request $request, covidNews $covidNews){
        
        $path = $this-> getPath($request);

        return view('covidInfo.covidNews.covidNewsEdit', [
            'path' => $path,
            'covidNews' => $covidNews,
        ]);
    }

    public function update (Request $request, covidNews $covidNews){

        $path = $this-> getPath($request);

        $validation = $request -> validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
            'title' => 'required',
            'content' => 'required',
            'source' => 'required'
        ]);

        $news = $covidNews;
        // $news -> u_id = Auth()->user()->id;
        // $news -> u_nickname = Auth()->user()->nickname;
        $news -> title = $validation['title'];
        $news -> content = $validation['content'];
        $news -> source = $validation['source'];

        if($request -> hasFile('image')){
            $fileName = time().'_'.$request -> file('image') -> getClientOriginalName();
            $path = $request -> file('image') -> storeAs('public/images/news', $fileName);
            $news -> image_name = $fileName;
            $news -> image_path = $path;
        }
        $news -> save();

        // return redirect('/covidNews/'.$news -> id);
        return redirect('/covidNews/');

    }

    public function destroy (covidNews $covidNews)
    {
        $covidNews->delete();

        return redirect('/covidNews');
    }
}
