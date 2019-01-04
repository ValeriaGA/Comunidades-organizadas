function removeCommunityRow(buttonObject)
{
    
    //prototype
    var tableToAdd = "communitiesToAdd";
    var communityID = buttonObject.value.substring(2);
    var communityName = document.getElementById("td" + communityID).innerHTML;

    document.getElementById(buttonObject.value).remove();

    $("#" + tableToAdd).append(
        "<tr id='tr"+ communityID + "'>\n"
        + "<td id='td" + communityID + "' colspan='2'>"
        + communityName

        + "<td>" + 
        '<button class="btn btn-rounded btn-outline m-r-5 add-href"  value="tr' + communityID + '" onclick="addCommunityRow(this)" style="margin-left: 0px; display:inline;" id="addButton' + communityID + '" type="button"> Agregar </button>'
        +" </td>"

        + "</td>"
        + "</tr>"
    );

}

function addCommunityRow(buttonObject)
{
    var tableToAdd = "communitiesAdded";
    var communityID = buttonObject.value.substring(2);
    var communityName = document.getElementById("td" + communityID).innerHTML;


    document.getElementById(buttonObject.value).remove();

    
    $("#" + tableToAdd).append(
        "<tr id='tr"+ communityID + "'>\n"
        + "<td id='td" + communityID + "' colspan='2'>"
        + communityName

        + "<td>" + 
        '<button class="btn btn-rounded btn-outline m-r-5 remove-href"  value="tr' + communityID + '" onclick="removeCommunityRow(this)" style="margin-left: 0px; display:inline;" id="removeButton' + communityID + '" type="button"> Quitar </button>'
        +" </td>"

        + "</td>"
        + "</tr>"
    );
}

function onclick_followButton(element)
{
    if (element.getAttribute("active") == "0")
    {
        element.style.backgroundColor = "#7ace4c";
        element.style.color = "white";
        $('#' + element.getAttribute("id")).text('Siguiendo');
        $('#' + element.getAttribute("id")).attr('active', '1');
    }
    else
    {
        element.style.backgroundColor = "white";
        $('#' + element.getAttribute("id")).text('Seguir');
        $('#' + element.getAttribute("id")).attr('active', '0');
        element.style.color = "#7ace4c";
    }

 
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


$(document).ready(function(){



});