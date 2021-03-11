@extends('mailable::layouts.admin-app')

@section('title', 'Edit Template')

@section('editor', true)

@section('content')
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                @include('mailable::sections.messages')
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>Mail Template Management
                        </div>
                        <div class="card-body">
                        <form action="{{ route('template.templateupdate',$mail_template->id) }}" class="form-horizontal" method="post" >
                            {{ csrf_field() }}
                                <input type="hidden" name="mailable" id="mailable" class="form-control" placeholder="mailable">
                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">{{__('mailablelang::mailable.edit_template.mailableName')}}</label>
                                    <div class="col-md-10">
                                    <input type="text" name="mailable_type" id="mailable_type" class="form-control" placeholder="mailable" value="{{$mail_template->mailable_type}}">
                                    </div><!--col-->
                                </div><!--form-group-->
                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">{{__('mailablelang::mailable.edit_template.subject')}}</label>
                                    <div class="col-md-10">
                                    <input type="text" name="subject" id="subject" class="form-control" placeholder="subject" value="{{$mail_template->subject}}">
                                    </div><!--col-->
                                </div><!--form-group-->
                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">{{__('mailablelang::mailable.edit_template.body')}}</label>
                                    <div class="col-md-10">
                                    <textarea class="form-control list" id="html_template" name="html_template">{{$mail_template->html_template}}</textarea>
                                    </div><!--col-->
                                </div><!--form-group-->
                                <div class="form-group row">
                                    <label class="col-md-2 form-control-label">{{__('mailablelang::mailable.edit_template.templatetext')}}</label>
                                    <div class="col-md-10">
                                    <input type="text" name="text_template" id="text_template" class="form-control" placeholder="Template text" value="{{$mail_template->text_template}}">
                                    </div><!--col-->
                                </div><!--form-group-->
                                <div class="row">
                                    <div class="col-sm-6">
                                            <a href = "{{URL::previous()}}" class = 'btn btn-danger'>Cancel</a>
                                    </div><!--col-->
                                    <div class="col-sm-6 text-right">
                                        <button class="btn btn-info">{{__('mailablelang::mailable.button.update')}}</button>
                                    </div><!--col-->
                                </div><!--row-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <script>
        CKEDITOR.replace( 'html_template', {
            filebrowserUploadUrl: "{{route('template.templateupload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
       
    </script>
@endsection