<?php include('../../templates/header.php');?>
<?php include '../../db.php'?> 


<?php 
$query = $connection->prepare("SELECT * FROM tbl_employees");
$query->execute();
$tbl_employees= $query->fetchAll(PDO::FETCH_ASSOC);
?>


<br>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="create.php" role="button">Add employee</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-striped table-bordered table-hover">
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
                <?php foreach ($tbl_employees as $employeesRegister){?>
                <tbody>
                    <tr class="">
                        <td scope="row"><?php echo $employeesRegister['id'];?></td>
                        <td><?php echo $employeesRegister['firstName'];?></td>
                        <td><?php echo $employeesRegister['lastName'];?></td>
                        <td><?php echo $employeesRegister['photo'];?></td>
                        <td><?php echo $employeesRegister['cv'];?></td>
                        <td><?php echo $employeesRegister['idJob'];?></td>
                        <td><?php echo $employeesRegister['startedAt'];?></td>
                        <td>
                                <a name="" id="" class="btn btn-primary" href="" role="button">Carta</a>

                                <a name="" id="" class="btn btn-info" href="edit.php?txtID=<?php echo $employeesRegister['id']?>" role="button">Edit</a>
                                |
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $employeesRegister['id']?>" role="button">Delete</a>
                        </td>
                    </tr>
                </tbody>
                <?php }?>
            </table>
        </div>
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>
<?php include('../../templates/footer.php');?>