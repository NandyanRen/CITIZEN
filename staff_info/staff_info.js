document.getElementById("next_button").onclick = function() {next_button()};
document.getElementById("previous_button").onclick = function() {previous_button()};

var leftBtn = document.getElementById('previous_button');
var rightBtn = document.getElementById('next_button');
var p_content = document.getElementById("staff_data");
var i = 0;
var staff_name = ["Brent William Buenaventura","Bruce Brian Orcullo","John Ren Veluz","Sample"];
var staff_position = ["IT Personnel","IT Personnel","IT Head","---"];
var staff_mobile = ["09175321773","096672489645","09287164984","9999-999-9999"];
var staff_email = ["buenaventura.brent@ciit.edu.ph","orcullo.bruce@ciit.edu.ph","veluz.john@ciit.edu.ph","sample@gmail.com"];
var staff_birthday = ["Mar-02-1998","Jun-01-1998","Nov-16-1998","Dec-31-2019"];


function previous_button() {
	if (i > 0) {
		i--;
		document.getElementById("staff_img").src = "staff_picture/sp_0000"+i+".png";
		document.getElementById("staff_name").innerHTML = staff_name[i];
		document.getElementById("staff_position").innerHTML = staff_position[i];
		document.getElementById("staff_mobile").innerHTML = staff_mobile[i];
		document.getElementById("staff_email").innerHTML = staff_email[i];
		document.getElementById("staff_birthday").innerHTML = staff_birthday[i];
		if (i == 0)
		{
			leftBtn.style.opacity = "0";
			leftBtn.style.filter  = 'alpha(opacity=0)'; // IE fallback
		}
		else {
			rightBtn.style.opacity = "1";
			rightBtn.style.filter  = 'alpha(opacity=100)'; // IE fallback
		}
	}
}

function next_button() {
	if (i < staff_name.length - 1) {
		i++;
		document.getElementById("staff_img").src = "staff_picture/sp_0000"+i+".png";
		document.getElementById("staff_name").innerHTML = staff_name[i];
		document.getElementById("staff_position").innerHTML = staff_position[i];
		document.getElementById("staff_mobile").innerHTML = staff_mobile[i];
		document.getElementById("staff_email").innerHTML = staff_email[i];
		document.getElementById("staff_birthday").innerHTML = staff_birthday[i];
		if (i == staff_name.length - 1)
		{
			rightBtn.style.opacity = "0";
			rightBtn.style.filter  = "alpha(opacity=0)"; // IE fallback
		}
		else {
			leftBtn.style.opacity = "1";
			leftBtn.style.filter  = "alpha(opacity=100)"; // IE fallback
		}
	}
}