@extends('layouts.app')
@section('title')
    create new car
@endsection
@section('content')
    <div class="d-flex justify-content-between align-item-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Create a New Car</h2>
    </div>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('cars.store')}}" method="post">
        @csrf
        <div class="row form-group">
            <div class="col-md-12">
                <label for="">Make: </label>
                <input type="text" name="make" class="form-control @if($errors->has('make')) is-invalid @endif" value="{{old('make')}}" >
                @if($errors->has('make'))
                <span class="text-danger">{{$errors->first('make')}}</span>
                @endif
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="">Model: </label>
                <input type="text" name="model" class="form-control @if($errors->has('model')) is-invalid @endif" value="{{old('model')}}">
                @if($errors->has('model'))
                    <span class="text-danger">{{$errors->first('model')}}</span>
                @endif
            </div>
        </div>
        <div class="row form-group">
            <div class="col-md-12">
                <label for="">Produced on: </label>
                <input type="date" name="produced_on" class="form-control @if($errors->has('produced_on')) is-invalid @endif" value="{{old('produced_on')}}">
                @if($errors->has('produced_on'))
                    <span class="text-danger">{{$errors->first('produced_on')}}</span>
                @endif
            </div>
        </div>
        <div class="row-from-group">
            <div class="col-md-12">
                <button type="submit" class="btn btn-success float-right">create</button>
            </div>
        </div>
    </form>
@endsection
