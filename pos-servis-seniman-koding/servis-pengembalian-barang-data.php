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
      a.ds_ambil_date_time,
      a.ds_teknisi,
      a.ds_total,
      a.ds_cabang,
      b.customer_id,
      b.customer_nama,
      c.user_id,
      c.user_nama
    FROM data_servis a
    LEFT JOIN customer b ON a.ds_customer_id = b.customer_id
    LEFT JOIN user c ON a.ds_teknisi = c.user_id
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
    array( 
        'db'        => 'ds_status', 
        'dt'        => 4, 
        'formatter' => function( $d, $row ) { 
            // Ternary Operator
            return ($d == 0) ? "<span class='badge badge-danger'>Cancel</span>" :  
            ($d == 5 ? "<span class='badge badge-primary'>Bisa Diambil</span>" :
            ($d == 8 ? "<span class='badge badge-danger'>Tidak Bisa</span>" : 
              "<span class='badge badge-danger'>Cancel</span>")); 
        } 
    ),
    array( 'db' => 'user_nama',  'dt'               => 5 ),
    array( 'db' => 'ds_total',  'dt'                => 6 )
); 

// Include SQL query processing class 
require 'aksi/ssp.php'; 

// require('ssp.class.php');

// Output data as json format 
echo json_encode( 
    SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns, null, "ds_status = 5 || ds_status = 8 || ds_status = 0 && ds_cabang = $cabang " )
    // SSP::simple( $_GET, $dbDetails, $table, $primaryKey, $columns)

);