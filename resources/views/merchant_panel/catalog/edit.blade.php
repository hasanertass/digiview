<style>
    .form-field input {
        width: 100%;
    }

    .my-element-black {
        color: black !important;
    }

</style>
<!DOCTYPE html>
<html lang="en">

<head>
    @include('merchant_panel.layouts.header')
</head>
<body class="g-sidenav-show">
    @include('merchant_panel.layouts.sidebar')
    <main class="main-content position-relative max-he ight-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            @include('merchant_panel.layouts.error-success')
            <div class="row">
                <div class="col-12">
                    <div class="card my-4" style="background-color: #1a3675">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 " style="background-color:#202020">
                            <div class="border-radius-lg pt-4 pb-3" style="background-color:#202020">
                                <h5 class="text-white font-weight-bold text-capitalize ps-3 text-center">İndirilebilir İçerik Güncelleme</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <form action="{{route('catalog.update',['catalog' => $catalog->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6 row">
                                        <div class="col-md-4 form-field mx-4">
                                            <label for="file_path" style="color: white; display: inline-block;">İndirilebilir İçerik <span style="color: red"> (sadece pdf dosyları)</span></label>
                                            <input type="file" id="file_path" name="file_path" class="ml-2">
                                        </div>
                                        <div class="col-md-3 form-field mx-8 mt-4">
                                            @if(isset($catalog->file_path))
                                            <a href="{{ asset($catalog->file_path) }}" style="color: white" onmouseover="this.classList.add('hover-effect-hover')" onmouseout="this.classList.remove('hover-effect-hover')" target="_blank">Mevcut Dosyayı İncele</a> <!-- ml-2 class'ı sol boşluk bırakır -->
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-field mx-4">
                                            <label for="catalog_name" style="color: white">İndirilebilir içerik Adı</label>
                                            <input type="text" id="catalog_name" name="catalog_name" placeholder="İndirilerbilir İçerik Adınız" value="{{ old('catalog_name',$catalog->catalog_name)}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-2" style="color: black">
                                        <div class=" form-field d-flex align-items-end mt-4 mx-4">
                                            <button type="submit" class="btn btn-success col-md-12">Kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
