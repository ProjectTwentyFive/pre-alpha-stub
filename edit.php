<?php
include_once("db.php");
 
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $name=$_POST['name'];
    $age=$_POST['age'];
    $email=$_POST['email'];    
    
    if(empty($name) || empty($age) || empty($email)) {            
        if(empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        
        if(empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        
        if(empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }        
    } else {    
        $result = pg_query("UPDATE users SET name='$name',age='$age',email='$email' WHERE id='$id'");        
        header("Location: users.php");
    }
}
?>
<?php
$id = $_GET['id'];
 
$result = pg_query("SELECT * FROM users WHERE id='$id'") or die("Failed");
 
while($res = pg_fetch_row($result)) {
    $name = $res[1];
    $age = $res[3];
    $email = $res[2];
}


?>
<html>
<head>    
    <title>Edit Data</title>
</head>
 
<body>
    <a href="users.php">Home</a>
    <br/><br/>
    
    <form name="form1" method="post" action="edit.php">
        <table border="0">
            <tr> 
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name;?>"></td>
            </tr>
            <tr> 
                <td>Age</td>
                <td><input type="text" name="age" value="<?php echo $age;?>"></td>
            </tr>
            <tr> 
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email;?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>