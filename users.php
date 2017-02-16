<?php
include_once("db.php");
 
$result = pg_query("SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>
	<title>Task Sourcing Example</title>
</head>
<body>
<h1>Demo User Table</h1>
<form action="add.php" method="post" name="form1">
    <table width="25%" border="0">
	    <tr> 
            <td>ID</td>
            <td><input type="text" name="id"></td>
        </tr>
        <tr> 
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr> 
            <td>Age</td>
            <td><input type="text" name="age"></td>
        </tr>
        <tr> 
            <td>Email</td>
            <td><input type="text" name="email"></td>
        </tr>
        <tr> 
            <td></td>
            <td><input type="submit" name="Submit" value="Add"></td>
        </tr>
    </table>
</form>

<table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
        <td>Name</td>
        <td>Age</td>
        <td>Email</td>
        <td>Update</td>
    </tr>
    <?php 
    while($row = pg_fetch_row($result)) {        
        echo "<tr>";
        echo "<td>".$row[1]."</td>";
        echo "<td>".$row[3]."</td>";
        echo "<td>".$row[2]."</td>";    
        echo "<td><a href=\"edit.php?id=$row[0]\">Edit</a> | <a href=\"delete.php?id=$row[0]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
    }
    ?>
</table>

</body>
</html>
