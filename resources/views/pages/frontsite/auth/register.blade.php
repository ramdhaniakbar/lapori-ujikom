@extends('layouts.app')

@section('title', 'Sign up')

@section('content')
<div class="container-padded-auth mx-auto">
   <div class="flex min-h-screen items-center">
      <div class="flex flex-col basis-full">
         <h1 class="text-[44px] font-semibold mb-[44px]">Buat akun lapor!</h1>
         <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <div class="flex flex-col space-y-2 mb-5">
               <label for="nik" class="font-medium">NIK</label>
               <input type="text" id="nik" name="nik" value="{{ old('nik') }}"
                  class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('nik') border-red-color @enderror">

               @error('nik')
               <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
               @enderror
            </div>

            <div class="flex flex-col space-y-2 mb-5">
               <label for="nama" class="font-medium">Nama</label>
               <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                  class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('nama') border-red-color @enderror">

               @error('nama')
               <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
               @enderror
            </div>

            <div class="flex flex-col space-y-2 mb-5">
               <label for="email" class="font-medium">Email</label>
               <input type="email" id="email" name="email" value="{{ old('email') }}"
                  class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('email') border-red-color @enderror">

               @error('email')
               <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
               @enderror
            </div>

            <div class="flex flex-col space-y-2 mb-5">
               <label for="password" class="font-medium">Password</label>
               <input type="password" id="password" name="password"
                  class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('password') border-red-color @enderror">

               @error('password')
               <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
               @enderror
            </div>

            <div class="flex flex-col space-y-2 mb-8">
               <label for="password_confirmation" class="font-medium">Konfirmasi Password</label>
               <input type="password" id="password_confirmation" name="password_confirmation"
                  class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl">
            </div>

            <div class="flex flex-col space-y-6">
               <button type="submit" class="bg-black-color text-white-color font-semibold py-3.5 rounded-xl">Create
                  account</button>
               <span class="text-paragraph-color text-center">Sudah punya akun? <a href="{{ route('login.index') }}"
                     class="text-black-color">Log in.</a></span>
            </div>

         </form>
      </div>
   </div>
</div>
@endsection