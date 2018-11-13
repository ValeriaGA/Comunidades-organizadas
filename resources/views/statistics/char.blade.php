@extends('statistics.master')

@section('stats_content')

<!--row -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="white-box analytics-info">
                        <h2>Actividad delictiva de los ultimos 10 años</h2>

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
                </div>
                @endsection