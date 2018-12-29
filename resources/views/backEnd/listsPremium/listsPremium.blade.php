@extends('backEnd.layout')

@section('content')

    @if(@Auth::user()->permissionsGroup->webmaster_status)
        @include('backEnd.listsPremium.view')
    @endif

@endsection