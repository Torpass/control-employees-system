<?php include('../../templates/header.php');?>

<br>

<div class="card">
    <div class="card-header">
     <a name="" id="" class="btn btn-primary" href="create.php" role="button">Add jobs</a>
    </div>
    <div class="card-body">
        <center></center>
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
                <tr class="">
                    <td scope="row">1</td>
                    <td>Jr Developer</td>
                    <td>
                            <a name="" id="" class="btn btn-info" href="#" role="button">Edit</a>
                            |
                            <a name="" id="" class="btn btn-danger" href="#" role="button">Delete</a>
                        </td>
                </tr>
            </tbody>
        </table>
    </div>
    </div>
    <div class="card-footer text-muted">
        Footer
    </div>
</div>



<?php include('../../templates/footer.php');?>