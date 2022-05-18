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

        ?>

        <br><br>

        <!-- Add categories form Starts -->
        <form action=""method="post">

            <table class = tbl-30>
                <tr>
                    <td>Nama Kategori :</td>
                    <td>
                        <input type="text" name="NamaKategori" placeholder="">
                    </td>
                </tr>

                <tr>
                    <td>Gambar :</td>
                    <td>
                        <input type="file" name="Gambar" placeholder="Choose file" id="filetoupload">
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

                //2. create sql query to insert kategori into database
                &sql = "INSERT INTO tbl_category SET
                    NamaKategori = '$NamaKategori',
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