@extends('layouts.master')


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
                
                @auth
               
                @endauth
                 <!-- row -->
                 <div class="row">
                  <div class="col-sm-12">
                      <div class="white-box">
                            <form role="search" >
                                <label> Nombre de Comunidad </label>
                                <input type="text" style="width: 400px; display:inline;" placeholder="Nombre de Comunidad" class="form-control" required>
                                <br>
                                <br>
                                <label>Descripción</label>
                                <textarea id="commentInput" rows="5" style="width: 600px;" class="form-control form-control-line" name="description" placeholder="Descripción" required></textarea>
                                <br>
                                <br>
                                Lugar de la comunidad
                                <br>
                                
                                <div style="margin-top: 25px; margin-left: 50px; display:inline;">
                                    <label >Provincia</label>
                                    
                                    <select id="provinces" style="width:110px; display:inline;" class="form-control" name="province" required>
                                            <option value="1" selected>San José</option>
                                            <option value="2">Alajuela</option>
                                            <option value="3">Cartago</option>
                                            <option value="4">Heredia</option>
                                            <option value="5">Guanacaste</option>
                                            <option value="6">Puntarenas</option>
                                            <option value="7">Limón</option>
                                    
                                    </select>
                                </div>

                                <div style="margin-top: 25px; margin-left: 50px; display:inline;">
                                    <label >Cantón</label>
                                    
                                    <select id="cantons" style="width:110px; display:inline;" class="form-control"  name="canton" required>
                                            <option value="1" selected="selected">Cantones</option>
                                    </select>
                                </div>


                                <div style="margin-top: 25px; margin-left: 50px; display:inline;">
                                    <label >Distrito</label>
                                    
                                    <select id="districts" style="width:110px; display:inline;" class="form-control" name="district" required>
                                            <option value="1" selected="selected">Distritos</option>
                                    </select>
                                </div>

                                <br>
                                <br>
                                <br>
                                <button style="margin-left: 350px; display:inline;" id="requestCommunity1" class="btn btn btn-rounded btn-default btn-outline" type="submit" onclick="window.location.href='/comunidades'">Cancelar</button>
                                <button style="margin-left: 25px; display:inline;" id="requestCommunity1" class="btn btn btn-rounded btn-default btn-outline" type="submit" onclick="window.location.href='/comunidades'">Solicitar Comunidad</button>
                            </form>
                                    

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

            <!-- google maps api -->
<!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="../plugins/bower_components/gmaps/gmaps.min.js"></script>
    <script src="../plugins/bower_components/gmaps/jquery.gmaps.js"></script> -->

    
@endsection