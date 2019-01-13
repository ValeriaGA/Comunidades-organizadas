@extends('layouts.master')

@section('js')
    
    <!-- DROP DOWN TABLE -->
    <script src="{{ asset('js/dropdownTableRows.js')}}"></script>

    <!-- PROVINCES -->
    <script src="{{ asset('js/comboBoxControl.js') }}"></script>

    <!-- REQUEST Communities -->
    <script src="{{ asset('js/communities.js') }}"></script>

    <script src="{{ asset('js/createReportTable.js') }}"></script>
@endsection

@section('content')
        
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Comunidades</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="#">Solicitar Creación de un Grupo</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                @include ('layouts.errors')
                
                 <!-- row -->
                 <div class="row">
                    <div class="col-sm-6">
                        <div class="white-box">
                            <div class="panel panel-primary">
                                <div class="panel-heading"> Filtrar Comunidades por Distrito
                                </div>
                                <form class="form-horizontal" action="/comunidades/solicitar-grupo/filtrar" method="post">
                                {{ csrf_field() }}
                                    <div class="panel-body">
                                            
                                        <div class="form-group">
                                            <label for="provinces">Provincia</label>
                                        
                                            <select id="provinces" class="form-control" name="province" required>
                                            
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="cantons">Cantón</label>
                                        
                                            <select id="cantons" class="form-control" name="canton" required>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="districts">Distrito</label>
                                        
                                            <select id="districts"class="form-control" name="district" required>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success waves-effect waves-light m-r-10 pull-right">Filtrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <form class="form-horizontal" action="/comunidades/solicitar-grupo" method="post">
                    {{ csrf_field() }}
                        <div class="col-md-6">
                            <div class="white-box">
                                <div class="panel panel-primary">
                                    <div class="panel-heading"> Nombre del Grupo de Comunidades
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="communityName" name="name" placeholder="Nombre del Grupo de Comunidades"> 
                                        </div>

                                        <div class="form-group">
                                            <h3 class="box-title">Lista de Comunidades Disponibles</h3>
                                            <div class="panel-body">
                                                <table id="communitiesToAdd"  class="communitiesTable"  style="width: 100%;">
                                                    @if (session()->has('data'))
                                                        @foreach(session('data') as $community)
                                                            <tr id="tr{{$community->id}}">
                                                                <td id="td{{$community->id}}" style="width: 100%;">
                                                                    {{ $community->name }}
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-success btn-rounded btn-outline m-r-5 add-href"  value="tr{{$community->id}}" onclick="addCommunityRow(this)" style="width: 100%;" id="addButton1" type="button"> Agregar </button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </table>
                                            </div>
                                            <div class="panel-footer">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <a href="/comunidades/solicitar-comunidad"> ¿No ve su comunidad? Haga click aquí para solicitarla.</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <h3 class="box-title">Lista de Comunidades Agregadas</h3>
                                            <div class="panel-body">
                                                <table id="communitiesAdded" class="communitiesTable" style="width: 100%;">   
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel-footer">
                                        <div class="container" style="width: 100%">
                                            <button class="btn btn-success waves-effect waves-light m-r-10 pull-right" type="submit">Acceptar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /.container-fluid -->

            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->

    
@endsection