<div class="container py-5">
  <div class="text-center mb-5">
    <h1 class="fw-bold">Ofertas Especiales</h1>
    <p class="lead text-muted">¡Aprovecha nuestros descuentos! Productos seleccionados a precios increíbles.</p>
      <?php if (!isset($_SESSION['user_id'])): ?>
        <a href="?controller=views&action=register" class="btn btn-danger btn-lg mt-3">Ver ofertas</a>
      <?php endif; ?>
  </div>

  <div class="row justify-content-center text-center">
    <div class="col-md-6 col-lg-4 mb-4">
      <img src="assets/img/ofertas.jpeg" class="img-fluid rounded-3 shadow-sm mb-3" alt="Ofertas en ropa">
      <h4>Ropa en oferta</h4>
      <p>Renueva tu clóset sin vaciar tu billetera.</p>
    </div>
    <div class="col-md-6 col-lg-4 mb-4">
      <img src="assets/img/ofertas.jpeg" class="img-fluid rounded-3 shadow-sm mb-3" alt="Ofertas en calzado">
      <h4>Calzado en oferta</h4>
      <p>Los mejores pares con grandes descuentos.</p>
    </div>
  </div>
</div>
