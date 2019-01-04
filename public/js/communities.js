function removeCommunityRow(buttonObject)
{
    
    //prototype
    var tableToAdd = "communitiesToAdd";
    var communityID = buttonObject.value.substring(2);
    var communityName = document.getElementById("td" + communityID).innerHTML;

    document.getElementById(buttonObject.value).remove();

    $("#" + tableToAdd).append(
        "<tr id='tr"+ communityID + "'>\n"
        + "<td id='td" + communityID + "' style='width: 100%;'>"
        + communityName
        + "<td>" + 
        '<button class="btn btn-success btn-rounded btn-outline m-r-5 add-href"  value="tr' + communityID + '" onclick="addCommunityRow(this)" style="width: 100%;" id="addButton' + communityID + '" type="button"> Agregar </button>'
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
        + "<td id='td" + communityID + "' style='width: 100%;'>"
        + communityName
        + "<td>" + 
        '<button class="btn btn-danger btn-rounded btn-outline m-r-5 remove-href"  value="tr' + communityID + '" onclick="removeCommunityRow(this)" style="width: 100%;" id="removeButton' + communityID + '" type="button"> Quitar </button>'
        +" </td>"

        + "</td>"
        + "<input type='hidden' id='hid"+communityID+"' name='community_id[]' value='"+communityID+"' >"
        + "</tr>"
    );
}



$(document).ready(function(){



});