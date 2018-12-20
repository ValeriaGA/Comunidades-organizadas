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
        //fillCommunities();
      },
      error:function(xhr, ajaxOptions, errorInfo)
      {
        alert(xhr.status + " " + errorInfo);
      }
    });
    return 1;
  }

  function fillCommunities(){
    clearBoxes('communities');
  
    var communityID = getSelectedValue('districts');

    var communityInfo = {
        _token: $('meta[name="_token"]').attr('content'),
        id: communityID
    }
  
    $.ajax({
      method: 'POST',
      url: "/comunidades",
      data:communityInfo,
      dataType: "json",
      success: function(communities){
        fillControl('communities', communities);
        //fillGroups();
      },
      error:function(xhr, ajaxOptions, errorInfo)
      {
        alert(xhr.status + " " + errorInfo + " Communities");
      }
    });
    return 1;
  }

  function fillGroups(){
    clearBoxes('community_groups');
  
    var groupID = getSelectedValue('communities');

    var groupInfo = {
        _token: $('meta[name="_token"]').attr('content'),
        id: groupID
    }
  
    $.ajax({
      method: 'POST',
      url: "/grupos",
      data:groupInfo,
      dataType: "json",
      success: function(community_groups){
        fillControl('community_groups', community_groups);
      },
      error:function(xhr, ajaxOptions, errorInfo)
      {
        alert(xhr.status + " " + errorInfo + " Groups");
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

    $("#provinces").on('change', function(){
        fillCantons();
        
    });

    $("#cantons").on('change', function(){
        fillDistricts();

    });

    $("#districts").on('change', function(){
        fillCommunities();

    });

    $("#communities").on('change', function(){
        fillGroups();

    });
  
  });
  