

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_kode` varchar(500) NOT NULL,
  `barang_kode_slug` varchar(500) NOT NULL,
  `barang_kode_count` int(11) NOT NULL,
  `barang_nama` varchar(250) NOT NULL,
  `barang_harga_beli` varchar(250) NOT NULL,
  `barang_harga` varchar(250) NOT NULL,
  `barang_harga_grosir_1` int(11) NOT NULL,
  `barang_harga_grosir_2` int(11) NOT NULL,
  `barang_harga_s2` int(11) NOT NULL,
  `barang_harga_grosir_1_s2` int(11) NOT NULL,
  `barang_harga_grosir_2_s2` int(11) NOT NULL,
  `barang_harga_s3` int(11) NOT NULL,
  `barang_harga_grosir_1_s3` int(11) NOT NULL,
  `barang_harga_grosir_2_s3` int(11) NOT NULL,
  `barang_stock` text NOT NULL,
  `barang_tanggal` varchar(250) NOT NULL,
  `barang_kategori_id` int(11) NOT NULL,
  `kategori_id` varchar(250) NOT NULL,
  `barang_satuan_id` varchar(250) NOT NULL,
  `satuan_id` varchar(250) NOT NULL,
  `satuan_id_2` int(11) NOT NULL,
  `satuan_id_3` int(11) NOT NULL,
  `satuan_isi_1` int(11) NOT NULL,
  `satuan_isi_2` int(11) NOT NULL,
  `satuan_isi_3` int(11) NOT NULL,
  `barang_deskripsi` text NOT NULL,
  `barang_option_sn` int(11) NOT NULL,
  `barang_terjual` int(11) NOT NULL,
  `barang_cabang` int(11) NOT NULL,
  PRIMARY KEY (`barang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

INSERT INTO barang VALUES("70","3532235235","3532235235","13","nama tes","","1200","800","900","1200","3000","4000","5000","6000","7000","5","02 January 2022 7:58:44 pm","9","9","2","2","3","1","1","12","50","des nama tes","0","0","0");
INSERT INTO barang VALUES("71","7547568568658","7547568568658","14","Tes 2","","10000","8000","7000","15000","12000","10000","17000","15000","13000","14","03 January 2022 11:32:52 am","8","8","2","2","4","1","1","12","22","Deskripsi Tes 2","0","-12","0");
INSERT INTO barang VALUES("72","53463465475","53463465475","15","Kabel Sata","450","1200","1000","900","0","0","0","0","0","0","25","03 January 2022 4:09:00 pm","8","8","2","2","0","0","1","0","0","Kabel Sata Komputer","0","7","0");
INSERT INTO barang VALUES("73","756856867989870","756856867989870","16","Hp Xiomy","","1200000","0","0","0","0","0","0","0","0","4","03 January 2022 4:11:13 pm","9","9","3","3","0","0","1","0","0","Hp Xiomy","1","0","0");
INSERT INTO barang VALUES("74","534645745","534645745","17","egte","","2000","0","0","0","0","0","0","0","0","2","08 January 2022 1:49:18 pm","8","8","3","3","0","0","1","0","0","egte","0","0","0");



