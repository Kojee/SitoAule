<?php
session_start();

?>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
    <?php require "/snippets/navbar.php";?>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <form action="login.php" method="post">
                <div class="form-group">
                    <label>Username:</label><br>
                    <input type="text" class="form-control" name="username" placeholder="Username"><br>
                </div>
                <div class="form-group">
                    <label>Password:</label><br>
                    <input type="password" class="form-control" name="password"><br>
                </div>
                <input type="submit" class="btn btn-default" value="Login">
            </form>
        </div>
        <div class="col-md-4"></div>
    </div>
</body>
</html>
