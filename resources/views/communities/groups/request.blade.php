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
                            <li><a href="#">Solicitar Creación de un Grupo</a></li>
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
                                <label> Nombre del Grupo</label>
                                <input type="text" style="width: 400px; display:inline;" placeholder="Nombre de Comunidad" class="form-control" required>
                                <br>
                                <br>
                                <label>Descripción</label>
                                <textarea id="commentInput" rows="5" style="width: 600px;" class="form-control form-control-line" name="description" placeholder="Descripción" required></textarea>
                                <br>
                                <br>
                                Comunidades Asociadas
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
                            
                                    

                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="white-box">
                                <h3 class="box-title" style="display:inline;">Comunidades</h3>
                                <div class="comment-center p-t-10">
                                    <div class="container" >
                                        <div class="ex3">
                                            <table id="communitiesToAdd"  class="communitiesTable"  style="width: 400px;">
                                                <tr id="tr1">
                                                    <td id="td1" colspan="2">
                                                        Comunidad de Barrio Amón 

                                                    </td>
                                                    <td>
                                                        <button class="btn btn-rounded btn-outline m-r-5 add-href"  value="tr1" onclick="addCommunityRow(this)" style="margin-left: 0px; display:inline;" id="addButton1" type="button"> Agregar </button>
                                                    </td>
                                                </tr>   
                                                <tr id="tr2">
                                                    <td id="td2" colspan="2">
                                                        Comunidad de Otoya
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-rounded btn-outline m-r-5 add-href"  value="tr2" onclick="addCommunityRow(this)" style="margin-left: 0px; display:inline;" id="addButton2" type="button"> Agregar </button>
                                                    </td>
                                                </tr>  
                    
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="white-box">
                                <h3 class="box-title" style="display:inline;">Comunidades Agregadas</h3>
                                <div class="comment-center p-t-10">
                                    <div class="container" >
                                        <div class="ex3">
                                            <table id="communitiesAdded" class="communitiesTable" style="width: 400px;">
                                                <tr id="tr3">
                                                    <td id="td3" colspan="2">
                                                        Comunidad de Barrio Escalante
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-rounded btn-outline m-r-5 remove-href"  value="tr3" onclick="removeCommunityRow(this)" style="margin-left: 0px; display:inline;" id="removeButton1" type="button"> Quitar </button>
                                                    </td>
                                                </tr>   
                                                
                    
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="white-box">
                            <button style="margin-left: 350px; display:inline;" id="requestCommunity1" class="btn btn btn-rounded btn-default btn-outline" type="submit" onclick="window.location.href='/comunidades'">Cancelar</button>
                            <button style="margin-left: 25px; display:inline;" id="requestCommunity1" class="btn btn btn-rounded btn-default btn-outline" type="submit" onclick="window.location.href='/comunidades'">Solicitar Grupo</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.container-fluid -->

            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- ============================================================== -->
        <!-- End Page Content -->
        <!-- ============================================================== -->

    
@endsection