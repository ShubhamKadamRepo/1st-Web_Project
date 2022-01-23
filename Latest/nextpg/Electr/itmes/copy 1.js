function copyToClipboarda(text,file) {
var inputc = document.body.appendChild(document.createElement("input"));
inputc.value = window.location.href;
inputc.focus();
inputc.select();
document.execCommand('copy');
inputc.parentNode.removeChild(inputc);


createCookie("gfg", "inputc", "10");


// Function to create the cookie
function createCookie(name, value, days) {
	var expires;
	
	if (days) {
		var date = new Date();
		date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
		expires = "; expires=" + date.toGMTString();
	}
	else {
		expires = "";
	}
	
	document.cookie = escape(name) + "=" +
		escape(value) + expires + "; path=/";
}

window.location= "update.php"



}


