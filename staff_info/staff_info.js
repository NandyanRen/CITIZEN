document.getElementById("next_button").onclick = function() {next_button()};
document.getElementById("previous_button").onclick = function() {previous_button()};

var p_content = document.getElementById("staff_data");
var i = -1;
var staff_name = ["Brent William Buenaventura","Bruce Brian Orcullo","John Ren Veluz","Blank"];
var staff_position = ["IT Personnel","IT Personnel","IT Head","---"];
var staff_mobile = ["0917-532-1773","0966-724-89645","0928-716-4984","9999-999-9999"];

function previous_button() {
	if (i > 0) {
		i--;
		document.getElementById("staff_img").src = "staff_picture/sp_0000"+i+".png";
		document.getElementById("staff_name").innerHTML = staff_name[i];
		document.getElementById("staff_position").innerHTML = staff_position[i];
		document.getElementById("staff_mobile").innerHTML = staff_mobile[i];
	}
}

function next_button() {
	if (i < 3) {
		i++;
		document.getElementById("staff_img").src = "staff_picture/sp_0000"+i+".png";
		document.getElementById("staff_name").innerHTML = staff_name[i];
		document.getElementById("staff_position").innerHTML = staff_position[i];
		document.getElementById("staff_mobile").innerHTML = staff_mobile[i];
	}
}