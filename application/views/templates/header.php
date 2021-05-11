<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta name="theme-color" content="#A0D3FF" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap/css/bootstrap.min.css">

    <!--Font Awesome  -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/fontawesome/css/all.min.css">

    <!-- Data Tables -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/datatables/jquery.dataTables.min.css">

    <!-- Datepicker -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/range-datepicker/daterangepicker.css">

    <link rel="manifest" href="manifest.json">
    <link rel="apple-touch-icon" href="icon-512.png">

    <title><?php if (!empty($page_title)) echo $page_title; ?></title>
</head>

<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="" class="navbar-brand d-flex align-items-center btn btn-info" data-toggle="modal" data-target="#modalMenu">
                <i class="fas fa-bars"></i>
                <strong>&nbsp;Menu</strong>
            </a>
            <div class="navbar-brand d-flex align-items-center">
                <strong>PT. Charoen Pokphand Indonesia</strong>
            </div>

            <a onclick="javacript:return confirm('Anda yakin keluar?')" href="<?= base_url() ?>auth/logout" class="navbar-brand d-flex align-items-center btn btn-danger">
                <i class="fas fa-sign-out-alt"></i>
                <strong> Keluar</strong>
            </a>
        </div>
    </div>
</header>