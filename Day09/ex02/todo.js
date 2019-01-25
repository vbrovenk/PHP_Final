var id;

document.getElementById("New").onclick = function() {
	var message = prompt("input new todo", "");
	if (message.trim() != "") {
		var list = document.getElementById("ft_list");
		var element = document.createElement("div");
		element.innerHTML = message;
		element.setAttribute("id", id);
		document.cookie = id + "=" + message;
		id++;
		element.setAttribute("onclick", "remove(this)");
		list.insertBefore(element, list.firstChild);
	}
}

function remove(element) {
	var result = confirm("Confirm deleting this TODO");
	if (result == true) {
		// alert(element.getAttribute("id"));
		document.getElementById("ft_list").removeChild(element);
		document.cookie = element.getAttribute("id") + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
	}
}
if (document.cookie) {
	// alert(document.cookie);
	var cookies = document.cookie;
	var names = cookies.match( /\d+=/g );
	var values = cookies.match( /=\w+/g );
	for (var i = 0; i < names.length; i++) {
		names[i] = names[i].replace('=', '');
		values[i] = values[i].replace('=', '');
		var element = document.createElement("div");
		element.innerHTML = values[i];
		element.setAttribute("id", names[i]);
		element.setAttribute("onclick", "remove(this)");
		var list = document.getElementById("ft_list");
		list.insertBefore(element, list.firstChild);
	}
	id = names[names.length - 1];
	id++;
	// alert(id);
}
else {
	id = 1;
	console.log("Cookie is empty");
}