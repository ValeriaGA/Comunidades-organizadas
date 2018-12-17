
<div class="col-md-12 col-lg-8 col-sm-12">
    <div class="white-box">
        <div class="comment-center p-t-10">
			@foreach ($news as $news_report)
		        <div class="comment-body">
				    <div class="mail-contnet">
				        <h5>news_report->title</h5>
				        <span class="time"><b>Fecha y Hora</b>: {{ $news_report->date }} {{ $news_report->time }}</span>
				        <br/>
				        <span class="mail-desc"> {{ $news_report->description }} </span>
				        <button id="likeButton1" onclick="{{'onclick_likeButton(this)'}}" class="btn btn btn-rounded btn-default btn-outline m-r-5 like-button" active="0">Gracias</button>
				    </div>
				</div>
			@endforeach 
        </div>
        {{ $news->links() }}
    </div>
</div>
