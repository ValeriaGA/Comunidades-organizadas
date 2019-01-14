<div class="col-md-12 col-lg-12 col-sm-12">
    <div class="white-box">
        <div class="comment-center p-t-10">
			@foreach ($news as $report)
		        <div class="comment-body">
				    <div class="mail-contnet">
				    	<div class="row">
				    		<div class="col-md-4">
					    		@include('home.layouts.evidence')
					    	</div>
					    	<div class="col-md-8">
					    		<h5>{{ $report->title }} </h5>
						        <span class="time"><b>Fecha y Hora</b>: {{ $report->date }} {{ $report->time }}</span>
                                <br/>
                                <span class="time"><b>Grupo de Comunidades :</b> {{ $report->communityGroup->name }}</span>
						        <br/>
						        <span id="likes_lbl_{{$report->id}}" class="time" value="{{ count($report->like) }}"><b>Agradecimientos</b>: {{ count($report->like) }}</span>
						        <br/>
						        <span class="mail-desc"> {{ $report->description }} </span>
					    	</div>
				    	</div>
				    	<br />
				        <div class="row">
                        	@include ('layouts.action_buttons')
				        </div>
				    </div>
				</div>
			@endforeach 
        </div>
        {{ $news->links() }}
    </div>
</div>
