<?php
     
     session_start();

    $jsonData = file_get_contents("http://shopping.marwaradwan.org/api/Products/1/1/0/100/atoz");
    $dataArray =json_decode ($jsonData , true);
    foreach($dataArray['data']as $key => $value){
      $_SESSION["myfile"] = fopen("products.txt", "a") or die("Unable to open file!");
      fwrite( $_SESSION["myfile"]  , $value['products_id']."@".
                        $value['products_name']."@".
                        $value['products_description']."@".
                        $value['products_quantity']."@".
                        $value['products_model']."@".
                        $value['products_image']."@".
                        $value['products_date_added']."@".
                        $value['products_liked']. "\n");

      fclose( $_SESSION["myfile"]);

    }   
    if ($_SERVER['REQUEST_METHOD'] == "POST"){        
        header('Location: data.php');
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Save date into file</h2>
  <form action = "<?php echo $_SERVER['PHP_SELF'] ;?> " method ="post">

  <button type="submit" class="btn btn-primary">show Data</button>
</form>
</div>

</body>
</html>

