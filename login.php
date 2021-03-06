<!DOCTYPE html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--<meta http-equiv="refresh" content="3;url=./index.html" />
-->

    <!-- Bootstrap CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
    
    <title>Hackathon 2019</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="navbar-header">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="./index.html">
            <img src="./img/Logo.PNG" width="90" height="30" alt="">
            </a>
        </nav>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="./index.html">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./education.html">Education</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./resources.html">Resources</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./profile.html">Profile</a>
            </li>
            </ul> 
            </div>     
        </div>
    </div>
</nav>

<?php

$servername = "rds-mysql-hackathon2019.cobjudu8cprj.us-east-1.rds.amazonaws.com";
$username = "JessicaAWS";
$password = "jessaws1027";
$dbname = "hackathon_vera_2019";

$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error) {

  die('Could not connect: ' . $con->connect_error);

}

$uname = $_POST['username'];
$pass = $_POST['pw'];

if($uname =='' || $pass==''){
    header("Location:login.php?id=Some fields are empty");
} 

$sql= "SELECT * FROM users WHERE uname = '$uname'";
$result = $con->query($sql);

if ($result){
    $row = $result->fetch_array();
    if($uname==$row['uname'] && $pass==$row['password']) {
        header("Location:index.html");
    } else {
        header("Location:login_error.html");
    }
    
} else{
    echo "Query Failed: " . $sql . "<br>" . $con->error;
} 

$con->close();

?>

</body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>


</html>