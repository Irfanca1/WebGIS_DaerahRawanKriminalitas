<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css" />
</head>

<body>
    <?php
    $uri = service('uri');
    ?>

    <body>
        <div id="liveAlertPlaceholder"></div>
        <?php if (!session()->get('isLoggedIn')) : ?>
            <div class="alert alert-dark" role="alert">
                Silakan <a href="/login" class="alert-link">login</a> terlebih dahulu untuk memulai diskusi dengan orang lain.!
            </div>
        <?php endif; ?>
        <!-- ====== NAVBAR ====== -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
            <div class="container">
                <a class="navbar-brand fs-6" href="#">WEBGIS DAERAH RAWAN <br />
                    KRIMINALITAS BANDUNG</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php if (session()->get('isLoggedIn')) : ?>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <?php $role = session()->get('role'); ?>
                            <?php if ($role == 'admin') :  ?>
                                <li class="nav-item<?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
                                    <a class="nav-link" href="/dashboard">Dashboard</a>
                                </li>
                                <li class="nav-item<?= ($uri->getSegment(1) == 'wilayah' ? 'active' : null) ?>">
                                    <a class="nav-link" href="/wilayah">Data Wilayah</a>
                                </li>
                                <a class="btn btn-primary mx-2 <?= ($uri->getSegment(1) == 'keluar' ? 'active' : null) ?>" href="/logout">Keluar</a>
                            <?php elseif ($role == 'user') : ?>
                                <li class="nav-item mx-2">
                                    <a class="nav-link <?= ($uri->getSegment(1) == 'halaman_utama' ? 'active' : null) ?>" href="/halaman_utama">Halaman Utama</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link <?= ($uri->getSegment(1) == 'informasi' ? 'active' : null) ?>" href="/informasi">Informasi</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link <?= ($uri->getSegment(1) == 'maps' ? 'active' : null) ?>" href="/maps_user">Peta</a>
                                </li>
                                <li class="nav-item mx-2">
                                    <a class="nav-link <?= ($uri->getSegment(1) == 'diskusi' ? 'active' : null) ?>" href="/chat">Diskusi</a>
                                </li>
                                <a class="btn btn-primary mx-2 <?= ($uri->getSegment(1) == 'keluar' ? 'active' : null) ?>" href="/logout">Keluar</a>
                            <?php endif; ?>
                        </ul>
                    <?php else : ?>
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item mx-2">
                                <a class="nav-link <?= ($uri->getSegment(1) == 'halaman_utama' ? 'active' : null) ?>" href="/halaman_utama">Halaman Utama</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link <?= ($uri->getSegment(1) == 'informasi' ? 'active' : null) ?>" href="/informasi">Informasi</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link <?= ($uri->getSegment(1) == 'maps' ? 'active' : null) ?>" href="/maps_user">Peta</a>
                            </li>
                            <li class="nav-item mx-2">
                                <a class="nav-link <?= ($uri->getSegment(1) == 'diskusi' ? 'active' : null) ?>" href="/chat">Diskusi</a>
                            </li>
                        </ul>
                        <a class="btn btn-primary mx-2 <?= ($uri->getSegment(1) == 'login' ? 'active' : null) ?>" href="/login">Masuk</a>
                    <?php endif; ?>
                </div>
            </div>
        </nav>