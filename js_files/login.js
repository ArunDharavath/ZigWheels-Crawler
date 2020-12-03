function validate(){
	var id=document.F1.usr.value;
	var ps=document.F1.pwd.value;
	if( id.length == 0 || ps.length == 0){
		alert("Fill all the required details!");
		return false;
	}
	return true;
}
function pw_vis(){
	var x = document.getElementById("pwd");
  if (x.type === "password") {
  	x.type = "text";
  } else {
  	x.type = "password";
  }
}