<div class="modal fade" id="modal-delete-{{ $product->id }}">
  <div class="modal-dialog">
    <form action="/products/{{ $product->id }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Hapus Produk</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah anda yakin akan menghapus data ini&hellip;</p>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-outline-danger">Hapus</button>
        </div>
      </div>
    </form>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>