<?php

namespace App\Http\Controllers\board;

use App\Http\Controllers\Controller;
use App\Service\BigFunctions;
use Database\Factories\lifeStoryBoardFactory;
use Illuminate\Http\Request;
use App\Models\LifeStoryBoard;
use App\Service\baseConfig;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Mobile_Detect;

class lifeStoryController extends Controller
{
    public function index(Request $request){

        $path = $this-> getPath($request);
        $page = 1;
        $page = $request->get('page');
        $postPacket = LifeStoryBoard::latest()->take(20)->get();

        //페이징 처리
        $postViewCount = baseConfig::postViewCount;
        $pageViewCount = baseConfig::pageViewCount;
        $countAll = lifeStoryBoard::count();
        $totalPageCount = 1;                             // 페이지 갯수
        $nowPagePaket = 0;                          // 현재 페이지 묶음
        $totalViewPage = 1;                         // 보여질 페이지 총합
        $isFirst = false;                            // 1페이지 인가
        $isEnd = false;                             // 끝페이지 인가
        if ($countAll > $postViewCount)
        {
            //총 페이지수
            $totalPageCount = $countAll / $postViewCount;
            if ($countAll % $postViewCount > 0){
                $totalPageCount++;
            }

            // 한페이지에 보여줄 페이지 묶음 1페이지가 안 넘을때는 기본값이 넘어간다
            if($totalPageCount > 1){
                $nowPagePaket = intdiv($page , $pageViewCount);
                if ($nowPagePaket >= $totalPageCount / $pageViewCount){
                    if (round($page % $pageViewCount, 100) < 1){
                        $nowPagePaket++;
                    }
                }
                if($nowPagePaket == $page / $pageViewCount && $page != null){
                    $nowPagePaket--;
                }
                // 현재 페이지 묶음이 가득 채워서 보여줘야할때
                if ($nowPagePaket <= floor($totalPageCount / $pageViewCount)){
                    $totalViewPage = $nowPagePaket * $pageViewCount + $pageViewCount;
                    if ( ($totalPageCount / $pageViewCount) - $nowPagePaket < 1){
                        $totalViewPage = ($totalPageCount % $pageViewCount) + ($nowPagePaket * $pageViewCount);
                    }
                }
            }
        }
        // 이전페이지 화살표 처리
        if ($totalPageCount <= $pageViewCount){
            $isFirst = true;
        }
        if ($nowPagePaket == 0){
            $isFirst = true;
        }
        // 다음 페이지 화살표 처리
         if ($nowPagePaket >= $totalPageCount / $pageViewCount){
            $isEnd = true;
         }
         else if ($totalPageCount <= $pageViewCount){
             $isEnd = true;
         }
         if(($totalPageCount / $pageViewCount - $nowPagePaket) <= 1){
             $isEnd = true;
         }

        $postPacket = LifeStoryBoard::latest()->skip(($page -1) * $postViewCount)->take($postViewCount)->get();

//        dd($isFirst);
            return view('boards.lifeStory.lifeStoryIndex', [
                'path' => $path,
                'postPacket' => $postPacket,
                'page' => $page,
                'nowPagePaket' => $nowPagePaket,
                'totalViewPage' => $totalViewPage,
                'pageViewCount' => $pageViewCount,
                'isFirst' => $isFirst,
                'isEnd' => $isEnd,
            ]);
    }

    // 글 보기
    public function show(Request $request, lifeStoryBoard $lifeStoryBoard){

        $path = $this-> getPath($request);

        $lifeStoryBoard->views++;
        $lifeStoryBoard->update([
           'views' => $lifeStoryBoard->views,
        ]);

        $comment = $lifeStoryBoard->comment;


        return view('boards.lifeStory.lifeStoryShow', [
            'path' => $path,
            'post' => $lifeStoryBoard,
            'comment' => $comment,
        ]);
    }

    // 글 쓰기
    public function create(Request $request){
        $path = $this-> getPath($request);
        $isMo = (new BigFunctions)->isMobileCk();

        return view('boards.lifeStory.lifeStoryCreate', [
            'path' => $path,
            'isMo' => $isMo,
        ]);
    }

    public function store (Request $request){
        $validation = $request -> validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $post = new lifeStoryBoard();
        $post -> u_id = Auth()->user()->id;
        $post -> nickname = Auth()->user()->nickname;
        $post -> title = $validation['title'];
        $post -> content = $validation['content'];
        $post -> source = $request->post('source');

//        Log::info('this.', ['id' => 1]);

        $post -> save();

        // return redirect('/covidNews/'.$news -> id);
        return redirect('/lifeStory/');

    }

    public function edit(Request $request, lifeStoryBoard $lifeStoryBoard){

        $path = $this-> getPath($request);
        $isMo = (new BigFunctions)->isMobileCk();

        return view('boards.lifeStory.lifeStoryEdit', [
            'path' => $path,
            'lifeStory' => $lifeStoryBoard,
            'isMo' => $isMo,
        ]);
    }

    public function update (Request $request, lifeStoryBoard $lifeStoryBoard)
    {


        request()->validate([
            'title'=>'required',
            'content'=>'required',
        ]);

        $lifeStoryBoard->update([
            'title' => request('title'),
            'content' => request('content'),
            'source' => request('source'),
        ]);


        // return redirect('/covidNews/'.$news -> id);
        return redirect('/lifeStory/');

    }

    public function destroy (lifeStoryBoard $lifeStoryBoard)
    {
        $lifeStoryBoard->delete();

        return redirect('/lifeStory');
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
            $request->file('upload')->storeAs('public/images/board/lifeStory', $filenametostore);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/images/board/lifeStory/'.$filenametostore); // 업로드 경로 설정
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
