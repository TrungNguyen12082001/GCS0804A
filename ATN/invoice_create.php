<!DOCTYPE html>
<html>
<body>

<?php
    $cusid = $_REQUEST["customer_ID"];
    $cusname = $_REQUEST["customer_Name"];
    $cusemail = $_REQUEST["customer_Email"];
    $invoiceid = $_REQUEST["invoice_ID"];
    $invoicedate = $_REQUEST["invoice_Date"];
    
    $invoice_product_id = $_REQUEST["invoice_productID"];
    $invoice_product_quantity = $_REQUEST["invoice_productQuantity"];
    
    
    echo $cusid;
    echo $cusname;
    echo $cusemail;
    echo $invoiceid;
    echo $invoicedate;

    echo $invoice_product_id;
    echo $invoice_product_quantity;
    
    $product_id = "";
    for ($i = 0; $i < count($invoice_product_id); $i++){
        $product_id .= $invoice_product_id[$i].","; 
    }

    $product_quantity = "";
    for ($i = 0; $i < count($invoice_product_quantity); $i++){
        $product_quantity .= $invoice_product_quantity[$i].",";
    }

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

        $invoice_query = 'INSERT INTO public."Invoice"("cusId","cusName","cusEmail","invoiceID","invoicedDate","invoiceProductID","invoiceProductQuantity") VALUES (\''.$cusid.'\',\''.$cusname.'\',\''.$cusemail.'\',\''.$invoiceid.'\',\''.$invoicedate.'\',\''.$product_id.'\',\''.$product_quantity.'\')';

        echo '<>'.$invoice_query.'</>';

        if (pg_query($connection,$invoice_query)){
            echo '<p>SUCCESS: Record is adding successfully. A new invoice is created</p>';
        }
        else {
            echo '<p>ERROR: Could not execute query</p>';
        }
    }    
?>

</body>
</html>