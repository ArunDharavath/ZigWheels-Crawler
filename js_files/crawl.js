function getData(option, num)
{
    console.log(option, num);
    if (option == "")
    {
        alert("Please select an option!");
        return;
    }
    else
    {
        if(num == "")
        {
            num = 10;
        }
        else if((num <= 20) && (num > 0))
        {
           
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } 

            xmlhttp.onreadystatechange = function()
            {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("display_data").innerHTML = this.responseText;
                } 
            };
            xmlhttp.open("GET","crawler.php?dropdown="+option+"&num="+num,true);
            xmlhttp.send();
            
        }
        else
        {
             alert("Enter value between 1 to 20.");
        }
    }
}