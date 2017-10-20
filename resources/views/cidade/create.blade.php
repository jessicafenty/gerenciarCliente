@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Nova Cidade
@endsection

{{--@section('contentheader_title')--}}
{{--Contatos--}}
{{--@endsection--}}


@section('main-content')
    @if (Session::has('mensagem'))
    <div class="alert alert-success">{{Session::get('mensagem')}}</div>
    @endif

    @if($errors->any())

        <div class="box alert alert-danger">
            <div class="box-header with-border">
                <h3 class="box-title text-gray">Opss! Alguma coisa está errada</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool"
                            data-widget="remove" data-toggle="tooltip" title="Fechar">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>

    @endif


    <div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="box">

                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastro de Cidade</h3>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{action('CidadeController@store')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputNome" name="nome"
                                           value="{{old('nome')}}" placeholder="Nome da Cidade">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="idPais" class="control-label col-sm-2">
                                    <a href="{{route('estado.create')}}">Estado</a>
                                </label>
                                <div class="col-md-10">
                                    <select class="form-control" name="estado" id="estado">
                                        @foreach($estado as $value)
                                            <option value="{{$value['id']}}" {{ $value['id'] === (isset($cidade->idEstado) ? $cidade->idEstado : '' ) ? 'selected' : '' }}>{{$value['nome']}}</option>
                                        @endforeach
                                    </select>
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