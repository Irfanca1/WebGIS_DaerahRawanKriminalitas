<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <title><?= $title; ?></title>
  <?= $this->renderSection('head'); ?>

</head>

<body>
  <?php
  $uri = service('uri');
  ?>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Daerah Rawan Kriminalitas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <?php if (session()->get('isLoggedIn')) : ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == 'dashboard' ? 'active' : null) ?>">
              <a class="nav-link" href="/dashboard">Dashboard</a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'wilayah' ? 'active' : null) ?>">
              <a class="nav-link" href="/wilayah">Data Wilayah</a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'chat' ? 'active' : null) ?>">
              <a class="nav-link" href="/chat">Chat</a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'maps' ? 'active' : null) ?>">
              <a class="nav-link" href="/maps">Maps</a>
            </li>
          </ul>
          <ul class="navbar-nav my-2 my-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="/logout">Logout</a>
            </li>
          </ul>
        <?php else : ?>
          <ul class="navbar-nav mr-auto">
            <li class="nav-item <?= ($uri->getSegment(1) == '' ? 'active' : null) ?>">
              <a class="nav-link" href="/">Login</a>
            </li>
            <li class="nav-item <?= ($uri->getSegment(1) == 'register' ? 'active' : null) ?>">
              <a class="nav-link" href="/register">Register</a>
            </li>
          </ul>
        <?php endif; ?>
      </div>
    </div>
  </nav>