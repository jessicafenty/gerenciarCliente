<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        @if (! Auth::guest())
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{ Gravatar::get($user->email) }}" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>{{ Auth::user()->name }}</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> {{ trans('adminlte_lang::message.online') }}</a>
                </div>
            </div>
        @endif

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="{{ trans('adminlte_lang::message.search') }}..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">Cliente</li>

            <li class="active">

                <a href="{{route('cliente.index')}}">
                    <i class="fa fa-user-plus"></i>
                    <span>Cadastro de Cliente</span>
                </a>
            </li>
            <li class="active">

                <a href="{{route('endereco.index')}}">
                    <i class="fa fa-address-card"></i>
                    <span>Cadastro de Endereço</span>
                </a>
            </li>
            <li class="active">

                <a href="{{route('cidade.index')}}">
                    <i class="fa fa-building"></i>
                    <span>Cadastro de Cidade</span>
                </a>
            </li>
            <li class="active">

                <a href="{{route('estado.index')}}">
                    <i class="fa fa-flag"></i>
                    <span>Cadastro de Estado</span>
                </a>
            </li>
            <li class="active">

                <a href="{{route('pais.index')}}">
                    <i class="fa fa-globe"></i>
                    <span>Cadastro de País</span>
                </a>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
