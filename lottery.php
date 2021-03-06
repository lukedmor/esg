<?php
include("admin_util.php");
if(!function_exists("db_write")){
  include("db.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>ESG Administrator</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
</head>
<body class="container">
<div style="height:20px;width:100%"></div>
<?php

admin_login($_SERVER);

$users = db_getusers();
$salt = "";

if ($_GET and isset($_GET["salt"])) {
  $salt = $_GET["salt"];
}

?>
<form class="form-inline">
  <div class="form-group">
    <input type="text" class="form-control" name="salt" placeholder="random seed" value="<?php echo $salt ?>">
  </div>
  <button type="submit" class="btn btn-primary">Generate</button>
</form>
<div class="table-responsive">
<?php users_print($users, true, $salt) ?>
</div>
</body>
</html>