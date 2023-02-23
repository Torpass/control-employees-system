<?php include('../../templates/header.php');?>
 
<br>

<div class="card">
    <div class="card-header">
        Employee data
    </div>
    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
              <label for="" class="form-label">First name:</label>
              <input type="text" 
                class="form-control" name="txtFirstname " id="" aria-describedby="helpId" placeholder="First name">
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
                    <option selected>Select one</option>
                    <option value="">New Delhi</option>
                    <option value="">Istanbul</option>
                    <option value="">Jakarta</option>
                </select>
            </div>


            <div class="mb-3">
              <label for="" class="form-label">Date of entry</label>
              <input type="date" class="form-control" name="TxtDateEntry" id="" aria-describedby="emailHelpId" placeholder="date of entry">
            </div>

            <button type="submit" class="btn btn-success">Register</button>
            <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancel</a>
        </form>
    </div>
    <div class="card-footer text-muted">

    </div>
</div>

<?php include('../../templates/footer.php');?>