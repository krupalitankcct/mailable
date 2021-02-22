@extends('mailable::layout.app')

@section('title', 'New Template')

@section('editor', true)

@section('content')

<div>
     @include('mailable::sections.messages')
   <form action="{{ route('template.templatestore') }}" class="form-horizontal" method="post" >
    {{ csrf_field() }}
        <input type="hidden" name="mailable" id="mailable" class="form-control" placeholder="mailable" >
        <div class="form-group row">
            <label class="form-control-label">{{__('mailablelang::mailable.edit_template.mailableName')}}</label> 
            <input type="text" name="mailable_type" id="mailable_type" class="form-control" placeholder="mailable">
        </div>
        <div class="form-group row">
            <label class="form-control-label">{{__('mailablelang::mailable.edit_template.subject')}}</label>  
            <input type="text" name="subject" id="subject" class="form-control" placeholder="subject">
        </div>

        <div class="form-group row">
            <label class="form-control-label">{{__('mailablelang::mailable.edit_template.body')}}
                <textarea class="form-control list" id="html_template" name="html_template"></textarea>
            </label>
        </div>
        <div class="form-group row">
            <label class="form-control-label">{{__('mailablelang::mailable.edit_template.templatetext')}}</label>
            <input type="text" name="text_template" id="text_template" class="form-control" placeholder="Template text">
        </div>
        <div  class="form-group row">
            <button class="btn btn-info">{{__('mailablelang::mailable.button.create')}}</button>
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