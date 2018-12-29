@extends('backEnd.layout')

@section('content')

    @if(@Auth::user()->permissionsGroup->webmaster_status)
        @include('backEnd.messages.view')
    @endif

@endsection