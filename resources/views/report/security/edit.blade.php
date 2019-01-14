@extends('report.layouts.edit_master')

@section('page-title', 'Seguridad')

@section('page-desc', 'Editar reporte de seguridad')

@section('form', '/seguridad')

@section('tabs')
    <li id="li_tab4" class="tab">
        <a data-toggle="tab" href="#tab4" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-group fa-fw"></i></span> <span class="hidden-xs">Involucrados</span> </a>
    </li>
    
@endsection

@section('tab-content')
    <!-- Victims & Perpetrators w/ gender-->

    <div id="tab4" class="tab-pane">

        @include ('report.layouts.progress_bar', ['progress' => 75])
        
        <div class="col-md-12">
            <div class="form-group">
                <label style="margin-left: 10px;">Víctimas</label>
                <a href="#" class="btn btn-default btn-sm pull-right" id="add-victim"><span class="fa fa-plus"></span></a>
                <hr />
                <div class="victim-item row form-group">
                </div>
                @foreach($report->securityReport->victims as $victim)

                    <div class="victim-item row form-group">
                        <div class="col-sm-1">
                            <a href="#" class="btn btn-default btn-sm remove-victim"><span class="fa fa-minus"></span></a>
                        </div>
                        <div class="col-sm-10 victim-gender">
                            <select name="victim_gender[]" class="form-control gender_select">
                                @foreach($genders as $gender)
                                    @if ($victim->gender_id == $gender->id)
                                        <option value="{{ $gender->id }}" selected>{{ $gender->name }}</option>
                                    @else
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label style="margin-left: 10px;">Perpetradores</label>
                <a href="#" class="btn btn-default btn-sm pull-right" id="add-perpetrator"><span class="fa fa-plus"></span></a>
                <hr />
                <div class="perpetrator-item row form-group">
                </div>
                @foreach($report->securityReport->perpetrators as $perpetrator)

                    <div class="perpetrator-item row form-group">
                        <div class="col-sm-1">
                            <a href="#" class="btn btn-default btn-sm remove-perpetrator"><span class="fa fa-minus"></span></a>
                        </div>
                        <div class="col-sm-5 perpetrator-gender">
                            <select name="perpetrator_gender[]" class="form-control gender_select">
                                @foreach($genders as $gender)
                                    @if ($perpetrator->gender_id == $gender->id)
                                        <option value="{{ $gender->id }}" selected>{{ $gender->name }}</option>
                                    @else
                                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-5 perpetrator-description">
                            <textarea name="perpetrator_description[]" rows="2" class="form-control form-control-line" placeholder="Una breve descripción del sujeto">{{ $perpetrator->description }}</textarea>
                        </div>
                    </div>

                @endforeach
            </div>
        </div>
        <div class="col-sm-12">
            <button type="button" class="btn btn-primary" style="width: 100%;" value="5" onclick="nextTab(this)">Siguiente</button>
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
                <option value="{{$weapon->name}}" {{ $weapon->name == $report->securityReport->catWeapon->name ? 'selected' : '' }}>{{$weapon->name}}</option>
              @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-12">Medio de Transporte</label>
        <div class="col-md-12">
            <select class="form-control" name="transportation" required>
                @foreach ($cat_transportation as $transport)
                    <option value="{{$transport->name}}" {{ $transport->name == $report->securityReport->catTransportation->name ? 'selected' : '' }}>{{$transport->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    
@endsection