@extends('layouts.app')

@section('title', 'Semua Laporan')

@section('content')
{{-- BEGIN HEADER --}}
@include('components.frontsite.header')
{{-- END HEADER --}}

<div class="container-padded-home mx-auto mt-[110px]">
  <h1 class="font-bold text-[36px] text-title-color w-[518px] mb-[53px]">Semua Laporan Terbaru
  </h1>

  <div class="flex flex-col px-6 py-6 space-y-8 mb-[128px]">
    @forelse ($pengaduan_terbaru as $key => $value)
    <div class="w-full card-shadow rounded-lg p-[42px]">
      <h4 class="text-[20px] text-black-color font-semibold mb-4">{{ $value->judul_pengaduan }}</h4>
      <p class="text-[13px] font-medium text-paragraph-color mb-4">{{ $value->isi_pengaduan }}</p>
      <div class="flex justify-between items-center">
        <div class="flex items-center space-x-2.5">
          <img src="{{ asset('assets/frontsite/images/user-profile.svg') }}" class="w-[33px] rounded-full" alt="user_1">
          <span class="text-[13px] font-medium text-black-color">{{ $value->user->nama }}</span>
        </div>
        <div class="flex space-x-5">
          <span class="text-[12px] text-black-color">{{ $value->created_at->diffForHumans() }}</span>
        </div>
      </div>
    </div>
    @empty
    <p>Belum ada data!</p>
    @endforelse
    <nav class="pagination pagination-item mt-30">
      {{ $pengaduan_terbaru->links() }}
    </nav>
  </div>
</div>

<hr class="text-[#DBDBDB]">

<div class="container-padded-home mx-auto">

  {{-- BEGIN FOOTER --}}
  @include('components.frontsite.footer')
  {{-- END FOOTER --}}

</div>

@endsection