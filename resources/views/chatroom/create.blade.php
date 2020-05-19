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
                    <div class="col-md-4 text-right"><a class="btn btn-danger btn-sm"  href="{{route('chatrooms.index')}}">REGRESAR</a></div>
                    </div>
                </div>
                    {!! Form::open(['route'=>'chatrooms.store','files'=>true]) !!}
                    <div class="card-body">
                    {!! Field::text('name',['label'=>'Nombre de la sala','required']) !!}
                    {!! Field::textarea('description',['rows'=>3,'label'=>'Descripcion de la sala','required']) !!}
                    {!! Field::file('path_image',['label'=>'Imagen de la sala','required']) !!}
                     </div>
                      <div class="card-footer">
                        {!! Form::submit('GUARDAR', ['class'=>'btn btn-primary btn-block ']) !!}
                      </div>
                      {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
