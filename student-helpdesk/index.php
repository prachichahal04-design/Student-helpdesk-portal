<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

/* If already logged in, go to dashboard */
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    header("Location: dashboard.php");
    exit();
}

$error = "";

/* Login Logic */
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    /* Simple demo login (you can later connect MySQL) */
    if ($username == "Prachi" && $password == "1234") {

        $_SESSION["login"] = true;
        $_SESSION["username"] = $username;

        header("Location: dashboard.php");
        exit();

    } else {
        $error = "❌ Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Helpdesk Login</title>

<style>
body{
margin:0;
font-family:Arial;
background:linear-gradient(135deg,#4facfe,#00f2fe);
height:100vh;
display:flex;
justify-content:center;
align-items:center;
}

.box{
background:white;
padding:40px;
width:350px;
border-radius:15px;
box-shadow:0 10px 25px rgba(0,0,0,0.2);
text-align:center;
}

h1{
margin-bottom:10px;
color:#333;
}

input{
width:100%;
padding:12px;
margin:10px 0;
border:1px solid #ccc;
border-radius:8px;
outline:none;
}

button{
width:100%;
padding:12px;
background:#007bff;
color:white;
border:none;
border-radius:8px;
font-size:16px;
cursor:pointer;
}

button:hover{
background:#0056b3;
}

.error{
color:red;
margin-bottom:10px;
font-size:14px;
}
</style>

</head>

<body>

<div class="box">

    <h1>🎓 Student Helpdesk</h1>
    <p>Login to continue</p>

    <?php if($error != "") echo "<div class='error'>$error</div>"; ?>

    <form method="POST">

        <input type="text" name="username" placeholder="Username" required>

        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>

    </form>

</div>

</body>
</html>
