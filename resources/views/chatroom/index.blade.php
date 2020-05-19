@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8">
                            <h6>CHAT ROOMS</h6>
                        </div>
                    <div class="col-md-4 text-right">
                        @can('create-chatroom')
                        <a class="btn btn-primary btn-sm"  href="{{route('chatrooms.create')}}">CREAR</a>
                        @endcan
                    </div>
                    </div>
                <div class="card-body">
                      <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Estado</th>
                          </tr>
                        </thead>
                        <tbody>
                              @forelse ($chatrooms as $rooms)
                            <tr>
                            <th scope="row">{{$rooms->id}}</th>
                            <td>{{$rooms->name}}</td>
                            <td>{{ $rooms->description}}</td>
                              <td>
                                {!! Form::open(['route'=>['chatrooms.destroy',$rooms], 'method'=>'DELETE','onsubmit'=>'return confirm("Esta segurp que desseas eliminar el registro")']) !!}
                               @can('edit-chatroom')
                               <a href="{{route('chatrooms.edit', $rooms)}}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                               @endcan
                               @can('delete-chatroom')
                              {!!Form::button("<i class ='fa fa-trash'></i>",['type'=>'submit','class'=>'btn btn-danger btn-sm']) !!}
                               @endcan
                              {!! Form::close() !!}
                            </td>
                            </tr>
                              @empty
                              <tr><td colspan="4">NO EXISTEN SALAS DE CHAT</td></tr>
                              @endforelse

                        </tbody>
                      </table>
                </div>
                <div class="card-footer">
                   {{$chatrooms->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
