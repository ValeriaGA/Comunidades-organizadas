@extends('statistics.master')

@section('stats_content')

<!--row -->
                <div class="row">
                    <div class="col-md-10">
                        <div class="white-box analytics-info">
                        <h2>Numero de delitos por tipos</h2>
                        <form class="form-horizontal form-material" action="/statistics/bar" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                          <a>  Fecha de inicio:</a> 
                          <input id="first_date" type="date" placeholder="" class="form-control form-control-line" name="first_date" value="2013-10-10">
                          <a> Fecha de Final:</a>
                          <input id="final_date" type="date" placeholder="" class="form-control form-control-line" name="final_date" value="{{$date}}"><br>
                          <div class="form-group">
                              <div class="col-sm-12">
                                  <button class="btn btn-success">Actualizar</button>
                              </div>
                          </div>
                        </form>
                        
                        <div id="graph"></div>
                        <pre id="code" class="prettyprint linenums">
                        // Use Morris.Bar
                        var count_per_type = <?php echo json_encode($count_per_type1); ?>;
      
                        Morris.Bar({
                          element: 'graph',
                          data: [
                          
                          {x: count_per_type[0][0], num: count_per_type[0][1]},
                          {x: count_per_type[1][0], num: count_per_type[1][1]},
                          {x: count_per_type[2][0], num: count_per_type[2][1]},
                          {x: count_per_type[3][0], num: count_per_type[3][1]},
                          {x: count_per_type[4][0], num: count_per_type[4][1]},
                          {x: count_per_type[5][0], num: count_per_type[5][1]},
                          {x: count_per_type[6][0], num: count_per_type[6][1]},
                          {x: count_per_type[7][0], num: count_per_type[7][1]},
                          {x: count_per_type[8][0], num: count_per_type[8][1]}
                       
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