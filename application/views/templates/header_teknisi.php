<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap/css/bootstrap.min.css">

    <!--Font Awesome  -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/fontawesome/css/all.min.css">

    <!-- Data Tables -->
    <link rel="stylesheet" href="<?= base_url() ?>vendor/datatables/jquery.dataTables.min.css">

    <title><?php if (!empty($page_title)) echo $page_title; ?></title>
</head>

<header>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
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