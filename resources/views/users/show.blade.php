@extends('index')

@section('tittle', 'Personal Area')

@section('content')
    {{ $user->name }}
@endsection
