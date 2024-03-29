<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?> | Absensi Anggota</title>
	<link href="<?= base_url() ?>assets/img/avatar/logo_damkar.png" rel="icon" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .bg-login-image {
            background-image: url("<?= base_url('assets/img/avatar/logo_damkar.png'); ?>");
            background-repeat: no-repeat;
            background-size: 80%;
        }
		.bg-gradient-primary-v {
  background-color: #fc2f03 ;
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(10%, #fc2f03 ), to(#224abe));
  background-image: linear-gradient(180deg, #fc2f03  10%, #879879 100%);
  background-size: cover;
}
    </style>
</head>


<body class="bg-gradient-primary-v">

    <div class="container">

        <?= $contents; ?>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

</body>

</html>