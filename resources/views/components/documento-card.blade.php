<div class="col mb-3 w-100">
  <div class="border rounded p-2 d-flex align-items-center justify-content-between w-100
      {{ $documentos->has($tipo) ? 'border-success' : 'border-secondary' }}">

    {{-- Etiqueta --}}
    <div class="fw-semibold d-flex align-items-center me-3" style="min-width: 120px;">
      <i class="bi bi-file-earmark-text me-1"></i> {{ $label }}
    </div>

    {{-- Formulario --}}
    <form action="{{ route('documentos.store', ['formulario' => $formulario->id]) }}"
          method="POST" enctype="multipart/form-data"
          class="d-flex align-items-center gap-2 flex-grow-1 w-100">
      @csrf

      <input type="hidden" name="tipo" value="{{ $tipo }}">

      {{-- Input archivo --}}
      <input type="file" name="archivo" class="form-control form-control-sm flex-grow-1"
             accept=".pdf,.jpg,.jpeg,.png" required>

      {{-- Botón subir/reemplazar --}}
      <button type="submit"
              class="btn btn-sm d-flex align-items-center gap-1
              {{ $documentos->has($tipo) ? 'btn-outline-success' : 'btn-primary' }}">
        <i class="bi bi-cloud-upload-fill"></i>
        <span>{{ $documentos->has($tipo) ? 'Reemplazar' : 'Subir' }}</span>
      </button>

      {{-- Botón ver documento (si existe) --}}
      @if ($documentos->has($tipo))
        <a href="{{ asset('storage/' . $documentos[$tipo]->archivo) }}" target="_blank"
           class="btn btn-outline-secondary btn-sm d-flex align-items-center justify-content-center ms-2"
           style="width: 36px; height: 36px;" title="Ver Documento">
          <i class="bi bi-eye-fill"></i>
        </a>
      @endif
    </form>

    {{-- Icono check si ya está subido --}}
    @if ($documentos->has($tipo))
      <i class="bi bi-check-circle-fill text-success ms-2 fs-5" title="Documento subido"></i>
    @endif
  </div>

  {{-- Fecha última subida --}}
  @if ($documentos->has($tipo))
    <div class="text-muted small mt-1 text-end">
      <i class="bi bi-clock me-1"></i>
      Última subida: {{ \Carbon\Carbon::parse($documentos[$tipo]->updated_at)->diffForHumans() }}
    </div>
  @endif
</div>
