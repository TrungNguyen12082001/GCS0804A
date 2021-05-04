<!DOCTYPE html>
<html>
<body>

<?php
    echo "This file is ";
?>

<?php
    $cusid = $_REQUEST["id"];
    $cusname = $_REQUEST["name"];
    $cusemail = $_REQUEST["email"];
    $cusphone = $_REQUEST["phone"];
    $cusaddress = $_REQUEST["address"];
    // $invoiceid = $_REQUEST["invoice_ID"];
    // $invoicedate = $_REQUEST["invoice_Date"];
    
    // $invoice_product_id = $_REQUEST["invoice_productID"];
    // $invoice_product_quantity = $_REQUEST["invoice_productQuantity"];

    echo $cusid;
    echo $cusname;
    echo $cusemail;
    echo $cusphone;
    echo $cusaddress;
    // echo "<p>".$invoiceid."</p>";
    // echo "<p>".$invoicedate."</p>";
    
    // for($i = 0; $i <p count($invoice_product_id); $i++){
    //     echo "</p>".$invoice_product_id[$i]."".$invoice_product_quantity[$i]."</p>";
    // }

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

        $customer_query = 'INSERT INTO public."Customer"("id","Name","Email","Phone","Address") VALUES (\''.$cusid.'\',\''.$cusname.'\',\''.$cusemail.'\',\''.$cusphone.'\','.$cusaddress.')';

        echo '<p>'.$customer_query.'</p>';

        if (pg_query($connection,$customer_query)){
            echo '<p>SUCCESS: Record is adding successfully. A new customer is created</p>';
        }
        else {
            echo '<p>ERROR: Could not execute query</p>';
        }
    }    
?>

</body>
</html>