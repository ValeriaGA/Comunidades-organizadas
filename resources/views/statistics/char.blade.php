@extends('statistics.master')

@section('stats_content')

<!--row -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="white-box analytics-info">
                        <h2>Actividad delictiva de los ultimos 10 años</h2>
                        <select style="background-color: white;" name="delitos">
                          @for($i = 0; $i < 10; ++$i)
                           <option value="{{2018 - $i}}">{{2018 - $i}}</option> 
                          @endfor
                        </select>
                        <div id="graph"></div>
                        <pre id="code" class="prettyprint linenums">
                        var day_data = [
                          {"elapsed": "Enero", "value": {{ (array_key_exists('January', $dic) ? $dic['January'] : 0) }} },
                          {"elapsed": "Febrero", "value": {{ (array_key_exists('February', $dic) ? $dic['February'] : 0) }} },
                          {"elapsed": "Marzo", "value": {{ (array_key_exists('March', $dic) ? $dic['March'] : 0) }} },
                          {"elapsed": "Abril", "value": {{ (array_key_exists('April', $dic) ? $dic['April'] : 0) }} },
                          {"elapsed": "Mayo", "value": {{ (array_key_exists('May', $dic) ? $dic['May'] : 0) }} },
                          {"elapsed": "Junio", "value": {{ (array_key_exists('June', $dic) ? $dic['June'] : 0) }} },
                          {"elapsed": "Julio", "value": {{ (array_key_exists('July', $dic) ? $dic['July'] : 0) }} },
                          {"elapsed": "Agosto", "value": {{ (array_key_exists('August', $dic) ? $dic['August'] : 0) }} },
                          {"elapsed": "Septiembre", "value": {{ (array_key_exists('September', $dic) ? $dic['September'] : 0) }} },
                          {"elapsed": "Octubre", "value": {{ (array_key_exists('October', $dic) ? $dic['October'] : 0) }} },
                          {"elapsed": "Noviembre", "value": {{ (array_key_exists('November', $dic) ? $dic['November'] : 0) }} },
                          {"elapsed": "Diciembre", "value": {{ (array_key_exists('December', $dic) ? $dic['December'] : 0) }} }
                        ];
                        Morris.Line({
                          element: 'graph',
                          data: day_data,
                          xkey: 'elapsed',
                          ykeys: ['value'],
                          labels: ['value'],
                          parseTime: false
                        });
                        </pre>
                      </div>
                    </div>
                </div>
                @endsection