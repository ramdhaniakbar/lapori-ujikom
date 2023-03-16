@extends('layouts.dashboard')

@section('title', 'Pengaduan')

@section('content')
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">

        {{-- error --}}
        @if ($errors->any())
        <div class="alert bg-danger alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- breadcumb --}}
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">Pengaduan</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Pengaduan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- add card --}}
        <div class="content-body">
            <section id="add-home">
                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header bg-success text-white">
                                <a data-action="collapse">
                                    <h4 class="card-title text-white">Tanggapi</h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-plus"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </a>
                            </div>

                            <div class="card-content collapse hide">
                                <div class="card-body card-dashboard">

                                    <form class="form form-horizontal" action="{{ route('backsite.tanggapan.store') }}"
                                        method="POST">

                                        @csrf

                                        <div class="form-body">
                                            <div class="form-section">
                                                <p>Harap lengkapi input yang <code>required</code>, sebelum Anda
                                                    mengklik tombol
                                                    kirim.</p>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="isi_tanggapan">Isi
                                                    Tanggapan<code style="color:red;">required</code></label>
                                                <div class="col-md-9 mx-auto">

                                                    <textarea name="isi_tanggapan" id="isi_tanggapan" cols="30"
                                                        rows="10" class="form-control"
                                                        placeholder="contoh Baik, akan kami diskusikan"
                                                        autocomplete="off"
                                                        required>{{ old('isi_tanggapan') }}</textarea>

                                                    @if($errors->has('isi_tanggapan'))
                                                    <p style="font-style: bold; color: red;">{{
                                                        $errors->first('isi_tanggapan')
                                                        }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="tanggal_tanggapan">Tanggal
                                                    Tanggapan<code style="color:red;">required</code></label>
                                                <div class="col-md-9 mx-auto">
                                                    <input type="date" id="tanggal_tanggapan" name="tanggal_tanggapan"
                                                        class="form-control" placeholder="example admin or users"
                                                        value="{{old('tanggal_tanggapan')}}" autocomplete="off" required>

                                                    @if($errors->has('tanggal_tanggapan'))
                                                    <p style="font-style: bold; color: red;">{{
                                                        $errors->first('tanggal_tanggapan')
                                                        }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label class="col-md-3 label-control" for="pengaduan_id">Ke
                                                    Pengaduan<code style="color:red;">required</code></label>
                                                <div class="col-md-9 mx-auto">
                                                    <select name="pengaduan_id" id="pengaduan_id" class="form-control">
                                                        <option selected disabled>Pilih Pengaduan</option>
                                                        @foreach ($pengaduans_pending as $key => $pengaduan)
                                                        <option value="{{ $pengaduan->id }}">{{ $pengaduan->user->nik }} -
                                                            {{
                                                            $pengaduan->judul_pengaduan }}</option>
                                                        @endforeach
                                                    </select>

                                                    @if($errors->has('pengaduan_id'))
                                                    <p style="font-style: bold; color: red;">{{
                                                        $errors->first('pengaduan_id')
                                                        }}</p>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-actions text-right">
                                            <button type="submit" style="width:120px;" class="btn btn-cyan"
                                                onclick="return confirm('Are you sure want to save this data ?')">
                                                <i class="la la-check-square-o"></i> Submit
                                            </button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>

        {{-- table card --}}
        <div class="content-body">
            <section id="table-home">
                <!-- Zero configuration table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Pengaduan</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                    </ul>
                                </div>
                            </div>

                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">

                                    <div class="table-responsive">
                                        <table
                                            class="table table-striped table-bordered text-inputs-searching default-table">
                                            <thead>
                                                <tr>
                                                    <th>Judul Pengaduan</th>
                                                    <th>Isi Pengaduan</th>
                                                    <th>Lokasi Kejadian</th>
                                                    <th>Waktu Kejadian</th>
                                                    <th>Status</th>
                                                    <th style="text-align:center; width:150px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($pengaduans as $key => $pengaduan)
                                                <tr data-entry-id="{{ $pengaduan->id }}">
                                                    <td>{{ $pengaduan->judul_pengaduan }}</td>
                                                    <td>{{ Str::limit($pengaduan->isi_pengaduan, 70, '...') }}</td>
                                                    <td>{{ $pengaduan->lokasi_kejadian }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($pengaduan->tanggal_kejadian)) }}</td>
                                                    <td>{{ $pengaduan->status }}</td>
                                                    <td class="text-center">

                                                        <div class="btn-group mr-1 mb-1">
                                                            <button type="button"
                                                                class="btn btn-info btn-sm dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Action</button>
                                                            <div class="dropdown-menu">
                                                                <a href="#mymodal"
                                                                    data-remote="{{ route('backsite.pengaduan.show', $pengaduan->id) }}"
                                                                    data-toggle="modal" data-target="#mymodal"
                                                                    data-title="Detail Pengaduan" class="dropdown-item">
                                                                    Show
                                                                </a>

                                                                @if ($pengaduan->status == 'pending')
                                                                <a class="dropdown-item"
                                                                    href="{{ route('backsite.tanggapan.buat_tanggapan_by_id', $pengaduan->id) }}">
                                                                    Tanggapi
                                                                </a>
                                                                @endif

                                                                @if ($pengaduan->status == 'proses')
                                                                <form action="{{ route('backsite.pengaduan.status_selesai', $pengaduan->id) }}" method="POST"
                                                                    onsubmit="return confirm('Apa kamu yakin ingin menolak pengaduan ini?');">
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}">
                                                                    <input type="submit" class="dropdown-item"
                                                                        value="Selesai">
                                                                  </form>
                                                                @endif

                                                                @if ($pengaduan->status != 'ditolak')
                                                                  <form action="{{ route('backsite.pengaduan.tolak_status', $pengaduan->id) }}" method="POST"
                                                                    onsubmit="return confirm('Apa kamu yakin ingin menolak pengaduan ini?');">
                                                                    <input type="hidden" name="_method" value="PUT">
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}">
                                                                    <input type="submit" class="dropdown-item"
                                                                        value="Tolak">
                                                                  </form>
                                                                @else 
                                                                <form action="{{ route('backsite.pengaduan.status_kembali', $pengaduan->id) }}" method="POST"
                                                                  onsubmit="return confirm('Apa kamu yakin ingin mengembalikan status pengaduan ini?');">
                                                                  <input type="hidden" name="_method" value="PUT">
                                                                  <input type="hidden" name="_token"
                                                                      value="{{ csrf_token() }}">
                                                                  <input type="submit" class="dropdown-item"
                                                                      value="Kembalikan Status">
                                                                </form>
                                                                @endif

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @empty
                                                {{-- not found --}}
                                                @endforelse
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Judul Pengaduan</th>
                                                    <th>Isi Pengaduan</th>
                                                    <th>Lokasi Pengaduan</th>
                                                    <th>Status</th>
                                                    <th>Waktu Kejadian</th>
                                                    <th style="text-align:center; width:150px;">Action</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>
<!-- END: Content-->

@endsection

@push('after-script')
<script>
  jQuery(document).ready(function($){
           $('#mymodal').on('show.bs.modal', function(e){
               var button = $(e.relatedTarget);
               var modal = $(this);
               modal.find('.modal-body').load(button.data("remote"));
               modal.find('.modal-title').html(button.data("title"));
           });
       });

     $('.default-table').DataTable({
        "order": [],
        "paging": true,
        "lengthMenu": [ [5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, 'All'] ],
        "pageLength": 25
     });
</script>

<div class="modal fade" id="mymodal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
        <div class="modal-header">
           <h5 class="modal-title"></h5>
           <button class="btn close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
           </button>
        </div>
        <div class="modal-body">
           <i class="fa fa-spinner fa spin"></i>
        </div>
     </div>
  </div>
</div>
@endpush