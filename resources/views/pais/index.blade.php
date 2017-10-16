@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">

                <div class="box">

                    <div class="box-header with-border" align="center">
                        <h3 class="box-title"><strong>Países</strong></h3>
                        <a href="{{route('pais.create')}}" class="btn btn-small btn-primary pull-right">
                            <i class="fa fa-plus-circle"></i>
                            Novo
                        </a>
                    </div>

                    <div class="box-body">

                        <table class="table table-bordered table-striped" id="tabPaises">
                            <thead>
                                <tr>
                                    <td class="col-md-4"><strong>Nome</strong></td>
                                    <td class="col-md-4"><strong>Sigla</strong></td>
                                    <td class="col-md-4" align="center"><strong>Ações</strong></td>
                                </tr>
                            </thead>
                                <tbody>
                                @foreach($pais as $c)
                                    <tr>
                                        <td>{{$c->nome}}</td>
                                        <td>{{$c->sigla}}</td>
                                        <td align="right">
                                            <a href="{{route('pais.show',$c->id)}}" class="btn btn-small btn-info">
                                                <i class="fa fa-search-plus"></i>
                                                Detalhes
                                            </a>
                                            <a href="{{route('pais.edit',$c->id)}}" class="btn btn-small btn-warning">
                                                <i class="fa fa-pencil-square-o"></i>
                                                Editar
                                            </a>
                                            <a data-toggle="modal" href="#myModal{{$c->id}}" class="btn btn-small btn-danger">
                                                <i class="fa fa-trash-o"></i>
                                                Excluir
                                            </a>
                                            <div class="modal fade modal-danger" id="myModal{{$c->id}}" role="dialog">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">

                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Excluir</h4>
                                                        </div>

                                                        <div class="modal-body text-center">
                                                            <p>Deseja realmente excluir o país {{$c->nome}}?</p>
                                                        </div>

                                                        <div class="modal-footer">
                                                            {{--<form id="formDelete{{$c->id}}" action="{{action('ClienteController@destroy', $c->id)}}" method="delete">--}}
                                                                {{--{{ csrf_field() }}--}}
                                                                {{--<button class="btn btn-danger" type="submit">Excluir</button>--}}
                                                                {{--<button class="btn btn-default" type="button" data-dismiss="modal">Cancelar</button>--}}
                                                            {{--</form>--}}
                                                            {!! Form::open(array('route' => array('pais.destroy', $c->id), 'method' => 'delete')) !!}
                                                            {!! csrf_field() !!}
                                                            <button class="btn btn-danger" type="submit">Excluir</button>
                                                            <button class="btn btn-default" type="button" data-dismiss="modal">Cancelar</button>
                                                            {!! Form::close() !!}
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>

                        </table>
                        {{$pais->links()}}
                    </div>
                </div>

        </div>
    </div>
@endsection
@section('scriptlocal')
    <script type="text/javascript">
      $(document).ready(function () {
        $('#tabPaises').DataTable( {
          "language": {
            "paginate": {
              "previous": "Anterior",
              "next": "Próxima"
            },
            "sSearch": "<span>Pesquisar</span> _INPUT_", //search
            "lengthMenu": "Exibir _MENU_ registros por página",
            "zeroRecords": "Não há resultados para esta busca",
            "info": "Exibindo página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro disponível",
            "infoFiltered": "(Filtrado de _MAX_ registros)"

          }
        } );
      })
    </script>
@endsection