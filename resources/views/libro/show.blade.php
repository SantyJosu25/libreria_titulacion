@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">libro {{ $libro->id }}</div>
                    <div class="card-body">

                        <a href="{{ url('/libro') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/libro/' . $libro->id . '/edit') }}" title="Edit libro"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                        <form method="POST" action="{{ url('libro' . '/' . $libro->id) }}" accept-charset="UTF-8" style="display:inline">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger btn-sm" title="Delete libro" onclick="return confirm('¿Desea Borrar?')"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                        </form>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $libro->id }}</td>
                                    </tr>
                                    <tr><th> ISBN </th><td> {{ $libro->ISBN }} </td></tr><tr><th> Titulo </th><td> {{ $libro->Titulo }} </td></tr><tr><th> Fecha </th><td> {{ $libro->Fecha }} </td></tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
