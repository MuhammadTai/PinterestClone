@extends('layouts.app')

@section('content')
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
                    <li class="pinterest-text nav-text">{{ $error }}</li>
                @endforeach
        @endif
    </ul>
    <div class="container-fluid">
            <pin-builder user="{{ (Auth::user()->name) }} "></pin-builder>
    </div>
@endsection