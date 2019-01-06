function addComment(id_input)
{
    var commentContent = document.getElementById(id_input).value;
    if (commentContent != "")
    {

        var formData = {
            _token: $('meta[name="_token"]').attr('content'),
            reportID: $('input[name=idReport]').val(),
            comment: commentContent
        }


        $.ajax({
            method:'POST',
            url:'/add-comment',
            data:formData,
            dataType: "json",
            
            success:function(data){
                if (data.msg != "error")
                {
                    commentDetail(data);
                    document.getElementById(id_input).value = "";
                }
                else
                    alert("Error");
            },
            error:function(xhr, ajaxOptions, errorInfo)
            {
                alert("Por favor escriba un comentario válido.");
            }
        });
    
    }
}

function commentDetail(serverData)
{
    $("#noCommentsMesaggeDelete").remove();

    $('#myCommentSection').append(
        '<div id="comment' + serverData.commentID + '" class="comment-body">' + 
            '<div class="user-img"> '+
                    
                    '<img src="' + serverData.userAvatar + '"  alt="user" class="img-circle">'+
            '</div>' +
            '<div class="mail-contnet">'+
                '<h5>' + serverData.userEmail + '</h5>'+

                '<textarea id="commentContent' + serverData.commentID + '" style="height: 100px; width:400px; background-color:#FFF; border:none; resize:none;"  name="commentContent" disabled>' + serverData.commentContent + '</textarea>' +
                
            '</div>\n'+
            
            '<a onclick="editComment(this)" id="editCommentButton' + serverData.commentID + '" class="btn btn-warning waves-effect waves-light btn-outline"><span class="btn-label"><i class="fa fa-wrench m-l-5"></i></span> Editar</a>\n' + 
        
            '<a onclick="updateComment(this)" style="display:none;" id="updateCommentButton' + serverData.commentID + '" class="btn btn-success waves-effect waves-light btn-outline" ><span class="btn-label"><i class="fa fa-wrench m-l-5"></i></span> Actualizar</a>\n' + 
            '<a onclick="removeComment(this)" id="removeCommentButton' + serverData.commentID + '" class="btn btn-danger waves-effect waves-light btn-outline"><span class="btn-label"><i class="fa fa-exclamation-triangle m-l-5"></i></span> Eliminar</a>\n'+
        '</div>'
    );
}

function editComment(button)
{

    var commentID = button.id.substring(17);
    var textAreaID = "commentContent" + commentID;
    var updateButton = "updateCommentButton" + commentID;

    document.getElementById(textAreaID).disabled = false;
    document.getElementById(textAreaID).style.border = "solid #0ed60e";

    document.getElementById(updateButton).style.display = "inline";
    document.getElementById(button.id).style.display = "none";
}

function updateComment(updateButton)
{
    var commentId = updateButton.id.substring(19);
    var textAreaID = "commentContent" + commentId;
    var editButton = "editCommentButton" + commentId;

    var commentContent = document.getElementById(textAreaID).value;

    var formData = {
        _token: $('meta[name="_token"]').attr('content'),
        reportID: $('input[name=idReport]').val(),
        commentID: commentId,
        comment: commentContent
    }

    $.ajax({
        method:'POST',
        url:'/update-comment',
        data:formData,
        dataType: "json",
        
        success:function(data){
            if (data.status != "error")
            {
                document.getElementById(textAreaID).disabled = true;
                document.getElementById(textAreaID).style.border = "none";

                document.getElementById(updateButton.id).style.display = "none";

                document.getElementById(editButton).style.display = "inline";
            }
            else
                alert("Error");
        },
        error:function(xhr, ajaxOptions, errorInfo)
        {
            alert(xhr.status + " " + errorInfo);
        }
    });
    
}

function removeComment(removeButton)
{
    var commentId = removeButton.id.substring(19);
    var divRemove = "comment" + commentId;

    var formData = {
        _token: $('meta[name="_token"]').attr('content'),
        commentID: commentId
    }


    $.ajax({
        method:'POST',
        url:'/remove-comment',
        data:formData,
        dataType: "json",
        
        success:function(data){
            if (data.status != "error")
            {
                $("#" + divRemove).remove();
            }
            else
                alert("Error");
        },
        error:function(xhr, ajaxOptions, errorInfo)
        {
            alert(xhr.status + " " + errorInfo);
        }
    });
}

$(document).ready(function(){
        
    

});


