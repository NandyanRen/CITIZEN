function refreshCalendar(){
	setTimeout(function(){ document.getElementById('calendar-iframe').src = document.getElementById('calendar-iframe').src; }, 3000);
}