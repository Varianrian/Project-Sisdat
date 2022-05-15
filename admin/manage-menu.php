<?php include('partials/header.php'); ?>
        <!-- main START -->
        <section class="manage-admin" style="min-height: 50%;">
            <div class="container">
                <div class="row mb-1">
                     <div class="col mt-5">
                          <h3 class="text-dark">Manage Menu</h3>
                </div>
                <div class="addAdmin">
                    <a href="#" class="btn btn-primary mb-2">Add Menu</a>
                </div>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>admin</td>
                            <td>admin</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm btn-success">Edit Admin</a>
                                <a href="#" class="btn btn-primary btn-sm btn-danger">Delete Admin</a>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>admin</td>
                            <td>admin</td>
                            <td>
                                <a href="#" class="btn btn-primary btn-sm btn-success">Edit Admin</a>
                                <a href="#" class="btn btn-primary btn-sm btn-danger">Delete Admin</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- main END -->
<?php include('partials/footer.php'); ?>
