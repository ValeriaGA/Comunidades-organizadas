<div id="responsive-modal_{{$report->id}}" class="modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog" style="left:-20%;width:80%;top:10%;">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <div id="myModalCarousel_{{$report->id}}" class="carousel slide" data-ride="carousel">

				  <!-- Wrapper for slides -->
				  <div class="carousel-inner">
				  	@foreach ($report->evidence as $modal_evidence)
						@if ($modal_evidence->evidenceType->name == 'Imagen')
							<div class="item {{ $loop->first ? 'active' : ' '}}">
						      <img src="{{ asset('evidence/'.$report->id.'/'.$modal_evidence->multimedia_path) }}" alt="$modal_evidence->multimedia_path">
						    </div>
						@endif
					@endforeach
				  </div>

				  <!-- Left and right controls -->
				  <a class="left carousel-control" href="#myModalCarousel_{{$report->id}}" data-slide="prev">
				    <span class="glyphicon glyphicon-chevron-left"></span>
				    <span class="sr-only">Previous</span>
				  </a>
				  <a class="right carousel-control" href="#myModalCarousel_{{$report->id}}" data-slide="next">
				    <span class="glyphicon glyphicon-chevron-right"></span>
				    <span class="sr-only">Next</span>
				  </a>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div id="myCarousel_{{$report->id}}" class="carousel slide" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
  	@foreach ($report->evidence as $evidence)
		@if ($evidence->evidenceType->name == 'Imagen')
			<div class="item {{ $loop->first ? 'active' : ' '}}">
		      <img src="{{ asset('evidence/'.$report->id.'/'.$evidence->multimedia_path) }}" alt="$evidence->multimedia_path" data-toggle="modal" data-target="#responsive-modal_{{$report->id}}">
		    </div>
		@endif
	@endforeach
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel_{{$report->id}}" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel_{{$report->id}}" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>