<link rel="stylesheet" href="<?= base_url() ?>vendor/login.css">

<body class="text-center">
    <form class="form-signin" action="<?= base_url() ?>auth" method="POST">
        <img class="mb-4" src="<?= base_url() ?>assets/logo_login.jpg" alt="" width="100" height="100">
        <h2 class="h3 mb-3 font-weight-normal">Sistem</h2>
        <h2 class="h3 mb-3 font-weight-normal">Maintenance Report</h2>

        <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Password Berhasil Diganti <br>
                Silahkan Login Ulang !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="username" name="username" class="form-control" placeholder="Username..." required autofocus autocomplete="off">

        <br>

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password..." required>
        <!-- <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div> -->
        <hr>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
        <p class="mt-5 text-muted">PT.Charoen Pokphand Indonesia </p>
        <p class="text-muted">Developer : William </p>
    </form>
</body>

</html>

<script src="<?= base_url() ?>vendor/sweetalert.js"></script>

<?php if ($this->session->flashdata('gagal_login')) : ?>
    <script>
        Swal.fire(
            'Error',
            'Username/Password Salah!',
            'error'
        )
    </script>
<?php endif; ?>

<?php if ($this->session->flashdata('penyusup')) : ?>
    <script>
        Swal.fire(
            'Error',
            'Silahkan login terlebih dahulu!',
            'warning'
        )
    </script>
<?php endif; ?>