<?php
include("config.php");

if($_SESSION['login'] != true){
    header("Location:index.php");
    exit();
}

$data = json_decode(file_get_contents("tickets.json"), true);

if(!$data){
    $data = [];
}
?>

<!DOCTYPE html>
<html>
<head>
<title>View Tickets</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="dashboard">

<!-- SIDEBAR -->
<div class="sidebar">
<h2>🎓 Portal</h2>

<a href="dashboard.php">🏠 Dashboard</a>
<a href="tickets.php">🎫 Submit Ticket</a>
<a href="view_tickets.php">📋 View Tickets</a>
<a href="logout.php">🚪 Logout</a>

</div>

<!-- MAIN -->
<div class="main-content">

<h1>📋 Previous Ticket Records</h1>

<!-- SUMMARY CARDS -->
<div class="cards">

<div class="card">
<h3>Total Tickets</h3>
<p><?php echo count($data); ?></p>
</div>

<div class="card">
<h3>Latest Ticket</h3>
<p><?php echo !empty($data) ? end($data)['id'] : "N/A"; ?></p>
</div>

<div class="card">
<h3>Status</h3>
<p>Active</p>
</div>

</div>

<!-- TABLE -->
<div class="info-box">

<h3>All Submitted Tickets</h3>

<table>
<tr>
<th>ID</th>
<th>Name</th>
<th>Category</th>
<th>Issue</th>
<th>Status</th>
<th>Time</th>
</tr>

<?php if(count($data) > 0): ?>

<?php foreach(array_reverse($data) as $row): ?>
<tr>
<td>#<?php echo $row['id']; ?></td>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['issue']; ?></td>
<td>
<?php 
$status = $row['status'];

if($status == "Pending"){
    echo "<span style='color:orange;font-weight:bold;'>Pending</span>";
}
else if($status == "In Progress"){
    echo "<span style='color:blue;font-weight:bold;'>In Progress</span>";
}
else if($status == "Resolved"){
    echo "<span style='color:green;font-weight:bold;'>Resolved</span>";
}
?>
</td>
<td><?php echo $row['time']; ?></td>
</tr>
<?php endforeach; ?>

<?php else: ?>
<tr>
<td colspan="6" style="text-align:center;">No tickets submitted yet</td>
</tr>
<?php endif; ?>

</table>

</div>

</div>
</div>

</body>
</html>
