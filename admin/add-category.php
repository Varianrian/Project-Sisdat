<?php include ('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Kategory</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add']))
            {
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }

            if(isset($_SESSION['upload']))
            {
                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }

        ?>

        <br><br>

        <!-- Add categories form Starts -->
        <form action=""method="POST" enctype="multipart/form-data">

            <table class = tbl-30>
                <tr>
                    <td>Nama Kategori : </td>
                    <td>
                        <input type="text" name="NamaKategori" placeholder="">
                    </td>
                </tr>

                <tr>
                    <td>Pilih Gambar :</td>
                    <td>
                        <input type="file" name="Gambar">
                    </td>
                </tr>

                <tr>
                    <td>Status :</td>
                    <td>
                        <input type="radio" name="Status" value="Tersedia"> Tersedia
                        <input type="radio" name="Status" value="Kosong"> Kosong
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Kategory" class="btn-secondary" >
                    </td>
                </tr>
            </table>

        </form>
        <!-- Add categories form ends -->

        <?php
            //check submit atau tidak
            if(isset($_POST['submit']))
            {
                //echo "Kategori Berhasil Ditambahkan";
                //1. get the value dari kategori

                $NamaKategori = $_POST['NamaKategori'];

                if(isset($_POST['Status']))
                {
                    $Status = $_POST['Status'];
                }
                else
                {
                    $Status = "Kosong";
                }

                //check whether the image is selected or not
                //print_r($_FILES['Gambar']);

                //die(); //break the code here

                if(isset($_FILES['Gambar']['name']))
                {
                    //upload the image
                    //To upload the image we need image name, source path and destination path
                    $Gambar_name = $_FILES['Gambar']['name'];


                    //Upload the image only if image is selected
                    if($Gambar_name != "")
                    {                   
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
                            header('location'.SITEURL.'admin/add-category.php');
                            //Stop process
                            die();
                        }
                    }
                }
                else
                {
                    //dont upload the image and set image_name values as blank
                    $Gambar_name="";
                }

                //2. create sql query to insert kategori into database
                &sql = "INSERT INTO tbl_category SET
                    NamaKategori = '$NamaKategori',
                    Gambar_name = '$Gambar_name',
                    Status = '$Status'
                ";

                //3. Execute the query and save in database
                &res = mysqli_query($conn, $sql);

                //4. check whteter the query executed successfully or not and data added or not
                if(&res == true)
                {
                    //query executed successfully and category added
                    &_SESSION['add'] = "<div class='success'>Kategori berhasil ditambahkan</div>";
                    //Redirect to manage category page
                    header("Location:".SITEURL,"admin/manage-category.php");
                }
                else{
                    //Failed to add category
                    &_SESSION['add'] = "<div error='success'>Kategori gagal ditambahkan</div>"
                    //Redirect to manage category page
                    header("Location:".SITEURL,"admin/add-category.php")
                }
            }
        ?>
    </div>
</div>
<?php include ('partials/footer.php'); ?>