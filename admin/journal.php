<?php

$st_query="SELECT * FROM users WHERE role='student';";
$sb_query="SELECT * FROM subjects";
$t_query="SELECT * FROM users WHERE role='teacher';";

$st_result=mysqli_query($conn,$st_query);
$sb_result=mysqli_query($conn,$sb_query);
$t_result=mysqli_query($conn,$t_query);
?>

<select name="users" id="">
    <?php
    
    while($row=mysqli_fetch_assoc($st_result)) {?>
    <option value="<?php echo $row['id']?>"><?php echo $row['full_name']?></option>

    <?php }?>
</select>

<select name="subjects" id="">
    <?php
    
    while($row=mysqli_fetch_assoc($sb_result)) {?>
    <option value="<?php echo $row['id']?>"><?php echo $row['title']?></option>

    <?php }?>
</select>

<select name="users" id="">
    <?php
    
    while($row=mysqli_fetch_assoc($t_result)) {?>
    <option value="<?php echo $row['id']?>"><?php echo $row['full_name']?></option>

    <?php }?>
</select>

<select name="" id="">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
</select>