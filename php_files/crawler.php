<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--BOOTSTRAP-->
  <link rel="stylesheet" href="../bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../bootstrap-4.2.1-dist/js/bootstrap.min.js"/>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<!--CSS for necessary styling-->
  <link rel="stylesheet" type="text/css" href="../css_files/crawl.css">
</head>

<body>
<!--PHP for crawling the required data from the website-->
  <?php
  //Getting the input from HOME PAGE.
    $choice = $_GET['dropdown'];
    $limit = $_GET['num'];
  //To connect to the DB.  
    include_once('connect.php');
  //PHP file for EASY PARSING OF DOM ELEMENTS.
    include_once('simple_html_dom.php');

    if($choice == "newcars")
    {
    //URL OF WEBSITE TO BE CRAWLED.
      $url = "https://www.zigwheels.com/launches";
      $html = file_get_html($url);//GETTING ITS HTML.
    //LOOP FOR CRAWLING MULTIPLE CARS INFO.
      for($i = 0; $i < $limit; $i++)
      {
      //STORING THE CLASSES OF EACH ELEMENT IN VARS.
        $name = $html->find('strong.lnk-hvr.block.of-hid.h-height', $i)->plaintext;
        $price = $html->find('div.clr-bl.p-5', $i)->plaintext;
        $eng = $html->find('div.clr-try.fnt-14.pb-10.h-height.of-hid', $i)->plaintext;
        echo "<div class = 'bike'><center>";
        echo "<div class = 'card' style='width:400px'>";
        echo "<img class = 'card-img-top'>" . $html->find('div.clr.mk-img-h', $i);
        echo "<div class = 'card bg-info text-white'>";
        echo "<div class = 'class-body'>";
        echo "<h4 class = 'card-title'> <center>" . $name . "</center> </h4>";
        echo "<class = 'card-text'> <center>" . $price . "</center>";
        echo "<class = 'card-text'> <center>" . $eng . "</center>";
        echo "</div>";
        echo "</div>";
        echo "</div></center>";
        echo "</div> <br>";
      //INSERTING INTO CRAWL_DATA TABLE IN DB.
        $query = "insert into crawl_data(name, price, engine) values('$name','$price','$eng')";
        $result = mysqli_query($con, $query);
      }
    }
    else if($choice == "newbikes")
    {
      $url = "https://www.zigwheels.com/bikes/launches";
      $html = file_get_html($url);

      for($i = 0; $i < $limit; $i++)
      {
        $name = $html->find('strong.lnk-hvr.block.of-hid.h-height', $i)->plaintext;
        $price = $html->find('div.clr-bl.p-5', $i)->plaintext;
        $eng = $html->find('div.clr-try.fnt-14.pb-10.h-height.of-hid', $i)->plaintext;
        echo "<div class = 'bike'><center>";
        echo "<div class = 'card' style='width:400px'>";
        echo "<img class = 'card-img-top'>" . $html->find('div.clr.mk-img-h', $i);
        echo "<div class = 'card bg-info text-white'>";
        echo "<div class = 'class-body'>";
        echo "<h4 class = 'card-title'> <center>" . $name . "</center> </h4>";
        echo "<class = 'card-text'> <center>" . $price . "</center></h4>";
        echo "<class = 'card-text'> <center>" . $eng  . "</center></h4>";
        echo "</div>";
        echo "</div>";
        echo "</div></center>";
        echo "</div> <br>";
        $query = "insert into crawl_data(name, price, engine) values('$name','$price','$eng')";
        $result = mysqli_query($con, $query);
      }
    }
    else
    {
      echo "<div class ='alert alert-danger' role ='alert'><center>Please select an option!</center></div>";
    }
  ?>
</body>
</html>