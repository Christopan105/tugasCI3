<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Ambil data user berdasarkan session id
$id = $this->session->userdata('id');
$nama = $this->db->get_where('account', ['id' => $id])->row_array();
?>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>CHRISTOPAN</title>

<!-- Custom fonts for this template -->
<link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="<?= base_url('assets/css/sb-admin-2.min.css'); ?>" rel="stylesheet">
<link href="<?= base_url('assets/css/style.css'); ?>" rel="stylesheet">