<div>
    <div class="flex">
        <h4 class="text-gray-700 mr-2">댓글</h4> <p>총 {{$post->comment_count}}개</p>
    </div>
    <div class="my-4">
        @foreach($comment as $cmt)
        <div class="border-t py-3">
            <span class="px-2">{{$cmt->nickname}}</span>
            <span class="text-xs text-gray-600">{{$cmt->created_at->diffForHumans()}}</span>
            @auth
            @if (Auth::user()->id == $cmt->u_id)
            <span class="float-right">
                <form action="/comment/{{$cmt->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')

                    <input type="submit" value="삭제"
                        class="w-14 h-8 bg-rose-300 hover:bg-rose-600 text-lg text-white rounded-lg">
                </form>
            </span>
            @endif
            @endauth
        </div>
        <div class="px-2 mb-3">{!!$cmt->content!!}</div>
        @endforeach
        @auth
        <form action="{{route('comment.add')}}" method="post" enctype="multipart/form-data" onsubmit="postSubmit();"
                id="commentForm">
            @csrf
            <div class="flex border-y-2 border-emerald-700 bg-gray-100 h-40 mt-10">
                <input type="hidden" name="post_id" value="{{$post->id}}">
                <input type="hidden" name="nickname" value="{{Auth::user()->nickname}}">
                <input type="hidden" name="parent_id" value="0">
                <input type="hidden" name="board_name" value="{{$post->board_name}}">
                <textarea id="content" name="content" required value="{{old('content') ? old('content') : ''}}"
                          class="flex-grow resize-none"></textarea>
                <input type="submit" value="등록" id="submitComment"
                class="w-20 h-10 flex-0 bg-emerald-500 hover:bg-emerald-600 text-lg text-white">
            </div>
        </form>
        @endauth
    </div>
</div>

@include('components.comment-js')
