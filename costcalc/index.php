<?php
$day = date("d-m-Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="icon" href="cake.png">
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <center>
    <h1>INGREDIENT COST CALCULATOR</h1>
    <h3>Tarikh: <?php echo $day?></h3> 
    <br>
   <table border="1" cellspacing = "0" cellpadding="10">
    <tr>
        <th>No</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Quantity Used</th>
        <th>Unit</th>
        <th>Price Per Unit</th>
        <th>Total (RM)</th>
        <th>Note</th>
        <th>Action</th>
    </tr>

<?php
include('db.php');

if (!$conn) {
    echo "DATABASE ERROR!";
    die(mysqli_connect_error());
}

$query = mysqli_query($conn, "SELECT * FROM record");

$no = 1;
while($row = mysqli_fetch_assoc($query)) {
    echo "
    <tr>
    <td>".$no."</td>
    <td>".$row['name']."</td>
    <td>".$row['qtty']."</td>
    <td>".$row['qtty_used']."</td>
    <td>".$row['unit']."</td>
    <td>".$row['price']."</td>
    <td>".$row['total']."</td>
    <td>".$row['note']."</td>
    
    ";
    echo'<td><a href="delete.php?id='.$row['name'].' "onclick="return confirm(\'Are you sure you want to delete this item?\');">Delete</a></td>';
    $no++;
}

mysqli_close($conn);
?>
</table>
<br>
<br>
<a href="add.php"><button style="width: 100px; height: 28px; font-size: 0.9em;">Add Record</button></a> &nbsp; <a href="calc.php"><button style="width: 90px; height: 28px; font-size: 0.9em;">Calculate</button></a>
<br>
<br>
<br>
<footer><p>
            &copy; 2026 Faris Bazli <br>
                         Version 1.0 <br>
                      
        <p>Contact me at: <a href="https://wa.me/601123995204">+6011-2399-5204</a></p> <a href="https://www.instagram.com/gaucheyxd/">Instagram</a></footer>
</center>
    
</body>

</html>
