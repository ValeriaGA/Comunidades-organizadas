@extends('statistics.master')

@section('js')
  <script src="{{asset('js/timeStatisticsControl.js')}}"></script>
@endsection


@section('stats_content')


<!--row -->
<div class="row" >
    <div class="col-sm-12">
      <div class="white-box" style="height: 400px;">
          <h3 class="box-title">Filtros</h3>
        
        <form method="post" action="/statistics/tiempo" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="col-sm-2">
            Filtrar por año:
            <br/>
            <br/>
            <select class="form-control" style="background-color: white; width:100px;" name="date">

              @for($i = 0; $i < 10; ++$i)
                @if(($date - $i) == $selectedDate)
                  <option value="{{$date - $i}}" selected>{{$date - $i}}</option>
                @else
                <option value="{{$date - $i}}">{{$date - $i}}</option>
                @endif 
              @endfor
            </select>
          </div>

          <div class="col-sm-2">
            Personas que reportortaron:
            <br/>
            <br/>
            <label style="display: inline;">Sexo</label>
            <select class="form-control" style="background-color: white; width:150px; display:inline;" name="gender">

              @if ($selectedGender == "")
                <option value="" selected>Todos</option>
              @else 
                <option value="">Todos</option>
              @endif

              @foreach($genders as $gender) 
                @if ($gender -> name == $selectedGender)
                  <option value="{{$gender -> name}}" selected>{{$gender -> name}}</option> 
                @else
                  <option value="{{$gender -> name}}">{{$gender -> name}}</option> 
                @endif

              @endforeach 

            </select>

            <br/>
            <br/>
            <label style="display: inline;">Procedencia</label>
            <select class="form-control" style="background-color: white; width:150px;" name="procedence">

                @if ($selectedProcedence == "Ambos")
                  <option value="Ambos" selected>Ambos</option> 
                  <option value="Nacionales">Nacionales</option> 
                  <option value="Extranjeros">Extranjeros</option>

                @elseif($selectedProcedence == "Nacionales")
                  <option value="Ambos">Ambos</option> 
                  <option value="Nacionales" selected>Nacionales</option> 
                  <option value="Extranjeros">Extranjeros</option>

                @else 
                  <option value="Ambos">Ambos</option> 
                  <option value="Nacionales">Nacionales</option> 
                  <option value="Extranjeros" selected>Extranjeros</option>

                @endif
            </select>
          
          </div>

          <div class="col-sm-8">
            Grupo de Comunidades:
            <br/>
            <br/>
            <div style="margin-top: 25px; margin-left: 0px; display:inline;">
                <label >Provincia</label>
                
                <select id="provinces" style="width:110px; display:inline;" class="form-control" name="province">
                  
                  @foreach ($provinces as $item)
                    @if($item -> id == $selectedItems['selectedProvince'] -> id)
                      <option value="{{$item -> id}}" selected>{{$item -> name}}</option>
                    @else
                      <option value="{{$item -> id}}">{{$item -> name}}</option>
                    @endif
                  @endforeach
                       
                
                </select>
            </div>

              <div style="margin-top: 25px; margin-left: 10px; display:inline;">
                  <label >Cantón</label>
                  <input name="selectedCanton" type="hidden" value="{{$selectedItems['selectedCanton']}}"/>
                  <select id="cantons" style="width:110px; display:inline;" class="form-control"  name="canton" >
                    @foreach ($selectedItems['selectedProvince'] -> canton() -> get() as $item)
                      @if($item -> id == $selectedItems['selectedCanton'] -> id)
                        <option value="{{$item -> id}}" selected>{{$item -> name}}</option>
                      @else
                        <option value="{{$item -> id}}">{{$item -> name}}</option>
                      @endif
                    @endforeach

                  </select>
              </div>


              <div style="margin-top: 25px; margin-left: 10px; display:inline;">
                  <label >Distrito</label>
                  
                  <select id="districts" style="width:110px; display:inline;" class="form-control" name="district">
                    @foreach ($selectedItems['selectedCanton'] -> district() -> get() as $item)
                      @if($item -> id == $selectedItems['selectedDistrict'] -> id)
                        <option value="{{$item -> id}}" selected>{{$item -> name}}</option>
                      @else
                        <option value="{{$item -> id}}">{{$item -> name}}</option>
                      @endif
                    @endforeach
                  </select>
              </div>
                    

              <br/>
              <br/>
              <div style="margin-top: 25px; margin-left: 50px; display:inline; margin-top: 10px;">
                  <label>Comunidad</label>
                  
                  <select id="communities" style="width:180px; display:inline;" class="form-control"  name="community">
                    @if(!is_null($selectedItems['selectedCommunity']))
                      @foreach ($selectedItems['selectedDistrict'] -> community() -> get() as $item)
                        @if($item -> id == $selectedItems['selectedCommunity'] -> id)
                          <option value="{{$item -> id}}" selected>{{$item -> name}}</option>
                        @else
                          <option value="{{$item -> id}}">{{$item -> name}}</option>
                      @endif
                  @endforeach
                    @else
                        <option value="" selected>Sin Comunidades</option>
                    @endif

                  </select>
                  
              </div>

              <div style="margin-top: 25px; margin-left: 50px; display:inline; margin-top: 10px;">
                  <label>Grupo</label>
                  
                  <select id="communityGroups" style="width:180px; display:inline;" class="form-control"  name="group">

                      @if(!is_null($selectedItems['selectedCommunity']) && !is_null($selectedItems['selectedGroup']))

                        @foreach ($selectedItems['selectedCommunity'] -> communityGroup() -> get() as $item)
                          @if($item -> id == $selectedItems['selectedGroup'] -> id)
                            <option value="{{$item -> id}}" selected>{{$item -> name}}</option>
                          @else
                            <option value="{{$item -> id}}">{{$item -> name}}</option>
                        @endif
                      @endforeach
                      
                    @else
                        <option value="" selected>Sin Grupos</option>
                    @endif

                  </select>
                  
              </div>
              <br/>
              <br/>

              @if($anyGroup == null)
                <input type="checkbox" name="noCommunitiesCheckbox" value="1" style="margin-left: 150px;"> Utilizar cualquier Grupo
              @else
                <input type="checkbox" name="noCommunitiesCheckbox" value="1" style="margin-left: 150px;" checked> Utilizar cualquier Grupo
              @endif


          </div>
          <br/>
          <br/>
          <br/>
          <button class="btn btn-success" style="margin-top: 100px; margin-left:100px;">Actualizar</button>
        </form>
        
        </div>

         
      </div>
    </div>

