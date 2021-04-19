<!DOCTYPE html>
<html>
<body>

<?php
    echo "This file is ";
?>

<?php
    $id = $_REQUEST["id"];
    $name = $_REQUEST["name"];
    $cat = $_REQUEST["cat"];
    $date = $_REQUEST["date"];
    $price = $_REQUEST["price"];
    $desc = $_REQUEST["desc"];

    echo $id;
    echo $$name;
    echo $cat;
    echo $date;
    echo $price;
    echo $desc;

    $host = "ec2-3-233-43-103.compute-1.amazonaws.com";
    $database = "d376etns70uqbq";
    $port = "5432";
    $user = "nwstpstfjuxqqt"
    $pass = "ada43f72957d249213f980ade84286316d9d545d49ea3c2e70b97d62fe4770c4";
    $ssl = "require";

    $host_param_str = "host=".$host;
    $dbname_param_str = " dbname=".$database;
    $port_param_str = " port=".$port;
    $user_param_str = " user=".$user;
    $pass_param_str = " password=".$password;
    $sslmode_param_str = " ssl=require";

    $connection_string = $host_param_str + $dbname_param_str + $port_param_str + $user_param_str + $pass_param_str + $sslmode_param_str;

    $link = pg_connect($connection_string);

    if($link === false){
        die("ERROR: could not connect");
    }
    else
        echo "SUCCESS: Connect to Heroku Postgres has been established"
?>

</body>
</html>