@extends('layouts.app')

@section('content')
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
                    <li class="pinterest-text nav-text">{{ $error }}</li>
                @endforeach
        @endif
    </ul>

    <div class="container">
            <pin  v-bind:pin="{{$pin}}" v-bind:comments="{{$comments}}"></pin>
    </div>
@endsection