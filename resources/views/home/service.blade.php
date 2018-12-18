<div class="col-md-12 col-lg-8 col-sm-12">
    <div class="white-box">
        <div class="comment-center p-t-10">
            @foreach ($service_reports as $service_report)
                <div class="comment-body">
                    <div class="user-img"> 
                        @if (!is_null($service_report->user->avatar_path))
                            <img src="{{ asset('images/users/'.$service_report->user->avatar_path) }}"  alt="user" class="img-circle">
                        @else
                            <img src="../plugins/images/users/profile.png"  alt="user" class="img-circle">
                        @endif
                    </div>
                    <div class="mail-contnet">
                        <h5>{{ $service_report->user->name }}</h5>
                        <span class="time"><b>Fecha y Hora</b>: {{ $service_report->date }} {{ $service_report->time }}</span>
                        <br/>
                        <span class="time"><b>Lugar:</b> {{ $service_report->communityGroup->name }}</span>
                        <br/>
                        <span class="time"><b>Tipo:</b> {{ $service_report->subCatReport->name }}</span>
                        <br/>
                        <span class="mail-desc"> {{ $service_report->description }} </span>
                        <button id="likeButton1" onclick="{{'onclick_likeButton(this)'}}" class="btn btn btn-rounded btn-default btn-outline m-r-5 like-button" active="0">Gracias</button>
                        <a href="/servicio/{{ $service_report->id }}" class="btn btn btn-rounded btn-default btn-outline m-r-5">
                            <i class="ti-check text-success m-r-5"></i>Detalles
                        </a>
                        @if($service_report -> user_id == Auth::id())
							<a id="editReportButton" href="/seguridad/editar/{{ $service_report->id }}" class="btn btn btn-rounded btn-default btn-outline m-r-5" active="0">
								Editar
							</a>
						@endif
                    </div>
                </div>
            @endforeach
        </div>
        {{-- $service_reports->links() --}}
    </div>
</div>
