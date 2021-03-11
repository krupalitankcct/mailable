@extends('mailable::layouts.admin-app')

@section('title', 'View Template')

@section('content')

<div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    @include('mailable::sections.messages')
                    <div class="card">
                        <div class="card-header">
                            <i class="fa fa-align-justify"></i>Mail Template Management

                            <div class="m-portlet__head-tools float-right">
                                <a class="btn btn-success" routerlink="add" routerlinkactive="active" style="margin-right:10px;" ng-reflect-router-link="add" ng-reflect-router-link-active="active" href="{{ route('template.templatecreate') }}">
                                    <span><i class="cil-user-plus">Add</i><span></span></span>
                                </a>
                            </div>
                        </div>
                        <br>
                        <div class="card-body">

                            <table class="table table-responsive-sm table-striped">
                                <thead>
                                <tr>
                                    <th>Mailable Type</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Operation</th>
                                </tr>
                                
                                </thead>
                                <tbody>

                                    @if($mail_template->count() > 0)
                                    @foreach($mail_template as $mail_templates)
                                        <tr>
                                            <td>{{ $mail_templates->mailable_type }}</td>
                                            <td>{{ $mail_templates->subject }}</td>
                                            <td>
                                                @if($mail_templates->status == 'Active')
                                                    <a href="{{ route('template.templateinactive',$mail_templates->id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Click to Inactive">
                                                    Active
                                                    </a>
                                                @else
                                                    <a href="{{ route('template.templateactive',$mail_templates->id) }}" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Click to Active">
                                                     InActive   
                                                    </a>
                                                @endif
                                            </td>

                                          	<td>
                                                <div class='btn-group'>
                                                <a href="{{ route('template.templateedit',$mail_templates->id) }}"  class='btn btn-info'><i class="glyphicon glyphicon-edit"></i>Edit</a><a href="{{ route('template.templatedestroy',$mail_templates->id) }}"  class='btn btn-danger'><i class="glyphicon glyphicon-remove"></i>Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @else
                                        <tr>
                                            <td colspan="100%" align="center"></td>
                                        </tr>
                                    @endif
                                   
                               
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
