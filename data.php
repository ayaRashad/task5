<?php
     session_start();

     $_SESSION["myfile"] = fopen("products.txt", "r") or die("Can not to open file!");
    while(!feof($_SESSION["myfile"])){
        $arrayStr = fgets($_SESSION["myfile"]) ;
        foreach (explode("@",$arrayStr)as $key => $value){
            echo $value . "<br>" ;
        }
      echo "<br>";
      echo "<hr>";
      echo "<br>";

    }
    fclose($_SESSION["myfile"]); 
?>