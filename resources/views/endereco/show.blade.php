@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Endereços do Cliente
@endsection

@section('main-content')


    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">Endereços</h3>
                    </div>

                    <div class="box-body">

                        <div class="jumbotron">

                            <h2 style="text-align: center">{{$cliente->nome}}</h2><br>

                            @foreach($enderecos as $end)
                                <div style="border-style: groove; padding: 20px">
                                    <p>
                                        <strong>Logradouro: </strong> {{$end->logradouro}}<br>
                                        <strong>Bairro: </strong> {{$end->bairro}}<br>
                                        <strong>Número: </strong> {{$end->numero}}<br>
                                        <strong>CEP: </strong> {{$end->cep}}<br>
                                        <strong>Complemento: </strong> {{$end->complemento}}<br>
                                        <strong>Ponto de Referência: </strong> {{$end->pontoRef}}<br>
                                        <strong>Cidade: </strong> {{$end->cidade->nome}}<br>
                                        <div>
                                                <a href="{{route('endereco.edit',$end->id)}}" class="btn btn-small btn-warning">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                    Editar
                                                </a>
                                                <a data-toggle="modal" href="#myModal{{$end->id}}" class="btn btn-small btn-danger">
                                                    <i class="fa fa-trash-o"></i>
                                                    Excluir
                                                </a>
                                                <a href="{{route('endereco.index')}}" class="btn btn-small btn-primary">
                                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                                    Voltar
                                                </a>
                                                <div class="modal fade modal-danger" id="myModal{{$end->id}}" role="dialog">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                <h4 class="modal-title">Excluir</h4>
                                                            </div>

                                                            <div class="modal-body text-center">
                                                                <p>Deseja realmente excluir o endereco do cliente {{$cliente->nome}}?</p>
                                                            </div>

                                                <div class="modal-footer">
                                                    {!! Form::open(array('route' => array('endereco.destroy', $end->id), 'method' => 'delete')) !!}
                                                    {!! csrf_field() !!}
                                                    <button class="btn btn-danger" type="submit">Excluir</button>
                                                    <button class="btn btn-default" type="button" data-dismiss="modal">Cancelar</button>
                                                    {!! Form::close() !!}
                                                </div>

                                            </div>



                    </div>
                </div>


                                        </div>
                                </div>
                                </p>

                            @endforeach

                        </div>
    <a href="{{route('endereco.index')}}" class="btn btn-small btn-primary" style="float: right">
        <i class="fa fa-chevron-left" aria-hidden="true"></i>
        Voltar
    </a>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection


