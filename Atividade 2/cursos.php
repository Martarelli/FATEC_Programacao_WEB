<?php 

require_once "header_inc.php"; 
require_once "curso.php";

$cursos = Curso::listarCursos();




?>

<div class="p-4 mb-4 bg-light">
  <h1 class="display-5">Cursos</h1>
  <hr class="my-3">
  <p class="lead">Conheça os cursos disponíveis em nossa plataforma.</p>
</div>

<br />
<div class="container">
  <?php foreach ($cursos as $curso) { ?>
    

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading"><?= $curso->getNome()?></h2>
      <p class="lead"><?= $curso->getDescricao()?></p>
      <p class="lead"><a href="#"><button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Saiba mais</button></a></p>
    </div>
    <div class="col-md-5">
      <figure class="figure">
          <img src="<?= $curso->getImagem()?>" class="figure-img img-fluid rounded" alt="Curso de PHP">
      </figure>
    </div>
  </div>
  <hr class="featurette-divider">
  <?php  }?>
</div>

<?php require_once "footer_inc.php"; ?>