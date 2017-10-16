<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="GClients - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Jéssica Martins Nunes">


    <title>GClients</title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

</head>

<body data-spy="scroll" data-target="#navigation" data-offset="50" background="{{URL::asset('/img/clients.jpg')}}">

    <div id="app" v-cloak>
        <!-- Fixed navbar -->
        <div id="navigation" class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><b>G</b>Clients</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}"><b>{{ trans('adminlte_lang::message.login') }}</b></a></li>
                            <li><a href="{{ url('/register') }}"><b>{{ trans('adminlte_lang::message.register') }}</b></a></li>
                        @else
                            <li><a href="/home">{{ Auth::user()->name }}</a></li>
                        @endif
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
    </div>
    <h1 style="color: white; text-align: center; padding-top: inherit"><b>GClients</b></h1>
    <h2 style="color: white; text-align: center; padding-top: inherit;font-style: italic;font-size: 25px">O seu gerenciador de clientes</h2>
    <div id="navigation" class="navbar navbar-default navbar-fixed-bottom">
    </div>
</body>
</html>
