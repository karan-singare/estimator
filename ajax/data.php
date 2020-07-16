<?php
  if (isset($_GET['submit']) && $_GET['submit'] == 'true') {

    /**
      * Database Credentials
    */

    $mysqli = mysqli_connect("localhost", "admin", "Admin@123", "estimator");

    /* check connection */
    if ($mysqli->connect_errno) {
      printf("Connect failed: %s\n", $mysqli->connect_error);
      exit();
    }



    $keyword = $_POST['keyword'];
    $country = $_POST['country'];
    $category = $_POST['category'];

    $keyword_weight = mysqli_fetch_object($mysqli->query("select weight from keywords where keyword = '$keyword'"));
    $country_weight = mysqli_fetch_object($mysqli->query("select weight from countries where country = '$country'"));
    $category_weight = mysqli_fetch_object($mysqli->query("select weight from categories where category_name = '$category'"));

    $feedback['keyword'] = $keyword_weight->weight;
    $feedback['country'] = $country_weight->weight;
    $feedback['category'] = $category_weight->weight;

    $feedback['result'] = ($keyword_weight->weight * $country_weight->weight) + ($keyword_weight->weight * $category_weight->weight);

    echo json_encode($feedback);



  }






 ?>


<?php
  // $mysqli = mysqli_connect("localhost", "admin", "Admin@123", "estimator");
  //
  // /* check connection */
  // if ($mysqli->connect_errno) {
  //   printf("Connect failed: %s\n", $mysqli->connect_error);
  //   exit();
  // }
  //
  //
  //
  // // $keyword = $_POST['keyword'];
  // // $country = $_POST['country'];
  // // $category = $_POST['category'];
  //
  // $keyword = 'songs';
  // $country = 'india';
  // $category = 'Pranks';
  //
  // $feedback['keyword'] = $keyword;
  // $feedback['country'] = $country;
  // $feedback['category'] = $category;
  //
  // $keyword_weight = mysqli_fetch_object($mysqli->query("select weight from keywords where keyword = '$keyword'"));
  // $country_weight = mysqli_fetch_object($mysqli->query("select weight from countries where country = '$country'"));
  // $category_weight = mysqli_fetch_object($mysqli->query("select weight from categories where category_name = '$category'"));
  //
  // $feedback['keyword'] = $keyword_weight;
  // $feedback['country'] = $country_weight;
  // $feedback['category'] = $category_weight;
  //
  //
  // echo json_encode($feedback);




 ?>
