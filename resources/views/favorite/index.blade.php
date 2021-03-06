@extends('layouts.master')

@section('js')
    
    <!-- LIKE FOLLOW BUTTON -->
    <script src="{{ asset('js/buttons.js') }}"></script>

    <!-- PROVINCES -->
    <script src="{{ asset('js/comboBoxControl.js') }}"></script>
@endsection

@section('content')
        
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Áreas Favoritas</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/favoritas">Áreas Favoritas</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                
                @auth
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            @include ('layouts.add_report')
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                @endauth
                <div class="row">
                    <div class="col-sm-8">
                        <div class="panel panel-default">
                            <div class="panel-heading"> Publicaciones 
                                <div class="btn-group pull-right">
                                    <button aria-expanded="false" data-toggle="dropdown" class="btn btn-primary dropdown-toggle waves-effect waves-light" type="button"><span class="btn-label"><i class="fa fa-sort-amount-desc m-l-5"></i></span> Filtros <span class="caret"></span></button>
                                    <ul role="menu" class="dropdown-menu animated flipInX">
                                        <li><a href="/favoritas/recientes">Más recientes</a></li>
                                        <!-- <li><a href="/home/populares">Más agradecidas</a></li> -->
                                        <li class="divider"></li>
                                        <li><a href="/favoritas">Mostrar todas</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="panel-wrapper collapse in">
                                    <ul class="nav customtab nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#news1" aria-controls="news" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="fa fa-globe"></i></span><span class="hidden-xs">Noticias</span></a></li>
                                        <li role="presentation" class=""><a href="#security1" aria-controls="security" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-lock"></i></span> <span class="hidden-xs">Reportes de Seguridad</span></a></li>
                                        <li role="presentation" class=""><a href="#services1" aria-controls="services" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="fa fa-road"></i></span> <span class="hidden-xs">Reportes de Servicios</span></a></li>
                                    </ul>
                                    <div class="panel-body">
                                        <div class="tab-content m-t-0">
                                            <div role="tabpanel" class="tab-pane fade active in" id="news1">
                                                @include('home.news')
                                                <div class="clearfix"></div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="security1">
                                                @include('home.security')
                                                <div class="clearfix"></div>
                                            </div>

                                            <div role="tabpanel" class="tab-pane fade" id="services1">                                           
                                                @include('home.service')
                                                <div class="clearfix"></div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="white-box">
                            <div class="panel panel-primary">
                                <div class="panel-heading"> Filtrar por Grupo de Comunidades Favoritos
                                </div>
                                <form class="form-horizontal form-material" action="/favoritas/comunidades" method="post">
                                    {{ csrf_field() }}
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-12">Grupos de Comunidades</label>
                                            <div class="col-md-12">
                                                <select name="community_group" id="community_groups" class="form-control" required>
                                                    @foreach($community_groups as $group)
                                                        <option value="{{$group->id}}">{{$group->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-primary pull-right">Filtrar</button>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <a href="/comunidades"> ¿No tiene grupos favoritos? Haga click aquí para seleccionar grupos favoritos.</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.container-fluid -->

            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    
@endsection