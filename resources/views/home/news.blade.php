
<div class="col-md-12 col-lg-12 col-sm-12">
    <div class="white-box">
        <div class="comment-center p-t-10">
			@foreach ($news as $report)
		        <div class="comment-body">
				    <div class="mail-contnet">
				        <h5>{{ $report->title }} </h5>
				        <span class="time"><b>Fecha y Hora</b>: {{ $report->date }} {{ $report->time }}</span>
				        <br/>
				        <span class="time"><b>Agradecimientos</b>: {{ count($report->like) }}</span>
				        <br/>
				        <span class="mail-desc"> {{ $report->description }} </span>
                        @include ('layouts.action_buttons')
				    </div>
				</div>
			@endforeach 
        </div>
        {{ $news->links() }}
    </div>
</div>
