function addComment(id_input)
{
    var commentContent = document.getElementById(id_input).value;
    if (commentContent != "")
    {
        $('#commentSection').append(
            '<div class="comment-body">' + 
                '<div class="user-img"> '+
                        '<img src="../plugins/images/users/profile.png"  alt="user" class="img-circle">'+
                '</div>' +
                '<div class="mail-contnet">'+
                    '<h5>USER</h5>'+

                    '<span class="mail-desc">' +  commentContent + '</span>'+
                
                    
                '</div>'+
            '</div>'
        );

        document.getElementById(id_input).value = "";
    }
}