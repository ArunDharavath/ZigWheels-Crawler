<!DOCTYPE html>
<html lang="en">
<head>
<!--Checking if cookie is set.-->
  <?php
    if(!isset($_COOKIE["login"]))
    {
      header('Location: login.php');
    }
  ?>
  <title>MY CRAWLER</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta type="charset" content="utf-8" lang="en"/>
<!--JS file for FUNCTIONS-->
  <script src="../js_files/crawl.js"></script>
<!--BOOTSTRAP-->
  <link rel="stylesheet" href="../bootstrap-4.2.1-dist/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="../bootstrap-4.2.1-dist/js/bootstrap.min.js"/>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="../images/zigwheels_favicon.png" type="image/icon"/>
<!--CSS for necessary styling-->
  <link rel="stylesheet" type="text/css" href="../css_files/crawl.css">
</head>

<body class="main">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!--NAVBAR-->
    <h1 class="navbar-brand">ZigWheels
    <medium class="text-muted">Crawler</medium></center></h1>
    <a class="nav-link" href="home.php">Home</a>
    <a class="nav-link" href="about.php">About Me</a>
    <a class="nav-link" href="contact.php">Contact Us</a>
    <a class="logout" href="logout.php">Logout</a>
  </nav>
  <div class="crawl_section">
  <center>
    <table>
      <tr>
        <td>
          Select an option to view:
        </td>
        <td>
          <select name="" id="dropdown">
            <option hidden>--select one--</option>
            <option value="newcars">New Cars</option>
            <option value="newbikes">New Bikes</option>
          </select>
        </td>
      </tr>
      <tr>
        <td>
          <br><label for="num_results">Get upto:</label>
        </td>
        <td>
          <br><input type="text" id="num_results" name="num_results" placeholder="max. 20" style="text-align:center;" value=10>
        </td>
      </tr>
      <tr>
        <td colspan="2">
          <br><center><input class="btn btn-primary" type="submit" value="Crawl" onclick="getData(dropdown.value, num_results.value)"></button></center>
          <link rel="stylesheet" type="text/css" href="../css_files/crawl.css">
        </td>
      </tr>
    </table>
    </center><br>
  <!--BLOCK WHERE CRAWLED DATA WILL BE DISPLAYED-->
    <p id="display_data"></p>
  </div>
</body>
</html>