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
                            <option name="{{$type->name}}" value="{{$type->name}}">{{$type->name}}</option> 
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