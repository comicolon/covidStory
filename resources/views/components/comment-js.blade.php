<script src="{{ URL::asset('js/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ URL::asset('js/ckeditor/ckeditor.js') }}"></script>
{{--<script src="{{ URL::asset('js/ckeditor/config.js') }}"></script>--}}
<script src="{{ URL::asset('js/ckeditor/adapters/jquery.js') }}"></script>


<script>

    CKEDITOR.replace( 'content',  {
            language : 'ko',			//언어설정
            uiColor : '#EEEEEE',		//ui 색상
            height : '85px',		//Editor 높이
            width : '1000px',			//Editor 넓이
            // config.contentsCss = ['resources/css/app.css'];	//홈페이지에서 사용하는 Css 파일 인클루드
            font_defaultLabel : 'Gulim',
            font_names : 'Gulim/Gulim;Dotum/Dotum;Batang/Batang;Gungsuh/Gungsuh/Arial/Arial;Tahoma/Tahoma;Verdana/Verdana',
            fontSize_defaultLabel : '12px',
            fontSize_sizes : '8/8px;9/9px;10/10px;11/11px;12/12px;14/14px;16/16px;18/18px;20/20px;22/22px;24/24px;26/26px;28/28px;36/36px;48/48px;',
            enterMode : CKEDITOR.ENTER_BR,		//엔터키 입력시 br 태그 변경
            // config.shiftEnterMode = CKEDITOR.ENTER_P;	//엔터키 입력시 p 태그로 변경
            // config.startupFocus = true;					// 시작시 포커스 설정
            allowedContent : true,				// 기본적인 html이 필터링으로 지워지는데 필터링을 하지 않는다.
            // config.filebrowserImageUploadUrl = '/include/editor/upload/upload.asp';		//이미지 업로드 경로 (설정하면 업로드 플러그인에 탭이생김)
            // config.filebrowserFlashUploadUrl = '/include/editor/upload/upload.asp';		//플래쉬 업로드 경로 (설정하면 업로드 플러그인에 탭이생김)
            toolbarCanCollapse : true,		//툴바가 접히는 기능을 넣을때 사용합니다.
            // config.docType = "<!DOCTYPE html>";		//문서타입 설정

            // config.extraAllowedContent = 'video[*]{*};source[*]{*}';		//video , embed 등 막힌 태그를 허용하게 하는 설정

            toolbar : [
                ['Font'],['Image'],['Maximize']],

            filebrowserUploadUrl: "{{route('commentUpload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
    },

    );

    function postSubmit() {
        var data = CKEDITOR.instances.content.getData();
        $('#content').val(data);
        return true;
    }
</script>
