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
    else
    {
        var communityGroupsTable = document.getElementById("communityGroupsTable");
        var row = communityGroupsTable.insertRow(communityGroupsTable.rows.length);
        var cell = row.insertCell(0);
            cell.setAttribute('colspan', "2");
            cell.innerHTML = "No hay grupos que mostrar";
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


    if (currentGroupJson != null)
    {
        $.each(json, function(key, value){
            
            var row = communityGroupsTable.insertRow(communityGroupsTable.rows.length);

            var groupItem = value['name'] + "\n";
                
                
            if (value['userGroupID'] == null)
            {
                groupItem += '<button style="margin-left: 10px; display:inline;" id="followButton' + value['id'] + '" onclick="{{onclick_followButton(this)}}" class="btn btn-rounded btn-success btn-outline m-r-5 like-button pull-right" active="0" > Seguir </button>\n';
            }
            else
            {
                groupItem += '<button style="margin-left: 10px; display:inline; background-color:#7ace4c; color:white;" id="followButton' + value['id'] + '" onclick="{{onclick_unfollowButton(this)}}" class="btn btn-rounded btn-success btn-outline m-r-5 like-button pull-right" active="1" > Seguiendo </button>\n';
            }

            groupItem += '<button style="margin-left: 10px; display:inline; border: 1px solid #41b3f9; color:#41b3f9" id="groupDetail' + value['id'] + '" onclick="getCommunitiesByGroup(this)" class="btn btn-rounded btn-outline m-r-5 pull-right" active="0" > Comunidades </button>\n'
            + '<input name="idGroup' + value['id'] + '" type="hidden" value="' + value['name'] + '"/>';
                
                
            var cell = row.insertCell(0);
            cell.setAttribute('colspan', "2");
            cell.innerHTML = groupItem;
        });
    }
    else
    {
        var row = communityGroupsTable.insertRow(communityGroupsTable.rows.length);
        var cell = row.insertCell(0);
            cell.setAttribute('colspan', "2");
            cell.innerHTML = "No hay grupos que mostrar";
    }
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

            var groupItem = value['name'] + "\n";
            
            
            if (value['userGroupID'] == null)
            {
                groupItem += '<button style="margin-left: 10px; display:inline;" id="followButton' + value['id'] + '" onclick="{{onclick_followButton(this)}}" class="btn btn-rounded btn-success btn-outline m-r-5 like-button pull-right" active="0" > Seguir </button>\n';
            }
            else
            {
                groupItem += '<button style="margin-left: 10px; display:inline; background-color:#7ace4c; color:white;" id="followButton' + value['id'] + '" onclick="{{onclick_unfollowButton(this)}}" class="btn btn-rounded btn-success btn-outline m-r-5 like-button pull-right" active="1" > Seguiendo </button>\n';
            }


            groupItem += '<button style="margin-left: 10px; display:inline; border: 1px solid #41b3f9; color:#41b3f9" id="groupDetail' + value['id'] + '" onclick="getCommunitiesByGroup(this)" class="btn btn-rounded btn-outline m-r-5 pull-right" active="0" > Comunidades </button>\n'
            + '<input name="idGroup' + value['id'] + '" type="hidden" value="' + value['name'] + '"/>';

            var cell = row.insertCell(0);
            cell.setAttribute('colspan', "2");
            cell.innerHTML = groupItem;
        }
     });
}


function onclick_unfollowButton(element)
{
    var groupID = element.id.substring(12);
    var communityData = {
        _token: $('meta[name="_token"]').attr('content'),
        id: groupID
    }

    element.style.backgroundColor = "white";
    $('#' + element.getAttribute("id")).text('Seguir');
    $('#' + element.getAttribute("id")).attr('active', '0');
    element.style.color = "#7ace4c";

    $.ajax({
        method: 'POST',
        url: "/dejar-grupo",
        data: communityData,
        dataType: "json",
        success: function(unfollowRespond){
            return true;
        },
        error:function(xhr, ajaxOptions, errorInfo)
        {
            console.log(xhr.status + " " + errorInfo);
            element.style.backgroundColor = "#7ace4c";
            element.style.color = "white";
            $('#' + element.getAttribute("id")).text('Siguiendo');
            $('#' + element.getAttribute("id")).attr('active', '1');
        }
    });
}

function onclick_followButton(element)
{
    var groupID = element.id.substring(12);
    var communityData = {
        _token: $('meta[name="_token"]').attr('content'),
        id: groupID
    }
    

    element.style.backgroundColor = "#7ace4c";
    element.style.color = "white";
    $('#' + element.getAttribute("id")).text('Siguiendo');
    $('#' + element.getAttribute("id")).attr('active', '1');

    $.ajax({
        method: 'POST',
        url: "/seguir-grupo",
        data: communityData,
        dataType: "json",
        success: function(followRespond){
            return true;
        },
        error:function(xhr, ajaxOptions, errorInfo)
        {
            console.log(xhr.status + " " + errorInfo);
            element.style.backgroundColor = "white";
            $('#' + element.getAttribute("id")).text('Seguir');
            $('#' + element.getAttribute("id")).attr('active', '0');
            element.style.color = "#7ace4c";
        }
    });
};


function getCommunitiesByGroup(buttonGroup)
{
    document.getElementById('modal-wrapper').style.display='block';

    var communityGroupID = buttonGroup.id.substring(11);

    var groupName = $('input[name=' + 'idGroup' + communityGroupID + ']').val();

    $("#divCommunityTable").remove();

    $("#divCommunityContent").append(
        '<div id="divCommunityTable" style="width:400px; height:300px; overflow:auto;">'
        + '<h3 class="box-title" style="display:inline;">Comunidades del ' + groupName + '</h3>'
        + '<br/></div>'
    );

    var tableID = "communitiesTable";
    var divTableID = "divCommunityTable";

    var groupData = {
        _token: $('meta[name="_token"]').attr('content'),
        id: communityGroupID
    }

    $.ajax({
        method: 'POST',
        url: "/grupo-comunidades",
        data: groupData,
        dataType: "json",
        success: function(communities){
            fillCommunitiesInTable(divTableID, tableID, communities);
        },
        error:function(xhr, ajaxOptions, errorInfo)
        {
            console.log(xhr.status + " " + errorInfo);
        }
    });

}

function fillCommunitiesInTable(divTableID, tableID, communities)
{
    var json = JSON.parse(communities);


    $("#" + divTableID).append(
        '<table id="' + tableID + '" class="communityGroupTable" style="width: 400px;"></table>'

    );

    var table = document.getElementById(tableID);

    $.each(json, function(key, value){
        var row = table.insertRow(table.rows.length);
        var cell = row.insertCell(0);
        cell.setAttribute('colspan', "2");
        cell.innerHTML = value['name'];
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
  