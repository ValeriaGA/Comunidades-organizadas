@extends('statistics.master')

@section('stats_content')

<!--row -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="white-box analytics-info">
                        <h2>Proporcion de mujeres y hombres victimas</h2>
                        <a>Seleccione un delito:</a>
                        <form class="form-horizontal form-material" action="/statistics/pie"  method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <select style="background-color: white;" name="delitos">
                            @foreach ($types as $type)
                           
                            <option name="{{$type->id}}" value="{{$type->id}}">{{$type->name}}</option> 
                            
                            @endforeach
                          </select>
                          
                          <div class="form-group">
                              <div class="col-sm-12">
                              <br/><button class="btn btn-success">Actualizar</button>
                              </div>
                          </div>
                                              
                         
                        </form>
                        <a  class="waves-effect">{{$selected_incident_name}}</a><br>
                        <a  class="waves-effect">Total de incidentes: {{$total}}</a>
                        @if($total== 0)
                          <h3>No hay registros para este incidente</h3>
                        @else
                          <div id="graph"></div>
                        <pre id="code" class="prettyprint linenums">
                        Morris.Donut({
                          element: 'graph',
                          data: [
                           
                            {value: {{ (array_key_exists('femenino', $count_per_gender) ? $count_per_gender['femenino'] : 0) }}, label: 'Mujeres', formatted: 'approx {{ (array_key_exists('femenino', $count_per_gender) ? ($count_per_gender['femenino']/$total)*100 : 0) }}%' },
                            {value: {{ (array_key_exists('masculino', $count_per_gender) ? $count_per_gender['masculino'] : 0) }}, label: 'Hombres', formatted: 'approx {{ (array_key_exists('masculino', $count_per_gender) ? ($count_per_gender['masculino']/$total)*100 : 0) }}%' },
                            {value: {{ (array_key_exists('otro', $count_per_gender) ? $count_per_gender['otro'] : 0) }}, label: 'Otro', formatted: 'approx {{ (array_key_exists('otro', $count_per_gender) ? ($count_per_gender['otro']/$total)*100 : 0) }}%' }
                          ],
                          formatter: function (x, data) { return data.formatted; }
                        });
                        </pre>
                        @endif
                        
                        
                    </div>
                    </div>
                </div>
                @endsection
             