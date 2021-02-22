@extends('mailable::layout.app')

@section('title', 'Templates')

@section('content')

<div>
    {!! $html_template !!}
</div>

@endsection