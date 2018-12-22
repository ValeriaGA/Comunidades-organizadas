var victims_counter = 0;
var perpetrator_counter = 0;
var evidence_counter = 0;

function add_victim()
{
    victims_counter++;
    $("#victim_table").append('<tr id="victim_row_'+victims_counter+'" style="display: table-row;"><td><select name="victim_gender_'+victims_counter+'" id="victim_genders_'+victims_counter+'" class="form-control"></td><td><input type="button" onclick="remove_victim()" id="remove_victim_button" class="btn btn-danger btn-rounded" value="Remover"></td></tr>');
    $.ajax({
      url: "/generos",
      success: function(genders){
        var json = JSON.parse(genders);
        $.each(json, function(key, value){
          $('#victim_genders_' + victims_counter).append($('<option>', {
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
}

function remove_victim()
{
    if (victims_counter > 0)
    {
        $("#victim_row_"+victims_counter).remove();
        victims_counter--;
    }
}

function add_perpetrator()
{
    perpetrator_counter++;
    $("#perpetrator_table").append('<tr id="perpetrator_row_'+perpetrator_counter+'" style="display: table-row;"><td><select name="perpetrator_gender_'+perpetrator_counter+'" id="perpetrator_genders_'+perpetrator_counter+'" class="form-control"></td><td><textarea rows="2" class="form-control form-control-line" name="description_'+perpetrator_counter+'"></textarea></td><td><input type="button" onclick="remove_perpetrator()" id="remove_victim_button" class="btn btn-danger btn-rounded" value="Remover"></td></tr>');
    $.ajax({
      url: "/generos",
      success: function(genders){
        var json = JSON.parse(genders);
        $.each(json, function(key, value){
          $('#perpetrator_genders_' + perpetrator_counter).append($('<option>', {
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
}

function remove_perpetrator()
{
    if (perpetrator_counter > 0)
    {
        $("#perpetrator_row_"+perpetrator_counter).remove();
        perpetrator_counter--;
    }
}

function add_evidence()
{
  if (evidence_counter < 3)
  {
    evidence_counter++;
    $("#evidence_table").append('<tr id="evidence_row_'+evidence_counter+'" style="display: table-row;"><td><input type="file" name="file_'+evidence_counter+'"></td><td><input type="button" onclick="remove_perpetrator()" id="remove_evidence_button" class="btn btn-danger btn-rounded" value="Remover"></td></tr>');
  }else
  {
    alert("Intentando añadir mas archivos de evidencia que lo permitido.");
  }
}

function remove_evidence()
{
    if (evidence_counter > 0)
    {
        $("#evidence_row_"+evidence_counter).remove();
        evidence_counter--;
    }
}

function page_init_create_report_tables() {
    var victim_btn = document.getElementById('add_victim_button');
    var perpetrator_btn = document.getElementById('add_perpetrator_button');
    var evidence_btn = document.getElementById('add_evidence_button');

    if ((victim_btn != null) && (perpetrator_btn != null))
    {
        if (victim_btn.addEventListener) {
        // DOM2 standard
        victim_btn.addEventListener('click', add_victim, false);
        perpetrator_btn.addEventListener('click', add_perpetrator, false);
        }
        else if (victim_btn.attachEvent) {
            // IE (IE9 finally supports the above, though)
            victim_btn.attachEvent('onclick', add_victim);
            victim_btn.attachEvent('onclick', add_perpetrator);
        }
        else {
            // Really old or non-standard browser, try DOM0
            victim_btn.onclick = add_victim;
            victim_btn.onclick = add_perpetrator;
        }
    }

    if (evidence_btn != null)
    {
        if (evidence_btn.addEventListener) {
        // DOM2 standard
        evidence_btn.addEventListener('click', add_evidence, false);
        }
        else if (evidence_btn.attachEvent) {
            // IE (IE9 finally supports the above, though)
            evidence_btn.attachEvent('onclick', add_evidence);
        }
        else {
            // Really old or non-standard browser, try DOM0
            evidence_btn.onclick = add_evidence;
        }
    }
}

  $(document).ready(function(){
    
    page_init_create_report_tables();
  
  });