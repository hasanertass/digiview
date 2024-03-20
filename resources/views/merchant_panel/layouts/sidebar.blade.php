<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main" style="background-color: #202020">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
            <img src="{{ asset('material-dashboard-master/') }}/assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">DiGİ VİEW</span>
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white active" href="{{ route('merchant.show', ['merchant' => $merchant->url]) }}" style="background-color: #00a01d">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('personinfo.show', ['personinfo' => $merchant->url]) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Kişisel Bilgiler</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('companyinfo.show', ['companyinfo' => $merchant->url]) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">apartment</i>
                    </div>
                    <span class="nav-link-text ms-1">Şirket Bilgileri</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('socialmedia.show', ['socialmedia' => $merchant->url]) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">groups_2</i>
                    </div>
                    <span class="nav-link-text ms-1">Sosyal Medya Hesapları</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('bankinfo.show', ['bankinfo' => $merchant->url]) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">account_balance</i>
                    </div>
                    <span class="nav-link-text ms-1">Banka Bilgileri</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('catalog.show', ['catalog' => $merchant->url]) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">feed</i>
                    </div>
                    <span class="nav-link-text ms-1">İndirilebilir İçerikler</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('password') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">change_circle</i>
                    </div>
                    <span class="nav-link-text ms-1">Şifre Değiştir</span>
                </a>
            </li>
            <li class="nav-item">
                @if ($merchant->packet_type == 'digiviewbusiness')
                <a class="nav-link text-white" href="{{ route('subuser.show', ['subuser' => $merchant->url]) }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person_add</i>
                    </div>
                    <span class="nav-link-text ms-1">Alt Kullanıcılar</span>
                </a>
                @else
                <a class="nav-link text-white disabled" href="#">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person_add</i>
                    </div>
                    <span class="nav-link-text ms-1">Alt Kullanıcılar</span>
                </a>
                @endif
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('logout') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">logout</i>
                    </div>
                    <span class="nav-link-text ms-1">Çıkış Yap</span>
                </a>
            </li>
        </ul>
    </div>
</aside>
