<?php
global $db;
$students = $db->getAllStudents('carlostr');
?>

<div class="studentsTable">
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
        <form action="/edit" method="post">
            <input type="hidden" name="studentid" value=<?= $student["studentid"];?> id="studentid"/>
            <button type="submit" > Edit </button>
        </form>
        </th>
   

    </tr>
    <?php endforeach; ?>
    </table> 
    
</div>