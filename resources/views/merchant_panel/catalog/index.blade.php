<!DOCTYPE html>
<html lang="en">
<style>
    /* Varsayılan arka plan rengi */
    .hover-effect {
        background-color: #ffffff;
    }

</style>
<head>
    @include('merchant_panel.layouts.header')
</head>

<body class="g-sidenav-show  bg-gray-400">
    @include('merchant_panel.layouts.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            @include('merchant_panel.layouts.error-success')
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="shadow-primary border-radius-lg pt-4 pb-3" style="background-color:#000000">
                                <h5 class="text-white text-capitalize ps-3 text-center">İndirilebilir İçerik Sayfası</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Katalog Adı</th>
                                            <th class="text-center">İndirilme Sayısı</th>
                                            <th class="text-center">Katalog Dosyası</th>
                                            <th class="text-center">Sil</th>
                                            <th class="text-center">Güncelle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($catalogs as $catalog)
                                        <tr>
                                            <td class="text-center">{{$catalog->catalog_name}}</td>
                                            <td class="text-center" style="color: red;"><b>{{$catalog->download_number}}</b></td>
                                            <td class="text-center">
                                                @if(isset($catalog->file_path))
                                                <a href="{{ asset($catalog->file_path) }}" class="hover-effect" onmouseover="this.classList.add('hover-effect-hover')" onmouseout="this.classList.remove('hover-effect-hover')" target="_blank">Dosyayı İncele</a> <!-- ml-2 class'ı sol boşluk bırakır -->
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <form action="{{ route('catalog.destroy', $catalog->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Sil</button>
                                                </form>
                                            </td>
                                            <td class="text-center"><a href="{{ route('catalog.edit', $catalog->id) }}" class="btn btn-info">Güncelle</button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{route('catalog.create')}}" class="btn col-md-12" style="background-color:  #00a01d; color:#ffffff"> Yeni Katalog Ekle</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('merchant_panel.layouts.fixed-plugin')
    @include('merchant_panel.layouts.script')
</body>

</html>
