<?php
$conn = mysql_connect("localhost", "root", "");

if (!$conn) {
	echo "Unable to connect to DB: " . mysql_error();
	exit;
}

if (!mysql_select_db("phpmonitor")) {
	echo "Unable to select mydbname: " . mysql_error();
	exit;
}

$sql = "Select *
		FROM   monitor_servers
		Where rtime=(SELECT min(rtime) FROM  monitor_servers WHERE  Cell_id = 4)";

$result = mysql_query($sql);

if (!$result) {
	echo "Could not successfully run query ($sql) from DB: " . mysql_error();
	exit;
}

if (mysql_num_rows($result) == 0) {
	echo "No rows found, nothing to print so am exiting";
	exit;
}

//while ($row = mysql_fetch_assoc($result)) {
//echo $row['ip'];

//}
$row = mysql_fetch_assoc($result);
$IPserverwsdl = $row['ip'];
$IPservice = $row['method'];

mysql_free_result($result);

// $IPservice = $_POST ['IPservice'];
// $IPserverwsdl = $_POST ['IPserverwsdl'];

?>