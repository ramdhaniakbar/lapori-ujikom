@extends('layouts.dashboard')

@section('title', 'Tanggapan')

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
                <h3 class="content-header-title mb-0 d-inline-block">Tanggapan</h3>
                <div class="row breadcrumbs-top d-inline-block">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">Tanggapan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- table card --}}
        <div class="content-body">
            <section id="table-home">
                <!-- Zero configuration table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Data Tanggapan</h4>
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
                                                    <th>Isi Tanggapan</th>
                                                    <th>Tanggal Tanggapan</th>
                                                    <th>Judul Pengaduan</th>
                                                    <th>Status</th>
                                                    <th>Nama Petugas</th>
                                                    <th>Role</th>
                                                    <th style="text-align:center; width:150px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($tanggapans as $key => $tanggapan)
                                                <tr data-entry-id="{{ $tanggapan->id }}">
                                                  <td>{{ Str::limit($tanggapan->isi_tanggapan, 70, '...') }}</td>
                                                  <td>{{ date('d-m-Y', strtotime($tanggapan->tanggal_tanggapan)) }}</td>
                                                  <td>{{ $tanggapan->pengaduan->judul_pengaduan }}</td>
                                                  <td>{{ $tanggapan->pengaduan->status }}</td>
                                                    <td>{{ $tanggapan->petugas->nama }}</td>
                                                    <td>{{ $tanggapan->petugas->role }}</td>
                                                    <td class="text-center">

                                                        <div class="btn-group mr-1 mb-1">
                                                            <button type="button"
                                                                class="btn btn-info btn-sm dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Action</button>
                                                            <div class="dropdown-menu">
                                                                <a href="#mymodal"
                                                                    data-remote="{{ route('backsite.tanggapan.show', $tanggapan->id) }}"
                                                                    data-toggle="modal" data-target="#mymodal"
                                                                    data-title="Detail Tanggapan" class="dropdown-item">
                                                                    Show
                                                                </a>

                                                                <a class="dropdown-item"
                                                                    href="{{ route('backsite.tanggapan.edit', $tanggapan->id) }}">
                                                                    Edit
                                                                </a>

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