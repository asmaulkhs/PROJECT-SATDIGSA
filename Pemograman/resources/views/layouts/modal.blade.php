<!-- Modal -->
<div class="modal fade" id="logoutmodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="logoutmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="logoutmodalLabel"></h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body fw-semibold">
          Apakah anda yakin ingin Logout?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <form action="/logout" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Logout</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  @isset($surat) 
    <div class="modal fade" id="deletemodal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletemodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="deletemodalLabel"></h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body fw-semibold">
            Apakah anda yakin ingin Menghapus surat ini?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form action="/arsip/{{ $surat->id }}/acc">
            @csrf
            <button type="submit" name="action" class="btn btn-danger" value="2">Hapus</button>
            </form>
        </div>
        </div>
    </div>
    </div>
@endisset