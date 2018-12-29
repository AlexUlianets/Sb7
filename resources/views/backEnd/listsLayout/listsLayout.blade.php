@extends('backEnd.layout')

@section('content')

    @if(@Auth::user()->permissionsGroup->webmaster_status)
        @include('backEnd.listsLayout.view')
    @endif

@endsection