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
                            <li><a href="#">Comunidades</a></li>
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
                            <form role="search" style="display:inline;">
                                    <input type="text" style="width: 400px; display:inline;" placeholder="Buscar Grupo..." class="form-control">
                                    <a href="" style="display:inline; margin-left: 10px;"><i class="fa fa-search"></i></a>
                             </form>

                             <br>
                             <br>


                          Filtrar por:
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
                              

                        <div style="margin-top: 25px; margin-left: 50px; display:inline;">
                            <label>Comunidad</label>
                            
                            <select id="communities" style="width:120px; display:inline;" class="form-control"  name="community" required>
                                    <option value="1" selected="selected">Comunidad</option>
                            </select>
                        </div>

                      </div>
                  </div>
              </div>
              <!-- /.row -->
                <div class="row">
                    <div class="col-md-12  col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title" style="display:inline;">Grupos de Comunidades</h3>
                            <button onclick="window.location.href='/comunidades/solicitar-comunidad'" id="requestCommunity" class="btn btn btn-rounded btn-success btn-outline pull-right"> Solicitar Comunidad </button>
                            <button onclick="window.location.href='/comunidades/solicitar-grupo'" id="requestGroup"  class="btn btn btn-rounded btn-success btn-outline pull-right"> Solicitar Grupo </button>

                            <br>
                            <br>
                            <div class="comment-center p-t-10">
                                <div class="container">
                                    <table class="table table-bordered">
                                        <tr class="header" >
                                            <td colspan="2">
                                                Grupo de Comunidades de San Teo y Loadad
                                                <button style="margin-left: 50px; display:inline;" id="followButton1" onclick="{{'onclick_followButton(this)'}}" class="btn btn btn-rounded btn-success btn-outline m-r-5 like-button pull-right" active="0" > Seguir </button>
                                            </td>
                                        </tr>   
       
                                      <tr>
                                        <td>Comunidad de San Teo</td>
                                      </tr>
                                      <tr>
                                        <td>Comunidad de Loaded</td>
                                      </tr>
                                      <tr class="header">
                                        <td colspan="2">
                                            Grupo de Comunidades de Barrios Unidos
                                            <button style="margin-left: 50px;" id="followButton2" onclick="{{'onclick_followButton(this)'}}" class="btn btn btn-rounded btn-success btn-outline m-r-5 like-button pull-right" active="0" > Seguir </button>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>Comunidad de Barrio x</td>
                                      </tr>

                                      
                                     
                                    </table>
                                  </div>
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

            <!-- google maps api -->
<!-- <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="../plugins/bower_components/gmaps/gmaps.min.js"></script>
    <script src="../plugins/bower_components/gmaps/jquery.gmaps.js"></script> -->

    
@endsection