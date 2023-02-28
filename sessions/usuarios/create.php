<?php include('../../templates/header.php');?>
<?php include '../../db.php'?> 

<?php
if(isset($_POST['btnRegister'])){
    if(!empty($_POST['txtPassword']) && !empty($_POST['txtName']) && !empty($_POST['txtEmail'])){
        $userName = $_POST['txtName'];
        $userEmail = $_POST['txtEmail'];
        $userPassword = $_POST['txtPassword'];
        $query = $connection->prepare("INSERT INTO tbl_users (id, name, password, email) VALUES (NULL, '$userName','$userPassword','$userEmail')");
        $query->execute();
        if($query){
            header('Location:index.php');
        }else{
            echo 'there was a problem';
        }
    }else{
        echo 'pendejo';
    }
}else{
    echo 'something wrong';
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
                class="form-control" name="txtName" id="" aria-describedby="helpId" placeholder="Write name">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input type="text"
                class="form-control" name="txtPassword" id="" aria-describedby="helpId" placeholder="Write Password ">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email"
                class="form-control" name="txtEmail" id="" aria-describedby="helpId" placeholder="abc@gmail.com">
            </div>

            <button name="btnRegister" type="submit" class="btn btn-success">Register</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>    
    </div>
    <div class="card-footer text-muted">
        footer  
    </div>
</div>

<?php include('../../templates/footer.php');?>