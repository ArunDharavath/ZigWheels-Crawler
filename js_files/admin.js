function pw_vis()
{
	var x = document.getElementById("password");
  if (x.type === "password")
  {
  	x.type = "text";
  }
  else
  {
  	x.type = "password";
  }
}

function validate()
{
	var id=document.F1.username.value;
  var ps=document.F1.password.value;
  var em=document.F1.email_id.value;
  if( id.length == 0 || ps.length == 0 || em.length == 0)
  {
		alert("Fill all the required details!");
		return false;
	}
	return true;
}

function validate_del()
{
	var id=document.F2.usrnm.value;
  if( id.length == 0)
  {
		alert("Fill the username field!");
		return false;
	}
	return true;
}

function display()
{
  var x = document.getElementById("display");
  var y = document.getElementById("update");
  var z = document.getElementById("delete");  
  if (x.style.display === "none")
  {
    x.style.display = "block";
    y.style.display = "none";
    z.style.display = "none";
  }
  else
  {
    x.style.display = "none";
  }
}

function update()
{
  var x = document.getElementById("display");
  var y = document.getElementById("update");
  var z = document.getElementById("delete");  
  if (y.style.display === "none")
  {
    x.style.display = "none";
    y.style.display = "block";
    z.style.display = "none";
  }
  else
  {
    y.style.display = "none";
  }
}

function del()
{
  var x = document.getElementById("display");
  var y = document.getElementById("update");
  var z = document.getElementById("delete");
  if (z.style.display === "none")
  {
    x.style.display = "none";
    y.style.display = "none";
    z.style.display = "block";
  }
  else
  {
    z.style.display = "none";
  }
}