@include('layouts.header');
@include('layouts.sidebar');

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Unit Kerja</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Unit Kerja</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Unit Kerja</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                </div>
                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#inputModal">Tambah</button>
                <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="inputModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="inputModalLabel">Tambah Unit Kerja</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('unit_kerja/update/'.$unit_kerja->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" value="{{ $unit_kerja->nama }}" id="nama" name="nama" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" style="box-shadow: 0 8px 15px rgba(247, 147, 29, 0.4);">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                Footer
            </div>
        </div>
    </section>
</div>

@include('layouts.footer');
