<?php include('../../templates/header.php');?>
<?php include '../../dbConnections/db.php'?> 
<?php include '../../dbConnections/dbUsers.php'?> 
<?php
$connect = new UsersCrud();
$tbl_users = $connect->getUsers();

if(isset($_GET['txtID'])){
    $deleteID = $_GET['txtID'];
    $connect->deleteUser($deleteID);
    if($connect){
        header('Location:index.php');
    }else{
        echo 'there was a problem';
    }
}
?>


<br>

<div class="card">
    <div class="card-header">
     <a name="" id="" class="btn btn-primary" href="create.php" role="button">Add User</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id='tablaID'>
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Password</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($tbl_users as $userRegister){?>
                <tr class="">
                    <td scope="row"><?php echo $userRegister['id'];?></td>
                    <td><?php echo $userRegister['name'];?></td>
                    <td><?php echo $userRegister['password'];?></td>
                    <td><?php echo $userRegister['email'];?></td>
                    <td>
                            <a name="" id="" class="btn btn-info" href="edit.php?txtID=<?php echo $userRegister['id']?>" role="button">Edit</a>
                            |
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $userRegister['id']?>" role="button">Delete</a>
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