@extends('layout.main')
@section('pegawai')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header list-group-item list-group-item-action active">
                    Data Pegawai
                    <div class="toolbar">
                        <button type="button" data-toggle="modal" data-target="#modal-popout" id="btn-tambah-pegawai"
                            class="btn btn-light "><i class="bi bi-plus"></i> Tambah Data</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stripped" id="table-pegawai" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Tempat Tgl. Lahir</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                @foreach ($pegawai_profil as $row)
                                    <tr>
                                        <th>{{ $no++ }}</th>
                                        <td>{{ $row->nama_pegawai }}</td>
                                        <td>{{ $row->nip_pegawai }}</td>
                                        <td>{{ $row->ttl_pegawai }}</td>
                                        <td>{{ $row->email_pegawai }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-popout" role="dialog" style="z-index: 999999;">
        <div class="modal-dialog modal-dialog-popout modal-xl">
            <div class="modal-content">
                <div id="content_modal">
                    <div id="content_modal">
                        <div class="container ">
                            {{-- <input type="text" class="mt-3" name="id" id="id" value="{{ session('form_profile_dosen_id') }}"> --}}
                            <div class="tab-content" id="myTabContent">
                                <!-- Tab Profil Dosen Start Here -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        @foreach ($errors as $key => $value)
                                            <p>{{ $value }}</p>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="tab-pane fade active show" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <form action="{{ route('pegawai.profile') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="modal-title">
                                                    <h2>Menambah Data Pegawai</h5>
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal">x</button>
                                            </div>
                                            <div class="modal-body">
                                                <h2 class="text-primary"><u>Profil Pegawai</u></h2>
                                                <div class="row g-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">NIP/NIK</label>
                                                        <input type="text" name="nip_pegawai" class="form-control"
                                                            placeholder="NIP">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Nama Lengkap</label>
                                                        <input type="text" name="nama_pegawai" class="form-control"
                                                            placeholder="Nama Lengkap">
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <label class="form-label">Tempat Tgl. Lahir</label>
                                                        <input type="text" name="ttl_pegawai" class="form-control"
                                                            placeholder="Tempat Tgl. Lahir">
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <label class="form-label">Jenis Kelamin</label>
                                                        <select name="jenis_kelamin" class="form-control">
                                                            <option selected>-- Pilih Kelamin --</option>
                                                            <option value="L">Laki-Laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" name="email_pegawai" class="form-control"
                                                            placeholder="example@example">
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <label class="form-label">Website</label>
                                                        <input type="text" name="website_pegawai" class="form-control"
                                                            placeholder="Website">
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <label class="form-label">Keahlian</label>
                                                        <input type="text" name="keahlian" class="form-control"
                                                            placeholder="Keahlian">
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <label class="form-label">Pas Foto</label>
                                                        <input type="file" name="pas_foto" class="form-control"
                                                            accept=".jpeg,.jpg,.gif,.png">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                                <!-- Tab Profil Dosen End Here -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection
