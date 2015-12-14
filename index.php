<?php
//Header
require_once('includes/header.php');

require_once('class/Cliente.php')
?>
<div class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Clientes</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</div>

<div class="container">

    <div class="text-center">
        <p class="lead"><i class="fa fa-users"></i> Clientes:</p>
        <?php
            $clientesAleatorios = Cliente::generateRandomClients(10);
        ?>

        <?php
            $clientes = Cliente::getArraySequence($clientesAleatorios);
        ?>

        <?php $i = 0; ?>

        <a href="index.php?sort=asc"><button class="btn btn-info btn-xs">Ascendente</button></a>
        <a href="index.php?sort=desc"><button class="btn btn-primary btn-xs">Descendente</button></a>
        <br>
        <?php foreach ($clientes as $cliente): ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion<?= $i ?>"
                           href="#collapse<?= $cliente->getNome(); ?>"><?= $cliente->getNome(); ?></a>
                    </h4>
                </div>
                <div id="collapse<?= $cliente->getNome() ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                        <ul>
                            <li>Endereco: <?= $cliente->getEndereco() ?></li>
                            <li>Cpf: <?= $cliente->getCPF() ?></li>
                            <li>Pessoa: <?= $cliente->getPessoa() == 0 ? "Fisica" : "Juridica" ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php

            $i++;
        endforeach;
        ?>
    </div>

</div><!-- /.container -->

<?php
//Header
require_once('includes/footer.php');
?>
