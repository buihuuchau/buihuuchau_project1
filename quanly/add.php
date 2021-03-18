<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
<h2>PHP Form Validation Example</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
 mats: <input type="text" name="mats"><BR>
 tents: <input type="text" name="tents"><BR>
 <input type="submit" name="submit" value="Submit">
</form>

<?php
 $mats=$_POST['mats'];
 $tents=$_POST['tents'];

 function pg_connection_string_from_database_url() {
 extract(parse_url($_ENV["DATABASE_URL"]));
 return "user=$user password=$pass host=$host dbname=" . substr($path,1);
}

$db = pg_connect(pg_connection_string_from_database_url() );
 if(!$db){
 echo "Error : Unable to open database \n";
} else {
 echo "Opened database succesfully\n";
}

 $sql = "INSERT INTO TAI_SAN (mats, tents) VALUES ('$mats','$tents')";
 print "<br>$sql<br>";
 $ret = pg_query($db,$sql);
 if(!$ret){
 echo pg_last_error($db);
} else{
 echo "Table created successfully\n";
}
pg_close($db);

?>
</body>
</html>
