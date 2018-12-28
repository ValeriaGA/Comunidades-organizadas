var VictimList = {

    addVictimBtn: $('#add-victim'),
    victimTemplate: '<div class="victim-item row form-group"> \
                        <div class="col-sm-1"> \
                            <a href="#" class="btn btn-default btn-sm remove-victim"><span class="fa fa-minus"></span></a> \
                        </div> \
                        <div class="col-sm-10 victim-gender"> \
                            <select name="victim_gender[]" class="form-control gender_select"> \
                            </select> \
                        </div> \
                    </div>',

    init: function() { 
        this.bindUIActions();
    },
    bindUIActions: function() {
        this.addVictimBtn.click(function () {
            $('.victim-item:last').after(VictimList.victimTemplate);  

            $.ajax({
              url: "/generos",
              success: function(genders){
                var json = JSON.parse(genders);
                $.each(json, function(key, value){
                  $('.victim-item:last').find('.gender_select').append($('<option>', {
                          value: value['id'],
                          text : value['name']
                   }));
                 });
              },

              error:function(xhr, ajaxOptions, errorInfo)
              {
                alert(xhr.status + " " + errorInfo);
              }
            });

            return false;
        });

        

        $(document).on('click', 'a.remove-victim', function (e) {
            if($(this).parent().parent().is(':first-child')){
                return;
            };
            $(this).parent().parent().remove();
            return false;
        });
    },
};

var PerpetratorList = {

    addPerpetratorBtn: $('#add-perpetrator'),
    perpetratorTemplate: '<div class="perpetrator-item row form-group"> \
                            <div class="col-sm-1"> \
                                <a href="#" class="btn btn-default btn-sm remove-perpetrator"><span class="fa fa-minus"></span></a> \
                            </div> \
                            <div class="col-sm-5 perpetrator-gender"> \
                                <select name="perpetrator_gender[]" class="form-control perpetrator_select"> \
                                </select> \
                            </div> \
                            <div class="col-sm-5 perpetrator-description"> \
                                <textarea name="perpetrator_description[]" rows="2" class="form-control form-control-line" placeholder="Una breve descripción del sujeto"></textarea> \
                            </div> \
                        </div>',

    init: function() { 
        this.bindUIActions();
    },
    bindUIActions: function() {
        this.addPerpetratorBtn.click(function () {
            $('.perpetrator-item:last').after(PerpetratorList.perpetratorTemplate);
            $.ajax({
              url: "/generos",
              success: function(genders){
                var json = JSON.parse(genders);
                $.each(json, function(key, value){
                  $('.perpetrator-item:last').find('.perpetrator_select').append($('<option>', {
                          value: value['id'],
                          text : value['name']
                   }));
                 });
              },
              error:function(xhr, ajaxOptions, errorInfo)
              {
                alert(xhr.status + " " + errorInfo);
              }
            });

            return false;
        });

        

        $(document).on('click', 'a.remove-perpetrator', function (e) {
            if($(this).parent().parent().is(':first-child')){
                return;
            };
            $(this).parent().parent().remove();
            return false;
        });
    },
};



var EvidenceList = {

    addEvidenceBtn: $('#add-evidence'),
    evidenceTemplate: '<div class="evidence-item row form-group"> \
                        <div class="col-sm-1"> \
                            <a href="#" class="btn btn-default btn-sm remove-evidence"><span class="fa fa-minus"></span></a> \
                        </div> \
                        <div class="col-sm-11"> \
                            <div class="fileinput fileinput-new input-group" data-provides="fileinput"> \
                              <div class="form-control" data-trigger="fileinput"> \
                                <i class="glyphicon glyphicon-file fileinput-exists"></i> \
                                <span class="fileinput-filename"></span> \
                              </div> \
                              <span class="input-group-addon btn btn-default btn-file"> \
                                <span class="fileinput-new">Seleccionar</span> \
                                <span class="fileinput-exists">Cambiar</span> \
                                <input type="file" name="evidence_file[]"> \
                              </span> \
                              <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remover</a> \
                            </div> \
                        </div> \
                    </div>',

    init: function() { 
        this.bindUIActions();
    },
    bindUIActions: function() {
        this.addEvidenceBtn.click(function () {
            $('.evidence-item:last').after(EvidenceList.evidenceTemplate);
            return false;
        });
        $(document).on('click', 'a.remove-evidence', function (e) {
            if($(this).parent().parent().is(':first-child')){
                return;
            };
            $(this).parent().parent().remove();
            return false;
        });
    },
};

  $(document).ready(function(){
    
    VictimList.init();
    PerpetratorList.init();
    EvidenceList.init();
  });