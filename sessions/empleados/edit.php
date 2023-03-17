<?php include('../../templates/header.php');?>
<?php include '../../db.php'?> 




<?php
$query = $connection->prepare("SELECT * FROM tbl_jobs");
$query->execute();
$tbl_jobs = $query->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['txtID'])){
        $idEdit = $_GET['txtID'];
        $query = $connection->prepare("SELECT * ,(SELECT jobName from tbl_jobs WHERE tbl_jobs.id=tbl_employees.idJob limit 1) as job from tbl_employees WHERE id = $idEdit");
        $result = $query->execute();
        $register = $query->fetch(PDO::FETCH_LAZY);
        echo $register['job'];
    }

?>

<br>

<div class="card">
    <div class="card-header">
        Employee data
    </div>
    <div class="card-body">
        <form action="create.php" method="post" enctype="multipart/form-data">

            <div class="mb-3">
              <label for="" class="form-label">First name:</label>
              <input type="text" value="<?php echo $register['firstName']?>"
                class="form-control" name="txtFirstname" id="" aria-describedby="helpId" placeholder="First name">
            </div>


            <div class="mb-3">
              <label for="" class="form-label">Last name:</label>
              <input type="text" value="<?php echo $register['lastName']?>"
                class="form-control" name="txtLastname" id="" aria-describedby="helpId" placeholder="Last name">
            </div>


            <div class="mb-3">
              <label for="" class="form-label">Photo:</label>
              <input type="file"
                class="form-control" name="photo" id="inputFile" aria-describedby="helpId" placeholder="Photo">
            </div>


            <div class="mb-3">
              <label for="" class="form-label">CV(PDF):</label>
              <input type="file" class="form-control" name="cv" id="" placeholder="CV" aria-describedby="fileHelpId">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Role</label>
                <select value="<?php echo $register['idJob']?>" class="form-select form-select-sm" name="txtRole" id="">
                <option disabled selected><?php echo $register['job']; ?></option>
                    <?php foreach ($tbl_jobs as $register){?>
                      <option placeholder="Enter job" value="<?php echo $register['id']?>"><?php echo $register['jobName']?></option>
                    <?php }?>
                </select>
            </div>


            <div class="mb-3">
              <label for="" class="form-label">Date of entry</label>
              <input type="date" class="form-control" name="TxtDateEntry" id="" aria-describedby="emailHelpId" placeholder="date of entry">
            </div>

            <button type="submit" name="btnRegister" class="btn btn-success">Register</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include('../../templates/footer.php');?>