<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Clínica Veterinária</title>
  </head>
  <body>
    <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo BASEURL;?>">Clínica Veterinária</a>
            <div class="pos-f-t">
              <div class="collapse" id="navbarToggleExternalContent">
                <div class="bg-dark p-4">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="<?php echo BASEURL;?>/agendamento">NOSSOS SERVIÇOS</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link active" style="color: #ccc;" aria-current="page" href="<?php echo BASEURL;?>/painel">PAINEL DE CONTROLE (Administrador)</a>
                    </li>
                  </ul>
                </div>
              </div>
              <nav class="navbar navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              </nav>
            </div>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                  <a class="nav-link active border-right" style="padding: 10px 20px 10px 0;" aria-current="page" href="<?php echo BASEURL;?>/agendamento">NOSSOS SERVIÇOS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" style="padding: 10px 0 10px 20px; color: #ccc;" aria-current="page" href="<?php echo BASEURL;?>/painel">PAINEL DE CONTROLE (Administrador)</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <main class="container text-center">