<script src="{{ URL::asset('js/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ URL::asset('js/ckeditor/ckeditor.js') }}"></script>
<script src="{{ URL::asset('js/ckeditor/config.js') }}"></script>
<script src="{{ URL::asset('js/ckeditor/adapters/jquery.js') }}"></script>

<script>

$(document).ready(function (){
   if ($('#board_name').val() == 'covidNews'){
        CKEDITOR.replace( 'content', {
            filebrowserUploadUrl: "{{route('covidNewsUpload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
   }
   else if ($('#board_name').val() == 'lifeStory'){
       CKEDITOR.replace( 'content', {
           filebrowserUploadUrl: "{{route('lifeStoryUpload', ['_token' => csrf_token() ])}}",
           filebrowserUploadMethod: 'form'
       });
   }
});

function postSubmit() {
    var data = CKEDITOR.instances.content.getData();
    $('#content').val(data);
    return true;
}
</script>
