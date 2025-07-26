<div class="container py-5">
  <div class="text-center mb-5">
    <h1 class="fw-bold">Accesorios</h1>
    <p class="lead text-muted">Complementa tu outfit con nuestra selección de accesorios modernos y funcionales.</p>
      <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="?controller=views&action=register" class="btn btn-light btn-lg mt-3">Descubrir accesorios</a>
      <?php endif; ?>
  </div>

  <div class="row justify-content-center text-center">
    <div class="col-md-6 col-lg-4 mb-4">
      <img src="assets/img/accesorios.webp" class="img-fluid rounded-3 shadow-sm mb-3" alt="Bolsos">
      <h4>Bolsos</h4>
      <p>Estilo y espacio para llevar lo esencial a todas partes.</p>
    </div>
    <div class="col-md-6 col-lg-4 mb-4">
      <img src="assets/img/accesorios.webp" class="img-fluid rounded-3 shadow-sm mb-3" alt="Gorras y sombreros">
      <h4>Gorras & Sombreros</h4>
      <p>Protección y estilo para cada temporada.</p>
    </div>
  </div>
</div>
