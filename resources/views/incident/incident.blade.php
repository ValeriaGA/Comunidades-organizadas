{{--<div class="comment-body">
    <div class="user-img"> 
    	@if (!is_null($incident->user->avatar_path))
	        <img src="{{ asset('images/users/'.$incident->user->avatar_path) }}"  alt="user" class="img-circle">
	    @else
	        <img src="../plugins/images/users/profile.png"  alt="user" class="img-circle">
	    @endif
    </div>
    <div class="mail-contnet">
        <h5>{{ $incident->user->name }}</h5>
        <span class="time"><b>Fecha y Hora</b>: {{ $incident->date }} {{ $incident->time }}</span>
        <br/>
        <span class="time"><b>Lugar:</b> {{ $incident->location }}</span>
        <br/>
        <span class="time"><b>Tipo:</b> {{ $incident->typesOfIncident->name }}</span>
        <br/>
        <span class="mail-desc"> {{ $incident->description }} </span>
        <button id="likeButton{{$incident->id}}" onclick="{{'onclick_likeButton(this)'}}" class="btn btn btn-rounded btn-default btn-outline m-r-5 like-button" active="0">Gracias</button>
        <a href="/incident/{{ $incident->id }}" class="btn btn btn-rounded btn-default btn-outline m-r-5">
        	<i class="ti-check text-success m-r-5"></i>Detalles
        </a>
        
    </div>
</div>--}}
<div class="comment-body">
    <div class="user-img"> 
	        <img src="../plugins/images/users/profile.png"  alt="user" class="img-circle">
    </div>
    <div class="mail-contnet">
        <h5>{{ $incident->user->name }}</h5>
        <span class="time"><b>Fecha y Hora</b>: 2018 - 10 - 10</span>
        <br/>
        <span class="time"><b>Lugar:</b>San José, Costa Rica</span>
        <br/>
        <span class="time"><b>Tipo:</b>Asalto</span>
        <br/>
        <span class="mail-desc"> Asalto en parada de buses</span>
        <button id="likeButton1" onclick="{{'onclick_likeButton(this)'}}" class="btn btn btn-rounded btn-default btn-outline m-r-5 like-button" active="0">Gracias</button>
        <a href="/incident/1" class="btn btn btn-rounded btn-default btn-outline m-r-5">
        	<i class="ti-check text-success m-r-5"></i>Detalles
        </a>
        
    </div>
</div>