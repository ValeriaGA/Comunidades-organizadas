<div id="SERVICES" class="tabcontent">
    <div class="row">
        <div class="col-md-12 col-lg-8 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Reportes recientes</h3>
                <div class="comment-center p-t-10">
                    
                    @include('report.report')
                </div>

                {{ $reports->links() }}
            </div>
        </div>
    </div>
</div>