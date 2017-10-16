@extends('adminlte::layouts.app')

@section('main-content')
    <div class="container-fluid spark-screen">
        <div class="row">

            <div class="box">

                <div class="box-header with-border" align="center">
                    <h3 class="box-title"><strong>Clientes - Endereços</strong></h3>
                    <a href="{{route('endereco.create')}}" class="btn btn-small btn-primary pull-right">
                        <i class="fa fa-plus-circle"></i>
                        Novo
                    </a>
                </div>

                <div class="box-body">

                    <table class="table table-bordered table-striped" id="tabEnderecos">
                        <thead>
                            <tr>
                                <td class="col-md-4"><strong>Nome</strong></td>
                                <td class="col-md-4" align="center"><strong>Ações</strong></td>
                            </tr>
                        </thead>
                            <tbody>
                            @foreach($clientes as $c)
                                <tr>
                                    <td>{{$c->nome}}</td>
                                    <td align="right">
                                        <a href="{{route('endereco.show',$c->id)}}" class="btn btn-small btn-info">
                                            <i class="fa fa-search-plus"></i>
                                            Visualizar Endereços
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                    {{$clientes->links()}}
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scriptlocal')
    <script type="text/javascript">
      $(document).ready(function () {
        $('#tabEnderecos').DataTable( {
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