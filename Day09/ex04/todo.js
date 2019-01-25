$(document).ready(function() {
	var id = 1;
	$("#New").click(function() {
		var message = prompt("Input TODO item: ", "");
		if (message != "") {
			var xhr = new XMLHttpRequest();

			xhr.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					// console.log(this.responseText);
				}
			}
			xhr.open("GET", "insert.php?id=" + id + "&text=" + message, true);
			xhr.send();
		}
	});
});