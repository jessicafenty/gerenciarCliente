@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Editar Cliente
@endsection


@section('main-content')

    {{--@if($errors->any())--}}

        {{--<div class="box alert alert-danger">--}}
            {{--<div class="box-header with-border">--}}
                {{--<h3 class="box-title text-gray">Opss! Alguma coisa está errada</h3>--}}
                {{--<div class="box-tools pull-right">--}}
                    {{--<button type="button" class="btn btn-box-tool"--}}
                            {{--data-widget="remove" data-toggle="tooltip" title="Fechar">--}}
                        {{--<i class="fa fa-times"></i>--}}
                    {{--</button>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="box-body">--}}
                {{--<ul>--}}
                    {{--@foreach($errors->all() as $error)--}}
                        {{--<li>{{$error}}</li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}

    {{--@endif--}}


    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">Editar Cliente</h3>
                    </div>

                    <div class="box-body">

                        <form action="{{route('cliente.update', $cliente->id)}}" class="form-horizontal" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputNome" name="nome"
                                           value="{{$cliente->nome}}" placeholder="Nome do contato">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputDataNasc" class="col-sm-2 control-label">Data Nascimento</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputDataNasc" name="dataNasc"
                                           value="{{$cliente->dataNasc->format('d/m/Y')}}" placeholder="Data de Nascimento">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputEmail" name="email"
                                           value="{{$cliente->email}}" placeholder="E-mail">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSexo" class="col-sm-2 control-label">Sexo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputSexo" name="sexo"
                                           value="{{$cliente->sexo}}" placeholder="Sexo">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputCpf" class="col-sm-2 control-label">CPF</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputCpf" name="cpf"
                                           value="{{$cliente->cpf}}" placeholder="CPF">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputRg" class="col-sm-2 control-label">RG</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputRg" name="rg"
                                           value="{{$cliente->rg}}" placeholder="CPF">
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right btn-lg">Salvar</button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection