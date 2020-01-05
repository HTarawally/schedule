<?php include("functions.php"); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Schedule</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script type="text/javascript" src="jquery-1.6.4.min.js"></script>
<script type="text/javascript" src="script.js"></script>
</head>

<body>

	<?php

	for($n=12; $n>=1; $n--)
	{
		echo "<div style='width:100px; float:right;'>$n</div>";
	}
	
	?>
    
    <div style="clear:both"></div>
    
    <h1>Monday</h1>
    <div id="monday">
    	<?php
		$getInfo="SELECT ID, day, title, start, duration FROM times";
		$queryInfo=mysqli_query($dbconnect, $getInfo) or die("<script type=\"text/javascript\"> alert(\"Could not get item info from database\") </script>");
		
		while($showInfo=mysqli_fetch_assoc($queryInfo))
		{
			$width=($showInfo["duration"])*100;
			$margin=(($showInfo["start"])*100)+44;
			
			if($showInfo["day"]=="monday")
			{	
				DisplaySlot($showInfo["ID"], $showInfo["title"]);
			}
		}
		
		?>
    </div>
    <div style="clear:both"></div><br />
    
    <h1>Tuesday</h1>
    <div id="tuesday">
    	<?php
		$getInfo="SELECT ID, day, title, start, duration FROM times";
		$queryInfo=mysqli_query($dbconnect, $getInfo) or die("<script type=\"text/javascript\"> alert(\"Could not get item info from database\") </script>");
		
		while($showInfo=mysqli_fetch_assoc($queryInfo))
		{
			$width=($showInfo["duration"])*100;
			$margin=(($showInfo["start"])*100)+44;
			
			if($showInfo["day"]=="tuesday")
			{	
				DisplaySlot($showInfo["ID"], $showInfo["title"]);
			}
		}
		
		?>
    </div>
    <div style="clear:both"></div><br />
    
    <h1>Wednesday</h1>
    <div id="wednesday">
    	<?php
		$getInfo="SELECT ID, day, title, start, duration FROM times";
		$queryInfo=mysqli_query($dbconnect, $getInfo) or die("<script type=\"text/javascript\"> alert(\"Could not get item info from database\") </script>");
		
		while($showInfo=mysqli_fetch_assoc($queryInfo))
		{
			$width=($showInfo["duration"])*100;
			$margin=(($showInfo["start"])*100)+44;
			
			if($showInfo["day"]=="wednesday")
			{	
				DisplaySlot($showInfo["ID"], $showInfo["title"]);
			}
		}
		
		?>
    </div>
    <div style="clear:both"></div><br />
    
    <h1>Thursday</h1>
    <div id="thursday">
    	<?php
		$getInfo="SELECT ID, day, title, start, duration FROM times";
		$queryInfo=mysqli_query($dbconnect, $getInfo) or die("<script type=\"text/javascript\"> alert(\"Could not get item info from database\") </script>");
		
		while($showInfo=mysqli_fetch_assoc($queryInfo))
		{
			$width=($showInfo["duration"])*100;
			$margin=(($showInfo["start"])*100)+44;
			
			if($showInfo["day"]=="thursday")
			{	
				DisplaySlot($showInfo["ID"], $showInfo["title"]);
			}
		}
		
		?>
    </div>
    <div style="clear:both"></div><br />
    
    <h1>Friday</h1>
    <div id="friday">
    	<?php
		$getInfo="SELECT ID, day, title, start, duration FROM times";
		$queryInfo=mysqli_query($dbconnect, $getInfo) or die("<script type=\"text/javascript\"> alert(\"Could not get item info from database\") </script>");
		
		while($showInfo=mysqli_fetch_assoc($queryInfo))
		{
			$width=($showInfo["duration"])*100;
			$margin=(($showInfo["start"])*100)+44;
			
			if($showInfo["day"]=="friday")
			{	
				DisplaySlot($showInfo["ID"], $showInfo["title"]);
			}
		}
		
		?>
    </div>
    <div style="clear:both"></div><br />
    
    <h1>Saturday</h1>
    <div id="saturday">
    	<?php
		$getInfo="SELECT ID, day, title, start, duration FROM times";
		$queryInfo=mysqli_query($dbconnect, $getInfo) or die("<script type=\"text/javascript\"> alert(\"Could not get item info from database\") </script>");
		
		while($showInfo=mysqli_fetch_assoc($queryInfo))
		{
			$width=($showInfo["duration"])*100;
			$margin=(($showInfo["start"])*100)+44;
			
			if($showInfo["day"]=="saturday")
			{	
				DisplaySlot($showInfo["ID"], $showInfo["title"]);
			}
		}
		
		?>
    </div>
	<div style="clear:both"></div><br />
    
    <h1>Sunday</h1>
    <div id="sunday">
    	<?php
		$getInfo="SELECT ID, day, title, start, duration FROM times";
		$queryInfo=mysqli_query($dbconnect, $getInfo) or die("<script type=\"text/javascript\"> alert(\"Could not get item info from database\") </script>");
		
		while($showInfo=mysqli_fetch_assoc($queryInfo))
		{
			$width=($showInfo["duration"])*100;
			$margin=(($showInfo["start"])*100)+44;
			
			if($showInfo["day"]=="sunday")
			{	
				DisplaySlot($showInfo["ID"], $showInfo["title"]);
			}
		}
		
		?>
    </div>
	<div style="clear:both"></div><br />
    
    <a href="index.php">Refresh</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="index.php?clear">Clear All</a> &nbsp;&nbsp;&nbsp;&nbsp; <?php TimeLeft() ?>
     &nbsp;&nbsp;&nbsp;&nbsp; <button type="button" onclick="window.location='index.php?go'">Delete All</button>
    <hr />
    

    <form action="index.php?add=1" method="post" style="float:left;">
   	 	<fieldset>
        <legend>Add New Item</legend>
        	<table>
        	<tr><td style="width:120px;"><label for="day">Day:</label></td> 
            	<td>
            	<select name="day">
                	<option value="monday">Monday</option>
                    <option value="tuesday">Tuesday</option>
                    <option value="wednesday">Wednesday</option>
                    <option value="thursday">Thursday</option>
                    <option value="friday">Friday</option>
                    <option value="saturday">Saturday</option>
                    <option value="sunday">Sunday</option>
                </select>
            	</td>
            </tr>
            <tr><td><label for="title">Title:</label></td> <td><input type="text" name="title" /></td></tr>
            <tr><td><label for="start">Start Time:</label></td> <td><select name="start"> <?php for($n=1; $n<=11; $n++) echo "<option value=\"$n\"> $n </option>\n" ?> </select>pm</td></tr>
            <tr><td><label for="duration">Duration:</label></td> <td><select name="duration"> <?php for($n=1; $n<=3; $n++) echo "<option value=\"$n\"> $n </option>\n" ?> </select>hour(s)</td></tr>
            <tr><td></td> <td><input type="submit" value="Send Data" /></td></tr>
            </table>
    	</fieldset>
    </form>

	<?php if(isset($_GET["edit"])) { ?>
    <?php 
		$ID=$_GET["edit"];
		$findItem="SELECT day, title, start, duration FROM times WHERE ID='$ID'";
		$queryfindItem=mysqli_query($dbconnect, $findItem);
		$resultfindItem=mysqli_fetch_assoc($queryfindItem);
	?>
    <form action="index.php?confirmEdit=<?php echo $ID; ?>" method="post" style="float:left; margin-left:20px;">
   	 	<fieldset>
        <legend>Edit Item #<?php echo $ID; ?></legend>
        	<table>
        	<tr><td style="width:120px;"><label for="day">Day:</label></td> 
            	<td>
            	<select name="day">
                	<option value="monday" <?php if($resultfindItem["day"]=="monday") echo "selected=selected"; ?>>Monday</option>
                    <option value="tuesday" <?php if($resultfindItem["day"]=="tuesday") echo "selected=selected"; ?>>Tuesday</option>
                    <option value="wednesday" <?php if($resultfindItem["day"]=="wednesday") echo "selected=selected"; ?>>Wednesday</option>
                    <option value="thursday" <?php if($resultfindItem["day"]=="thursday") echo "selected=selected"; ?>>Thursday</option>
                    <option value="friday" <?php if($resultfindItem["day"]=="friday") echo "selected=selected"; ?>>Friday</option>
                    <option value="saturday" <?php if($resultfindItem["day"]=="saturday") echo "selected=selected"; ?>>Saturday</option>
                    <option value="sunday" <?php if($resultfindItem["day"]=="sunday") echo "selected=selected"; ?>>Sunday</option>
                </select>
            	</td>
            </tr>
            <tr><td><label for="title">Title:</label></td> <td><input type="text" name="title" value='<?php echo $resultfindItem["title"] ?>' /></td></tr>
            <tr><td><label for="start">Start Time:</label></td> 
            <td>
            	<select name="start"> 
					<?php 
						for($n=1; $n<=11; $n++)
						{
							echo "<option value=\"$n\"";
							if($n==$resultfindItem["start"])
							{
								echo "selected=selected";
							}
							echo "> $n </option>\n";
						}
					?> 
           		</select>pm
            </td></tr>
            <tr><td><label for="duration">Duration:</label></td> 
            <td>
           		<select name="duration"> 
					<?php 
					for($n=1; $n<=3; $n++)
					{
						echo "<option value=\"$n\"";
							if($n==$resultfindItem["duration"])
							{
								echo "selected=selected";
							}
							echo "> $n </option>\n";
					}
					?> 
                </select>hour(s)
            </td></tr>
            <tr><td></td> <td><input type="submit" value="Send Data" /></td></tr>
            </table>
    	</fieldset>
    </form>
    
    <form action="index.php?delete=<?php echo $ID; ?>" method="post"  style="float:left; margin-left:20px;">
    <fieldset>
    	<legend>Delete Item #<?php echo $ID; ?></legend>
        <input type="hidden" name="day" value="<?php echo $resultfindItem['day']; ?>" />
        <input type="hidden" name="title" value="<?php echo $resultfindItem['title']; ?>" />
        <input type="hidden" name="start" value="<?php echo $resultfindItem['start']; ?>" />
        <input type="hidden" name="duration" value="<?php echo $resultfindItem['duration']; ?>" />
        <input type="submit" value="Delete This!!" />
    </fieldset>
    </form><br /><br /><br /><br /><br />
    
    <form action="index.php?mark=<?php echo $ID; ?>" method="post" style="float:left; margin-left:20px;">
    <fieldset>
    	<legend>Mark Item #<?php echo $ID; ?></legend>
        <label for="mark">Mark as finished:</label> <input type="checkbox" name="mark" /><br />
        <input type="submit" value="Done" />
    </fieldset>
    </form>
    <?php } ?>
    
</body>
</html>