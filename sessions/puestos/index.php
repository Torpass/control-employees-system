<?php include('../../templates/header.php');?>
<?php include('../../db.php');?>

<?php

if(isset($_GET['txtID'])){
    if(isset($_GET['txtID'])?$_GET['txtID']:'');
    $idEliminar = $_GET['txtID']; 
    $query = $connection->prepare("DELETE FROM tbl_jobs WHERE id = $idEliminar");
    $query->execute();
    if($query){
        header('Location:index.php');
    }else{
        echo 'something went wrong';
    }
}

$query = $connection->prepare("SELECT * FROM tbl_jobs");
$query->execute();

$tbl_jobs = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<br>

<div class="card">
    <div class="card-header">
     <a name="" id="" class="btn btn-primary" href="create.php" role="button">Add jobs</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Job</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($tbl_jobs as $register ){?>

                <tr class="">
                    <td scope="row"><?php echo  $register['id'];?></td>
                    <td><?php echo  $register['jobName'];?></td>
                    <td>
                            <a name="" id="" class="btn btn-info" href="edit.php?txtID=<?php echo  $register['id'];?>" role="button">Edit</a>
                            |
                            <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo  $register['id'];?>" role="button">Delete</a>
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