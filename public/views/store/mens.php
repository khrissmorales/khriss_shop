<div class="container py-5">
  <div class="text-center mb-5">
    <h1 class="fw-bold">Colección para Hombres</h1>
    <p class="lead text-muted">Explora lo mejor en moda masculina. Estilo, confort y calidad para cada ocasión.</p>
      <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="?controller=views&action=register" class="btn btn-dark btn-lg mt-3">Descubre tu estilo</a>
      <?php endif; ?>
  </div>

  <div class="row justify-content-center text-center">
    <div class="col-md-6 col-lg-4 mb-4">
      <img src="assets/img/ropa_hombre.jpg" class="img-fluid rounded-3 shadow-sm mb-3" alt="Ropa de hombre">
      <h4>Ropa</h4>
      <p>Camisas, pantalones, chaquetas y más. Viste con personalidad y confianza.</p>
    </div>
    <div class="col-md-6 col-lg-4 mb-4">
      <img src="assets/img/ropa_hombre.jpg" class="img-fluid rounded-3 shadow-sm mb-3" alt="Calzado de hombre">
      <h4>Calzado</h4>
      <p>Desde zapatillas deportivas hasta zapatos elegantes. Camina con estilo.</p>
    </div>
  </div>
</div>
