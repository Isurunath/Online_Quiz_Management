<h1> Paper Layout</h1>
<?php
echo "Paper Layout"; ?>
<?php echo"<table>" ;
foreach ($qestiontype_id as $key => $row) { ?>

    <tr id='r<?php echo $row["id"]; ?>'>
        <td><?php echo $row["answer"]; ?></td>
        <td><input type="text" name="aaa" value=<?php echo $row["answer"]; ?>></td>
        <td><?php echo $row["question"]; ?></td>
        <td><?php echo $row["id"]; ?></td>
    </tr>


<?php } ?>
</table>
