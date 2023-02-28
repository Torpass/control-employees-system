<?php include('../../templates/header.php');?>
<?php include('../../db.php');?>

<?php

if(isset($_GET['txtID'])){
    $idEdit = $_GET['txtID'];
    $query = $connection->prepare("SELECT * FROM tbl_users WHERE id = $idEdit");
    $query->execute();
    $register = $query->fetch(PDO::FETCH_LAZY);


    if(isset($_POST['btnUpdate'])){
        if(!empty($_POST['txtPassword']) && !empty($_POST['txtName']) && !empty($_POST['txtEmail'])){
            $userName = $_POST['txtName'];
            $userEmail = $_POST['txtEmail'];
            $userPassword = $_POST['txtPassword'];

            $query = $connection->prepare("UPDATE tbl_users SET name = '$userName', email = '$userEmail', password = '$userPassword' WHERE id = $idEdit");
            $query->execute();
            if($query){
                header('Location:index.php');
            }
        }
    }
}

?>
<br>

<div class="card">
    <div class="card-header">
        User data
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="" class="form-label">Name:</label>
              <input type="text" 
                class="form-control" name="txtName" id="" aria-describedby="helpId" placeholder="Write name" value="<?php echo $register['name']?>">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input type="text"
                class="form-control" name="txtPassword" id="" aria-describedby="helpId" placeholder="Write Password"  value="<?php echo $register['password']?>">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email"
                class="form-control" name="txtEmail" id="" aria-describedby="helpId" placeholder="abc@gmail.com"  value="<?php echo $register['email']?>">
            </div>

            <button name="btnUpdate" type="submit" class="btn btn-success">Update</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>    
    </div>
    <div class="card-footer text-muted">
        footer  
    </div>
</div>


<?php include('../../templates/footer.php');?>