var victims_counter = 0;

function add_victim()
{
    var elem = document.getElementById('victim_table');
    elem.innerHTML += '<tr class="header"><td colspan="2"></td></tr><tr><td><strong>Género</strong></td><td><strong>Descripción</strong></td></tr><tr><td>Masculino</td><td>Tatuaje en el hombro</td> </tr> <tr> <td colspan="2"> <input type="button" style="margin-left: 75px;" id="remove_victim_button" class="btn btn-danger btn-rounded" value="Remover"></td> </tr>';
    victims_counter++;
    return false;
}

function remove_victim()
{
    var elem = document.getElementById('victim_table');
    elem.parentNode.removeChild(elem);
    victims_counter--;
    return false;
}

function pageInit_victims_and_perpetrators() {
    var btn = document.getElementById('add_victim_button');
    if (btn.addEventListener) {
        // DOM2 standard
        btn.addEventListener('click', add_victim, false);
    }
    else if (btn.attachEvent) {
        // IE (IE9 finally supports the above, though)
        btn.attachEvent('onclick', add_victim);
    }
    else {
        // Really old or non-standard browser, try DOM0
        btn.onclick = add_victim;
    }
}

  $(document).ready(function(){
    
    pageInit_victims_and_perpetrators();
  
  });