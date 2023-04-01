<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.css">
    <!-- JavaScript -->
    <script src="/js/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="/js/sweetalert.js"></script>
</head>

<body class="antialiased">
<section class="d-flex justify-content-center align-items-center flex-column section-home bg-light">
    <h2 class="text-center">Seja Bem vindo à Tayouza Surveys</h2>
    <a type="button" href="/survey" class="btn btn-success w-50">Enquetes</a>
</section>
</body>
</html><?php /**PATH /home/tayouzadev/Documents/Projects/Enquetes/resources/views/home.blade.php ENDPATH**/ ?>