<div class="container py-5">
    <div class="text-center mb-5">
      <h1 class="fw-bold">Bienvenido a LKZ STORE</h1>
      <p class="lead text-muted">Explora nuestra colección de ropa y calzado para hombres, mujeres y niños. Estilo, comodidad y calidad en un solo lugar.</p>
      <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="?controller=views&action=register" class="btn btn-primary btn-lg mt-3">Empieza a comprar</a>
      <?php endif; ?>
    </div>
  
    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <img src="assets/img/ropa_hombre.jpg" class="img-fluid rounded-3 shadow-sm mb-3" alt="Ropa de hombre">
        <h4>Hombre</h4>
        <p>Encuentra tu estilo con nuestra línea moderna y versátil para hombres.</p>
      </div>
      <div class="col-md-4 mb-4">
        <img src="assets/img/ropa_mujer.jpg" class="img-fluid rounded-3 shadow-sm mb-3" alt="Ropa de mujer">
        <h4>Mujer</h4>
        <p>Moda elegante y cómoda para cualquier ocasión.</p>
      </div>
      <div class="col-md-4 mb-4">
        <img src="assets/img/calzado.jpg" class="img-fluid rounded-3 shadow-sm mb-3" alt="Calzado">
        <h4>Calzado</h4>
        <p>Desde lo casual hasta lo deportivo. Encuentra el calzado perfecto.</p>
      </div>
    </div>
</div>