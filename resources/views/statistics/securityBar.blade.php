@extends('statistics.master')

@section('stats_content')

<!--row -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="white-box analytics-info">
                        <h2>Número de delitos por tipos</h2>
                        <form class="form-horizontal form-material" action="/statistics/securityBar" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <a>  Fecha de inicio:</a> 
                          <input id="first_date" type="date" placeholder="" class="form-control form-control-line" name="first_date" value="{{$first_date}}">
                          <a> Fecha de Final:</a>
                          <input id="final_date" type="date" placeholder="" class="form-control form-control-line" name="final_date" value="{{$final_date}}"><br>
                          <div class="form-group">
                              <div class="col-sm-12">
                                  <button class="btn btn-success">Actualizar</button>
                              </div>
                          </div>
                        </form>
                        
                        <div style="width:800px; overflow:auto;">
                          <div id="graph" style="width:1500px;"></div>
                        </div>
                        <pre id="code" class="prettyprint linenums">
                        // Use Morris.Bar
                        var count_per_type = <?php echo json_encode($count_per_type2); ?>;
      
                        var data_array_x = [];
                        $.each(count_per_type, function(key, value){
                              item = {}
                              item ["x"] = value[0];
                              item ["num"] = value[1];
                      
                              data_array_x.push(item);
                         });

                        Morris.Bar({
                          element: 'graph',
                          data: data_array_x,
                          xkey: 'x',
                          ykeys: ['num'],
                          labels: ['Num'],
                          yLabelFormat: function(y){ return y != Math.round(y)?'':y; },
                          numLines: data_array_x.length,
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