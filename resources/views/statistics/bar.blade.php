@extends('statistics.master')

@section('stats_content')

<!--row -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="white-box analytics-info">
                        <h2>Numero de delitos por tipos</h2>
                        <a>  Fecha de inicio:</a> 
                        <input style="background-color: white;" type="date" name="dayini" min="2010-12-31"><a> Fecha de Final:</a>
                        <input style="background-color: white;" id="date" type="date" name="datend" max="2018-01-02" size="20"><br>
                        <div id="graph"></div>
                        <pre id="code" class="prettyprint linenums">
                        // Use Morris.Bar
                        Morris.Bar({
                          element: 'graph',
                          data: [
                            {x: 'Actividad sospechosa', num: 8},
                            {x: 'Asalto', num: 1},
                            {x: 'Drogas', num: 2},
                            {x: 'Homicidio', num: 4},
                            {x: 'Robo a vehiculo', num: 5},
                            {x: 'Robo a casa', num: 3},
                            {x: 'Robo a comercio', num: 4},
                            {x: 'Vandalismo', num: 7},
                            {x: 'Otros', num: 3}
                          ],
                          xkey: 'x',
                          ykeys: ['num'],
                          labels: ['Num'],
                          barColors: function (row, series, type) {
                            if (type === 'bar') {
                              var red = Math.ceil(255 * row.y / this.ymax);
                              return 'rgb(' + red + ',0,0)';
                            }
                            else {
                              return '#000';
                            }
                          }
                        });
                        </pre>
                    </div>
                    </div>
                </div>
@endsection