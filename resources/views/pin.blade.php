@extends('layouts.app')

@section('content')
    <div class="container-fluid">
            <pin v-bind:pin="{{$pin}}" v-bind:comments="{{$comments}}"></pin>
    </div>
@endsection