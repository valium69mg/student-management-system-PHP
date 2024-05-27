
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

<style>
    body {
        background-color:#7E8EF1;
    }

    .editUserBody {
        position:absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%,-50%);

    }

    .parameters {
        display: flex;
        flex-direction: column;
        justify-content: left;
        align-items: center;
        gap: 6px 12px;
        background-color: #EEEEEE;
        padding: 6px 12px;
        border-radius: 12px;
    }

</style>
<div class="editUserBody">
<form action="/edit" method="post">
    <div class="parameters"> 
    <h1> EDIT STUDENT </h1>    
    <input type="hidden" name="studentid" value="<?= $_POST['studentid']; ?>"/>
    <span>
    <label> Student: </label>
    <input type="text" name="name" value="<?= $name; ?>"/>
    </span>
    <span>
    <label> P1: </label>
    <input type="text" name="p1" value="<?= $p1; ?>"/>
    </span>
    <span>
    <label> P2: </label>
    <input type="text" name="p2" value="<?= $p2; ?>"/>
    </span>
    <span>
    <label> P3: </label>
    <input type="text" name="p3"value="<?= $p3; ?>"/>
    </span>
    <span>
    <label> CF: </label>
    <input type="text" name="cf" value="<?= $cf; ?>"/>
    </span>
    <input type="submit" name="submit" value="Submit" />
    </div>
</form>
</div>
<?php } ?>