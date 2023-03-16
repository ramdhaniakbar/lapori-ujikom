@extends('layouts.dashboard')

@section('title', 'Kategori Pengaduan - Edit')

@section('content')
<!-- BEGIN: Content -->
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
        <h3 class="content-header-title mb-0 d-inline-block">Master Data</h3>
        <div class="row breadcrumbs-top d-inline-block">
          <div class="breadcrumb-wrapper col-12">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Dashboard</li>
              <li class="breadcrumb-item">Tanggapan</li>
              <li class="breadcrumb-item active">Tambah</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    {{-- forms --}}
    <div class="content-body">
      <!-- Basic form layout section start -->
      <section id="horizontal-form-layouts">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title mb-1" id="horz-layout-basic">Tambah Tanggapan Ke Pengaduan {{ $pengaduan->id }}</h4>
                <span class="text-dark-gray">Judul Pengaduan: {{ $pengaduan->judul_pengaduan }}</span>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                  <ul class="list-inline mb-0">
                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="card-content collpase show">
                <div class="card-body">
                  <div class="card-text">
                    <p>Harap lengkapi input yang <code>required</code>, sebelum Anda mengklik tombol
                      kirim.</p>
                  </div>
                  <form class="form form-horizontal" action="{{ route('backsite.tanggapan.store_tanggapan_by_id', $pengaduan->id) }}" method="POST">

                    @csrf

                    <div class="form-body">

                      <h4 class="form-section"><i class="fa fa-edit"></i>Form Kategori Tanggapan</h4>

                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="isi_tanggapan">Isi Tanggapan<code
                            style="color:red;">required</code></label>
                        <div class="col-md-9 mx-auto">
                          <textarea name="isi_tanggapan" id="isi_tanggapan" class="form-control" cols="30" rows="10" placeholder="contoh Baik, akan kami diskusikan dengan tim" value="{{ old('judul_pengaduan') }}" required></textarea>

                          @if($errors->has('isi_tanggapan'))
                          <p style="font-style: bold; color: red;">{{ $errors->first('isi_tanggapan') }}</p>
                          @endif
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-md-3 label-control" for="tanggal_tanggapan">Tanggal Tanggapan<code
                            style="color:red;">required</code></label>
                        <div class="col-md-9 mx-auto">
                          <input type="date" id="tanggal_tanggapan" name="tanggal_tanggapan" class="form-control"
                          value="{{ old('judul_pengaduan') }}" autocomplete="off"
                            required>

                          @if($errors->has('tanggal_tanggapan'))
                          <p style="font-style: bold; color: red;">{{ $errors->first('isi_tanggapan') }}</p>
                          @endif
                        </div>
                      </div>

                    </div>

                    <div class="form-actions text-right">
                      <a href="{{ route('backsite.pengaduan.index') }}" style="width:120px;"
                        class="btn bg-blue-grey text-white mr-1"
                        onclick="return confirm('Are you sure want to close this page? , Any changes you make will not be saved.')">
                        <i class="ft-x"></i> Cancel
                      </a>
                      <button type="submit" style="width:120px;" class="btn btn-cyan"
                        onclick="return confirm('Are you sure want to save this data?')">
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

  </div>
</div>
<!-- END: Content -->
@endsection

@push('after-script')

{{-- inputmask --}}
<script src="{{ asset('/assets/backsite/third-party/inputmask/dist/jquery.inputmask.js') }}"></script>
<script src="{{ asset('/assets/backsite/third-party/inputmask/dist/inputmask.js') }}"></script>
<script src="{{ asset('/assets/backsite/third-party/inputmask/dist/bindings/inputmask.binding.js') }}"></script>

<script>
  $(function() {
            $(":input").inputmask();
        });
</script>

@endpush