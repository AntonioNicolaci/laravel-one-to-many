@extends('admin.layouts.base')

@section('contents')

    <h1>{{ $work->title }}</h1>
    <h2>Type: {{ $work->type->name }}</h2>
    <p>{{ $work->short_description}}</p>
    <div>
        <a href="{{ $work->link}}">Link Progetto</a>
        <a href="{{ $work->github}}">Link Repo</a>
    </div>

    <img src="{{ $work->image_large }}" alt="{{ $work->title }}">

    @if ($work->image_secondary_one != null)
        <img src="{{ $work->image_secondary_one }}" alt="{{ $work->title }}">
    #endif
    @if ($work->image_secondary_two != null)
        <img src="{{ $work->image_secondary_two }}" alt="{{ $work->title }}">
    #endif
    @if ($work->image_secondary_three != null)
        <img src="{{ $work->image_secondary_three }}" alt="{{ $work->title }}">
    #endif

    <p>{{ $work->description}}</p>

@endsection