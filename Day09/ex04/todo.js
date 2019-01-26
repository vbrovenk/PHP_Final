$(document).ready(function() {
	var id = 1;

	function buildElem(id, message) {
		var elem = $("<div></div>").text(message);
		$(elem).attr("class", "element");
		$(elem).attr("id", id);
		$("#ft_list").prepend(elem);
	}

	$.ajax({
		url: "select.php",
		success: function(response) {
			var obj = $.parseJSON(response);
			if (obj.length > 0) {
				id = obj[obj.length - 1][0];
				id++;
				console.log(id);
			}
			for(var i = 0; i < obj.length; i++) {
				buildElem(obj[i][0], obj[i][1]);
			}
		}
	});
	
	$("#New").click(function() {
		var message = prompt("Input TODO item: ", "");
		if (message.trim() != "" && message != null) {

			$.ajax({
				url: "insert.php?id=" + id + "&text=" + message,
				cache: false,
				success: function(response) {
					var pair = response.split(";");
					buildElem(id, message);
					id++;
				}
			});
		}
	});

	$(document).on("click", ".element", function() {
		var result = confirm("Confirm deleting this TODO");
		if (result == true) {

			$.ajax({
				url: "delete.php?id=" + $(this).attr("id"),
				cache: false,
				success: function(response) {

				}
			});
			$(this).remove();
		}
	});
});
