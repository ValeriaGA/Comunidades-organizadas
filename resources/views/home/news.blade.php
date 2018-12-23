
<div class="col-md-12 col-lg-8 col-sm-12">
    <div class="white-box">
        <div class="comment-center p-t-10">
			@foreach ($news as $news_report)
		        <div class="comment-body">
				    <div class="mail-contnet">
				        <h5>{{ $news_report->title }} </h5>
				        <span class="time"><b>Fecha y Hora</b>: {{ $news_report->date }} {{ $news_report->time }}</span>
				        <br/>
				        <span class="mail-desc"> {{ $news_report->description }} </span>
                        @auth
                            @if (Auth::user()->like()->where('report_id', $news_report->id)->first())
                                <button onclick="{{'onclick_likeButton(this)'}}" class="btn btn-rounded btn-success m-r-5 like" reportid="{{$news_report->id }}" active="1">Gracias</button>
                            @else
                                <button onclick="{{'onclick_likeButton(this)'}}" class="btn btn-rounded btn-success btn-outline m-r-5 like" reportid="{{$news_report->id }}" active="0">Gracias</button>
                            @endif
                        @endauth
				        <a href="/noticia/{{ $security_report->id }}" class="btn btn btn-rounded btn-info btn-outline m-r-5">Detalles</a>
				        <a href="/reportar/{{ $security_report->id }}" class="btn btn btn-rounded btn-danger btn-outline m-r-5">Reportar</a>
				        @if($news_report -> user_id == Auth::id())
							<a id="editReportButton" href="/noticia/editar/{{ $security_report->id }}" class="btn btn btn-rounded btn-warning btn-outline m-r-5">Editar</a>
						@endif
				    </div>
				</div>
			@endforeach 
        </div>
        {{ $news->links() }}
    </div>
</div>
