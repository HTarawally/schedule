<?php

$today=date("Y/m/d h:i:s");

define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "var_dump(1)");
define("DBNAME", "schedule");

$dbconnect=mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME) or die("<script type=\"text/javascript\"> alert(\"Could not connect to the database\") </script>");

$CreateTimes="CREATE TABLE Times (
	ID int(255) NOT NULL auto_increment,
	day varchar(10) NOT NULL,
	title varchar(50) NOT NULL,
	start int(3) NOT NULL,
	duration int(3) NOT NULL,
	Primary Key(ID)
)";

$CreateDeletedTimes="CREATE TABLE DeletedTimes (
	ID int(255) NOT NULL,
	day varchar(10) NOT NULL,
	title varchar(50) NOT NULL,
	start int(3) NOT NULL,
	duration int(3) NOT NULL,
	Primary Key(ID)
)";

$CreateDone="CREATE TABLE Done (
	ID int(255) NOT NULL,
	finished char(1) NOT NULL,
	date datetime NOT NULL,
	Primary Key(ID)
)";

$SendTimes=mysqli_query($dbconnect, $CreateTimes);
$SendDeletedTimes=mysqli_query($dbconnect, $CreateDeletedTimes);
$SendDone=mysqli_query($dbconnect, $CreateDone);

if(isset($_GET["add"]))
{
	$day=$_POST["day"];
	$title=trim(strip_tags($_POST["title"]));
	$start=$_POST["start"];
	$duration=$_POST["duration"];
	
	if(checkAvailability($day, $start)==1)
	{
		$addItem="INSERT INTO times VALUES ('','$day','$title','$start','$duration')";
		$queryItem=mysqli_query($dbconnect,$addItem) or die("<script type=\"text/javascript\"> alert(\"Could not add item to database\") </script>");
	}
	else 
	{
		echo "<script type=\"text/javascript\"> alert(\"Sorry but this time slot is unavailable.\") </script>";
	}
	
	echo "<script type=\"text/javascript\"> document.location=\"index.php\" </script>";
}
else if(isset($_GET["confirmEdit"]))
{
	$ID=$_GET["confirmEdit"];
	$day=$_POST["day"];
	$title=trim(strip_tags($_POST["title"]));
	$start=$_POST["start"];
	$duration=$_POST["duration"];
	
	$editItem="UPDATE times SET day='$day', title='$title', start='$start', duration='$duration' WHERE ID='$ID'";
	$queryeditItem=mysqli_query($dbconnect,$editItem);
	
	echo "<script type=\"text/javascript\"> document.location=\"index.php\" </script>";
}
else if(isset($_GET["delete"]))
{
	$ID=$_GET["delete"];
	$day=$_POST["day"];
	$title=trim(strip_tags($_POST["title"]));
	$start=$_POST["start"];
	$duration=$_POST["duration"];
	
	$send="INSERT INTO deletedTimes VALUES ('$ID', '$day', '$title', '$start', '$duration')";
	$querysend=mysqli_query($dbconnect,$send);
	
	$delete="DELETE FROM times WHERE ID='$ID'";
	$querydelete=mysqli_query($dbconnect,$delete);
	
	echo "<script type=\"text/javascript\"> document.location=\"index.php\" </script>";
}
else if(isset($_GET["mark"]))
{
	$ID=$_GET["mark"];
	
	$search="SELECT finished FROM done WHERE ID='$ID'";
	$querysearch=mysqli_query($dbconnect,$search);
	$resultsearch=mysqli_fetch_assoc($querysearch);
	
	if(isset($_POST["mark"]))
	{	
		$done=$_POST["mark"];
		if($resultsearch["finished"]==NULL)
		{
			$InsertDone="INSERT INTO done VALUES ('$ID', 'Y', '$today')";
			$QueryInsertDone=mysqli_query($dbconnect, $InsertDone);
		}
		else
		{
			$EditDone="UPDATE done SET finished='Y', date='$today' WHERE ID='$ID'";
			$QueryEditDone=mysqli_query($dbconnect,$EditDone);
		}
	}
	else 
	{
		if($resultsearch["finished"]==NULL)
		{
			$InsertDone="INSERT INTO done VALUES ('$ID', 'N', '$today')";
			$QueryInsertDone=mysqli_query($dbconnect, $InsertDone);
		}
		else
		{
			$EditDone="UPDATE done SET finished='N', date='$today' WHERE ID='$ID'";
			$QueryEditDone=mysqli_query($dbconnect,$EditDone);
		}
	}
	
	echo "<script type=\"text/javascript\"> document.location=\"index.php\" </script>";
}
else if(isset($_GET["clear"]))
{
	$clear="UPDATE done SET finished='N', date='$today'";
	$queryclear=mysqli_query($dbconnect, $clear);
	
	echo "<script type=\"text/javascript\"> document.location=\"index.php\" </script>";
}
else if(isset($_GET["go"]))
{
	deleteAll();
}

?>

<?php

function DisplaySlot($myID, $myTitle)
{
	global $width, $margin, $dbconnect;
	
	$function="SELECT finished FROM done WHERE ID='$myID'";
	$queryfunction=mysqli_query($dbconnect, $function);
	$resultfunction=mysqli_fetch_assoc($queryfunction);
	if($resultfunction["finished"]==NULL || $resultfunction["finished"]=="N")
	{
		echo "<a id='shownAnchor' href='index.php?edit=" . $myID . "'>";
		echo "<div id='shown' style='width:$width" . "px" . "; left:$margin" . "px" . ";'>" . $myTitle . "</div>";
		echo "</a>\n";
	}
	else
	{
		echo "<a id='shownAnchor' href='index.php?edit=" . $myID . "'>";
		echo "<div id='shownDone' style='width:$width" . "px" . "; left:$margin" . "px" . ";'>" . $myTitle . "</div>";
		echo "</a>\n";
	}
}

function TimeLeft()
{
	global $dbconnect;
	$timeleft=0;
	
	$function="SELECT ID, duration from times";
	$queryfunction=mysqli_query($dbconnect, $function);
	
	while($resultfunction=mysqli_fetch_assoc($queryfunction))
	{
		$savedId=$resultfunction["ID"];
		$savedDuration=$resultfunction["duration"];
		$newfunction="SELECT finished FROM done WHERE ID='$savedId'";
		$newquery=mysqli_query($dbconnect, $newfunction);
			
		if($newResult=mysqli_fetch_assoc($newquery))
		{
			if($newResult['finished']=='N')
			{
				$timeleft+=$savedDuration;
			}
		}
		else
		{
			$timeleft+=$savedDuration;
		}
	}
	
	echo "Time Left: $timeleft Hours";
}

function checkAvailability($checkDay, $checkTime)
{
	global $dbconnect;
	
	$checkItem="SELECT start, day FROM times WHERE day='$checkDay'";
	$queryCheckItem=mysqli_query($dbconnect, $checkItem);
	
	while($resultCheckItem=mysqli_fetch_assoc($queryCheckItem))
	{
		if($resultCheckItem["start"]==$checkTime)
		{
			return 0;
			break;
		}
	}
	
	return 1;
}

function deleteAll()
{
	global $dbconnect;
	
	$deleteTimes="DELETE FROM times";
	$deleteDone="DELETE FROM done";
	$deleteDeletedTimes="DELETE FROM deletedtimes";
	
	mysqli_query($dbconnect,$deleteTimes);
	mysqli_query($dbconnect,$deleteDone);
	mysqli_query($dbconnect,$deleteDeletedTimes);
	
	echo "<script type=\"text/javascript\"> document.location=\"index.php\" </script>";
}

?>