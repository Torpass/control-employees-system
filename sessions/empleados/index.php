<?php include('../../templates/header.php');?>
<?php include '../../dbConnections/db.php'?> 
<?php include '../../dbConnections/dbEmployees.php'?> 


<?php 
$connect = new EmployeeCrud();
$tbl_employees = $connect->getEmployees();
if(isset($_GET['txtID'])){
    if($connect->deleteEmployee($_GET['txtID'])){
        header('Location:index.php');
    }else{
        echo 'Something went wrong';
    }
}
?>

<br>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="create.php" role="button">Add employee</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
        <table class="table table-striped table-bordered table-hover" id="tablaID">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Photo</th>
            <th scope="col">CV</th>
            <th scope="col">Job</th>
            <th scope="col">Started at</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tbl_employees as $employeesRegister){?>
        <tr class="">
            <td scope="row"><?php echo $employeesRegister['id'];?></td>
            <td><?php echo $employeesRegister['firstName'];?></td>
            <td><?php echo $employeesRegister['lastName'];?></td>
            <td>
                <?php
                echo '<img width="100px" src="data:image/jpeg;base64,'.base64_encode($employeesRegister['photo']).'"/>';
                ?>
                
            </td>
            <td>
            <?php 
                $base64_pdf = base64_encode($employeesRegister['cv']);
                $pdf_url = 'data:application/pdf;base64,'.$base64_pdf;
                echo '<a href="#" onclick="window.open(\''.$pdf_url.'\', \'_blank\');">Ver CV</a>';
            ?>
            </td>
            <td><?php echo $employeesRegister['job'];?></td>
            <td><?php echo $employeesRegister['startedAt'];?></td>
            <td>
                <a name="" id="" class="btn btn-primary" href="carta_recomendacion.php?txtID=<?php echo $employeesRegister['id']?>" role="button">Carta</a>

                <a name="" id="" class="btn btn-info" href="edit.php?txtID=<?php echo $employeesRegister['id']?>" role="button">Edit</a>
                
                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $employeesRegister['id']?>" role="button">Delete</a>
            </td>
        </tr>
        <?php }?>
    </tbody>
</table>
        </div>
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>
<?php include('../../templates/footer.php');?>