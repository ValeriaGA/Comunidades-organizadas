@extends('statistics.master')

@section('stats_content')

<!--row -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="white-box analytics-info">
                        <h2>Proporcion de mujeres y hombres victimas</h2>
                        <a><strong>Seleccione un delito:</strong></a>
                        <select style="background-color: white;" name="delitos">Actividad sospechosa, asalto, drogas, homicidio, otros, robo a vehiculo, robo a casa, robo a comercio, vandalismo
                           <option value="1">Asalto</option> 
                           <option value="2">Drogas</option> 
                           <option value="3">Robo de vehiculo</option>
                           <option value="4">Robo a casa</option>
                           <option value="5">Homicidio</option>
                           <option value="6">Robo a comercio</option>
                           <option value="7">Vandalismo</option>
                           <option value="4">Actividad sospechosa</option>
                           <option value="8">Otros</option>
                        </select>
                        <div id="graph"></div>
                        <pre id="code" class="prettyprint linenums">
                        Morris.Donut({
                          element: 'graph',
                          data: [
                            {value: 70, label: 'Mujeres', formatted: 'al menos 70%' },
                            {value: 15, label: 'Hombres', formatted: 'aprox. 30%' }
                          ],
                          formatter: function (x, data) { return data.formatted; }
                        });
                        </pre>
                    </div>
                    </div>
                </div>
                @endsection