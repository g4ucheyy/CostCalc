<?php
    include("db.php");

    $date = date("d-m-Y");

    // Get total items and total cost
    $result = mysqli_query($conn, "SELECT COUNT(*) as item_count, SUM(total) as total_cost FROM record");
    $row = mysqli_fetch_assoc($result);
    $total_items = $row['item_count'];
    $total_cost = $row['total_cost'];


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Summary</title>
    <link rel="icon" href="cake.png">
    <link rel="stylesheet" href="style1.css">
</head>
  <style>
        h2{
            text-align: center;
        }
        body {
         
            margin: 15px;
        }
        table{
            padding: 4px 10px;
              border-collapse: collapse;
        }
        @media print {
            #print-btn, #back-link {
                display: none;
            }
        }
        </style>
<body>
    <center>
    <h1>SUMMARY</h1>
    <table class="table" border="3" cellpadding="2" cellspacing="0" width="400">
    <tr>
        <td width="35%"><b>Total Item:</b></td>
        <td width="65%"><?php echo $total_items; ?></td>
    </tr>
    <tr>
        <td><b>Total Cost:</b></td>
        <td>RM <?php echo number_format($total_cost, 2); ?></td>
    </tr>
    <tr>
        <td><b>Date:</b></td>
        <td><?php echo"$date"?></td>
    </tr>
</table>
<!-- NEW TABLE -->
<table border="3" cellspacing = "0" cellpadding="2">
    <tr>
        <th>No</th>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Quantity Used</th>
        <th>Unit</th>
        <th>Price Per Unit</th>
        <th>Total (RM)</th>
        <th>Note</th>
    </tr>
<br>
<?php

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
    $no++;
}

mysqli_close($conn);
?>
<br>
</table>
<br>
<a href="index.php" id="back-link">Back</a> &nbsp; <button id="print-btn" onclick="window.print()">Print</button>

    
    </center>
</body>
</html>