@extends('layouts.app')
@section('title')
    cars
@endsection
@section('content')
    <div class="d-flex justify-content-between align-item-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Cars</h2>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="/cars/create" class="btn btn-sm btn-primary">add new car</a>
        </div>
    </div>

    @if(Session::has('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>success!</strong> {{Session::get('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

    @endif


    <div class="table-responsive shadow rounded">
        <table class="table table-sm table-striped table-hover table">
            <tr>
                <th>#</th>
                <th>Make</th>
                <th>Model</th>
                <th>Produced on</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th></th>
            </tr>
            @foreach($cars as $car)
                <tr>
                    <td>{{++$loop->index}}</td>
                    <td>{{$car->make}}</td>
                    <td>{{$car->model}}</td>
                    <td>{{$car->produced_on}}</td>
                    <td>{{$car->created_at}}</td>
                    <td>{{$car->updated_at}}</td>
                    <td class="text-center">
                        <a href="{{route('cars.edit',["car"=>$car])}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-edit"></i>
                        </a>
                        <form class="d-inline" action="{{route('cars.delete',["car"=>$car])}}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <nav aria-label="Pagination" class="d-flex justify-content-between allign-item-center">
            <p></p>
            <ul class="pagination pagination-sm">
                <form class="form-inline mr-1" method="GET" action="" role="form">
                    <div class="form-group">
                        <label for="perPage">Items per page</label>
                        <select name="perPage" id="perPage" class="form-control form-control-sm ml-1" onchange="this.form.submit()">
                            <option value="5" @if($cars->perPage() == 5) selected @endif>5</option>
                            <option value="10" @if($cars->perPage() == 10) selected @endif>10</option>
                            <option value="15" @if($cars->perPage() == 15) selected @endif>15</option>
                        </select>

                    </div>

                </form>
                {{$cars->appends(['perPage' => $cars->perPage()])->links()}}


            </ul>
        </nav>

    </div>


@endsection
