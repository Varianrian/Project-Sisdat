<?php include('partials/header.php'); ?>
        <!-- main START -->
        <section class="admin manage-orders">
            <div class="container">
                <div class="row mb-1">
                    <div class="col mt-5">
                          <h3 class="text-dark">Manage Orders</h3>
                    </div>
                </div>
                <?php
                   if(isset($_SESSION['update'])){
                        echo '
                            <div class="row mb-1">
                                <div class="col-md-12">
                                    <h4 class="text-success fs-5"><em>'.$_SESSION['update'].'</em></h4>
                                </div>
                            </div>
                            ';
                        unset($_SESSION['update']);
                    } else if(isset($_SESSION['delete'])){
                        echo '
                            <div class="row mb-1">
                                <div class="col-md-12">
                                    <h4 class="text-danger fs-5"><em>'.$_SESSION['delete'].'</em></h4>
                                </div>
                            </div>
                            ';
                        unset($_SESSION['delete']);
                    }
                ?>
                <table class="table">
                    <thead class="table-dark">
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pemesan</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            //Select data admin dari database
                            $sql = "SELECT * from kustomer k inner join keranjang on k.id_kustomer = keranjang.id_kustomer inner join orders on keranjang.id_keranjang = orders.id_keranjang";

                            //Eksekusi Query
                            $result = mysqli_query($conn, $sql) or die("Query gagal dijalankan: " . mysqli_errno($conn));
                            //Cek query
                            if($result){
                                //hitung banyak baris
                                $row = mysqli_num_rows($result);

                                //Jika ada data
                                if($row > 0){
                                    //Looping data
                                    while($data = mysqli_fetch_assoc($result)){
                                        echo '
                                            <tr>
                                                <td scope="row">'.$data['id_orders'].'</td>
                                                <td>'.$data['nama'].'</td>
                                                <td>'.$data['tgl'].'</td>
                                                <td>'.$data['status'].'</td>
                                                <td>
                                                    <a href="update-orders.php?id='.$data['id_orders'].'" class="btn btn-primary btn-sm btn-success">Edit Orders</a>
                                                    <a href="delete-orders.php?id='.$data['id_orders'].'" class="btn btn-primary btn-sm btn-danger">Delete Orders</a>
                                                </td>
                                            </tr>';}
                                }else{
                                    echo '<tr>';
                                    echo '<td colspan="5" class="table-danger">Data tidak ditemukan!</td>';
                                    echo '</tr>';
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
        <!-- main END -->
<?php include('partials/footer.php'); ?>
