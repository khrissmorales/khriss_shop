<div class="container py-5">
  <div class="text-center mb-5">
    <h1 class="fw-bold">Colección para Niños</h1>
    <p class="lead text-muted">Ropa y calzado para los más pequeños. Comodidad, color y diversión en cada prenda.</p>
      <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="?controller=views&action=register" class="btn btn-warning btn-lg mt-3">Explorar colección</a>
      <?php endif; ?>
  </div>

  <div class="row justify-content-center text-center">
    <div class="col-md-6 col-lg-4 mb-4">
      <img src="assets/img/boys.avif" class="img-fluid rounded-3 shadow-sm mb-3" alt="Ropa de niños">
      <h4>Ropa</h4>
      <p>Colores vibrantes, diseños divertidos y comodidad para el día a día.</p>
    </div>
    <div class="col-md-6 col-lg-4 mb-4">
      <img src="assets/img/boys.avif" class="img-fluid rounded-3 shadow-sm mb-3" alt="Calzado de niños">
      <h4>Calzado</h4>
      <p>Zapatillas, sandalias y más para acompañar cada aventura.</p>
    </div>
  </div>
</div>
