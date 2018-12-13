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
                <!-- row -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            COMBO BOX
                        </div>
                    </div>
                </div>
                <!-- /.row -->
                @endauth

                <div class="row">
                    <div class="col-md-12  col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Grupos de Comunidades</h3>
                            <div class="comment-center p-t-10">
                                <div class="container">
                                    <table class="table table-bordered">
                                      <tr class="header">
                                        <td colspan="2">Header 1</td>
                                      </tr>
                                      <tr>
                                        <td>data</td>
                                        <td>data</td>
                                      </tr>
                                      <tr>
                                        <td>data</td>
                                        <td>data</td>
                                      </tr>
                                      <tr class="header">
                                        <td colspan="2">Header 2</td>
                                      </tr>
                                      <tr>
                                        <td>date</td>
                                        <td>data</td>
                                      </tr>
                                      <tr>
                                        <td>data</td>
                                        <td>data</td>
                                      </tr>
                                      <tr>
                                        <td>data</td>
                                        <td>data</td>
                                      </tr>
                                      <tr class="header">
                                        <td colspan="2">Header 3</td>
                                      </tr>
                                      <tr>
                                        <td>date</td>
                                        <td>data</td>
                                      </tr>
                                      <tr>
                                        <td>data</td>
                                        <td>data</td>
                                      </tr>
                                      <tr>
                                        <td>data</td>
                                        <td>data</td>
                                      </tr>
                                      <tr class="header">
                                        <td colspan="2">Header 4</td>
                                      </tr>
                                      <tr>
                                        <td>date</td>
                                        <td>data</td>
                                      </tr>
                                      <tr>
                                        <td>data</td>
                                        <td>data</td>
                                      </tr>
                                      <tr>
                                        <td>data</td>
                                        <td>data</td>
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