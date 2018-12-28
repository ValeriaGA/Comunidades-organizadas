<div class="col-md-12 col-lg-12 col-sm-12">
    <div class="white-box">
        <div class="comment-center p-t-10">
			@foreach ($security_reports as $report)
	            <div class="comment-body">
				    <div class="user-img"> 
					    @if (!is_null($report->user->avatar_path))
                            <img src="{{ asset('users/'.$report->user->id.'/'.$report->user->avatar_path) }}" alt="user-img" width="36" class="img-circle">
					    @else
                            <img src="../plugins/images/users/profile.png"  alt="user-img" width="36" class="img-circle">
					    @endif
				    </div>
				    <div class="mail-contnet">
				        <h5>{{ $report->title }}</h5>
				        <span class="time"><b>Fecha y Hora :</b>: {{ $report->date }} {{ $report->time }}</span>
				        <br/>
				        <span class="time"><b>Lugar :</b> {{ $report->communityGroup->name }}</span>
				        <br/>
				        <span class="time"><b>Tipo :</b> {{ $report->subCatReport->name }}</span>
				        <br/>
				        <span class="time"><b>Agradecimientos :</b> {{ count($report->like) }}</span>
				        <br/>
				        <span class="mail-desc"> {{ $report->description }} </span>
				        @include ('layouts.action_buttons')
						<hr>
				    	<span class="label label-table label-success">{{ $report->state->name }}</span>
					</div>
					
				</div>
			@endforeach
        </div>
        {{ $security_reports->links() }}
    </div>
</div>
