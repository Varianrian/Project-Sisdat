<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>

        <br><br>

        <?php
            //check whether the id is set or not
            if(isset($_GET['id']))
            {
                //getthe id and all other details
                $id = $_GET['id'];
                //create sql query to get all other details
                $sql = "SELECT * FROM tbl_category WHERE id = $id";

                //execute the Query
                $res = mysqli_query($conn, $sql);

                //count the rows to check whether the id is valid or not
                $count = mysqli_num_rows($res);

                if($count ==1){
                    //getallthe data
                    $row = mysqli_fetch_assoc($res);
                    $NamaKategori = $row['Nama_Kategori'];
                    $current_Gambar = $row['Gambar'];
                    $Statuss = $row['Statuss'];
                }
                else
                {
                    //redirect to manage category with session message
                    $_SESSION['no-category-found'] = "<div class='error'>Category not found</div>";
                    header('Location:' . SITEURL . 'admin/manage-category.php');
                }
            }
            else
            {
                //redirect to manage category
                header('Location:' . SITEURL . 'admin/manage-category.php');
            }
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-30">
                <tr>
                    <td>Nama Kategori : </td>
                    <td>
                        <input type="text" name="NamaKategori" value="<?php echo $NamaKategori; ?>">
                    </td>
                </tr>

                <tr>
                    <td>Gambar Sebelumnya : </td>
                    <td>
                        <?php
                            if($current_Gambar != "")
                            {
                                //Display the image
                                ?>
                                    <img src="<?php echo SITEURL; ?> images/category/<?php echo $current_Gambar; ?>"> width="150px"
                                <?php
                            }
                            else
                            {
                                //Display message
                                echo "<div class='error'>Image not Added</div>";
                            }
                        ?>
                    </td>
                </tr>

                <tr>
                    <td>Gambar Baru : </td>
                    <td>
                        <input type="file" name="Gambar">
                    </td>
                </tr>

                <tr>
                    <td>Statuss :</td>
                    <td>
                        <input <? php if($Statuss=="Tersedia") {echo "checked";} ?> type="radio" name="Statuss" value="Tersedia"> Tersedia
                        <input <? php if($Statuss=="Kosong") {echo "checked";} ?> type="radio" name="Statuss" value="Kosong"> Kosong
                    </td>
                </tr>

                <tr>
                    <td>
                        <input type="hidden" name="current_Gambar" value="<?php echo $current_Gambar; ?>">
                        <input type="hidden" name="id" values="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Kategory" class="btn-secondary" >
                    </td>
                </tr>
            </table>
        </form>

        <?php
            if(isset($_GET['submit']))
            {
                //echo "Clicked";
                //1. Get all the values from our form and
                $id = $_POST['id'];
                $NamaKategori = $_POST['NamaKategori'];
                $current_Gambar = $_POST['current_Gambar'];
                $Statuss = $_POST['Statuss'];

                //2. Updating new image if selected
                //check whether the image selected or not
                if(isset($_FILES['Gambar']['name']))
                {
                    //get the image details 
                    $Gambar_name = $_FILES['Gambar']['name'];

                    //check whether the image available or not
                    if($Gambar_name != ""){
                        //image available
                        //A. upload the new image

                        //Auto rename our image
                        //Get the extention of our image(jpg, png, gif, etc) e.g "Specialfood.jpg"
                        $ext = end(explode('.',$Gambar_name));

                        //Rename the image
                        $Gambar_name = "Food_Category_".rand(000, 999).'.'.$ext; //e.g. Food_Category_034.jpg

                        $source_path = $_FILES['Gambar']['tmp_name'];

                        $destination_path = "../images/category/".$Gambar_name;

                        //Finally upload the image
                        $upload = move_uploaded_file($source_path, $destination_path);

                        //Check whether the images uploaded or not
                        //And if the imge is not uploaded than we will stop the process and redirect witg error message

                        if($upload==false){
                            //Set message
                            $_SESSION['upload'] = "<div class='error'>Uploading images failed</div>";
                            //Redirect to add category page
                            header('location'.SITEURL.'admin/manage-category.php');
                            //Stop process
                            die();
                        }
                        //B. remove the curent image if it available
                        if($current_Gambar ="")
                        {
                            $remove_path = "../images/category/".current_Gambar;
                            $remove = unlink($remove_path);
    
                            //check whether the image is removed or not
                            //if failed to remove then display error message and stop the message
                            if($remove ==false)
                            {
                                //failed to remove image
                                $_SESSION['failed-remove'] = "<div class='error'>Failed to remove current image</div>";
                                header('location'.SITEURL.'admin/manage-category.php');
                                die(); //stop this process
                            }
                        }

                    }
                    else{
                        $Gambar_name =$current_Gambar;
                    }
                }
                else
                {
                    $Gambar_name = $current_Gambar;
                }

                if(iss)
                //3. Update the database 
                &sql2 = "INSERT INTO tbl_category SET
                    NamaKategori = '$NamaKategori',
                    Gambar_name = '$Gambar_name',
                    Statuss = '$Statuss'
                    Where id=$id
                ";

                //execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //4. Redirect to manage category with message
                //check wheter executed or not
                if($res2==true)
                {
                    //category upload
                    $_SESSION['update'] = "<div class = 'success'>Category update successfully</div>";
                    header('Location'.SITEURL.'admin/manage-category.php');
                }
                else
                {
                    $_SESSION['update'] = "<div class = 'error'>failed to update catergory </div>";
                    header('Location'.SITEURL.'admin/manage-category.php');
                }
            }
        ?>
    </div>
</div>

<?php include ('partials/footer.php'); ?>