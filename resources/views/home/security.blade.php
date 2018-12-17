<div class="col-md-12 col-lg-8 col-sm-12">
    <div class="white-box">
        <div class="comment-center p-t-10">
			@foreach ($security_reports as $security_report)
	            <div class="comment-body">
				    <div class="user-img"> 
					    @if (!is_null($security_report->user->avatar_path))
					        <img src="{{ asset('images/users/'.$security_report->user->avatar_path) }}"  alt="user" class="img-circle">
					    @else
					        <img src="../plugins/images/users/profile.png"  alt="user" class="img-circle">
					    @endif
				    </div>
				    <div class="mail-contnet">
				        <h5>{{ $security_report->user->name }}</h5>
				        <span class="time"><b>Fecha y Hora</b>: {{ $security_report->date }} {{ $security_report->time }}</span>
				        <br/>
				        <span class="time"><b>Lugar:</b> {{ $security_report->communityGroup->name }}</span>
				        <br/>
				        <span class="time"><b>Tipo:</b> {{ $security_report->subCatReport->name }}</span>
				        <br/>
				        <span class="mail-desc"> {{ $security_report->description }} </span>
				        <button id="likeButton1" onclick="{{'onclick_likeButton(this)'}}" class="btn btn btn-rounded btn-default btn-outline m-r-5 like-button" active="0">Gracias</button>
				        <a href="/reporte/{{ $security_report->id }}" class="btn btn btn-rounded btn-default btn-outline m-r-5">
				        	<i class="ti-check text-success m-r-5"></i>Detalles
				        </a>
				    </div>
				</div>
			@endforeach
        </div>
        {{-- $security_reports->links() --}}
    </div>
</div>
