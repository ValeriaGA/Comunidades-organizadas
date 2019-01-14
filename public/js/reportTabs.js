function nextTab(buttonObject)
{
	var current_tab_li = document.getElementById("li_tab" + (buttonObject.value - 1));
	current_tab_li.className = "tab";
	var current_tab = document.getElementById("tab" + (buttonObject.value - 1));
	current_tab.className = "tab-pane";

	var next_tab_li = document.getElementById("li_tab" + buttonObject.value);
	if (next_tab_li == null)
	{
		var last_tab_li = document.getElementById("li_tabN");
		last_tab_li.className = "tab active";
	}else
	{
		next_tab_li.className = "tab active";
	}
	
	var next_tab = document.getElementById("tab" + buttonObject.value);
	if (next_tab == null)
	{
		var last_tab = document.getElementById("tabN");
		last_tab.className = "tab-pane active";
	}else
	{
		next_tab.className = "tab-pane active";
	}

}

$(document).ready(function(){

});