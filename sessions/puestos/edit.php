<?php include('../../templates/header.php');?>
<?php include('../../db.php');?>

<?php
if(isset($_GET['txtID'])){
    $idEdit = $_GET['txtID'];
    $query = $connection->prepare("SELECT * FROM tbl_jobs WHERE id = $idEdit");
    $query->execute();

    $register = $query->fetch(PDO::FETCH_LAZY);
    $jobName = $register['jobName'];

    if(isset($_POST['btnUpdate'])){
        if($_POST['txtJobName'] != null){
            $jobNameEdit = $_POST['txtJobName'];
            $query  = $connection->prepare("UPDATE tbl_jobs SET jobName = '$jobNameEdit' WHERE id= '$idEdit' ");
            $query->execute();
            if($query){
                echo 'nice';
                header('Location:index.php');
            }else{
                echo 'something wrong';
            }
        }else{
            echo 'You need to add a valid Job name';
        }
    }
}


?>

<br/>

<div class="card">
    <div class="card-header">
        Job data
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
              <label for="txtID" class="form-label">ID</label>
              <input type="text" value = "<?php echo $idEdit?>"
                class="form-control" readonly  name="" id="" aria-describedby="helpId" placeholder="ID">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Job name:</label>
              <input type="text"
                value = "<?php echo $jobName?>"
                class="form-control" name="txtJobName" id="" aria-describedby="helpId" placeholder="Job name">
            </div>

           <button name='btnUpdate' type='submit' class='btn btn-success'>Update</button>

            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>

        </form>
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>
<?php include('../../templates/footer.php');?>