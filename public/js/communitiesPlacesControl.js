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
          currentGroupJson = null;

        fillControl('communities', communities);
        getCommunityGroupsOfCommunity();
      },
      error:function(xhr, ajaxOptions, errorInfo)
      {
        console.log(xhr.status + " " + errorInfo);
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
        console.log(xhr.status + " " + errorInfo);
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

    var isMulti = document.getElementById(controlID).multiple;
    if (!isMulti)
    {
      $("#" + controlID).val($("#" + controlID + " option:first").val());
      selected = $("#" + controlID + " option:selected").val();
    }
  }

  

  function clearBoxes(controlID){
    $('#'+controlID).empty();
  }
  




function getCommunityGroupsOfCommunity()
{
    $("#divCommunityGroupsTable").remove();
    $("#divCommunityGroupContent").append(
        '<div id="divCommunityGroupsTable">' + 
        '<table id="communityGroupsTable" class="communityGroupTable" style="width: 900px;"></table></div>'
    );
    var element = document.getElementById("communities");

 
    var elementIndex = null;
    if (element.selectedIndex >= 0)
    {
        elementIndex = element.options[element.selectedIndex].value;
   
    }

    if (elementIndex != null)
    {
      var communityData = {
          _token: $('meta[name="_token"]').attr('content'),
          id: elementIndex
      }

      $.ajax({
          method: 'POST',
          url: "/grupos",
          data: communityData,
          dataType: "json",
          success: function(community_groups){
              fillGroup(community_groups.slice());
          },
          error:function(xhr, ajaxOptions, errorInfo)
          {
              console.log(xhr.status + " " + errorInfo);
          }
      });
    }
}


function fillGroup(groups)
{
    var json = JSON.parse(groups);

    if(!$.isEmptyObject(json))
    {
      currentGroupJson = json;
    }
    else
    {
      currentGroupJson = null;
    }

    var communityGroupsTable = document.getElementById("communityGroupsTable");


    $.each(json, function(key, value){
        
        var row = communityGroupsTable.insertRow(communityGroupsTable.rows.length);

        var cell = row.insertCell(0);
        cell.setAttribute('colspan', "2");
        cell.innerHTML = value['name'] + "\n" + 
        '<button style="margin-left: 10px; display:inline;" id="followButton' + value['id'] + '" onclick="{{onclick_followButton(this)}}" class="btn btn-rounded btn-success btn-outline m-r-5 like-button pull-right" active="0" > Seguir </button>\n' + 
        '<button style="margin-left: 10px; display:inline; border: 1px solid #41b3f9; color:#41b3f9" id="groupDetail' + value['id'] + '" onclick="getCommunitiesByGroup(this)" class="btn btn-rounded btn-outline m-r-5 pull-right" active="0" > Comunidades </button>\n'
        + '<input name="idGroup' + value['id'] + '" type="hidden" value="' + value['name'] + '"/>';
     });
}


function communityGroupSearch(inputSearch)
{
    var textSearched = inputSearch.value;

    var regularExpresion = new RegExp(textSearched.toLowerCase() + ".*");
    
    $("#divCommunityGroupsTable").remove();
    $("#divCommunityGroupContent").append(
        '<div id="divCommunityGroupsTable">' + 
        '<table id="communityGroupsTable" class="communityGroupTable" style="width: 900px;"></table></div>'
    );

    var communityGroupsTable = document.getElementById("communityGroupsTable");

    
    $.each(currentGroupJson, function(key, value){
       
        if (value['name'].toLowerCase().match(regularExpresion))
        {
            var row = communityGroupsTable.insertRow(communityGroupsTable.rows.length);

            var cell = row.insertCell(0);
            cell.setAttribute('colspan', "2");
            cell.innerHTML = value['name'] + "\n" + 
            '<button style="margin-left: 10px; display:inline;" id="followButton' + value['id'] + '" onclick="{{onclick_followButton(this)}}" class="btn btn-rounded btn-success btn-outline m-r-5 like-button pull-right" active="0" > Seguir </button>\n' + 
            '<button style="margin-left: 10px; display:inline; border: 1px solid #41b3f9; color:#41b3f9" id="groupDetail' + value['id'] + '" onclick="getCommunitiesByGroup(this)" class="btn btn-rounded btn-outline m-r-5 pull-right" active="0" > Comunidades </button>\n'
            + '<input name="idGroup' + value['id'] + '" type="hidden" value="' + value['name'] + '"/>';
        }
     });
}


var currentGroupJson = null;

$(document).ready(function(){
    
  fillProvinces();

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

  $("#communityGroupSearch").keyup(function() {
    if (currentGroupJson != null)
        communityGroupSearch(this);
  });

  $("#communityGroupSearchButton").on("click", function()
  { 
    if (currentGroupJson != null)
    {
        var inputSearch = document.getElementById("communityGroupSearch");
        communityGroupSearch(inputSearch);
    }
  });
  
  });
  