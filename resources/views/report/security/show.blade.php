@extends('report.layouts.show_master')

@section('tabs')
  <li role="presentation" class=""><a href="#specific1" aria-controls="specific" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Específicos</span></a></li>
  <li role="presentation" class=""><a href="#perpetrator1" aria-controls="perpetrator" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Involucrados</span></a></li>
@endsection

@section('tab-content')
    <div role="tabpanel" class="tab-pane fade" id="specific1">
      <div class="row">
        <div class="col-md-2 col-xs-6 b-r"> <strong>Categoría Reporte</strong>
            <br>
            <p class="text-muted">{{ $report->subCatReport->name }}</p>
        </div>
        <div class="col-md-2 col-xs-6 b-r"> <strong>Categoría Arma</strong>
            <br>
            <p class="text-muted">{{ $report->securityReport->catWeapon->name }}</p>
        </div>
        <div class="col-md-2 col-xs-6 b-r"> <strong>Medio de Transporte</strong>
            <br>
            <p class="text-muted">{{ $report->securityReport->catTransportation->name }}</p>
        </div>
        <div class="col-md-2 col-xs-6 b-r"> <strong># Víctimas</strong>
            <br>
            <p class="text-muted">{{ count($report->securityReport->victims) }}</p>
        </div>
        <div class="col-md-2 col-xs-6"> <strong># Perpetradores</strong>
            <br>
            <p class="text-muted">{{ count($report->securityReport->perpetrators) }}</p>
        </div>
      </div>

        <div class="clearfix"></div>
    </div>

    <div role="tabpanel" class="tab-pane fade" id="perpetrator1">
            
      <table class="table table-bordered" style="width: 100%;">
          <tr class="header" >
              <td colspan="2">
                  Perpetradores
              </td>
          </tr>
          <tr>
              <td><strong>Género</strong></td>
              <td><strong>Descripción</strong></td>
          </tr>
          @foreach($report->securityReport->perpetrators as $perpetrator)
            <tr>
                <td>{{ $perpetrator->gender->name}}</td>
                <td>{{ $perpetrator->description}}</td>
            </tr>
          @endforeach
          <tr class="header">
              <td>
                  Víctimas
              </td>
          </tr>
          <tr>
              <td><strong>Género</strong></td>
          </tr>
          @foreach($report->securityReport->victims as $victim)
            <tr>
                <td>{{ $victim->gender->name}}</td>
            </tr>
          @endforeach
      </table>
      <div class="clearfix"></div>
    </div>
@endsection