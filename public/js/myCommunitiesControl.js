function getCommunityGroups()
{
    $("#divCommunityGroupsTable").remove();
    $("#divCommunityGroupContent").append(
        '<div id="divCommunityGroupsTable">' + 
        '<table id="communityGroupsTable" class="communityGroupTable" style="width: 900px;"></table></div>'
    );
  

    $.ajax({
        method: 'GET',
        url: "/obtener-grupos",
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

    getCommunityGroups();
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
  