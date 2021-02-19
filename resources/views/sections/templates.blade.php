@extends('mailable::layout.app')

@section('title', 'Templates')

@section('content')

<div>
    <h5>Welcome</h5>

    {!! $content !!}
</div>

@endsection