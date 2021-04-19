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
    echo $$id;
    echo $$name;
    echo $cat;
    echo $date;
    echo $price;
    echo $desc;
?>

</body>
</html>