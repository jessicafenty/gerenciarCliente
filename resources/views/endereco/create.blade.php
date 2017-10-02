@extends('adminlte::layouts.app')

@section('htmlheader_title')
    Novo Endereço
@endsection

{{--@section('contentheader_title')--}}
{{--Contatos--}}
{{--@endsection--}}


@section('main-content')
    {{--@if (Session::has('mensagem'))--}}
    {{--<div class="alert alert-success">{{Session::get('mensagem')}}</div>--}}
    {{--@endif--}}

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
                        <h3 class="box-title">Cadastro de Endereço</h3>
                    </div>

                    <div class="box-body">

                        <form class="form-horizontal" action="{{action('EnderecoController@store')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}


                            <div class="form-group">
                                <label for="inputLogradouro" class="col-sm-2 control-label">Logradouro</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputLogradouro" name="logradouro"
                                           value="{{old('logradouro')}}" placeholder="Logradouro">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputBairro" class="col-sm-2 control-label">Bairro</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputBairro" name="bairro"
                                           value="{{old('bairro')}}" placeholder="Bairro">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputNumero" class="col-sm-2 control-label">Número</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control input-lg" id="inputNumero" name="numero"
                                           value="{{old('numero')}}" placeholder="Número">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputCep" class="col-sm-2 control-label">CEP</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputCep" name="cep"
                                           value="{{old('cep')}}" placeholder="CEP">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputComplemento" class="col-sm-2 control-label">Complemento</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputComplemento" name="complemento"
                                           value="{{old('complemento')}}" placeholder="Complemento">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="inputPontoRef" class="col-sm-2 control-label">Ponto de Referência</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control input-lg" id="inputPontoRef" name="pontoRef"
                                           value="{{old('pontoRef')}}" placeholder="Ponto de Referência">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="idPais" class="control-label col-sm-2">
                                    <a href="{{route('pais.create')}}">País</a>
                                </label>
                                <div class="col-md-10">
                                    <select class="form-control" name="pais" id="pais">
                                        @foreach($pais as $value)
                                            <option value="{{$value['id']}}" {{ $value['id'] === (isset($estado->idPais) ? $estado->idPais : '' ) ? 'selected' : '' }}>{{$value['nome']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="idEstado" class="control-label col-sm-2">
                                    <a href="{{route('estado.create')}}">Estado</a>
                                </label>
                                <div class="col-md-10">
                                    <select class="form-control" name="estado" id="estado">
                                        <option id="optEstados"></option>
                                    </select>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-info pull-right btn-lg">Save</button>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    $(document).ready(function(){
        const base_url = 'http://127.0.0.1:8000/endereco/create';
        $("#pais").onChange(function(){

            $.ajax({
                type: "GET",
                url : base_url+"/ajax",
                success: function(result){
                    $("#optEstados").html(result.getValue(1));
                }});
        });

    });

</script>