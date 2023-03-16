@extends('layouts.dashboard')

@section('title', 'User Management')

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

      <div class="content-header row">
         <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Master Data</h3>
            <div class="row breadcrumbs-top d-inline-block">
               <div class="breadcrumb-wrapper col-12">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item">Dashboard</li>
                     <li class="breadcrumb-item active">User Management</li>
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
                           <h4 class="card-title text-white">Tambah Petugas</h4>
                           <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
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

                           <form class="form form-horizontal" action="{{ route('backsite.user.store') }}"
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

      {{-- table card --}}
      <div class="content-body">
         <section id="table-home">
            <!-- Zero configuration table -->
            <div class="row">
               <div class="col-12">
                  <div class="card">
                     <div class="card-header">
                        <h4 class="card-title">Data Kategori Pengaduan</h4>
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
                              <table class="table table-striped table-bordered text-inputs-searching default-table">
                                 <thead>
                                    <tr>
                                       <th>Nama Petugas</th>
                                       <th>Email</th>
                                       <th>Role</th>
                                       <th style="text-align:center; width:150px;">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    @forelse ($petugas as $key => $value)
                                      <tr data-entry-id="{{ $value->id }}">
                                        <td>{{ $value->nama }}</td>
                                        <td>{{ $value->email }}</td>
                                        <td>{{ $value->role }}</td>
                                        <td class="text-center">

                                          <div class="btn-group mr-1 mb-1">
                                             <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">Action</button>
                                             <div class="dropdown-menu">
                                                <a class="dropdown-item"
                                                   href="{{ route('backsite.user.edit', $value->id) }}">
                                                   Edit
                                                </a>

                                                <form action="" method="POST"
                                                   onsubmit="return confirm('Are you sure want to delete this data ?');">
                                                   <input type="hidden" name="_method" value="DELETE">
                                                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                   <input type="submit" class="dropdown-item" value="Delete">
                                                </form>

                                             </div>
                                          </div>
                                       </td>
                                      </tr>
                                    @empty
                                        {{-- No data --}}
                                    @endforelse
                                 </tbody>
                                 <tfoot>
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
<!-- END: Content -->
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