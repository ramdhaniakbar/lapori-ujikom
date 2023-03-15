@extends('layouts.app')

@section('title', 'Buat Laporan!')

@section('content')
{{-- BEGIN HEADER --}}
@include('components.frontsite.header')
{{-- END HEADER --}}

<div class="container-padded-home mx-auto mt-[110px]">
   <h1 class="font-bold text-[36px] text-title-color w-[518px] mb-[53px]">Buat Laporan Anda Sekarang, Kami Selalu Siap
   </h1>
   <form action="{{ route('lapor.store') }}" method="POST" enctype="multipart/form-data" class="mb-[126px]">
      @csrf

      <div class="flex space-x-5 mb-10">
         <div class="flex flex-col w-full space-y-2">
            <label for="title_report" class="font-medium">Ketik Judul Laporan Anda *</label>
            <input type="text" id="title_report" name="title_report" value="{{ old('title_report') }}"
               class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('title_report') border-red-color @enderror">

            @error('title_report')
            <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
            @enderror
         </div>

         <div class="flex flex-col w-full space-y-2">
            <label for="report_category_id" class="font-medium">Pilih Kategori Laporan Anda</label>
            <select name="report_category_id" id="report_category_id"
               class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('email') border-red-color @enderror"
               value="{{ old('report_category_id') }}">
               @foreach ($report_categories as $key => $report_category)
               <option value="{{ $report_category->id }}">{{ $report_category->name }}</option>
               @endforeach
            </select>

            @error('report_category_id')
            <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="flex space-x-5 mb-10">
         <div class="flex flex-col w-full space-y-2">
            <label for="incident_date" class="font-medium">Pilih Tanggal Kejadian *</label>
            <input type="date" id="incident_date" name="incident_date" value="{{ old('incident_date') }}"
               class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('incident_date') border-red-color @enderror">

            @error('incident_date')
            <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
            @enderror
         </div>

         <div class="flex flex-col w-full space-y-2">
            <label for="location_incident" class="font-medium">Ketik Lokasi Kejadian *</label>
            <input type="text" id="location_incident" name="location_incident" value="{{ old('location_incident') }}"
               class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('location_incident') border-red-color @enderror">

            @error('location_incident')
            <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="flex flex-col w-full space-y-2 mb-10">
         <label for="report_image" class="font-medium">Upload Bukti Foto</label>
         <input type="file" id="report_image" name="report_image" value="{{ old('report_image') }}"
            class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('report_image') border-red-color @enderror">

         @error('report_image')
         <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
         @enderror
      </div>

      <div class="flex space-x-5 mb-10">
         <div class="flex flex-col w-full space-y-2">
            <label for="body_report" class="font-medium">Ketik Isi Laporan Anda *</label>
            <textarea name="body_report" id="body_report" cols="30" rows="10"
               class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('body_report') border-red-color @enderror">{{ old('body_report') }}</textarea>

            @error('body_report')
            <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
            @enderror
         </div>
      </div>

      <div class="flex space-x-2">
         <button type="submit" class="bg-black-color text-white-color font-semibold py-3.5 rounded-xl w-2/4">Buat
            Laporan!
         </button>
      </div>

   </form>

</div>

<hr class="text-[#DBDBDB]">

<div class="container-padded-home mx-auto">

   {{-- BEGIN FOOTER --}}
   @include('components.frontsite.footer')
   {{-- END FOOTER --}}

</div>

@endsection