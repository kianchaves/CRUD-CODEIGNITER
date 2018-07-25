<?=
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="<?= base_url('assets/signin.css') ?>" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lista de pacients - medCad</title>
  <?= link_tag('assets/bootstrap/css/bootstrap.min.css') ?>
  <?= link_tag('assets/bootstrap/css/bootstrap-theme.min.css') ?>
</head>
<body>
  <div class="container">
    <h1 class="text-center">Bem vindo ao medCad!</h1>
    <div class="col-md-12">
      <div class="row">
        <?= anchor('cadastro/create', 'Novo Cadastro', array('class' => 'btn btn-success')); ?>
      </div>
      <div class="row">
      <h3><?= $cadastros -> num_rows(); ?> registros(s)</h3>
      </div>
      <div class="row">
      <? if ($cadastros->num_rows() > 0): ?>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Código</th>
              <th>Nome</th>
              <th>Hospital</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <? foreach($cadastros -> result() as $cadastro): ?>
            <tr>
              <td><?= $cadastro->id ?></td>
              <td><?= $cadastro->nome ?></td>
              <td><?= $cadastro->nome_hospital ?></td>
              <td><?= anchor("cadastro/edit/$cadastro->id", "Editar") ?>
                 | <?= anchor("cadastro/delete/$cadastro->id", "Excluir") ?>
            </tr>
            <? endforeach; ?>
          </tbody>
        </table>
        <? else: ?>
          <h4>Nenhum registro cadastrado.</h4>
        <? endif; ?>
      </div>
    </div>  
  </div>
<div class="modal fade" id="modal_confirmation">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Confirmação de Exclusão</h4>
      </div>
      <div class="modal-body">
        <p>Deseja realmente excluir o registro <strong><span id="nome_exclusao"></span></strong>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Agora não</button>
        <button type="button" class="btn btn-danger" id="btn_excluir">Sim. Acabe com ele</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<p><a href="<?= base_url('index.php/login/logout') ?>">Deslogar</a></p>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    

  <script>
  
    var base_url = "<?= base_url(); ?>";
  
    $(function(){
      $('.confirma_exclusao').on('click', function(e) {
          e.preventDefault();
          
          var nome = $(this).data('nome');
          var id = $(this).data('id');
          
          $('#modal_confirmation').data('nome', nome);
          $('#modal_confirmation').data('id', id);
          $('#modal_confirmation').modal('show');
      });
      
      $('#modal_confirmation').on('show.bs.modal', function () {
        var nome = $(this).data('nome');
        $('#nome_exclusao').text(nome);
      }); 
      
      $('#btn_excluir').click(function(){
        var id = $('#modal_confirmation').data('id');
        document.location.href = base_url + "index.php/cadastro/delete/"+id;
      });         
    });
  </script>
 

  
</body>
</html>