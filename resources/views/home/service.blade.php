<div class="col-md-12 col-lg-12 col-sm-12">
    <div class="white-box">
        <div class="comment-center p-t-10">
            @foreach ($service_reports as $report)
                <div class="comment-body">
                    <div class="mail-contnet">
                        <div class="row">
                            <div class="col-md-4">
                                @include('home.layouts.evidence')
                            </div>
                            <div class="col-md-8">
                                <h5>{{ $report->title }}</h5>
                                <span class="time"><b>Fecha y Hora :</b> {{ $report->date }} {{ $report->time }}</span>
                                <br/>
                                <span class="time"><b>Lugar :</b> {{ $report->communityGroup->name }}</span>
                                <br/>
                                <span class="time"><b>Tipo :</b> {{ $report->subCatReport->name }}</span>
                                <br/>
                                <span id="likes_lbl_{{$report->id}}" class="time" value="{{ count($report->like) }}"><b>Agradecimientos :</b> {{ count($report->like) }}</span>
                                <br/>
                                <span class="mail-desc"> {{ $report->description }} </span>
                                <br/>
                                <span class="label label-success">{{ $report->state->name }}</span>
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
        {{ $service_reports->links() }}
    </div>
</div>
