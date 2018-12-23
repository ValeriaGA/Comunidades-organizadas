@auth
    @if (Auth::user()->like()->where('report_id', $report->id)->first())
        <button onclick="{{'onclick_likeButton(this)'}}" class="btn btn-success waves-effect waves-light like" reportid="{{$report->id }}" active="1"><span class="btn-label"><i class="fa fa-heart m-l-5"></i></span> Gracias</button>
    @else
        <button onclick="{{'onclick_likeButton(this)'}}" class="btn btn-success waves-effect waves-light btn-outline like" reportid="{{$report->id }}" active="0"><span class="btn-label"><i class="fa fa-heart m-l-5"></i></span> Gracias</button>
    @endif
@endauth

<a href="/reporte/{{ $report->id }}" class="btn btn-info waves-effect waves-light btn-outline"><span class="btn-label"><i class="fa fa-info-circle m-l-5"></i></span> Detalles</a>
<a href="/reportar/{{ $report->id }}" class="btn btn-danger waves-effect waves-light btn-outline"><span class="btn-label"><i class="fa fa-exclamation-triangle m-l-5"></i></span> Reportar</a>
@if($report -> user_id == Auth::id())
	<a id="editReportButton" href="/reporte/editar/{{ $report->id }}" class="btn btn-warning waves-effect waves-light btn-outline"><span class="btn-label"><i class="fa fa-wrench m-l-5"></i></span> Editar</a>
@endif
