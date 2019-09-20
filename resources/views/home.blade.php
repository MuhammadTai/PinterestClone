@extends('layouts.app')

@section('content')

<div class="container-fluid" style="min-height: 100vh;">
    <pin-list v-bind:pins="{{$pins}}"/>
</div>

@endsection
