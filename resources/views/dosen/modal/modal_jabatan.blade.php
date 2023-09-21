<form action="{{ route('modal.send', ['id' => $dosen_profile->id, 'jenis' => 'jabatan']) }}" method="post">
    @csrf
    <input type="hidden" name="dosen_id" value="{{ $dosen_profile->id }}">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title">
                <h2>Jabatan</h2>
            </div>
            <button type="button" data-dismiss="modal">x</button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                </div>
                <div class="col-md-6">
                    <label>Institusi</label>
                    <input type="text" name="institusi" class="form-control" placeholder="Institusi">
                </div>
                <div class="col-md-6">
                    <label>Tahun</label>
                    <input type="number" name="tahun" class="form-control" placeholder="Tahun">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Tambah Data</button>
        </div>
    </div>
</form>
