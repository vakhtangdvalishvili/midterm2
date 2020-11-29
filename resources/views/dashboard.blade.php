@extends('layouts.app')
@section('title')
    dashboard
@endsection
@section('content')
    <p>number of items {{DB::table('cars')->count()}}</p>
@endsection
