<?php
/**
 * Created by PhpStorm.
 * User: kkkum
 * Date: 2/22/2019
 * Time: 11:35 PM
 */?>
<html lang="en">
<head>
    <title>
        Postal codes
    </title>
    <?php include 'components/integrations.php' ;?>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<br><br>
<h1 class="text-center">PIN</h1><br><br>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
          <div class="search-box">

              <p class="text-center"><button class="btn btn-info" name="pcode" type="submit" id="pc-show"> Search by Postal PIN Code</button>&nbsp;<button class="btn btn-info" name="poffice" type="submit" id="po-show">Search by Post Office Branch/Location</button></p><br>
              <form name="search" method="GET" action="get_details.php" id="form-pincode" onsubmit="return ValidPc()">
                  <div class="form-group row">
                      <div class="col-3"></div>
                      <div class="col-6" id="pincode">
                         <label >Enter PIN Code :</label>
                          <input type="number" name="type1" id="pc" class="form-control" placeholder="PIN Code....">
                          <input type="text" name="type2"  class="form-control" value="pin" style="display: none;">
                          <p id="nopin1"></p>
                          <input type="submit" class="btn btn-info" name="submit" value="Get Details">
                      </div>
                      <div class="col-3"></div>
                  </div>

              </form>
              <form name="search" method="GET" action="get_details.php" id="form-postoffice"  id="form-post" style="display: none";>
                  <div class="form-group row">
                      <div class="col-3"></div>
                      <div class="col-6" id="pincode">
                          <label >Enter Post Office Branch name/Location:</label>
                          <input type="text" name="type1" id="po" class="form-control" placeholder="Branch name....">
                          <input type="text" name="type2"  class="form-control" value="po" style="display: none;">
                          <p id="nopin1"></p>
                          <input type="submit" class="btn btn-info" name="submit" value="Get Details">
                      </div>
                      <div class="col-3"></div>
                  </div>

              </form>
              <br>
          </div>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
<script type="text/javascript">

    $(document).ready(function () {
        $("#pc-show").click(function () {
            $("#form-pincode").show();
            $("#form-postoffice").hide();
        });
        $("#po-show").click(function () {
            $("#form-pincode").hide();
            $("#form-postoffice").show();
        });
    });
</script>
<script type="text/javascript">
    function  ValidPc() {
        var po = document.getElementById("pc").value;
        var regx = '/^\d{6}$/';
        if(po.toString().length == 0) {
            document.getElementById("nopin1").innerHTML="<span style='color:red;'>* Please enter PIN Code....</span>";
            return false;
        }
        else{
           if (po.toString().length == 6) {
               return true;
           }
           else {
               document.getElementById("nopin1").innerHTML="<span style='color:red;'>* PIN Code must be 6 digits....</span>";
               return false;
           }

        }
        
    }
</script>
</body>
</html>

