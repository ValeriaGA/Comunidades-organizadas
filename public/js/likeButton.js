//https://codepen.io/BryanDuplantis/pen/GJgwNP


function onclick_likeButton(element)
{
    if (element.getAttribute("active") == "0")
    {
        element.style.backgroundColor = "green";
        element.style.color = "white";
        $('#' + element.getAttribute("id")).attr('active', '1');
    }
    else
    {
        element.style.backgroundColor = "white";
        $('#' + element.getAttribute("id")).attr('active', '0');
        element.style.color = "black";
    }

 
};