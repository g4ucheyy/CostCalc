<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add</title>
    <link rel="icon" href="cake.png">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
<center>
<h1>Add Record</h1>
<form action="" method="post" class="f1">
    <label>Item Name</label><br>
    <input type="text" name="name" required><br>
    <label>Quantity</label><br>
    <input type="number" name="qtty" min="0" required><br>
     <label>Quantity Used</label><br>
    <input type="number" name="qtty_used" min="0" required><br>
    <label>Unit</label><br>
    <select name="unit" required>
        <option value= "">-- Select --</option>
        <option value="pcs">pcs</option>
        <option value="g">g</option>
        <option value="tsp">tsp</option>
        <option value="tbsp">tbsp</option>
        <option value="ml">ml</option>
    </select><br>
    <br>
    <label>Price Per Unit</label><br>
    <input type="number" name="price" min="0" step="any" required><br>
    <label>Note</label><br>
    <textarea name="note"></textarea><br>
    <br>
    <a href="index.php">Back</a> &nbsp; <input type="submit" name="send" value="Submit">

</form>
</center>
</body>
</html>
<?php
include("db.php");
if(isset($_POST['send'])){
 $na = $_POST['name'];
 $qt = $_POST['qtty'];
 $qu = $_POST['qtty_used'];
 $ut = $_POST['unit'];
 $pr = $_POST['price'];
 $nt = $_POST['note'];


    $unit = ($pr / $qt); // price per unit
    $total = $unit * $qu; // total cost for quantity used

    if ($ut == "tsp" || $ut == "tbsp") {
        $total += 0.50;
    }
 

    $query = mysqli_query($conn,
    "INSERT INTO record SET name='".$na."',
    qtty ='".$qt."',
    qtty_used = '".$qu."',
    unit ='".$ut."',
	price ='".$pr."',
	note ='".$nt."',
	total = '".$total."'
	");

 echo '<script>alert("Record successfully added!"); window.location="index.php";</script>';

}

?>