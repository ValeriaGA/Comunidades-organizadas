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
                        function data(x, num) {
                            this.x = x;
                            this.num = num;
                        }
<!-- 
                        var i;
                        var data[];
                        for(i=0; i < count_per_type.length-1; i++){
                          var data = new data(count_per_type[i][0], count_per_type[i][1]);
                          data_set.push(data);
                        } -->
                        data[
                          
                          {x: 'Actividad sospechosa', num: 9},
                          {x: 'Asalto', num: 1},
                          {x: 'Drogas', num: 2}
                       
                        ];

                        console.log(data_set);

                        Morris.Bar({
                          element: 'graph',
                          data: data,
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