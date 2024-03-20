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
                                <h5 class="text-white font-weight-bold text-capitalize ps-3 text-center">Kişisel Bilgiler</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <form action="{{route('personinfo.update',['personinfo' => $personinfo->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-3">
                                            <label for="title" style="color: white">Ünvan</label>
                                            <input type="text" id="title" name="title" placeholder="Ünvanınız" value="{{ old('title',$personinfo->title)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-field mx-4">
                                            <label for="description" style="color: white">Kişisel Açıklama</label>
                                            <input type="text" id="description" name="description" placeholder="Kişisel Açıklamanız" value="{{ old('description',$personinfo->description)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4  mt-3">
                                            <label for="tel" style="color: white">Telefon Numarası</label>
                                            <input type="text" id="tel" name="tel" placeholder="Telefon numaranız" value="{{ old('tel',$personinfo->tel)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-field mx-4  mt-3">
                                            <label for="tel2" style="color: white">Telefon Numarası 2</label>
                                            <input type="text" id="tel2" name="tel2" placeholder="2. Telefon Numaranız" value="{{ old('tel2',$personinfo->tel2)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-3">
                                            <label for="mail" style="color: white">Mail Adresiniz </label>
                                            <input type="text" id="mail" name="mail" placeholder="Mail Adresiniz" value="{{ old('mail',$personinfo->mail)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-3">
                                            <label for="mail2" style="color: white">Mail Adresiniz 2</label>
                                            <input type="text" id="mail2" name="mail2" placeholder="2. Mail adresiniz" value="{{ old('mail2',$personinfo->mail2)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-3">
                                            <label for="website_url" style="color: white">Web Site Url </label>
                                            <input type="text" id="website_url" name="website_url" placeholder="Web Site adresiniz" value="{{ old('website_url',$personinfo->website_url)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-3">
                                            <label for="website_url2" style="color: white">Web Site Url 2</label>
                                            <input type="text" id="website_url2" name="website_url2" placeholder="2. Web Site Adresiniz" value="{{ old('website_url2',$personinfo->website_url2)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-3">
                                            <label for="location" style="color: white">Adres Bilgisi</label>
                                            <input type="text" id="location" name="location" placeholder="Adres Bilgileriniz (Kemalaşa mahallesi oruç sokak gibi)" value="{{ old('location',$personinfo->location)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-field mx-4">
                                            <label for="location_detail" style="color: white">Google Konum Bilgisi</label>
                                            <input type="text" id="location_detail" name="location_detail" placeholder="Google haritalar adresiniz" value="{{ old('location_detail',$personinfo->location_detail)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-6">
                                            <label for="photograph" style="color: white">Profil Fotoğrafınız</label>
                                            <input type="file" id="photograph" name="photograph">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mx-4 mt-4">
                                            @if($personinfo->photograph)
                                            <img src="{{ asset($personinfo->photograph) }}" style="width: 200px; height: 200px;" alt="Profil Fotoğrafı">
                                            @else
                                            <img src="{{ asset('storage/photographs/profil.jpeg') }}" style="width: 200px; height: 200px;" alt="Varsayılan Fotoğraf">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-6">
                                            <label for="backand_photograph" style="color: white">Arka Plan Fotoğrafınız <span style="color: red"> !!! Tercih ettiğiniz temaya göre kullanılacaktır !!!</span></label>
                                            <input type="file" id="backand_photograph" name="backand_photograph">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mx-4 mt-4">
                                            @if($personinfo->backand_photograph)
                                            <img src="{{ asset($personinfo->backand_photograph) }}" style="width: 200px; height: 200px;" alt="Arka Plan Fotoğrafı">
                                            @else
                                            <img src="{{ asset('storage/photographs/profil.jpeg') }}" style="width: 200px; height: 200px;" alt="Varsayılan Fotoğraf">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4">
                                            <label for="whatsap_connect_url" style="color: white">Whatsap Url</label>
                                            <input type="text" id="whatsap_connect_url" name="whatsap_connect_url" placeholder="Whatsap iletişim adresiniz" value="{{ old('whatsap_connect_url',$personinfo->whatsap_connect_url)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" form-field d-flex align-items-end mt-4 mx-4">
                                            <button type="submit" class="btn btn-success col-md-12">Kişisel Bilgilerini Kaydet</button>
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