CREATE TABLE `barang_sn` (
  `barang_sn_id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_sn_desc` text NOT NULL,
  `barang_kode_slug` varchar(500) NOT NULL,
  `barang_sn_status` int(11) NOT NULL,
  `barang_sn_cabang` int(11) NOT NULL,
  PRIMARY KEY (`barang_sn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO barang_sn VALUES("1","54365436436","756856867989870","3","0");
INSERT INTO barang_sn VALUES("2","654757658568","756856867989870","1","0");
INSERT INTO barang_sn VALUES("3","758658658679","756856867989870","1","0");
INSERT INTO barang_sn VALUES("4","6865868967","756856867989870","1","0");
INSERT INTO barang_sn VALUES("5","8568658967976","756856867989870","1","0");



CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_nama` varchar(500) NOT NULL,
  `customer_tlpn` varchar(250) NOT NULL,
  `customer_email` varchar(250) NOT NULL,
  `customer_alamat` text NOT NULL,
  `customer_create` varchar(250) NOT NULL,
  `customer_status` varchar(250) NOT NULL,
  `customer_category` int(11) NOT NULL,
  `customer_cabang` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO customer VALUES("0","Customer Umum","","","","","1","0","0");
INSERT INTO customer VALUES("1","Dari Marketplace","","","","","1","0","0");
INSERT INTO customer VALUES("5","Asrul","085678900987","","Jl. Kedung Cowek No.350, Tanah Kali Kedinding, Kec. Kenjeran, Kota SBY, Jawa Timur 60129","11 April 2020 1:35:37 pm","1","0","0");
INSERT INTO customer VALUES("7","Raka Abdi","086782121212","abdi@gmail.com","Jl. Kedung Cowek No.350, Tanah Kali Kedinding, Kenjeran, Kota SBY, Jawa Timur 60129","12 April 2020 1:00:07 pm","1","0","0");
INSERT INTO customer VALUES("9","Erlang Abadi","0822998768","","Kantor Pusat PT UBS – PT Untung Bersama Sejahtera: Alamat: Jl. Kenjeran No 395-399 Surabaya 60134 Jawa Timur.","18 August 2021 7:21:43 pm","1","0","0");
INSERT INTO customer VALUES("10","Pak Budi","085780956487","","Jl. KENJERAN No. 440 Desa Gading Kec. TambaksariKota Surabaya","19 August 2021 6:05:44 pm","1","0","0");
INSERT INTO customer VALUES("11","Doni Afandi","082299078642","","Jl Lebak Jaya kenjeran Surabaya Jawa Timur","25 September 2021 11:03:53 am","1","1","0");
INSERT INTO customer VALUES("13","Customer Umum","","","","","1","0","0");
INSERT INTO customer VALUES("15","Customer Umum","","","","","1","0","0");
INSERT INTO customer VALUES("16","Customer Umum","","","","","1","0","0");
INSERT INTO customer VALUES("17","Customer Umum","","","","","1","0","0");
INSERT INTO customer VALUES("18","Customer Umum","","","","","1","0","0");



CREATE TABLE `ekspedisi` (
  `ekspedisi_id` int(11) NOT NULL AUTO_INCREMENT,
  `ekspedisi_nama` varchar(500) NOT NULL,
  `ekspedisi_status` varchar(250) NOT NULL,
  `ekspedisi_cabang` int(11) NOT NULL,
  PRIMARY KEY (`ekspedisi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO ekspedisi VALUES("2","JNE","1","0");
INSERT INTO ekspedisi VALUES("3","TIKI","1","0");
INSERT INTO ekspedisi VALUES("4","POS","1","0");
INSERT INTO ekspedisi VALUES("5","JNE Cabang","1","1");



CREATE TABLE `hutang` (
  `hutang_id` int(11) NOT NULL AUTO_INCREMENT,
  `hutang_invoice` text NOT NULL,
  `hutang_invoice_parent` text NOT NULL,
  `hutang_date` varchar(500) NOT NULL,
  `hutang_date_time` varchar(500) NOT NULL,
  `hutang_kasir` int(11) NOT NULL,
  `hutang_nominal` varchar(500) NOT NULL,
  `hutang_tipe_pembayaran` int(11) NOT NULL,
  `hutang_cabang` int(11) NOT NULL,
  PRIMARY KEY (`hutang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO hutang VALUES("1","654654454362425","20220107130","2021-01-07","07 January 2022 7:51:09 pm","3","1000","0","0");
INSERT INTO hutang VALUES("2","54543ttertr","20220107230","2020-01-07","07 January 2022 8:20:56 pm","3","200","0","0");



CREATE TABLE `hutang_kembalian` (
  `hl_id` int(11) NOT NULL AUTO_INCREMENT,
  `hl_invoice` text NOT NULL,
  `hl_invoice_parent` text NOT NULL,
  `hl_date` varchar(500) NOT NULL,
  `hl_date_time` varchar(500) NOT NULL,
  `hl_nominal` varchar(500) NOT NULL,
  `hl_cabang` int(11) NOT NULL,
  PRIMARY KEY (`hl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO hutang_kembalian VALUES("1","643645745890","20211110430","2021-11-10","10 November 2021 6:53:09 pm","5000","0");



CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `penjualan_invoice` text NOT NULL,
  `penjualan_invoice_count` varchar(250) NOT NULL,
  `invoice_tgl` varchar(250) NOT NULL,
  `invoice_customer` varchar(500) NOT NULL,
  `invoice_customer_category` int(11) NOT NULL,
  `invoice_kurir` varchar(500) NOT NULL,
  `invoice_status_kurir` int(11) NOT NULL,
  `invoice_tipe_transaksi` int(11) NOT NULL,
  `invoice_total_beli` int(11) NOT NULL,
  `invoice_total` int(11) NOT NULL,
  `invoice_ongkir` int(11) NOT NULL,
  `invoice_diskon` int(11) NOT NULL,
  `invoice_sub_total` int(11) NOT NULL,
  `invoice_bayar` int(11) NOT NULL,
  `invoice_kembali` int(11) NOT NULL,
  `invoice_kasir` varchar(500) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_date_year_month` varchar(250) NOT NULL,
  `invoice_date_edit` varchar(500) NOT NULL,
  `invoice_kasir_edit` varchar(250) NOT NULL,
  `invoice_total_beli_lama` int(11) NOT NULL,
  `invoice_total_lama` varchar(500) NOT NULL,
  `invoice_ongkir_lama` int(11) NOT NULL,
  `invoice_sub_total_lama` int(11) NOT NULL,
  `invoice_bayar_lama` varchar(500) NOT NULL,
  `invoice_kembali_lama` varchar(500) NOT NULL,
  `invoice_marketplace` varchar(500) NOT NULL,
  `invoice_ekspedisi` int(11) NOT NULL,
  `invoice_no_resi` varchar(500) NOT NULL,
  `invoice_date_selesai_kurir` varchar(500) NOT NULL,
  `invoice_piutang` int(11) NOT NULL,
  `invoice_piutang_dp` varchar(500) NOT NULL,
  `invoice_piutang_jatuh_tempo` varchar(500) NOT NULL,
  `invoice_piutang_lunas` int(11) NOT NULL,
  `invoice_cabang` int(11) NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

INSERT INTO invoice VALUES("2","202201031","1","03 January 2022 10:36:05 pm","0","0","0","1","0","0","45000","0","0","45000","60000","15000","3","2022-01-03","2022-01","2022-01-03","3","0","60000","0","60000","60000","0","","0","-","-","0","0","0","0","0");
INSERT INTO invoice VALUES("3","202201072","2","07 January 2022 6:56:51 pm","10","0","0","1","0","0","4800","0","0","4800","3800","-1000","3","2022-01-07","2022-01"," "," ","0","4800","0","4800","800","-4000","","0","-","-","1","800","2022-02-08","0","0");
INSERT INTO invoice VALUES("5","202201083","3","08 January 2022 9:52:18 am","0","0","0","1","2","0","1000000","0","0","1000000","1000000","0","3","2022-01-08","2022-01"," "," ","0","1000000","0","1000000","1000000","0","","0","-","-","0","0","0","0","0");
INSERT INTO invoice VALUES("10","202201084","4","08 January 2022 10:18:12 am","0","0","0","1","0","450","1200","5000","0","6200","6200","0","3","2022-01-08","2022-01"," "," ","450","1200","5000","6200","6200","0","","0","-","-","0","0","0","0","0");
INSERT INTO invoice VALUES("11","202201085","5","08 January 2022 10:18:45 am","10","0","0","1","0","450","1200","5000","0","6200","200","-6000","3","2022-01-08","2022-01"," "," ","450","1200","5000","6200","200","-6000","","0","-","-","1","200","2022-02-24","0","0");
INSERT INTO invoice VALUES("12","202201086","6","08 January 2022 10:22:06 am","10","0","0","1","0","450","1200","5000","0","6200","6200","0","3","2022-01-08","2022-01"," "," ","450","1200","5000","6200","6200","0","","0","-","-","1","6200","2022-01-28","0","0");
INSERT INTO invoice VALUES("13","202201087","7","08 January 2022 10:24:05 am","0","0","0","1","0","450","1200","5000","0","6200","6200","0","3","2022-01-08","2022-01"," "," ","450","1200","5000","6200","6200","0","","0","-","-","0","0","0","0","0");
INSERT INTO invoice VALUES("14","202201088","8","08 January 2022 10:24:29 am","10","0","0","1","0","450","1200","5000","0","6200","200","-6000","3","2022-01-08","2022-01"," "," ","450","1200","5000","6200","200","-6000","","0","-","-","1","200","2022-02-04","0","0");



CREATE TABLE `invoice_pembelian` (
  `invoice_pembelian_id` int(11) NOT NULL AUTO_INCREMENT,
  `pembelian_invoice` text NOT NULL,
  `pembelian_invoice_parent` text NOT NULL,
  `invoice_tgl` varchar(250) NOT NULL,
  `invoice_supplier` varchar(500) NOT NULL,
  `invoice_total` int(11) NOT NULL,
  `invoice_bayar` int(11) NOT NULL,
  `invoice_kembali` int(11) NOT NULL,
  `invoice_kasir` varchar(500) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_date_edit` varchar(500) NOT NULL,
  `invoice_kasir_edit` varchar(250) NOT NULL,
  `invoice_total_lama` varchar(500) NOT NULL,
  `invoice_bayar_lama` varchar(500) NOT NULL,
  `invoice_kembali_lama` varchar(500) NOT NULL,
  `invoice_hutang` int(11) NOT NULL,
  `invoice_hutang_dp` varchar(500) NOT NULL,
  `invoice_hutang_jatuh_tempo` varchar(500) NOT NULL,
  `invoice_hutang_lunas` int(11) NOT NULL,
  `invoice_pembelian_cabang` int(11) NOT NULL,
  PRIMARY KEY (`invoice_pembelian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO invoice_pembelian VALUES("1","654654454362425","20220107130","07 January 2022 7:50:32 pm","4","5000","1000","-4000","3                                  ","2022-01-07"," "," ","5000","0","-5000","1","0","2022-02-07","0","0");
INSERT INTO invoice_pembelian VALUES("2","54543ttertr","20220107230","07 January 2022 8:20:09 pm","4","1600","200","-1400","3                                  ","2022-01-07"," "," ","1600","0","-1600","1","0","2022-02-08","0","0");



CREATE TABLE `invoice_pembelian_number` (
  `invoice_pembelian_number_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_pembelian_number_input` varchar(250) NOT NULL,
  `invoice_pembelian_number_parent` text NOT NULL,
  `invoice_pembelian_number_user` varchar(250) NOT NULL,
  `invoice_pembelian_number_delete` varchar(250) NOT NULL,
  `invoice_pembelian_cabang` int(11) NOT NULL,
  PRIMARY KEY (`invoice_pembelian_number_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO invoice_pembelian_number VALUES("9","1234567876","2021071912","3","202107191230","0");
INSERT INTO invoice_pembelian_number VALUES("10","6436457457","202110233","3","20211023330","0");
INSERT INTO invoice_pembelian_number VALUES("11","6436457457","202110233","3","20211023331","1");



CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori_nama` varchar(500) NOT NULL,
  `kategori_status` varchar(250) NOT NULL,
  `kategori_cabang` int(11) NOT NULL,
  PRIMARY KEY (`kategori_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO kategori VALUES("2","Laptop","1","0");
INSERT INTO kategori VALUES("4","Keyboard","1","0");
INSERT INTO kategori VALUES("6","Monitor","1","0");
INSERT INTO kategori VALUES("7","Mouse","1","0");
INSERT INTO kategori VALUES("8","Kabel","1","0");
INSERT INTO kategori VALUES("9","Hp","1","0");



CREATE TABLE `keranjang` (
  `keranjang_id` int(11) NOT NULL AUTO_INCREMENT,
  `keranjang_nama` varchar(500) NOT NULL,
  `keranjang_harga_beli` varchar(250) NOT NULL,
  `keranjang_harga` varchar(250) NOT NULL,
  `keranjang_harga_parent` int(11) NOT NULL,
  `keranjang_harga_edit` int(11) NOT NULL,
  `keranjang_satuan` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `barang_kode_slug` varchar(500) NOT NULL,
  `keranjang_qty` int(11) NOT NULL,
  `keranjang_qty_view` int(11) NOT NULL,
  `keranjang_konversi_isi` int(11) NOT NULL,
  `keranjang_barang_sn_id` int(11) NOT NULL,
  `keranjang_barang_option_sn` int(11) NOT NULL,
  `keranjang_sn` text NOT NULL,
  `keranjang_id_kasir` int(11) NOT NULL,
  `keranjang_id_cek` varchar(500) NOT NULL,
  `keranjang_tipe_customer` int(11) NOT NULL,
  `keranjang_cabang` int(11) NOT NULL,
  PRIMARY KEY (`keranjang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `keranjang_pembelian` (
  `keranjang_id` int(11) NOT NULL AUTO_INCREMENT,
  `keranjang_nama` varchar(500) NOT NULL,
  `keranjang_harga` varchar(250) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `keranjang_qty` int(11) NOT NULL,
  `keranjang_id_kasir` int(11) NOT NULL,
  `keranjang_id_cek` varchar(500) NOT NULL,
  `keranjang_cabang` int(11) NOT NULL,
  PRIMARY KEY (`keranjang_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `keranjang_transfer` (
  `keranjang_transfer_id` int(11) NOT NULL AUTO_INCREMENT,
  `keranjang_transfer_nama` text NOT NULL,
  `barang_id` int(11) NOT NULL,
  `barang_kode_slug` text NOT NULL,
  `keranjang_transfer_qty` int(11) NOT NULL,
  `keranjang_barang_sn_id` int(11) NOT NULL,
  `keranjang_barang_option_sn` int(11) NOT NULL,
  `keranjang_sn` text NOT NULL,
  `keranjang_transfer_id_kasir` int(11) NOT NULL,
  `keranjang_id_cek` varchar(500) NOT NULL,
  `keranjang_pengirim_cabang` int(11) NOT NULL,
  `keranjang_penerima_cabang` int(11) NOT NULL,
  `keranjang_transfer_cabang` int(11) NOT NULL,
  PRIMARY KEY (`keranjang_transfer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `laba_bersih` (
  `lb_id` int(11) NOT NULL AUTO_INCREMENT,
  `lb_pendapatan_lain` int(11) NOT NULL,
  `lb_pengeluaran_gaji` int(11) NOT NULL,
  `lb_pengeluaran_listrik` int(11) NOT NULL,
  `lb_pengeluaran_tlpn_internet` int(11) NOT NULL,
  `lb_pengeluaran_perlengkapan_toko` int(11) NOT NULL,
  `lb_pengeluaran_biaya_penyusutan` int(11) NOT NULL,
  `lb_pengeluaran_bensin` int(11) NOT NULL,
  `lb_pengeluaran_tak_terduga` int(11) NOT NULL,
  `lb_pengeluaran_lain` int(11) NOT NULL,
  `lb_cabang` int(11) NOT NULL,
  PRIMARY KEY (`lb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO laba_bersih VALUES("1","500000","400000","0","0","0","0","0","0","0","0");
INSERT INTO laba_bersih VALUES("2","0","0","0","0","0","0","0","0","0","1");



CREATE TABLE `pembelian` (
  `pembelian_id` int(11) NOT NULL AUTO_INCREMENT,
  `pembelian_barang_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `barang_qty` int(11) NOT NULL,
  `keranjang_id_kasir` int(11) NOT NULL,
  `pembelian_invoice` text NOT NULL,
  `pembelian_invoice_parent` text NOT NULL,
  `pembelian_date` date NOT NULL,
  `barang_qty_lama` varchar(500) NOT NULL,
  `barang_qty_lama_parent` varchar(500) NOT NULL,
  `barang_harga_beli` int(11) NOT NULL,
  `pembelian_cabang` int(11) NOT NULL,
  PRIMARY KEY (`pembelian_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO pembelian VALUES("1","72","72","10","3","654654454362425","20220107130","2022-01-07","10","10","500","0");
INSERT INTO pembelian VALUES("2","72","72","4","3","54543ttertr","20220107230","2022-01-07","4","4","400","0");



CREATE TABLE `penjualan` (
  `penjualan_id` int(11) NOT NULL AUTO_INCREMENT,
  `penjualan_barang_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `barang_qty` int(11) NOT NULL,
  `barang_qty_keranjang` int(11) NOT NULL,
  `barang_qty_konversi_isi` int(11) NOT NULL,
  `keranjang_satuan` int(11) NOT NULL,
  `keranjang_harga_beli` varchar(500) NOT NULL,
  `keranjang_harga` varchar(500) NOT NULL,
  `keranjang_harga_parent` int(11) NOT NULL,
  `keranjang_harga_edit` int(11) NOT NULL,
  `keranjang_id_kasir` int(11) NOT NULL,
  `penjualan_invoice` text NOT NULL,
  `penjualan_date` date NOT NULL,
  `penjualan_date_year_month` varchar(250) NOT NULL,
  `barang_qty_lama` varchar(500) NOT NULL,
  `barang_qty_lama_parent` varchar(500) NOT NULL,
  `barang_option_sn` int(11) NOT NULL,
  `barang_sn_id` int(11) NOT NULL,
  `barang_sn_desc` text NOT NULL,
  `invoice_customer_category` int(11) NOT NULL,
  `penjualan_cabang` int(11) NOT NULL,
  PRIMARY KEY (`penjualan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO penjualan VALUES("2","71","71","3","48","12","4","","15000","0","0","3","202201031","2022-01-03","2022-01","4","4","0","0","0","0","0");
INSERT INTO penjualan VALUES("3","72","72","4","4","1","2","","1200","0","0","3","202201072","2022-01-07","2022-01","4","4","0","0","0","0","0");
INSERT INTO penjualan VALUES("6","73","73","1","1","1","3","","1000000","1200000","1","3","202201083","2022-01-08","2022-01","1","1","1","1","54365436436","0","0");
INSERT INTO penjualan VALUES("11","72","72","1","1","1","2","450","1200","1200","0","3","202201084","2022-01-08","2022-01","1","1","0","0","0","0","0");
INSERT INTO penjualan VALUES("12","72","72","1","1","1","2","450","1200","1200","0","3","202201085","2022-01-08","2022-01","1","1","0","0","0","0","0");
INSERT INTO penjualan VALUES("13","72","72","1","1","1","2","450","1200","1200","0","3","202201086","2022-01-08","2022-01","1","1","0","0","0","0","0");
INSERT INTO penjualan VALUES("14","72","72","1","1","1","2","450","1200","1200","0","3","202201087","2022-01-08","2022-01","1","1","0","0","0","0","0");
INSERT INTO penjualan VALUES("15","72","72","1","1","1","2","450","1200","1200","0","3","202201088","2022-01-08","2022-01","1","1","0","0","0","0","0");



CREATE TABLE `piutang` (
  `piutang_id` int(11) NOT NULL AUTO_INCREMENT,
  `piutang_invoice` text NOT NULL,
  `piutang_date` varchar(500) NOT NULL,
  `piutang_date_time` varchar(500) NOT NULL,
  `piutang_kasir` int(11) NOT NULL,
  `piutang_nominal` varchar(500) NOT NULL,
  `piutang_tipe_pembayaran` int(11) NOT NULL,
  `piutang_cabang` int(11) NOT NULL,
  PRIMARY KEY (`piutang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO piutang VALUES("1","202201072","2021-01-07","07 January 2022 7:00:14 pm","3","1000","0","0");
INSERT INTO piutang VALUES("2","202201072","2022-01-08","08 January 2022 9:31:47 am","3","2000","2","0");



CREATE TABLE `piutang_kembalian` (
  `pl_id` int(11) NOT NULL AUTO_INCREMENT,
  `pl_invoice` text NOT NULL,
  `pl_date` varchar(500) NOT NULL,
  `pl_date_time` varchar(500) NOT NULL,
  `pl_nominal` varchar(250) NOT NULL,
  `pl_cabang` int(11) NOT NULL,
  PRIMARY KEY (`pl_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO piutang_kembalian VALUES("1","202111102","2021-11-10","10 November 2021 6:43:57 pm","1000","0");



CREATE TABLE `retur` (
  `retur_id` int(11) NOT NULL AUTO_INCREMENT,
  `retur_barang_id` varchar(500) NOT NULL,
  `retur_invoice` varchar(500) NOT NULL,
  `retur_admin_id` varchar(500) NOT NULL,
  `retur_date` date NOT NULL,
  `retur_alasan` text NOT NULL,
  `barang_stock` int(11) NOT NULL,
  PRIMARY KEY (`retur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO retur VALUES("12","5","202004209","3","2020-04-20"," ","1");
INSERT INTO retur VALUES("13","5","202004209","3","2020-04-20"," ","1");



CREATE TABLE `satuan` (
  `satuan_id` int(11) NOT NULL AUTO_INCREMENT,
  `satuan_nama` varchar(500) NOT NULL,
  `satuan_status` varchar(250) NOT NULL,
  `satuan_cabang` int(11) NOT NULL,
  PRIMARY KEY (`satuan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO satuan VALUES("1","KG","1","0");
INSERT INTO satuan VALUES("2","PCS","1","0");
INSERT INTO satuan VALUES("3","Unit","1","0");
INSERT INTO satuan VALUES("4","Lusin","1","0");



CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL AUTO_INCREMENT,
  `supplier_nama` varchar(250) NOT NULL,
  `supplier_wa` varchar(250) NOT NULL,
  `supplier_alamat` text NOT NULL,
  `supplier_company` varchar(250) NOT NULL,
  `supplier_status` int(11) NOT NULL,
  `supplier_create` varchar(250) NOT NULL,
  `supplier_cabang` int(11) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO supplier VALUES("2","Doni Afandi","085780978675","Surabaya","PT Pemasok Produk","1","14 November 2020 7:31:51 pm","0");
INSERT INTO supplier VALUES("4","Afandi","085787654321","Surabaya","PT ABC","1","15 November 2020 7:46:06 pm","0");



CREATE TABLE `terlaris` (
  `terlaris_id` int(11) NOT NULL AUTO_INCREMENT,
  `barang_id` int(11) NOT NULL,
  `barang_terjual` int(11) NOT NULL,
  PRIMARY KEY (`terlaris_id`)
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=latin1;

INSERT INTO terlaris VALUES("309","67","2");
INSERT INTO terlaris VALUES("310","68","3");
INSERT INTO terlaris VALUES("311","69","1");
INSERT INTO terlaris VALUES("312","68","1");
INSERT INTO terlaris VALUES("313","65","3");
INSERT INTO terlaris VALUES("314","69","1");
INSERT INTO terlaris VALUES("315","71","24");
INSERT INTO terlaris VALUES("316","71","48");
INSERT INTO terlaris VALUES("317","72","4");
INSERT INTO terlaris VALUES("318","72","2");
INSERT INTO terlaris VALUES("319","73","0");
INSERT INTO terlaris VALUES("320","73","1");
INSERT INTO terlaris VALUES("321","72","1");
INSERT INTO terlaris VALUES("322","72","2");
INSERT INTO terlaris VALUES("323","72","1");
INSERT INTO terlaris VALUES("324","72","1");
INSERT INTO terlaris VALUES("325","72","1");
INSERT INTO terlaris VALUES("326","72","1");
INSERT INTO terlaris VALUES("327","72","1");
INSERT INTO terlaris VALUES("328","72","1");
INSERT INTO terlaris VALUES("329","72","1");



CREATE TABLE `toko` (
  `toko_id` int(11) NOT NULL AUTO_INCREMENT,
  `toko_nama` varchar(500) NOT NULL,
  `toko_kota` varchar(250) NOT NULL,
  `toko_alamat` text NOT NULL,
  `toko_tlpn` varchar(250) NOT NULL,
  `toko_wa` varchar(250) NOT NULL,
  `toko_email` varchar(500) NOT NULL,
  `toko_print` int(11) NOT NULL,
  `toko_status` int(11) NOT NULL,
  `toko_ongkir` int(11) NOT NULL,
  `toko_cabang` int(11) NOT NULL,
  PRIMARY KEY (`toko_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO toko VALUES("1","Pusat IT","Surabaya Jawa Timur","RT 1/ RW 2 Jln Pahlawan Pertama","031890876","085780956487","senimankoding@gmail.com","8","1","5000","0");
INSERT INTO toko VALUES("2","Toko Semarang","Semarang","Semarang","082299992997","08658679679","doniasrulafandi@gmail.com","10","1","0","1");



CREATE TABLE `transfer` (
  `transfer_id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_ref` text NOT NULL,
  `transfer_count` int(11) NOT NULL,
  `transfer_date` varchar(250) NOT NULL,
  `transfer_date_time` varchar(250) NOT NULL,
  `transfer_terima_date` varchar(250) NOT NULL,
  `transfer_terima_date_time` varchar(250) NOT NULL,
  `transfer_note` text NOT NULL,
  `transfer_pengirim_cabang` int(11) NOT NULL,
  `transfer_penerima_cabang` int(11) NOT NULL,
  `transfer_id_tipe_keluar` int(11) NOT NULL,
  `transfer_id_tipe_masuk` int(11) NOT NULL,
  `transfer_status` int(11) NOT NULL,
  `transfer_user` int(11) NOT NULL,
  `transfer_user_penerima` int(11) NOT NULL,
  `transfer_cabang` int(11) NOT NULL,
  PRIMARY KEY (`transfer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO transfer VALUES("1","2021111001","1","2021-11-10","10 November 2021 10:35:35 pm","2021-11-10","10 November 2021 10:38:43 pm","Transfer Dari Gudang Pusat","0","1","0","1","2","3","16","0");



CREATE TABLE `transfer_produk_keluar` (
  `tpk_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpk_transfer_barang_id` int(11) NOT NULL,
  `tpk_barang_id` int(11) NOT NULL,
  `tpk_kode_slug` varchar(500) NOT NULL,
  `tpk_qty` int(11) NOT NULL,
  `tpk_ref` text NOT NULL,
  `tpk_date` varchar(11) NOT NULL,
  `tpk_date_time` varchar(500) NOT NULL,
  `tpk_barang_option_sn` int(11) NOT NULL,
  `tpk_barang_sn_id` int(11) NOT NULL,
  `tpk_barang_sn_desc` varchar(500) NOT NULL,
  `tpk_user` int(11) NOT NULL,
  `tpk_pengirim_cabang` int(11) NOT NULL,
  `tpk_penerima_cabang` int(11) NOT NULL,
  `tpk_cabang` int(11) NOT NULL,
  PRIMARY KEY (`tpk_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

INSERT INTO transfer_produk_keluar VALUES("1","54","54","BRG-001","2","2021111001","2021-11-10","10 November 2021 10:35:15 pm","0","0","0","3","0","1","0");
INSERT INTO transfer_produk_keluar VALUES("2","53","53","12345678","2","2021111001","2021-11-10","10 November 2021 10:35:15 pm","0","0","0","3","0","1","0");



CREATE TABLE `transfer_produk_masuk` (
  `tpm_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpm_kode_slug` text NOT NULL,
  `tpm_qty` int(11) NOT NULL,
  `tpm_ref` text NOT NULL,
  `tpm_date` varchar(250) NOT NULL,
  `tpm_date_time` varchar(250) NOT NULL,
  `tpm_barang_option_sn` int(11) NOT NULL,
  `tpm_barang_sn_id` int(11) NOT NULL,
  `tpm_barang_sn_desc` varchar(500) NOT NULL,
  `tpm_user` int(11) NOT NULL,
  `tpm_pengirim_cabang` int(11) NOT NULL,
  `tpm_penerima_cabang` int(11) NOT NULL,
  `tpm_cabang` int(11) NOT NULL,
  PRIMARY KEY (`tpm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `transfer_select_cabang` (
  `tsc_id` int(11) NOT NULL AUTO_INCREMENT,
  `tsc_cabang_pusat` int(11) NOT NULL,
  `tsc_cabang_penerima` int(11) NOT NULL,
  `tsc_user_id` int(11) NOT NULL,
  `tsc_cabang` int(11) NOT NULL,
  PRIMARY KEY (`tsc_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_nama` varchar(500) NOT NULL,
  `user_no_hp` varchar(250) NOT NULL,
  `user_alamat` text NOT NULL,
  `user_email` varchar(250) NOT NULL,
  `user_password` varchar(500) NOT NULL,
  `user_create` varchar(250) NOT NULL,
  `user_level` varchar(250) NOT NULL,
  `user_status` varchar(250) NOT NULL,
  `user_cabang` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("3","Seniman Koding","086798890000","Surabaya","senimankoding@gmail.com","6afd3b745ca3190e8b318e043a28c239","30 March 2020 9:17:00 pm","super admin","1","1");
INSERT INTO user VALUES("5","Doni Asrul Afandi","085780956487","Surabaya","doniasrulafandi@gmail.com","bccb26dc1e77cc8047cb3b6385b96bf2","08 April 2020 3:40:08 pm","admin","1","0");
INSERT INTO user VALUES("7","Naga Afandi ","086798890000","Surabaya","superadmin@senimankoding.com","550e1bafe077ff0b0b67f4e32f29d751","16 April 2020 9:31:04 pm","super admin","0","0");
INSERT INTO user VALUES("8","Doni Afandi","085780956487","Surabaya","admin@senimankoding.com","6afd3b745ca3190e8b318e043a28c239","16 April 2020 9:32:06 pm","admin","1","0");
INSERT INTO user VALUES("12","Kurir Pusat Budi","082299878989","Kediri jln pahlawan","kurir@senimankoding.com","6afd3b745ca3190e8b318e043a28c239","18 August 2021 5:21:01 pm","kurir","1","0");
INSERT INTO user VALUES("13","Rinto","08229908789","Surabaya Jawa Timur","kurir2@senimankoding.com","bccb26dc1e77cc8047cb3b6385b96bf2","19 August 2021 5:53:02 pm","kurir","1","0");
INSERT INTO user VALUES("14","Pak Sucripto","08229978909","Surabaya Jawa Timur Indonesia","kurir3@senimankoding.com","6afd3b745ca3190e8b318e043a28c239","21 August 2021 10:38:10 am","kurir","1","0");
INSERT INTO user VALUES("15","Kasir","087654567809","Surabaya","kasir@senimankoding.com","6afd3b745ca3190e8b318e043a28c239","04 September 2021 1:31:34 pm","kasir","1","0");

