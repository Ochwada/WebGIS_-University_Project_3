<!DOCTYPE html>
<html xmlns ="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="utf-8">
    <title>Personalised Restaurant Ratings</title>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.min.js "></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<!-- scripts -->
    <script type="text/javascript" src="geojson.min.js"> </script>
    <script type="text/javascript" src="gen_validatorv4.js"></script>
    <script type="text/javascript" src="myscript.js"></script>
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <style></style>
  </head>
  <body>
    <div id="header"><h1>Personalised Restaurant Ratings</h1><hr>
      <h3> <a href="index.php" style="margin-right:30px">HOME</a>
           <a href="about.php" target="_blank">RESTAURANT LIST</a>
      </h3><hr>
    </div>
    <div id="breadcrumbs">
        <div id="login">
          <form class="form-login" action="" method="post">
            <span>Email:</span> <input id="myemail" type="email" name="email" class="logininfo"> <br>
            <span>Password:</span> <input type="password" name="password" id="mypassword" class="logininfo">
          </form>
          <!-- php -->
        </div>
        <div id="select">
          <form class="form-select" action="phpfiles/method.php" method="post">
            <span>Cusine:</span> <input type="text" name="in-cusine" placeholder="Cusine">
            <span>Location:</span>
            <select name = "locations" class="in-locations">
              <option value="nearme">Near Me</option>
              <option value="trainstation">Near Train Stations</option>
              <option value="input address"> Address Option</option>
            </select> <br>
            <span>Ratings:</span><input type="number" name="quantity" min="1" max="5" size ="10">
            <span> Practice:</span><input type="text" name="in-practice" placeholder="Practice">
          </form>
        </div>
        <!--  -->
    </div>
    <div id="wrapper">
      <div id="in-aside">
        <form class="form-inaside" action="" method="post">
          <p><span>Name of Restaurant:</span><input type="text" name="name" placeholder="Restaurant's Name"/></p>
          <p><span>Telephone No. :</span><input type="tel" name="usrtel" placeholder="Telephone No."/></p>
          <p><span> Address: </span> <input class="inaside-address" placeholder="Enter Address" onFocus=" " type="text"></input></p>
          <p><span>Website :</span><input class="website-aside" type="url" name="site" value="http://" /></p>
          <p><span>Cusine</span> <input class="inaside-cusine"type="text" name="aside-cusine" placeholder="Cusine"> </p>
          <p><span> Practice:</span><input type="text" name="aside-practice" placeholder="Practice"></p>
          <p><span>Comments:</span><textarea class="myTextArea"class="notes" rows="10" placeholder="Comments on the Restaurant "></textarea></p>
          <p><span>Upload Photos:</span><input type="file" name="fileupload" value="fileupload" id="fileupload" multiple></p>
          <p><input type="button" onclick="" value="Submit Information"></p>
        </form>
      </div>
      <input id="loc-input" class="controls" type="text" placeholder="Location Search">
      <div id="map">
      </div>
    </div>
      <p class="copyright">© Personalised Restaurant Ratings</p>
  </body>
  <script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyB6HG29vOYMksAE5itap_b-LU80gtazkfU&libraries=places&callback=initMap"
  async defer></script>
  <!-- http://localhost/1_1_Final_Web_Programming/final2/index.php -->
</html>
