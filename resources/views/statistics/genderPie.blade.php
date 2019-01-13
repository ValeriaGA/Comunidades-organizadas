@extends('statistics.master')

@section('stats_content')

<!--row -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="white-box analytics-info">
                        <h2>Proporción de mujeres y hombres víctimas</h2>
                        <a>Seleccione un delito:</a>
                        <form class="form-horizontal form-material" action="/statistics/genero"  method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <select style="background-color: white;" name="delitos">
                            @foreach ($types as $type)
                           
                              @if($selected_incident_name == $type -> name)
                                <option name="{{$type->id}}" value="{{$type->id}}" selected>{{$type->name}}</option> 
                              @else
                                <option name="{{$type->id}}" value="{{$type->id}}">{{$type->name}}</option> 
                              @endif
                            
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
                           
                            {value: {{ (array_key_exists('Femenino', $count_per_gender) ? $count_per_gender['Femenino'] : 0) }}, label: 'Mujeres', formatted: 'approx {{ (array_key_exists('Femenino', $count_per_gender) ? ($count_per_gender['Femenino']/$total)*100 : 0) }}%' },
                            {value: {{ (array_key_exists('Masculino', $count_per_gender) ? $count_per_gender['Masculino'] : 0) }}, label: 'Hombres', formatted: 'approx {{ (array_key_exists('Masculino', $count_per_gender) ? ($count_per_gender['Masculino']/$total)*100 : 0) }}%' },
                            {value: {{ (array_key_exists('Otro', $count_per_gender) ? $count_per_gender['Otro'] : 0) }}, label: 'Otro', formatted: 'approx {{ (array_key_exists('Otro', $count_per_gender) ? ($count_per_gender['Otro']/$total)*100 : 0) }}%' }
                          ],
                          formatter: function (x, data) { return data.formatted; }
                        });
                        </pre>
                        @endif
                        
                        
                    </div>
                    </div>
                </div>
                @endsection
             