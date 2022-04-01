@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>Mes messages</h3>

        @foreach ($messages as $message)
            {{ $message->content}}
        @endforeach
    </div>
@endsection