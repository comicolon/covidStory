<?php

namespace App\Http\Controllers\covidInfo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\covidNews;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    public function show(Request $request, covidNews $covidNews){

        $path = $this-> getPath($request);
        return view('covidInfo.covidNews.covidNewsShow', [
            'path' => $path,
            'covidNews' => $covidNews
        ]);
    }

    public function store(Request $request)
    {

        Log::info('this.', ['title' => request('title')]);
        Log::info('this.', ['content' => request('content')]);

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

        Log::info('this.', ['id' => 1]);

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




    public function create(Request $request){

        $path = $this-> getPath($request);
        return view('covidInfo.covidNews.covidNewsCreate', [
            'path' => $path
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

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('upload')->storeAs('public/images/news', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/images/news/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
