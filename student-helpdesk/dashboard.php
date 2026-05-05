<?php
session_start();
include("config.php");

error_reporting(E_ALL);
ini_set('display_errors', 1);

/* Protect Page */
if (!isset($_SESSION['login']) || $_SESSION['login'] != true) {
    header("Location:index.php");
    exit();
}

/* Load Ticket Data */
$tickets = [];

if (file_exists("tickets.json")) {
    $json = file_get_contents("tickets.json");
    $tickets = json_decode($json, true);

    if (!is_array($tickets)) {
        $tickets = [];
    }
}

/* Stats */
$totalTickets = count($tickets);
$pending = 0;
$resolved = 0;

foreach ($tickets as $ticket) {

    $status = strtolower($ticket['status'] ?? 'pending');

    if ($status == "resolved") {
        $resolved++;
    } else {
        $pending++;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Helpdesk Dashboard</title>

<style>
*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:Arial, sans-serif;
}

body{
background:#f4f6f9;
}

.dashboard{
display:flex;
min-height:100vh;
}

/* Sidebar */
.sidebar{
width:250px;
background:#0d6efd;
color:white;
padding:25px 20px;
}

.sidebar h2{
margin-bottom:30px;
font-size:26px;
text-align:center;
}

.sidebar a{
display:block;
color:white;
text-decoration:none;
padding:12px 15px;
margin-bottom:12px;
border-radius:8px;
transition:0.3s;
}

.sidebar a:hover{
background:rgba(255,255,255,0.2);
}

/* Main */
.main-content{
flex:1;
padding:30px;
}

/* Topbar */
.topbar{
background:white;
padding:20px;
border-radius:12px;
box-shadow:0 4px 12px rgba(0,0,0,0.08);
display:flex;
justify-content:space-between;
align-items:center;
margin-bottom:25px;
}

/* Hero */
.hero-box{
background:linear-gradient(135deg,#4facfe,#00f2fe);
color:white;
padding:30px;
border-radius:15px;
margin-bottom:25px;
box-shadow:0 8px 20px rgba(0,0,0,0.1);
}

.hero-box h2{
margin-bottom:10px;
font-size:28px;
}

.hero-box p{
margin-bottom:15px;
font-size:16px;
}

.hero-box button{
padding:12px 18px;
border:none;
background:white;
color:#007bff;
font-weight:bold;
border-radius:8px;
cursor:pointer;
}

/* Cards */
.cards{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(220px,1fr));
gap:20px;
}

.card{
background:white;
padding:25px;
border-radius:15px;
box-shadow:0 5px 15px rgba(0,0,0,0.08);
text-align:center;
}

.card h3{
margin-bottom:15px;
font-size:20px;
color:#333;
}

.card p{
font-size:30px;
font-weight:bold;
color:#0d6efd;
}

/* Footer note */
.note{
margin-top:30px;
background:white;
padding:18px;
border-radius:12px;
box-shadow:0 4px 12px rgba(0,0,0,0.08);
color:#555;
}
</style>

</head>

<body>

<div class="dashboard">

    <!-- Sidebar -->
    <div class="sidebar">

        <h2>🎓 Helpdesk</h2>

        <a href="dashboard.php">🏠 Dashboard</a>
        <a href="tickets.php">🎫 Submit Ticket</a>
        <a href="view_tickets.php">📋 View Tickets</a>
        <a href="logout.php">🚪 Logout</a>

    </div>

    <!-- Main Content -->
    <div class="main-content">

        <!-- Topbar -->
        <div class="topbar">

            <div>
                <h1>👋 Welcome, <?php echo $_SESSION['username']; ?></h1>
                <p>Student Helpdesk Portal</p>
            </div>

            <div>
                <strong>Date:</strong> <?php echo date("d M Y"); ?>
            </div>

        </div>

        <!-- Hero -->
        <div class="hero-box">

            <h2>🎓 Student Support System</h2>
            <p>Submit issues, track tickets and receive support quickly.</p>

            <a href="tickets.php">
                <button>➕ Submit New Ticket</button>
            </a>

        </div>

        <!-- Cards -->
        <div class="cards">

            <div class="card">
                <h3>📨 Total Tickets</h3>
                <p><?php echo $totalTickets; ?></p>
            </div>

            <div class="card">
                <h3>⏳ Pending</h3>
                <p><?php echo $pending; ?></p>
            </div>

            <div class="card">
                <h3>✅ Resolved</h3>
                <p><?php echo $resolved; ?></p>
            </div>

            <div class="card">
                <h3>👤 Logged User</h3>
                <p style="font-size:22px;"><?php echo $_SESSION['username']; ?></p>
            </div>

        </div>

        <div class="note">
            Welcome to your professional student helpdesk dashboard. Use the left menu to manage support tickets.
        </div>

    </div>

</div>

</body>
</html>
