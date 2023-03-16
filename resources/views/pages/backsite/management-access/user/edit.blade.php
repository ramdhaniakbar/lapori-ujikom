@extends('layouts.dashboard')

@section('title', 'User - Edit')

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
              <li class="breadcrumb-item">User Management</li>
              <li class="breadcrumb-item active">Edit</li>
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
                <h4 class="card-title" id="horz-layout-basic">Edit Petugas</h4>
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
                 
                  <form class="form form-horizontal" action="{{ route('backsite.user.update', $user->id) }}"
                      method="POST">

                      @csrf

                      <div class="form-body">
                          <div class="form-section">
                            <p>Harap lengkapi input yang <code>required</code>, sebelum Anda mengklik tombol
                                kirim.</p>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="nama">Nama Petugas<code
                                  style="color:red;">required</code></label>
                            <div class="col-md-9 mx-auto">
                                <input type="text" id="nama" name="nama" class="form-control"
                                  placeholder="contoh John" value="{{ old('nama')}}" autocomplete="off"
                                  required>

                                @if($errors->has('nama'))
                                <p style="font-style: bold; color: red;">{{ $errors->first('nama') }}</p>
                                @endif
                            </div>
                          </div>

                          <div class="form-group row">
                            <label class="col-md-3 label-control" for="email">Email<code
                                  style="color:red;">required</code></label>
                            <div class="col-md-9 mx-auto">
                                <input type="email" id="email" name="email" class="form-control"
                                  placeholder="contoh john@gmail.com" value="{{old('email')}}" autocomplete="off"
                                  required>

                                @if($errors->has('email'))
                                <p style="font-style: bold; color: red;">{{ $errors->first('email') }}</p>
                                @endif
                            </div>
                          </div>

                          <div class="form-group row">
                          <label class="col-md-3 label-control" for="password">Password<code
                                style="color:red;">required</code></label>
                            <div class="col-md-9 mx-auto">
                              <input type="password" id="password" name="password" class="form-control"
                                  placeholder="********" value="{{old('password')}}" autocomplete="off"
                                  required>

                              @if($errors->has('password'))
                              <p style="font-style: bold; color: red;">{{ $errors->first('password') }}</p>
                              @endif
                            </div>
                          </div>

                        <div class="form-group row">
                        <label class="col-md-3 label-control" for="role">Role<code style="color:red;">required</code></label>
                        <div class="col-md-9 mx-auto">
                            <select name="role" id="role" class="form-control">
                                <option selected disabled>Pilih Role</option>
                                <option value="admin">Admin</option>
                                <option value="petugas">Petugas</option>
                            </select>

                            @if($errors->has('role'))
                            <p style="font-style: bold; color: red;">{{
                                $errors->first('role')
                                }}</p>
                            @endif
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