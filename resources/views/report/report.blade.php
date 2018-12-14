<div class="comment-body">
    <div class="user-img"> 
    	@if (!is_null($report->user->avatar_path))
	        <img src="{{ asset('images/users/'.$report->user->avatar_path) }}"  alt="user" class="img-circle">
	    @else
	        <img src="../plugins/images/users/profile.png"  alt="user" class="img-circle">
	    @endif
    </div>
    <div class="mail-contnet">
        <h5>{{ $report->user->name }}</h5>
        <span class="time"><b>Fecha y Hora</b>: {{ $report->date }} {{ $report->time }}</span>
        <br/>
        <span class="time"><b>Lugar:</b> {{ $report->communityGroup->name }}</span>
        <br/>
        <span class="time"><b>Tipo:</b> {{ $report->subCatReport->name }}</span>
        <br/>
        <span class="mail-desc"> {{ $report->description }} </span>
        <a href="/report/{{ $report->id }}" class="btn btn btn-rounded btn-default btn-outline m-r-5">
        	<i class="ti-check text-success m-r-5"></i>Detalles
        </a>
    </div>
</div>