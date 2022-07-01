<?php 
include 'aksi/koneksi.php';
$cabang = $_GET['cabang'];

// Database connection info 
$dbDetails = array( 
    'host' => $servername, 
    'user' => $username, 
    'pass' => $password, 
    'db'   => $db
); 
 
// DB table to use 
$table = 'barang'; 
 
// Table's primary key 
$primaryKey = 'barang_id'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
    array( 'db' => 'barang_id', 'dt'              => 0 ),
    array( 'db' => 'barang_kode', 'dt'            => 1 ), 
    array( 'db' => 'barang_nama', 'dt'            => 2 ), 
    array( 'db' => 'barang_harga',      'dt'      => 3 ),
    array( 'db' => 'barang_stock',      'dt'      => 4 )
); 

// Include SQL query processing class 
require 'aksi/ssp.php'; 

// require('ssp.class.php');

// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns, null, "barang_status != 2 && barang_status != 0 && barang_cabang = $cabang && barang_stock > 0 " )
    // SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns)

);

