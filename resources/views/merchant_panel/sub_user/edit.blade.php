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
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            @include('merchant_panel.layouts.error-success')
            <div class="row">
                <div class="col-12">
                    <div class="card my-4" style="background-color: #1a3675">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 " style="background-color:#202020">
                            <div class="border-radius-lg pt-4 pb-3" style="background-color:#202020">
                                <h5 class="text-white font-weight-bold text-capitalize ps-3 text-center">Alt Kullanıcı Güncelleme</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <form action="{{route('subuser.update',['subuser' => $subuser->id])}}" enctype="multipart/form-data" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4">
                                            <label for="name" style="color: white">Kullanıcı Adı</label>
                                            <input type="text" id="name" name="name" placeholder="Kullanıcı Adı" value="{{old('name',$subuser->name)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-field mx-4">
                                            <label for="surname" style="color: white">Kullanıcı Soyadı</label>
                                            <input type="text" id="surname" name="surname" value="{{old('surname',$subuser->surname)}}" placeholder="Kullanıcı Soyadı">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-2">
                                            <label for="title" style="color: white">Ünvan</label>
                                            <input type="text" id="title" name="title" placeholder="Ünvan" value="{{old('title',$subuser->title)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-2">
                                            <label for="tel" style="color: white">Telefon No</label>
                                            <input type="text" id="tel" name="tel" value="{{old('tel',$subuser->tel)}}" placeholder="Telefon No">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-2">
                                            <label for="mail" style="color: white">Mail Adresi</label>
                                            <input type="text" id="mail" name="mail" placeholder="Mail Adresi" value="{{old('mail',$subuser->mail)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-2">
                                            <label for="whatsap_connect_url" style="color: white">Whatsap İletişim Adresi URL</label>
                                            <input type="text" id="whatsap_connect_url" name="whatsap_connect_url" value="{{old('whatsap_connect_url',$subuser->whatsap_connect_url)}}" placeholder="Whatsap İletişim Adresi URl">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-2">
                                            <label for="photograph" style="color: white">Profil Fotoğrafı</label>
                                            <input type="file" id="photograph" name="photograph">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mx-4 mt-4">
                                            @if($subuser->photograph)
                                            <img src="{{ asset($subuser->photograph) }}" style="width: 200px; height: 200px;" alt="Profil Fotoğrafı">
                                            @else
                                            <img src="{{ asset('storage/photographs/profil.jpeg') }}" style="width: 200px; height: 200px;" alt="Varsayılan Fotoğraf">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class=" form-field mx-4 mt-2">
                                            <label for="description" class="mt-2" style="color: white">Kişisel Açıklama</label>
                                            <input type="text" id="description" name="description" value="{{old('description',$subuser->description)}}" placeholder="Kişisel Açıklama">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3" style="color: black">
                                        <div class=" form-field d-flex align-items-end mt-4 mx-4">
                                            <button type="submit" class="btn btn-success col-md-12">Kullanıcı Bilgilerini Güncelle</button>
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
