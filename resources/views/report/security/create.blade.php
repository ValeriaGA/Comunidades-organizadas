@extends('report.layouts.create_master')

@section('page-title', 'Reporte Seguridad')

@section('page-desc', 'Agregar reporte de seguridad')

@section('form', '/seguridad')

@section('tabs')
    <li class="tab">
        <a data-toggle="tab" href="#involved_tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-group fa-fw"></i></span> <span class="hidden-xs">Involucrados</span> </a>
    </li>
@endsection

@section('tab-content')
    <!-- Victims & Perpetrators w/ gender-->

    <div id="involved_tab" class="tab-pane">
        <div class="col-md-12">
            <div class="form-group">
                <label style="margin-left: 10px;">Víctimas</label>
                <a href="#" class="btn btn-default btn-sm pull-right" id="add-victim"><span class="fa fa-plus"></span></a>
                <hr />
                <div class="victim-item row form-group">
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label style="margin-left: 10px;">Perpetradores</label>
                <a href="#" class="btn btn-default btn-sm pull-right" id="add-perpetrator"><span class="fa fa-plus"></span></a>
                <hr />
                <div class="perpetrator-item row form-group">
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
@endsection

@section('details')
    <div class="form-group">
        <label class="col-md-12">Tipo de Arma (Si aplica)</label>
        <div class="col-md-12">
            <select class="form-control" name="weapon" required>
              @foreach ($cat_weapon as $weapon)
                <option value="{{$weapon->name}}">{{$weapon->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Medio de Transporte</label>
        <div class="col-md-12">
            <select class="form-control" name="transportation" required>
                @foreach ($cat_transportation as $transport)
                    <option value="{{$transport->name}}">{{$transport->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    
@endsection