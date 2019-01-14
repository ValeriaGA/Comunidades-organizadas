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
        fillCommunities();
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
      url: "/comunidad",
      data:communityInfo,
      dataType: "json",
      success: function(communities){
        if (communities.length == 2)
        {
          currentGroupJson = null;
          communities = null;
        }
        else
        {
            currentGroupJson = 5;
        }

        fillControl('communities', communities, "Comunidades");
        fillGroups();
      },
      error:function(xhr, ajaxOptions, errorInfo)
      {
        console.log(xhr.status + " " + errorInfo);
      }
    });
    return 1;
  }

  function fillGroups(){
    clearBoxes('communityGroups');


    if (currentGroupJson == null)
    {
        fillControl('communityGroups', null, "Grupos");
        return false;
    }
  
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
        fillControl('communityGroups', community_groups, "Grupos");
      },
      error:function(xhr, ajaxOptions, errorInfo)
      {
        console.log(xhr.status + " " + errorInfo);
      }
    });
    return true;
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
  
  function fillControl(controlID, items, comboBoxName=""){
    
    var json = JSON.parse(items);
    var firstSelected = true;


    if (items == null)
    {
        $('#' + controlID).append(
            '<option value="" selected> Sin '+ comboBoxName +'</option>\n'
        );
        return false;
    }

    $.each(json, function(key, value){
       
        if (firstSelected)
        {
            $('#' + controlID).append(
                '<option value="' + value['id'] + '" selected>' + value['name'] + '</option>\n'
            );
            firstSelected = false;
        }
        else
        {
            $('#' + controlID).append(
                '<option value="' + value['id'] + '">' + value['name'] + '</option>\n'
            );
        }
     });

  }

  

  function clearBoxes(controlID){
    $('#'+controlID).empty();
  }



var currentGroupJson = null;

$(document).ready(function(){
    

    var cantons = document.getElementById("cantons");
    if (cantons != null)
    {
        $("#provinces").on('change', function(){
        fillCantons();
        
        });
    }
    

    var districts = document.getElementById("districts");
    if (districts != null)
    {
        $("#cantons").on('change', function(){
            fillDistricts();
        });
    }

    var communities = document.getElementById("communities");
    if (communities != null)
    {
        $("#districts").on('change', function(){
            fillCommunities();
        });
    }

    var community_groups = document.getElementById("community_groups");
    if (community_groups != null)
    {
        $("#communities").on('click', function(){
            fillGroups();

        });
    }

    $("#noCommunitiesCheckbox").on('change', function()
    {
        
    });
  
});
  