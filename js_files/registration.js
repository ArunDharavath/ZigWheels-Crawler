function validate()
{
  var id=document.F1.username.value;
  var ps=document.F1.password.value;
  var em=document.F1.email_id.value;
  if( id.length == 0 || ps.length == 0 || em.length == 0){
    alert("Please fill all the details!");
    return false;
  }
  return true;
}
function pw_vis()
{
	var x = document.getElementById("pwd");
  if (x.type === "password") {
  	x.type = "text";
  } else {
  	x.type = "password";
  }
}