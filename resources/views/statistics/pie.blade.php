@extends('statistics.master')

@section('stats_content')

<!--row -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="white-box analytics-info">
                        <h2>Proporcion de mujeres y hombres victimas</h2>
                        <a><strong>Seleccione un delito:</strong></a>
                        <form class="form-horizontal form-material" action="/statistics/pie"  method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <select style="background-color: white;" name="delitos">
                            @foreach ($types as $type)
                            @if ($type->id)
                            <option name="{{$type->id}}" value="{{$type->id}}" seleted>{{$type->name}}</option> 
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
                        <div id="graph"></div>
                        <pre id="code" class="prettyprint linenums">
                        Morris.Donut({
                          element: 'graph',
                          data: [
                           
                            {value: {{ (array_key_exists('femenino', $count) ? $count['femenino'] : 0) }}, label: 'Mujeres', formatted: 'approx {{ (array_key_exists('femenino', $count) ? ($count['femenino']/$total)*100 : 0) }}%' },
                            {value: {{ (array_key_exists('masculino', $count) ? $count['masculino'] : 0) }}, label: 'Hombres', formatted: 'approx {{ (array_key_exists('masculino', $count) ? ($count['masculino']/$total)*100 : 0) }}%' },
                            {value: {{ (array_key_exists('otro', $count) ? $count['otro'] : 0) }}, label: 'Otro', formatted: 'approx {{ (array_key_exists('otro', $count) ? ($count['otro']/$total)*100 : 0) }}%' }
                          ],
                          formatter: function (x, data) { return data.formatted; }
                        });
                        </pre>
                    </div>
                    </div>
                </div>
                @endsection
             