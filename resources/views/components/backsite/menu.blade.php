<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
  <div class="main-menu-content">
     <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class="{{ request()->is('backsite/dashboard') || request()->is('backsite/dashboard/*') ? 'active' : '' }}">
           <a href="{{ route('backsite.dashboard.index') }}">
              <i class=""></i><span class="menu-title" data-i18n="Dashboard">Dashboard</span>
           </a>
        </li>

        <li class=" navigation-header"><span data-i18n="Application">Application</span><i class="la la-ellipsis-h"
              data-toggle="tooltip" data-placement="right" data-original-title="Application"></i>
        </li>

        <li class="nav-item"><a href="#"><i class="{{ request()->is('backsite/user') || request()->is('backsite/user/*') || request()->is('backsite/*/user') || request()->is('backsite/*/user/*') ? 'bx bx-group bx-flashing' : 'bx bx-group' }}"></i><span class="menu-title"
                 data-i18n="Management Access">Management Access</span></a>
           <ul class="menu-content">
              <li class="{{ request()->is('backsite/user') || request()->is('backsite/user/*') || request()->is('backsite/*/user') || request()->is('backsite/*/user/*') ? 'active' : '' }}">
                 <a class="menu-item" href="{{ route('backsite.user.index') }}">
                    <i></i><span>Management User</span>
                 </a>
              </li>
           </ul>
        </li>

        <li class="nav-item"><a href="#"><i class="{{ request()->is('backsite/kategori_pengaduan') || request()->is('backsite/kategori_pengaduan/*') || request()->is('backsite/*/kategori_pengaduan') || request()->is('backsite/*/kategori_pengaduan/*') ? 'bx bx-customize bx-flashing' : 'bx bx-customize' }}"></i><span class="menu-title"
                 data-i18n="Management Access">Master Data</span></a>
           <ul class="menu-content">
              <li class="{{ request()->is('backsite/kategori_pengaduan') || request()->is('backsite/kategori_pengaduan/*') || request()->is('backsite/*/kategori_pengaduan') || request()->is('backsite/*/kategori_pengaduan/*') ? 'active' : '' }}">
                 <a class="menu-item" href="{{ route('backsite.kategori_pengaduan.index') }}">
                    <i></i><span>Kategori Pengaduan</span>
                 </a>
              </li>
           </ul>
        </li>

        <li class="nav-item"><a href="#"><i class="{{ request()->is('backsite/pengaduan') || request()->is('backsite/pengaduan/*') || request()->is('backsite/*/pengaduan') || request()->is('backsite/*/pengaduan/*') || request()->is('backsite/tanggapan') || request()->is('backsite/tanggapan/*') || request()->is('backsite/*/tanggapan') || request()->is('backsite/*/tanggapan/*') ? 'bx bx-hive bx-flashing' : 'bx bx-hive' }}"></i><span class="menu-title"
                 data-i18n="Operational">Operational</span></a>
           <ul class="menu-content">

              <li class="{{ request()->is('backsite/pengaduan') || request()->is('backsite/pengaduan/*') || request()->is('backsite/*/pengaduan') || request()->is('backsite/*/pengaduan/*') ? 'active' : '' }}">
                 <a class="menu-item" href="{{ route('backsite.pengaduan.index') }}">
                    <i></i><span>Pengaduan</span>
                 </a>
              </li>

              <li class="{{ request()->is('backsite/tanggapan') || request()->is('backsite/tanggapan/*') || request()->is('backsite/*/tanggapan') || request()->is('backsite/*/tanggapan/*') ? 'active' : '' }}">
                 <a class="menu-item" href="{{ route('backsite.tanggapan.index') }}">
                    <i></i><span>Tanggapan</span>
                 </a>
              </li>

           </ul>
        </li>

     </ul>
  </div>
</div>

<!-- END: Main Menu-->