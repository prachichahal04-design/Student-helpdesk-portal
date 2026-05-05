<?php
include("config.php");

if($_SESSION['login'] != true){
    header("Location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Submit Ticket</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<div class="dashboard">

<div class="sidebar">
    <h2>🎓 Portal</h2>

    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="tickets.php">🎫 Submit Ticket</a>
    <a href="logout.php">🚪 Logout</a>
</div>

<div class="main-content">

<h1>Submit Helpdesk Ticket</h1>

<div class="form-box">

<form id="ticketForm">

<input type="text" name="name" placeholder="Student Name" required>

<select name="category" required>
<option value="">Choose Category</option>
<option>IT Support</option>
<option>Fees</option>
<option>Timetable</option>
<option>Library</option>
</select>

<textarea name="issue" placeholder="Describe your issue..." required></textarea>

<button type="submit">Submit Ticket</button>

</form>

<p id="response"></p>

</div>

</div>

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="script.js"></script>
<div id="popup" class="popup">
<div class="popup-box">
<h2>✅ Success</h2>
<p>Your helpdesk ticket was submitted.</p>
<button id="closePopup">Close</button>
</div>
</div>
</body>
</html>
