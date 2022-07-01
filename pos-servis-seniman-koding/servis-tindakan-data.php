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
// $table = 'members'; 
$table = <<<EOT
 (
    SELECT 
      a.ds_id, 
      a.ds_nota,
      a.ds_customer_id,
      a.ds_terima_date_time, 
      a.ds_status, 
      a.ds_penerima_id,
      a.ds_teknisi_disarankan,
      a.ds_cabang,
      b.customer_id,
      b.customer_nama,
      c.user_id,
      c.user_nama
    FROM data_servis a
    LEFT JOIN customer b ON a.ds_customer_id = b.customer_id
    LEFT JOIN user c ON a.ds_teknisi_disarankan = c.user_id
 ) temp
EOT;
 
// Table's primary key 
$primaryKey = 'ds_id'; 
 
// Array of database columns which should be read and sent back to DataTables. 
// The `db` parameter represents the column name in the database.  
// The `dt` parameter represents the DataTables column identifier. 
$columns = array( 
    array( 'db' => 'ds_id', 'dt'                    => 0 ),
    array( 'db' => 'ds_nota', 'dt'                  => 1 ), 
    array( 'db' => 'customer_nama', 'dt'            => 2 ), 
    array( 'db' => 'ds_terima_date_time',  'dt'     => 3 ), 
    array( 'db' => 'user_nama',  'dt'               => 4 ), 
    array( 
        'db'        => 'ds_status', 
        'dt'        => 5, 
        'formatter' => function( $d, $row ) { 
            return ($d == 1)?"<span class='badge badge-secondary'>Servis Masuk</span>" : 
            "<span class='badge badge-danger'>Oper Teknisi Lain</span>"; 
        } 
    )
); 

// Include SQL query processing class 
require 'aksi/ssp.php'; 

// require('ssp.class.php');

// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns, null, "ds_cabang = $cabang && ds_status = 1 || ds_status = 7 " )
    // SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns)

);