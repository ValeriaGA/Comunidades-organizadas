@extends('statistics.master')

@section('stats_content')

<!--row -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="white-box analytics-info">
                        <h2>Actividad delictiva de los últimos 10 años</h2>

                        <div id="graph"></div>
                        <pre id="code" class="prettyprint linenums">
                        var day_data = [
                          {"elapsed": "Enero", "valor": {{ (array_key_exists('January', $dic) ? $dic['January'] : 0) }} },
                          {"elapsed": "Febrero", "valor": {{ (array_key_exists('February', $dic) ? $dic['February'] : 0) }} },
                          {"elapsed": "Marzo", "valor": {{ (array_key_exists('March', $dic) ? $dic['March'] : 0) }} },
                          {"elapsed": "Abril", "valor": {{ (array_key_exists('April', $dic) ? $dic['April'] : 0) }} },
                          {"elapsed": "Mayo", "valor": {{ (array_key_exists('May', $dic) ? $dic['May'] : 0) }} },
                          {"elapsed": "Junio", "valor": {{ (array_key_exists('June', $dic) ? $dic['June'] : 0) }} },
                          {"elapsed": "Julio", "valor": {{ (array_key_exists('July', $dic) ? $dic['July'] : 0) }} },
                          {"elapsed": "Agosto", "valor": {{ (array_key_exists('August', $dic) ? $dic['August'] : 0) }} },
                          {"elapsed": "Septiembre", "valor": {{ (array_key_exists('September', $dic) ? $dic['September'] : 0) }} },
                          {"elapsed": "Octubre", "valor": {{ (array_key_exists('October', $dic) ? $dic['October'] : 0) }} },
                          {"elapsed": "Noviembre", "valor": {{ (array_key_exists('November', $dic) ? $dic['November'] : 0) }} },
                          {"elapsed": "Diciembre", "valor": {{ (array_key_exists('December', $dic) ? $dic['December'] : 0) }} }
                        ];
                        Morris.Line({
                          element: 'graph',
                          data: day_data,
                          xkey: 'elapsed',
                          ykeys: ['valor'],
                          labels: ['valor'],
                          parseTime: false
                        });
                        </pre>
                      </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="white-box">
                    <form action="/statistics/chart" method="post" enctype="multipart/form-data">
                           {{ csrf_field() }}
                           <div class="row">
                            <select class="form-control" style="background-color: white;" name="date">
                              @for($i = 0; $i < 10; ++$i)
                               @if($date == (2018 - $i))
                               <option value="{{2018 - $i}}" selected>{{2018 - $i}}</option> 
                               @else
                               <option value="{{2018 - $i}}">{{2018 - $i}}</option> 
                               @endif
                              @endfor
                            </select>
                          </div>
                          <br/>
                          <div class="row">
                            <button class="btn btn-success">Filtrar</button>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="col-sm-2">
                      <div class="white-box">
                          <p  style="display:inline;">Sexo</p>
                  <form action="/statistics/chart" method="post" enctype="multipart/form-data">
                         {{ csrf_field() }}
                         <div class="row">
                          <select class="form-control" style="background-color: white;" name="date">

                             <option value="Masculino" selected>Masculino</option> 
                             <option value="Femenino">Femenino</option> 

                          </select>
                        </div>
                        <br/>
                        <div class="row">
                          <button class="btn btn-success">Filtrar</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
           

              <div class="row">
                <div class="col-sm-2">
                    <div class="white-box">
                        <p  style="display:inline;">Procedencia</p>
                <form action="/statistics/chart" method="post" enctype="multipart/form-data">
                       {{ csrf_field() }}
                       <div class="row">
                        <select class="form-control" style="background-color: white;" name="date">

                           <option value="Nacionales" selected>Nacionales</option> 
                           <option value="Extranjeros">Extranjeros</option> 
                           <option value="Ambos">Ambos</option> 

                        </select>
                      </div>
                      <br/>
                      <div class="row">
                        <button class="btn btn-success">Filtrar</button>
                      </div>
                    </form>
                  </div>
                </div>

                <div class="col-sm-2" style="width: 300px;">
                    <div class="white-box">
                        <p >Comunidad</p>
                          <form class="form-horizontal form-material" action="/statistics/bar" method="post" enctype="multipart/form-data">
                            <div style="margin-top: 25px; margin-left: 0px; display:inline;">
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
    
                            <div style="margin-top: 25px; margin-left: 10px; display:inline;">
                                <label >Cantón</label>
                                
                                <select id="cantons" style="width:110px; display:inline;" class="form-control"  name="canton" required>
                                        <option value="1" selected="selected">Cantones</option>
                                </select>
                            </div>
    
    
                            <div style="margin-top: 25px; margin-left: 10px; display:inline;">
                                <label >Distrito</label>
                                
                                <select id="districts" style="width:110px; display:inline;" class="form-control" name="district" required>
                                        <option value="1" selected="selected">Distritos</option>
                                </select>
                            </div>
                                  
    
                            <div style="margin-top: 25px; margin-left: 50px; display:inline;">
                                <label>Comunidad</label>
                                
                                <select id="communities1" style="width:120px; display:inline;" class="form-control"  name="community" required>
                                        <option value="1" selected="selected">Barrio x</option>
                                </select>
                                
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button class="btn btn-success">Filtrar</button>
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
@endsection