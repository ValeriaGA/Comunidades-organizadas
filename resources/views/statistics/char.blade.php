@extends('statistics.master')

@section('stats_content')

<!--row -->
                <div class="row">
                    <div class="col-md-12">
                        <h2>Actividad delictiva del ultimo año</h2>
                        <div id="graph"></div>
                        <pre id="code" class="prettyprint linenums">
                        var day_data = [
                          {"elapsed": "Enero", "value": 34},
                          {"elapsed": "Febrero", "value": 24},
                          {"elapsed": "Marzo", "value": 3},
                          {"elapsed": "Abril", "value": 12},
                          {"elapsed": "Mayo", "value": 13},
                          {"elapsed": "Junio", "value": 22},
                          {"elapsed": "Julio", "value": 5},
                          {"elapsed": "Agosto", "value": 26},
                          {"elapsed": "Septiembre", "value": 12},
                          {"elapsed": "Octubre", "value": 19},
                          {"elapsed": "Noviembre", "value": 20},
                          {"elapsed": "Diciembre", "value": 18}
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
                @endsection