<nav class="flex justify-between items-center mx-10 my-5">
  <a href="{{ route('index') }}" class="flex items-center space-x-3">
     <img src="{{ asset('assets/frontsite/images/profile2user.svg') }}" alt="Logo">
     <span class="text-2xl font-semibold text-black-color">lapor!</span>
  </a>
  <ul class="flex py-3 px-6 text-black-color font-semibold border border-light-gray rounded-full">
     <li class="mr-6">
        <a href="{{ route('index') }}">Home</a>
     </li>
     <li class="mr-6">
        <a href="{{ route('lapor.create') }}">Buat Laporan</a>
     </li>
     <li class="mr-6">
        <a href="#">Tentang Lapor!</a>
     </li>
     <li>
        <a href="#">Laporan</a>
     </li>
  </ul>
  @guest(session('guard'))
  <div class="space-x-3.5">
     <a href="{{ route('login.index') }}" class="text-black-color font-semibold">Log in</a>
     <a href="{{ route('register.index') }}"
        class="px-5 py-2.5 bg-black-color text-white-color font-semibold rounded-full">Sign up</a>
  </div>
  @endguest

  @auth(session('guard'))
  <div class="hidden lg:ml-10 lg:flex lg:items-center pl-4 pt-2">
     <div x-data="{ profileDekstopOpen: false }" class="ml-3 relative">
        <div>
           <button type="button" class="bg-white rounded-full flex text-sm focus:outline-none" id="user-menu-button"
              aria-expanded="false" aria-haspopup="true" @click="profileDekstopOpen = ! profileDekstopOpen">
              <!-- focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 -->
              <span class="sr-only">Open user menu</span>
              <div class="text-right mr-5">
                 <div class="text-base font-medium text-black-color">
                    Hi,
                    {{ Auth::guard(session('guard'))->user()->nama }}
                 </div>
                 {{-- this section must read from type user --}}
                 <div class="text-sm text-paragraph-color capitalize">{{ Auth::guard(session('guard'))->user()->role ??
                    'Masyarakat' }}
                 </div>
              </div>
              <img class="h-12 w-12 rounded-full ring-1 ring-offset-4 ring-dark-gray"
                 src="{{ asset('assets/frontsite/images/user-profile.svg') }}" alt="User Profile" />
           </button>
        </div>
        <div x-show="profileDekstopOpen" @click.outside="profileDekstopOpen = false"
           x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
           x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
           x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
           class="origin-top-right absolute z-30 right-0 mt-2 w-48 rounded-md card-shadow border border-light-gray py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
           role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
           <a href="#" class="block px-4 py-2 text-sm text-black-color hover:bg-light-gray" role="menuitem"
              tabindex="-1" id="user-menu-item-0">Profile Kamu</a>
           @if (Session::get('guard') == 'web')
           <a href="" class="block px-4 py-2 text-sm text-black-color hover:bg-light-gray"
           role="menuitem" tabindex="-1" id="user-menu-item-0">Laporan Kamu</a>
           @else
           <a href="{{ route('backsite.dashboard.index') }}" class="block px-4 py-2 text-sm text-black-color hover:bg-light-gray"
           role="menuitem" tabindex="-1" id="user-menu-item-0">Dashboard</a>
           @endif
           <a href="{{ route('logout') }}" onclick="event.preventDefault(); logoutForm();"
              class="block px-4 py-2 text-sm text-black-color hover:bg-light-gray" role="menuitem" tabindex="-1"
              id="user-menu-item-2">
              Sign out

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                 @csrf
              </form>
           </a>
        </div>
     </div>
  </div>
  @endauth
</nav>

<script>
  function logoutForm() {
     Swal.fire({
        title: 'Sign out',
        text: "Anda akan keluar?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal!'
     }).then((result) => {
        if (result.isConfirmed) {
           document.getElementById('logout-form').submit()
        }
     }) 
  }
</script>