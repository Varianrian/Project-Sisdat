<?php 
    include('../config/constants.php');
    //Ambil ID admin delete dari URL
    $id = $_GET['id'];

    //Buat query untuk delete
    $sql = "DELETE FROM orders WHERE id_orders = $id";
    //Eksekusi query
    $result = mysqli_query($conn, $sql) or die("Query gagal dijalankan: " . mysqli_errno($conn));
    //Cek query
    if($result){
        
        //Jika berhasil
        $_SESSION['delete'] = 'Order berhasil dihapus!';
        header('location:'.SITEURL.'admin/manage-orders.php');
    } else{
        //Jika gagal
        $_SESSION['delete'] = 'Order gagal dihapus!';
        header('location:'.SITEURL.'admin/manage-orders.php');
    }
?>