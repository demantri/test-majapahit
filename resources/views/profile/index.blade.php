@extends('layout.template')

@section('tab_name', '- Profile')
@section('page-header-title', 'Profile')
@section('tab_menu', 'Masterdata')
@section('sub_tab_menu', 'Profile')

@section('content')
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Table Profile</h5>
            <div class="card-body">
                @if (Auth::user()->username == 'admin')
                <button class="btn btn-primary" id="btnTambah" data-toggle="modal" data-target="#tambah">Tambah</button>
                @endif
                <div>
                    <div id="notif">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('error'))
                            <div class="alert alert-danger">
                                {{ Session::get('error') }}
                            </div>
                        @endif
                    </div>
                    <form action="#" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <div class="col-12 col-sm-8 col-lg-3">
                                        <input type="text" placeholder="Username" class="form-control" id="fuser">
                                    </div>
                                    <div class="col-12 col-sm-8 col-lg-3">
                                        <input type="text" placeholder="Email" class="form-control" id="femail">
                                    </div>
                                    <div class="col-12 col-sm-8 col-lg-3">
                                        <input type="text" placeholder="Pekerjaan" class="form-control" id="fpekerjaan">
                                    </div>
                                    <div class="col-12 col-sm-8 col-lg-3">
                                        <input type="text" placeholder="Pendidikan Terakhir" class="form-control" id="fpendidikan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <hr>
                <div class="table-responsive">
                    <table id="example" class="table table-striped first">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Pekerjaan</th>
                                <th>Nama Lengkap</th>
                                <th>Pendidikan Terakhir</th>
                                @if (Auth::user()->username == 'admin')
                                <th></th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($data as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->username}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->alamat_ktp}}</td>
                                <td>{{$item->pekerjaan}}</td>
                                <td>{{$item->nama_lengkap}}</td>
                                <td>{{$item->pendidikan_terakhir}}</td>
                                @if (Auth::user()->username == 'admin')
                                <td class="text-center">
                                    <a href=""
                                    class="btn btn-sm btn-warning btn-edit"
                                    data-target="#edit"
                                    data-toggle="modal"
                                    data-id="{{$item->id}}"
                                    data-pekerjaan="{{$item->pekerjaan}}"
                                    data-pendidikan="{{$item->pendidikan_terakhir}}"
                                    data-nama_lengkap="{{$item->nama_lengkap}}"
                                    data-alamat="{{$item->alamat_ktp}}"

                                        >Edit</a>
                                    <a href="/hapus/{{$item->id}}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Ingin Menghapus Data Ini?')">Hapus</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('profile.tambah')
@include('profile.edit')
@include('script')
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
        });
        $('#fuser').on('keyup', function () {
            table.columns(1).search(this.value).draw();
        } );
        $('#femail').on('keyup', function () {
            table.columns(2).search(this.value).draw();
        } );
        $('#fpekerjaan').on('keyup', function () {
            table.columns(4).search(this.value).draw();
        } );
        $('#fpendidikan').on('keyup', function () {
            table.columns(6).search(this.value).draw();
        } );
    });
    $(document).on('click', '.btn-edit', function () {
        var id_profile = $(this).data('id')
        var pekerjaan = $(this).data('pekerjaan')
        var pendidikan = $(this).data('pendidikan')
        var nama_lengkap = $(this).data('nama_lengkap')
        var alamat = $(this).data('alamat')

        // alert(id_profile)

        $('.modal-body #id_profile').val(id_profile)
        $('.modal-body #pekerjaan').val(pekerjaan)
        $('.modal-body #pendidikan').val(pendidikan)
        $('.modal-body #nama_lengkap').val(nama_lengkap)
        $('.modal-body #alamat').val(alamat)
    })
</script>
@endsection
