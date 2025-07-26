<div class="container py-5">
  <div class="text-center mb-5">
    <h1 class="fw-bold">Colección para Mujeres</h1>
    <p class="lead text-muted">Encuentra lo último en moda femenina. Elegancia y comodidad para cada ocasión.</p>
      <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="?controller=views&action=register" class="btn btn-pink btn-lg mt-3">Ver colección</a>
      <?php endif; ?>
  </div>

  <div class="row justify-content-center text-center">
    <div class="col-md-6 col-lg-4 mb-4">
      <img src="assets/img/ropa_mujer.jpg" class="img-fluid rounded-3 shadow-sm mb-3" alt="Ropa de mujer">
      <h4>Ropa</h4>
      <p>Vestidos, blusas, pantalones y más. Todo para tu estilo único.</p>
    </div>
    <div class="col-md-6 col-lg-4 mb-4">
      <img src="assets/img/ropa_mujer.jpg" class="img-fluid rounded-3 shadow-sm mb-3" alt="Calzado de mujer">
      <h4>Calzado</h4>
      <p>Tacones, botas y flats para cada momento de tu día.</p>
    </div>
  </div>
</div>
