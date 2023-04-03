<?php
include 'config/config.php';
include 'functions/connect.php';
include 'functions/products.php';
include 'layout/header.php';
?>
<main>
  <div class="row">
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="..." class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
          <img src="..." class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <?php
    $data = getProducts();

    while ($product = mysqli_fetch_assoc($data)) {
    ?>
      <div class="card" style="width: 18rem;">
        <img src="resources/images/productos/<?= $product["imagen"] ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?= $product["nombre"] ?></h5>
          <p class="card-text"><?= $product["descripcion"] ?></p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">Marca: <?= $product["marca"] ?></li>
          <li class="list-group-item">Precio: $<?= $product["precio"] ?></li>
          <li class="list-group-item">Disponible: <?= $product["stock"] ?></li>
        </ul>
      </div>
    <?php
    }
    ?>
  </div>
  <h1>HOLA MUNDO</h1>
</main>
<?php
include 'layout/footer.php';
