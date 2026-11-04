<!-- Заголовок страницы -->
<div class="page-header">
  <h1 class="page-header-title">Предметы учителей</h1>
</div>

<div class="card">
    <div class="card-body">      
        <form action="index.php">
        <div class="row">
            <input type="hidden" name="page" value="teacher_subjects">
            <div class ="col-10">
            <select class="form-select" name="teacher_id" id="">  
                <?php 
                $query = "Select * from users where role='teacher';";
                $res = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($res))
                {
                ?>
                <option value="<?=$row['id'];?>"><?=$row['full_name'];?></option>
                <?php 
                }
                ?>
            </select>
            </div>
           <div class="col-2">
                <input type="submit" value="Открыть" class="btn btn-primary"> 
           </div>
           </div>
        </form>

        <?php 
                $query = "Select * from subjects";
                $res = mysqli_query($conn, $query);
                while($row = mysqli_fetch_assoc($res))
                {
                ?>
                    <input type="checkbox" name="" value ="<?=$row['id'];?>">
                    <label for=""><?=$row['title'];?></label> <br>
                    
                <?php 
                }
                ?>


        
    </div>

</div>

