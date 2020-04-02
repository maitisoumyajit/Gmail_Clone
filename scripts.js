//'use strict';
function checkEmptyTextBox()
{
	var username = document.forms['demo']['username'].value;
	var password = document.forms['demo']['password'].value;
	if(username == '' && password == '')
	{
		document.getElementById('EmailError').style.display = "inline-block";
		document.getElementById('PasswordError').style.display = "inline-block";
		return false;
	}
	else if(username == '')
	{
		document.getElementById('EmailError').style.display = "inline-block";
		document.getElementById('PasswordError').style.display = "none";
		return false;
	}
	else if(password == '')
	{
		document.getElementById('EmailError').style.display = "none";
		document.getElementById('PasswordError').style.display = "inline-block";
		return false;
	}
	else
	{
		document.getElementById('EmailError').style.display = "none";
		document.getElementById('PasswordError').style.display = "none";
		return true;	
	}
}  