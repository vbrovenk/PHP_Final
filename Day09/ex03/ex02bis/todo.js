$(document).ready(function() {
	var id;

	$("#New").click(function() {
		var message = prompt("input new todo", "");
		if (message.trim() != "") {
			var elem = $("<div></div>").text(message);

			$(elem).attr("class", "element");
			$(elem).attr("id", id);
			document.cookie = id + "=" + message;
			id++;
			$("#ft_list").prepend(elem);
		}
	});

	$(document).on("click", ".element", function() {
		var result = confirm("Confirm deleting this TODO");
		if (result == true) {
			$(this).remove();	
			document.cookie = $(this).attr("id") + "=; expires=Thu, 01 Jan 1970 00:00:01 GMT;";
		}
	});


	if (document.cookie) {
		var cookies = document.cookie;
		var names = cookies.match( /\d+=/g );
		var values = cookies.match( /=\w+/g );
		for (var i = 0; i < names.length; i++) {
			names[i] = names[i].replace('=', '');
			values[i] = values[i].replace('=', '');
			var elem = $("<div></div>").text(values[i]);
			$(elem).attr("class", "element");
			$(elem).attr("id", names[i]);
			$("#ft_list").prepend(elem);
		}
		id = names[names.length - 1];
		id++;
	}
	else {
		id = 1;
		console.log("Cookie is empty");
	}
});
