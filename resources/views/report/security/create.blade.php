@extends('report.layouts.create_master')

@section('page-title', 'Reporte Seguridad')

@section('page-desc', 'Agregar reporte de seguridad')

@section('form', '/seguridad')

@section('tabs')
    <li id="li_tab3" class="tab">
        <a data-toggle="tab" href="#tab3" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-group fa-fw"></i></span> <span class="hidden-xs">Involucrados</span> </a>
    </li>
@endsection

@section('tab-content')
    <!-- Victims & Perpetrators w/ gender-->

    <div id="tab3" class="tab-pane">

        <div class="col-sm-12">
            <div class="form-group">
                <div class="progress">
                    <div class="progress-bar bg-success " role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="0" style="width:75%;"></div>
                </div>
            </div>
        </div>

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
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary" style="width: 100%;" value="4" onclick="nextTab(this)">Siguiente</button>
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