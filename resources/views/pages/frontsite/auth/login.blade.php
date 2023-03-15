@extends('layouts.app')

@section('title', 'Log in')

@section('content')
<div class="container-padded-auth mx-auto">
   <div class="flex min-h-screen items-center">
      <div class="flex flex-col basis-full">
         <h1 class="text-[44px] font-semibold mb-[44px]">Log in ke lapor!</h1>

         <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <div class="flex flex-col space-y-2 mb-5">
               <label for="email" class="font-medium">Email</label>
               <input type="email" id="email" name="email" value="{{ old('email') }}"
                  class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('email') border-red-color @enderror">

               @error('email')
               <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
               @enderror
            </div>

            <div class="flex flex-col space-y-2 mb-8">
               <label for="password" class="font-medium">Password</label>
               <input type="password" id="password" name="password"
                  class="w-full py-3.5 px-[20px] border-[1.5px] border-input-color focus:outline-dark-gray rounded-xl @error('password') border-red-color @enderror">

               @error('password')
               <p class="mt-2 text-sm text-red-color">{{ $message }}</p>
               @enderror
            </div>

            <div class="flex flex-col space-y-6">
               <button type="submit" class="bg-black-color text-white-color font-semibold py-3.5 rounded-xl">Log
                  in</button>
               <span class="text-paragraph-color text-center">Belum punya akun? <a href="{{ route('register.index') }}"
                     class="text-black-color">Sign up.</a></span>
            </div>

         </form>
      </div>
   </div>
</div>
@endsection