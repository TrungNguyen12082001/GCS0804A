<!DOCTYPE html>
<html>
<body>



<?php
    $id = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $cat = $_REQUEST["cat"];
    $date = $_REQUEST["date"];
    $price = $_REQUEST["price"];
    $desc = $_REQUEST["desc"];

    echo $id;
    echo $name;
    echo $cat;
    echo $date;
    echo $price;
    echo $desc;

    $host = "ec2-3-233-43-103.compute-1.amazonaws.com";
    $database = "d376etns70uqbq";
    $port = "5432";
    $user = "nwstpstfjuxqqt";
    $password = "ada43f72957d249213f980ade84286316d9d545d49ea3c2e70b97d62fe4770c4";
    

    $host_param_str = "host=".$host;
    $dbname_param_str = " dbname=".$database;
    $port_param_str = " port=".$port;
    $user_param_str = " user=".$user;
    $pass_param_str = " password=".$password;
    $sslmode_param_str = " sslmode=require";

    $connection_string = $host_param_str.$dbname_param_str.$port_param_str.$user_param_str.$pass_param_str.$sslmode_param_str;

    echo "<p>".$connection_string."</p>";

    $connection = pg_connect($connection_string);

    if($connection === false){
        die("ERROR: could not connect");
    }
    else{
        echo "SUCCESS: Connect to Heroku Postgres has been established";

        $product_query = 'INSERT INTO public."Product"(id,product_name,category,descriptions,price) VALUES (\''.$id.'\',\''.$name.'\',\''.$cat.'\',\''.$desc.'\','.$price.')';

        echo '<p>'.$product_query.'</p>';

        if (pg_query($connection,$product_query)){
            echo '<p>SUCCESS: Record is adding successfully. A new product is created</p>';
        }
        else {
            echo '<p>ERROR: Could not execute query</p>';
        }
    }    
?>

</body>
</html>


