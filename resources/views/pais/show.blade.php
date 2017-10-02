@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Listar País Específico
@endsection

@section('main-content')


    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">Detalhes</h3>
                    </div>

                    <div class="box-body">

                        <div class="jumbotron">

                            <h2>{{$pais->nome}}</h2>
                            <p>
                                <strong>Sigla: </strong> {{$pais->sigla}}<br>
                                <strong>Bandeira: </strong>
                                <img src="{{$pais->bandeira}}">
                            </p>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection