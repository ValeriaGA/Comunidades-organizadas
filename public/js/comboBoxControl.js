function fillProvinces(){
    clearBoxes('provinces');
    $.ajax({
      url: "/provincias",
      success: function(provinces){
        fillControl('provinces', provinces);
        
        fillCantons();
      },
      error:function(xhr, ajaxOptions, errorInfo)
      {
        alert(xhr.status + " " + errorInfo);
      }
      
    });
    return 1; 
  }
  
  
  function fillCantons(){
    clearBoxes('cantons');
    
    var provinceID = getSelectedValue('provinces');

    var provinceInfo = {
        _token: $('meta[name="_token"]').attr('content'),
        id: provinceID
    }
    
    $.ajax({
      method:'POST',
      url: "/cantones",
      data:provinceInfo,
      dataType: "json",
      success: function(cantons){
        fillControl('cantons', cantons);
        fillDistricts();
      },
      error:function(xhr, ajaxOptions, errorInfo)
      {
        alert(xhr.status + " " + errorInfo);
      }
    });

    return 1;
  }
  
  function fillDistricts(){
    clearBoxes('districts');
  
    var cantonID = getSelectedValue('cantons');

    var cantonInfo = {
        _token: $('meta[name="_token"]').attr('content'),
        id: cantonID
    }
  
    $.ajax({
      method: 'POST',
      url: "/distritos",
      data:cantonInfo,
      dataType: "json",
      success: function(districts){
        fillControl('districts', districts);
      },
      error:function(xhr, ajaxOptions, errorInfo)
      {
        alert(xhr.status + " " + errorInfo);
      }
    });
    return 1;
  }
  
  
  function getSelectedValue(elementId){
    var elt = document.getElementById(elementId);
  
    if (elt.selectedIndex < 0)
    return null;
  
    return elt.options[elt.selectedIndex].value;
  }
  
  function getSelectedText(elementId) {
    var elt = document.getElementById(elementId);
    if (elt.selectedIndex == -1)
    return null;
  
    return elt.options[elt.selectedIndex].text;
  }
  
  function fillControl(controlID, items){
    
    var json = JSON.parse(items);
    $.each(json, function(key, value){
      $('#' + controlID).append($('<option>', {
              value: value['id'],
              text : value['name']
              
       }));
     });
     $("#" + controlID).val($("#" + controlID + " option:first").val());
     selected = $("#" + controlID + " option:selected").val();
  }

  

  function clearBoxes(controlID){
    $('#'+controlID).empty();
  }
  


  $(document).ready(function(){
    
    fillProvinces();
  
    $("#provinces").on('click', function(){
        fillCantons();

    });

    $("#cantons").on('click', function(){
        fillDistricts();

    });
  
  });
  