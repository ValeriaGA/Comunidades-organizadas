@extends('layouts.master')

@section('content')

 <div id="page-wrapper">

            @include ('layouts.errors')
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Agregar reporte</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/">Inicio</a></li>
                            <li class="active">Seleccionar tipo de reporte</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading"> Reportes de Servicio
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        @foreach ($categories_service as $cat)
                                            <li class="list-group-item">{{$cat->name}}</li>
                                        @endforeach
                                    </ul>
                                    <button type='submit' onclick="window.location.href='/servicio/agregar'" class="btn btn-success">Agregar Reporte de Servicio</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="panel panel-info">
                            <div class="panel-heading"> Reportes de Seguridad
                            </div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <ul class="list-group">
                                        @foreach ($categories_security as $cat)
                                            <li class="list-group-item">{{$cat->name}}</li>
                                        @endforeach
                                    </ul>
                                    <button type='submit' onclick="window.location.href='/seguridad/agregar'" class="btn btn-success">Agregar Reporte de Seguridad</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer> 
        </div>

@endsection