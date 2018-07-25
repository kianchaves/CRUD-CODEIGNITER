<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/signin.css') ?>" rel="stylesheet">
	<title><?= $titulo ?> - medCad </title>
	<?= link_tag('assets/bootstrap/css/bootstrap.min.css') ?>
	<?= link_tag('assets/bootstrap/css/bootstrap-theme.min.css') ?>
	<style>
		.erro {
			color: #f00;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1 class="text-center"><?= $titulo ?></h1>
		<div class="col-md-6 col-md-offset-3">
			<div class="row">
				<?= form_open('cadastro/store')  ?>
					<div class="form-group">
						<label for="nome">Nome</label><span class="erro"><?php echo form_error('nome') ?  : ''; ?></span>
						<input type="text" name="nome" id="nome" class="form-control" value="<?= set_value('nome') ? : (isset($nome) ? $nome : '') ?>" autofocus='true' />
					</div>
					<div class="form-group">
						<label for="nome_hospital">Hospital</label><span class="erro"><?php echo form_error('nome_hospital') ?  : ''; ?></span>
						<input type="text" name="nome_hospital" id="nome_hospital" class="form-control" value="<?= set_value('nome_hospital') ? : (isset($nome_hospital) ? $nome_hospital : ''); ?>" />
					</div>
					<div class="form-group text-right">
						<input type="submit" value="Salvar" class="btn btn-success" />
					</div>
					<input type='hidden' name="id" value="<?= set_value('id') ? : (isset($id) ? $id : ''); ?>">
				<?= form_close(); ?>
			</div>
			<div class="row"><hr></div>
			<div class="row">
				<?= anchor('', 'Página Inicial') ?>
			</div>
		</div>	
	</div>
</body>
</html>