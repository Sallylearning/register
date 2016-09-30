<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die("Could not connect:". mysql_error());
  }
// Create table in www database
mysql_select_db("www",$con);
$sql = "CREATE TABLE user 
(
personID int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(personID),
username varchar(15),
password varchar(15)

)";
mysql_query($sql,$con);
if(mysql_query($sql))
{
echo "create table sussces!";
}
else
{
echo "errno:".mysql_errno()." reason:".mysql_error();
}
 mysql_close($con);
?>