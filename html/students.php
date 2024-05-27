<?php
require_once('./Database.php');

if (isset($_POST["studentid"])) {
    header("Location edit-student.php");
} 
$host       = 'localhost'; 
$database   = 'studentsdb';
$port       = 3306;
$user       = 'admin';
$password = 'admin';

$db = new Database($database,$host,$port,$user,$password);

$students = $db->getAllStudents('carlostr');

$createStudent = false;
?>
<style>
    body {
        background-color:#7E8EF1;
    }

    .studentsTable{
        position: absolute;
        left: 50%;
        top: 5%;
        transform: translateX(-50%);
        display:flex;
        flex-direction:column;
        justify-content:center;
        align-items:center;
        background-color:#EEEEEE;
        border-radius: 12px;
    }

    .studentsTable table {
        border-spacing: 16px;
    } 
</style>

<div class="studentsTable">
<h1> Students Table </h1>    
<table>
    <tr>
        <th> ID </th>
        <th> Student </th>
        <th>P1</th>
        <th>P2</th>
        <th>P3</th>
        <th>CF</th>
    </tr>
    <?php foreach($students as  $key=>$student): ?>
    <tr>
        <th> <?= $student["studentid"]; ?>  </th>
        <th> <?= $student["name"]; ?> </th>
        <th><?= $student["p1"]; ?> </th>
        <th><?= $student["p2"]; ?> </th>
        <th><?= $student["p3"]; ?> </th>
        <th><?= $student["cf"]; ?> </th>
        <th>
        <form action="/edit-student.php" method="post">
            <input type="hidden" name="studentid" value=<?= $student["studentid"];?> id="studentid"/>
            <button type="submit" > Edit </button>
        </form>
        </th>
        <th>
        <form action="/delete" method="post">
            <input type="hidden" name="studentid" value=<?= $student["studentid"];?> id="studentid"/>
            <button type="submit" > Delete </button>
        </form>
        </th>
   

    </tr>
    <?php endforeach; ?>
    </table> 
<form action="/create" method="post">
    <label> Student: </label>
    <input type="text" name="name" autocomplete="off" />
    <button type="submit"> Create Student </button>
</form>
</div>