//https://codepen.io/BryanDuplantis/pen/GJgwNP


function onclick_likeButton(element)
{
    var report_id = element.getAttribute("reportid");
    if (element.getAttribute("active") == "0")
    {
        var likeInfo = {
            _token: $('meta[name="_token"]').attr('content'),
            report_id: report_id
        }
        
        $.ajax({
          method:'POST',
          url: "/like",
          data:likeInfo,
          dataType: "json",
          success: function(){
            element.setAttribute("class", "btn btn-success waves-effect waves-light like");
            element.setAttribute("active", "1");

            var like_lbl = document.getElementById("likes_lbl_" + report_id);
            like_lbl.setAttribute("value", (parseInt(like_lbl.getAttribute("value")) + 1));
            like_lbl.innerHTML = "<b>Agradecimientos</b>: "+like_lbl.getAttribute("value");
          },
          error:function(xhr, ajaxOptions, errorInfo)
          {
            alert(xhr.status + " " + errorInfo);
          }
        });
    }else
    {
        var likeInfo = {
            _token: $('meta[name="_token"]').attr('content'),
            report_id: report_id
        }
        
        $.ajax({
          method:'POST',
          url: "/unlike",
          data:likeInfo,
          dataType: "json",
          success: function(){
            element.setAttribute("class", "btn btn-success waves-effect waves-light btn-outline like");
            element.setAttribute("active", "0");

            var like_lbl = document.getElementById("likes_lbl_" + report_id);
            like_lbl.setAttribute("value", parseInt(like_lbl.getAttribute("value")) - 1);
            like_lbl.innerHTML = "<b>Agradecimientos</b>: "+like_lbl.getAttribute("value");
          },
          error:function(xhr, ajaxOptions, errorInfo)
          {
            alert(xhr.status + " " + errorInfo);
          }
        });
    }
};


function onclick_followButton(element)
{
    alert(element.id);
    if (element.getAttribute("active") == "0")
    {
        element.style.backgroundColor = "green";
        element.style.color = "white";
        document.getElementById(element.getAttribute("id")).text = "Siguiendo";
        //$('#' + element.getAttribute("id")).text('Siguiendo');
        $('#' + element.getAttribute("id")).attr('active', '1');
    }
    else
    {
        element.style.backgroundColor = "white";
        $('#' + element.getAttribute("id")).text('Seguir');
        $('#' + element.getAttribute("id")).attr('active', '0');
        element.style.color = "black";
    }

 
};