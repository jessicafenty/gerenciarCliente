@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Novo Contato
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
                <h3 class="box-title text-gray">Favor preencher os campos corretamente!</h3>
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
                        <h3 class="box-title">Cadastro de Cliente</h3>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{action('ClienteController@store')}}" method="post">
                            <input type="hidden" name="_token" value="{{{csrf_token()}}}">
                            <div class="form-group">
                                <label for="inputNome" class="col-sm-2 control-label">Nome</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputNome" name="nome"
                                           value="{{old('nome')}}" placeholder="Nome do cliente">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputDataNasc" class="col-sm-2 control-label">Data Nascimento</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control input-lg" id="inputDataNasc" name="dataNasc"
                                           value="{{old('dataNasc')}}" placeholder="Data de Nascimento">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputSexo" class="col-sm-2 control-label">Sexo</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputSexo" name="sexo"
                                           value="{{old('sexo')}}" placeholder="Sexo">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">E-mail</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputEmail" name="email"
                                           value="{{old('email')}}" placeholder="E-mail">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputCpf" class="col-sm-2 control-label">CPF</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputCpf" name="cpf"
                                           value="{{old('cpf')}}" placeholder="CPF">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputRg" class="col-sm-2 control-label">RG</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputRg" name="rg"
                                           value="{{old('rg')}}" placeholder="RG">
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