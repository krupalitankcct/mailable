@extends('mailable::layout.app')

@section('title', 'New Template')

@section('editor', true)

@section('content')

<div>
   <form action="{{ route('template.templateupdate',$mail_template->id) }}" class="form-horizontal" method="post" >
    {{ csrf_field() }}
    <div class="form-group row">
            <label class="form-control-label">{{__('mailablelang::mailable.edit_template.mailableName')}}</label>  
            <input type="text" name="mailable" id="mailable" class="form-control" placeholder="mailable" value="{{$mail_template->mailable}}">
        </div>
        <div class="form-group row">
            <label class="form-control-label">{{__('mailablelang::mailable.edit_template.subject')}}</label> 
            <input type="text" name="subject" id="subject" class="form-control" placeholder="subject" value="{{$mail_template->subject}}">
        </div>
        <div class="form-group row">
            <label class="form-control-label">{{__('mailablelang::mailable.edit_template.body')}}
            <textarea class="form-control list" id="html_template" name="html_template" >{{$mail_template->html_template}}</textarea>
            </label>
        </div>
        <div class="form-group row">
            <label class="form-control-label">{{__('mailablelang::mailable.edit_template.templatetext')}}</label>
            <input type="text" name="text_template" id="text_template" class="form-control" placeholder="Template text" value="{{$mail_template->text_template}}">
        </div>
        <div  class="form-group row">
            <button class="btn btn-info">{{__('mailablelang::mailable.button.update')}}</button>
        </div>
    </form>
</div>
   <script>
        CKEDITOR.replace( 'html_template', {
            filebrowserUploadUrl: "{{route('template.templateupload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
       
    </script>
@endsection