<div class="row">
    <div class="col-md-12">
        <div class="white-box analytics-info">
        <h2>Cantidad de Reportes en el año {{$selectedDate}}</h2>

        <div style="overflow:auto;">
        <div id="graph" style="width: 1500px;"></div>
        </div>

        <pre id="code" class="prettyprint linenums">
        var day_data = [
          {"elapsed": "Enero", "valor": {{ (array_key_exists('January', $dic) ? $dic['January'] : 0) }} },
          {"elapsed": "Febrero", "valor": {{ (array_key_exists('February', $dic) ? $dic['February'] : 0) }} },
          {"elapsed": "Marzo", "valor": {{ (array_key_exists('March', $dic) ? $dic['March'] : 0) }} },
          {"elapsed": "Abril", "valor": {{ (array_key_exists('April', $dic) ? $dic['April'] : 0) }} },
          {"elapsed": "Mayo", "valor": {{ (array_key_exists('May', $dic) ? $dic['May'] : 0) }} },
          {"elapsed": "Junio", "valor": {{ (array_key_exists('June', $dic) ? $dic['June'] : 0) }} },
          {"elapsed": "Julio", "valor": {{ (array_key_exists('July', $dic) ? $dic['July'] : 0) }} },
          {"elapsed": "Agosto", "valor": {{ (array_key_exists('August', $dic) ? $dic['August'] : 0) }} },
          {"elapsed": "Septiembre", "valor": {{ (array_key_exists('September', $dic) ? $dic['September'] : 0) }} },
          {"elapsed": "Octubre", "valor": {{ (array_key_exists('October', $dic) ? $dic['October'] : 0) }} },
          {"elapsed": "Noviembre", "valor": {{ (array_key_exists('November', $dic) ? $dic['November'] : 0) }} },
          {"elapsed": "Diciembre", "valor": {{ (array_key_exists('December', $dic) ? $dic['December'] : 0) }} }
        ];
        Morris.Line({
          element: 'graph',
          data: day_data,
          xkey: 'elapsed',
          ykeys: ['valor'],
          labels: ['valor'],
          parseTime: false
        });
        </pre>
      </div>
    </div>
</div>
 

    
@endsection