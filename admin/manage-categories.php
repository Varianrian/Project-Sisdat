<?php include('partials/menu.php'); ?>
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Category</h1>
                <br /><br />
                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                    }

                    if(isset($_SESSION['remove']))
                    {
                        echo $_SESSION['remove'];
                        unset($_SESSION['remove']);
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }

                    if(isset($_SESSION['no-category-found']))
                    {
                        echo $_SESSION['no-category-found'];
                        unset($_SESSION['no-category-found']);
                    }

                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['upload']))
                    {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                    }

                    if(isset($_SESSION['failed-remove']))
                    {
                        echo $_SESSION['failed-remove'];
                        unset($_SESSION['failed-remove']);
                    }

                ?>
                <br><br>

                    <!-- Button to add admin -->
                    <a href="<?php echo SITEURL; ?>admin/add-category.php" class="btn btn-primary mb-2">Add Category</a>

                    <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>NamaKategori</th>
                        <th>Gambar</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr> 
                        <?php
                            //Query to get all cateries from database
                            $sql = "SELECT * FROM tbl_category";

                            //executed query
                            $res = mysqli_query($conn, $sql);

                            //count rows returned
                            $count = mysqli_num_rows($res);

                            //create whether we have data in database or not
                            $No = 1;

                            //check wheter we have data in database or not
                            if($count >0){
                                //we have data in database
                                while($row = mysqli_fetch_assoc($res))
                                {
                                    $id = $row['id'];
                                    $NamaKategori = $row['NamaKategori'];
                                    $Gambar_name = $row['Gambar_name'];
                                    $Status = $row['Status'];

                                    ?>
                                        <tr>
                                            <td><?php echo $No++/ ?>.</td>
                                            <td><?php echo $NamaKategori; ?></td>
                                            
                                            <td><?php echo $Gambar_name; ?></td>
                                            
                                            <td>
                                                <?php echo $Status; 
                                                    //check wheter image name is available or not
                                                    if($Gambar_name != "")
                                                    {
                                                        //display image name
                                                        ?>
                                                        <img src="<?php echo SITEURL; ?>image/category/<?php echo $Gambar_name; ?>"> width = "100px">
                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        //display message
                                                        echo "<div class='error'>Image not added.</div>";
                                                    }
                                                ?>

                                                
                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <a href="<?php echo SITEURL; ?> admin/delete-category.php?id=<?php echo $id; ?>" class="btn btn-secondary">Update Category</a>
                                                <a href="<?php echo SITEURL; ?> admin/delete-category.php?id=<?php echo $id; ?> &Gambar_name=<?php echo $Gambar_name ?>" class="btn btn-danger">Delete category</a>
                                            </td>
                                        </tr>
                                    <?php
                                }
                            }
                            else{
                                //dont have data in database
                                //display the message inside TABLE

                                ?>
                                    <tr>
                                        <td colspan="6"><div class"error">No Category Added</div></td>
                                    </tr>
                                <?php
                            }
                        ?>
                    
                    
                </table>
            </div>
        </div>
        <!-- main END -->
<?php include('partials/footer.php'); ?>
