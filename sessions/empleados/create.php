<?php include('../../templates/header.php');?>
<?php include('../../db.php');?>


<?php
$query = $connection->prepare("SELECT * FROM tbl_jobs");
$query->execute();
$tbl_jobs = $query->fetchAll(PDO::FETCH_ASSOC);


if(isset($_POST['btnRegister'])){
  if(!empty($_POST['txtFirstname']) && !empty($_POST['txtLastname']) && !empty($_POST['txtRole']) && !empty($_POST['TxtDateEntry'])){
    if(!empty($_FILES['photo']['name']) && !empty($_FILES['cv']['name'])){
      //recepción de datos
      $firstName = $_POST['txtFirstname'];
      $lastName = $_POST['txtLastname'];
      $roleID = $_POST['txtRole'];
      $dateEntry =$_POST['TxtDateEntry'];
      $photoName = $_FILES['photo']['name'];
      $cvName = $_FILES['cv']['name'];

      $dateFile = new DateTime();

      //preparando los nombres que van a tener los archivos (El nombre del archivo origianl + la fecha de ingreso)

      $archivePhotoName = ($photoName!='')?$dateFile->getTimestamp().'_'.$_FILES['photo']['name']:'';
      $photoTmp=$_FILES['photo']['tmp_name']; 

      $fileCvName = ($cvName!='')?$dateFile->getTimestamp().'_'.$_FILES['cv']['name']:'';
      $cvTmp=$_FILES['cv']['tmp_name']; 

      if($result){
        //Validación de movimiento de archivos
        if(move_uploaded_file($photoTmp,"./employess_photos/".$archivePhotoName) 
           && move_uploaded_file($cvTmp,"./employees_cv/".$fileCvName)){
            //Preparando query para inserción de datos
            $query = $connection->prepare("INSERT INTO tbl_employees(id, firstName, lastName, photo, cv, idJob, startedAt) VALUES (NULL,'$firstName','$lastName','$archivePhotoName ','$fileCvName','$roleID','$dateEntry')");
            $result = $query->execute();
          header('Location:index.php');
        }else{
          echo 'Something went wrong moving the files';
        }
      }else{
        echo 'something went wrong';
      }
    }else{
      echo 'Te falta agregar las imagenes o el CV';
    }
  }else{
    echo 'Faltan datos por completar';
  }
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
              <input type="text" 
                class="form-control" name="txtFirstname" id="" aria-describedby="helpId" placeholder="First name">
            </div>


            <div class="mb-3">
              <label for="" class="form-label">Last name:</label>
              <input type="text"
                class="form-control" name="txtLastname" id="" aria-describedby="helpId" placeholder="Last name">
            </div>


            <div class="mb-3">
              <label for="" class="form-label">Photo:</label>
              <input type="file"
                class="form-control" name="photo" id="" aria-describedby="helpId" placeholder="Photo">
            </div>


            <div class="mb-3">
              <label for="" class="form-label">CV(PDF):</label>
              <input type="file" class="form-control" name="cv" id="" placeholder="CV" aria-describedby="fileHelpId">
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Role</label>
                <select class="form-select form-select-sm" name="txtRole" id="">
                    <option disabled selected>Select a job</option>
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