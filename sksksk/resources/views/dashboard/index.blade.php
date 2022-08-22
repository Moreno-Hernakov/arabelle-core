@extends('dashboard.layout.dashboard')

@section('container')
    <h1>Selamat Datang {{auth()->user()->username}}</h1>
@endsection