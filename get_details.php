<html>
<head>
    <title>
        PostOffice Results
    </title>
    <?php include 'components/integrations.php'; ?>

</head>
<body><br>
<h2 class="text-center">Results for your search</h2>

<?php
/**
 * Created by PhpStorm.
 * User: kkkum
 * Date: 2/22/2019
 * Time: 11:35 PM
 */
$type1 = $_GET['type1']; //PIN or Location name
//echo $type1;
$type2 = $_GET['type2'];
//echo  "<br>".$type2;//pincode or location
if (isset($_GET["submit"])){
    if ($type2 == 'pin'){
      $source = "http://postalpincode.in/api/pincode/".$type1."";
    }
    else{
        if ($type2 == 'po') {
            $source = "http://postalpincode.in/api/postoffice/".$type1."";
        }
    }
   $results = file_get_contents($source);
    $json = json_decode($results,true);
    //echo "<br>".$json['Message'];
   if (isset($json['PostOffice'])){
      foreach ($json['PostOffice'] as $main){
          ?>

          <div class="container">
              <div class="row">
                  <div class="col-sm-2"></div>
                  <div class="col-sm-8">
                      <br>
                      <?php
                      if (isset($main['Name'])){
                          $name = $main['Name'];
                          ?>
                          <h5 class="text-center">Branch Name : <?php echo $name;?></h5>
                          <?php
                      }
                      ?>

                      <table class="table table-bordered">
                          <tbody>
                          <tr>

                              <?php
                              if (isset($main['PINCode'])){
                                  $pincode = $main['PINCode'];
                                  ?>
                                  <td><b>PIN Code</b></td>
                                  <td style="color: red;"><?php echo $pincode; ?></td>
                                  <?php
                              }
                              ?>
                          </tr>
                          <tr>
                              <td><b>Branch Type</b></td>
                              <?php
                              if (isset($main['BranchType'])){
                                  $btype = $main['BranchType'];
                                  ?>
                                  <td><?php echo $btype;?></td>
                                  <?php
                              }
                              ?>
                          </tr>

                          <tr>
                              <td><b>Taluk</b></td>
                              <?php
                              if (isset($main['Taluk'])){
                                  $taluk = $main['Taluk'];
                                  ?>
                                  <td><?php echo $taluk;?></td>
                                  <?php
                              }
                              ?>
                          </tr>
                          <tr>
                              <td><b>Circle</b></td>
                              <?php
                              if (isset($main['Circle'])){
                                  $circle = $main['Circle'];
                                  ?>
                                  <td><?php echo $circle;?></td>
                                  <?php
                              }
                              ?>
                          </tr>
                          <tr>
                              <td><b>District</b></td>
                              <?php
                              if (isset($main['District'])){
                                  $dist = $main['District'];
                                  ?>
                                  <td><?php echo $dist;?></td>
                                  <?php
                              }
                              ?>
                          </tr>
                          <tr>
                              <td><b>Division</b></td>
                              <?php
                              if (isset($main['Division'])){
                                  $division = $main['Division'];
                                  ?>
                                  <td><?php echo $division;?></td>
                                  <?php
                              }
                              ?>
                          </tr>
                          <tr>
                              <td><b>Region</b></td>
                              <?php
                              if (isset($main['Region'])){
                                  $reg = $main['Region'];
                                  ?>
                                  <td><?php echo $reg;?></td>
                                  <?php
                              }
                              ?>
                          </tr>
                          <tr>
                              <td><b>State</b></td>
                              <?php
                              if (isset($main['State'])){
                                  $state = $main['State'];
                                  ?>
                                  <td><?php echo $state;?></td>
                                  <?php
                              }
                              ?>
                          </tr>
                          <tr>
                              <td><b>Country</b></td>
                              <?php
                              if (isset($main['Country'])){
                                  $country = $main['Country'];
                                  ?>
                                  <td><?php echo $country;?></td>
                                  <?php
                              }
                              ?>
                          </tr>
                          </tbody>
                      </table>
                  </div>
                  <div class="col-sm-2"></div>
              </div>
          </div>


          <?php
      }

   }
}
?>

</body>
</html>
