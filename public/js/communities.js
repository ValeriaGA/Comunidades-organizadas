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



$(document).ready(function(){



});