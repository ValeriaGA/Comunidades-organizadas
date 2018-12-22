<div class="col-md-12 col-lg-8 col-sm-12">
    <div class="white-box">
        <div class="comment-center p-t-10">
			@foreach ($security_reports as $security_report)
	            <div class="comment-body">
				        <span class="label label-table label-success">{{ $security_report->state->name }}</span>
				        <br/>
				    <div class="user-img"> 
					    @if (!is_null($security_report->user->avatar_path))
					        <img src="{{ asset('images/users/'.$security_report->user->avatar_path) }}"  alt="user" class="img-circle">
					    @else
					        <img src="../plugins/images/users/profile.png"  alt="user" class="img-circle">
					    @endif
				    </div>
				    <div class="mail-contnet">
				        <h5>{{ $security_report->title }}</h5>
				        <span class="time"><b>Fecha y Hora</b>: {{ $security_report->date }} {{ $security_report->time }}</span>
				        <br/>
				        <span class="time"><b>Lugar:</b> {{ $security_report->communityGroup->name }}</span>
				        <br/>
				        <span class="time"><b>Tipo:</b> {{ $security_report->subCatReport->name }}</span>
				        <br/>
				        <span class="mail-desc"> {{ $security_report->description }} </span>
				        <button id="likeButton1" onclick="{{'onclick_likeButton(this)'}}" class="btn btn btn-rounded btn-success btn-outline m-r-5 like-button" active="0">Gracias</button>
				        <a href="/seguridad/{{ $security_report->id }}" class="btn btn btn-rounded btn-info btn-outline m-r-5">Detalles</a>
				        <a href="/reportar/{{ $security_report->id }}" class="btn btn btn-rounded btn-danger btn-outline m-r-5">Reportar</a>
						@if($security_report -> user_id == Auth::id())
							<a id="editReportButton" href="/seguridad/editar/{{ $security_report->id }}" class="btn btn btn-rounded btn-warning btn-outline m-r-5">Editar</a>
						@endif
					</div>
					
				</div>
			@endforeach
        </div>
        {{-- $security_reports->links() --}}
    </div>
</div>
