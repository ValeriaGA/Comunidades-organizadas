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
                            <li><a href="#">Solicitar Creación de Comunidad</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                 <!-- row -->
                 <div class="row">
                  <div class="col-sm-12">
                    <div class="white-box">
                        <h3 class="box-title m-b-0">Solicitar comunidad</h3>
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <form class="form-horizontal" action="/comunidades/solicitar-comunidad" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="communityName">Nombre de Comunidad </label>
                                        <input type="text" class="form-control" id="communityName" name="name" placeholder="Nombre de Comunidad" required> 
                                    </div>
                                    <div class="form-group">
                                        <label for="provinces">Provincia</label>
                                    
                                        <select id="provinces" class="form-control" name="province" required>
                                                <option value="1" selected>San José</option>
                                                <option value="2">Alajuela</option>
                                                <option value="3">Cartago</option>
                                                <option value="4">Heredia</option>
                                                <option value="5">Guanacaste</option>
                                                <option value="6">Puntarenas</option>
                                                <option value="7">Limón</option>
                                        
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="cantons">Cantón</label>
                                    
                                        <select id="cantons" class="form-control" name="canton" required>
                                                <option value="1" selected="selected">Cantones</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="districts">Distrito</label>
                                    
                                        <select id="districts"class="form-control" name="district" required>
                                                <option value="1" selected="selected">Distritos</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-success waves-effect waves-light m-r-10">Solicitar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>
              </div>
              <!-- /.row -->
                
            </div>
            <!-- /.container-fluid -->

            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->
    
@endsection