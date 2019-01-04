@extends('layouts.master')

@section('js')
    
   

    <!-- DROP DOWN TABLE -->
    <script src="{{ asset('js/dropdownTableRows.js')}}"></script>

    <!-- REQUEST Communities -->
    <script src="{{ asset('js/communities.js') }}"></script>

    <!-- PLACES -->
    <script src="{{ asset('js/myCommunitiesControl.js') }}"></script>


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
                        <h4 class="page-title">Mis Grupos de Comunidades</h4> </div>
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                        <ol class="breadcrumb">
                            <li><a href="/comunidades">Comunidades</a></li>
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
                            
                            <input id="communityGroupSearch" type="text" style="width: 400px; display:inline;" placeholder="Buscar Grupo..." class="form-control">
                            <button id="communityGroupSearchButton"  style="display:inline; margin-left: 10px;"><i class="fa fa-search"></i></button>

                      </div>
                  </div>
              </div>

              <div id="modal-wrapper" class="modal">
                                          
                    <div class="modal-content animate" action="/action_page.php">
                          
                        <div class="white-box">
                            <div class="comment-center p-t-10">
                                <div id="divCommunityContent" class="container">
                                    <div id="divCommunityTable" style="width:400px; height:300px; overflow:auto;">
                                        <h3 class="box-title" style="display:inline;">Comunidades</h3>
                                        <br/>
                                        <table id="communitiesTable" class="communityGroupTable" style="width: 400px;">
                                           
                                            
                                        </table>
                                    </div>
                                </div>
                                <button onclick="document.getElementById('modal-wrapper').style.display='none'" id="requestGroup"  style="margin-right: 50px;" class="btn btn-rounded btn-success btn-outline pull-right"> Aceptar </button>
                            </div>
                        </div>
                      
                    </div>
                    
                  </div>
              <!-- /.row -->
                <div class="row">
                    <div class="col-md-12  col-sm-12">
                        <div class="white-box">

                                        

                            <h3 class="box-title" style="display:inline;">Mis Grupos de Comunidades</h3>
                            <button onclick="window.location.href='/comunidades/solicitar-comunidad'" id="requestCommunity" class="btn btn-rounded btn-success btn-outline pull-right"> Solicitar Comunidad </button>
                            <button onclick="window.location.href='/comunidades/solicitar-grupo'" id="requestGroup"  class="btn btn-rounded btn-success btn-outline pull-right" style="margin-right: 10px;"> Solicitar Grupo </button>

                            <br>
                            <br>


                            <div class="comment-center p-t-10">
                                <div id="divCommunityGroupContent" class="container" style="overflow:auto; height:400px;">
                                    <div id="divCommunityGroupsTable">
                                        <table id="communityGroupsTable" class="communityGroupTable" style="width: 900px;">    
                                        
                                        </table>
                                    </div>
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