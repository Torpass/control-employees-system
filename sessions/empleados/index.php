<?php include('../../templates/header.php');?>
<br>
<div class="card">
    <div class="card-header">
        Empleados
        <a name="" id="" class="btn btn-primary" href="create.php" role="button">Add employee</a>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Direction cv</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Started at</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td scope="row">Pastor Jiménez</td>
                        <td>imagen.jpge</td>
                        <td>cv.pdf</td>
                        <td>Programador jr</td>
                        <td>05/01/2024</td>
                        <td>Cartar|Edit|Delete</td>
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
