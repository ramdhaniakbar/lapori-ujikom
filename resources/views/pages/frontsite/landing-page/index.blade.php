@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
{{-- BEGIN HEADER --}}
@include('components.frontsite.header')
{{-- END HEADER --}}

<div class="container-padded-home mx-auto">

   {{-- BEGIN HERO --}}
   @include('components.frontsite.hero')
   {{-- END HERO --}}

</div>

{{-- BEGIN LAPORAN SAAT INI --}}
<div class="w-full h-[267px] bg-black-color relative mb-[112px]"
   style="background-image: url({{ asset('assets/frontsite/images/message_background.svg') }}); background-repeat: space; background-position: center 10px;">
   <div class="flex justify-center items-center text-center h-full">
      <div class="flex flex-col">
         <div class="text-[#858690] font-bold text-[32px] uppercase inline-block">Jumlah Laporan Saat Ini</div>
         <div class="text-[#858690] font-bold text-[48px] inline-block">{{ $jumlah_pengaduan }}</div>
      </div>
   </div>
</div>
{{-- END LAPORAN SAAT INI --}}

<div class="container-padded-home mx-auto">

   {{-- BEGIN LAPORAN SELESAI --}}
   <h2 class="text-[32px] text-title-color font-semibold mb-[24px]">Laporan Selesai</h2>
   <div class="flex px-6 py-6 space-x-14 overflow-x-auto mb-[112px]">
      @forelse ($pengaduan_success as $key => $value)
      <div class="w-[404px] flex-shrink-0 card-shadow rounded-lg py-[26px] px-[24px] bg-white relative"
         style="background-image: url({{ asset('assets/frontsite/images/selesai.svg') }}); background-repeat: no-repeat; background-position: 280px 130px;">
         <a href="{{ route('lapor.show', $value->id) }}">
            <h4 class="text-[20px] text-black-color font-semibold mb-2.5">{{ $value->judul_pengaduan }}</h4>
         </a>
         <p class="text-[13px] font-medium text-paragraph-color mb-2.5">{{ $value->isi_pengaduan }}</p>
         <div class="flex items-center space-x-2.5">
            <img src="{{ asset('assets/frontsite/images/user-profile.svg') }}" class="w-[33px] rounded-full"
               alt="user_1">
            <span class="text-[13px] font-medium text-black-color">{{ $value->user->nama }}</span>
         </div>
      </div>
      @empty
      <p>Belum ada data!</p>
      @endforelse
   </div>
   {{-- END LAPORAN SELESAI --}}

   {{-- BEGIN LAPORAN TERBARU --}}
   <h2 class="text-[32px] text-title-color font-semibold mb-[24px]">Laporan Terbaru</h2>
   <div class="flex flex-col px-6 py-6 space-y-8 overflow-y-auto h-156 mb-[128px]">
      @forelse ($pengaduan_terbaru as $key => $value)
      <div class="w-full card-shadow rounded-lg p-[42px]">
         <h4 class="text-[20px] text-black-color font-semibold mb-4">{{ $value->judul_pengaduan }}</h4>
         <p class="text-[13px] font-medium text-paragraph-color mb-4">{{ $value->isi_pengaduan }}</p>
         <div class="flex justify-between items-center">
            <div class="flex items-center space-x-2.5">
               <img src="{{ asset('assets/frontsite/images/user-profile.svg') }}" class="w-[33px] rounded-full"
                  alt="user_1">
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
   </div>

   {{-- END LAPORAN TERBARU --}}
</div>

<hr class="text-[#DBDBDB]">


<div class="container-padded-home mx-auto">

   {{-- BEGIN FOOTER --}}
   @include('components.frontsite.footer')
   {{-- END FOOTER --}}

</div>

@endsection