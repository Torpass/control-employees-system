<?php include('../../templates/header.php');?>
 
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
                class="form-control" name="txtName " id="" aria-describedby="helpId" placeholder="Write name">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input type="text"
                class="form-control" name="txtPassword" id="" aria-describedby="helpId" placeholder="Write Password ">
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email"
                class="form-control" name="photo" id="" aria-describedby="helpId" placeholder="abc@gmail.com">
            </div>

            <button type="submit" class="btn btn-success">Register</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>    
    </div>
    <div class="card-footer text-muted">
        footer  
    </div>
</div>

<?php include('../../templates/footer.php');?>