<div class="modal fade" id="modalFormularioMundial" tabindex="-1" aria-labelledby="modalFormularioMundialLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalFormularioMundialLabel">Formulario Seguros Mundial</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body text-center">
        @auth
          <p class="mb-3">Haz clic en el siguiente botón para ir al formulario:</p>
          <a href="https://sarlaft.segurosmundial.com.co/forms/f/92c704c9-1967-4c90-b460-212af6bfa7fd" class="btn btn-primary-gradient" target="_blank">
            Ir al Formulario
          </a>

        @endauth
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
