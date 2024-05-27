
<?php
require_once('./Database.php');

$host       = 'localhost'; 
$database   = 'studentsdb';
$port       = 3306;
$user       = 'admin';
$password = 'admin';

$db = new Database($database,$host,$port,$user,$password);


?>
<?php if(isset($_POST['studentid'])) { 
        $student = $db->getStudent($_POST['studentid']);
        $student = $student[0];
        $name = $student['name'];
        $p1 = $student['p1'];
        $p2 = $student['p2'];
        $p3 = $student['p3'];
        $cf = $student['cf'];            
?>
<div class="editUserBody">
<form action="/edit" method="post">
    <h1> EDIT STUDENT </h1>     
    <input type="hidden" name="studentid" value="<?= $_POST['studentid']; ?>"/>
    <label> Student: </label>
    <input type="text" name="name" value="<?= $name; ?>"/>
    <label> P1: </label>
    <input type="text" name="p1" value="<?= $p1; ?>"/>
    <label> P2: </label>
    <input type="text" name="p2" value="<?= $p2; ?>"/>
    <label> P3: </label>
    <input type="text" name="p3"value="<?= $p3; ?>"/>
    <label> CF: </label>
    <input type="text" name="cf" value="<?= $cf; ?>"/>
    <input type="submit" name="submit" value="Submit" />
</form>
</div>
<?php } ?>