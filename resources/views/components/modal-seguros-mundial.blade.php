<!-- Modal de Solicitar Póliza -->
<div id="modalCumplimiento" class="modal fade" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="{{ route('formulario.iniciarCumplimiento') }}" method="POST" id="cumplimientoForm">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Solicitar Póliza de Cumplimiento</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Selecciona tu tipo de persona para iniciar el proceso:</p>
          <div class="mb-3">
            <select class="form-select" name="tipo_persona" required>
              <option value="">Seleccione...</option>
              <option value="natural">Persona Natural</option>
              <option value="juridica">Persona Jurídica</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary-gradient">Continuar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // Detectar el hash #abrir-modal y mostrar el modal solo una vez
    if (window.location.hash === '#abrir-modal') {
      var modal = new bootstrap.Modal(document.getElementById('modalCumplimiento'));
      modal.show();

      // Limpia el hash para evitar que se vuelva a mostrar si se recarga
      history.replaceState(null, null, window.location.pathname + window.location.search);
    }
  });
</script>
