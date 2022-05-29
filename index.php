<?php
include 'assets/dist/php/sql.php';
include 'assets/dist/php/functions.php';

?>
<!doctype html>
<html lang="pt-BR">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Hállan Lima">
<meta name="generator" content="Hugo 0.84.0">
<title> Apontamento de Horas </title>

<link rel="stylesheet" href="assets/dist/css/style.css">

<!-- Bootstrap core CSS -->
<link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
<link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/footers/">

<!-- Custom styles for this template -->
<link href="assets/dist/css/dashboard.css" rel="stylesheet">

<!-- datepickers core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="assets/dist/css/bootstrap-datetimepicker.min.css">

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head> 
<?php

$url = (isset($_GET['url'])) ? $_GET['url']:'index';
if ($url == 'relatorio') {
    include 'assets/pages/relatorio.php';
}
if ($url == 'index') {
    include 'assets/pages/home.php';
}



?>

<!-- datepickers core JS -->
<script src="assets/dist/js/jquery.min.js"></script>
<script src="assets/dist/js/popper.js"></script>
<script src="assets/dist/js/moment-with-locales.min.js"></script>
<script src="assets/dist/js/bootstrap-datetimepicker.min.js"></script>
<script src="assets/dist/js/main.js"></script>

<!-- Bootstrap core JS -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
<script src="assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/dist/js/dashboard.js"></script>

<script language="JavaScript" type="text/javascript" src="assets/dist/js/script.js"></script>
