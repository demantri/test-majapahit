<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Profile</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/save_profile" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group row">
                        <label for="username" class="col-12 col-sm-4 col-form-label">Username</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" class="form-control" min="1" placeholder="Username" required="" id="username" name="username">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-12 col-sm-4 col-form-label">Email</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                        <input type="email" class="form-control" min="1" placeholder="Email" required="" id="email" name="email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-12 col-sm-4 col-form-label">Password</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                        <input type="password" class="form-control" min="1" placeholder="Password" required="" id="password" name="password">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="nama_lengkap" class="col-12 col-sm-4 col-form-label">Nama Lengkap</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" class="form-control" min="1" placeholder="Nama Lengkap" required="" id="nama_lengkap" name="nama_lengkap">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pendidikan" class="col-12 col-sm-4 col-form-label">Pendidikan Terakhir</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" class="form-control" min="1" placeholder="Pendidikan Terakhir" required="" id="pendidikan" name="pendidikan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-12 col-sm-4 col-form-label">Alamat</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                        <textarea name="alamat" id="alamat" class="form-control" cols="10" rows="5" placeholder="Alamat"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_telp" class="col-12 col-sm-4 col-form-label">No Telp</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                        <input type="number" class="form-control" min="1" placeholder="No Telp" required="" id="no_telp" name="no_telp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pekerjaan" class="col-12 col-sm-4 col-form-label">Pekerjaan</label>
                        <div class="col-12 col-sm-8 col-lg-6">
                        <input type="text" class="form-control" min="1" placeholder="Pekerjaan" required="" id="pekerjaan" name="pekerjaan">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
