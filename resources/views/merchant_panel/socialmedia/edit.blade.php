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
                                <h5 class="text-white font-weight-bold text-capitalize ps-3 text-center">Sosyal Medya Hesap Bilgisi Düzenleme</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <form action="{{ route('socialmedia.update',['socialmedia' => $socialmedia->id])  }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4">
                                            <label for="receiverName" style="color: white">Sosyal Medya Adı</label>
                                            <select id="socialMediaSelect" name="socialMediaSelect" onchange="updateSocialMediaFields()" class="form-control" style="background-color: #ffffff">
                                                <option value="facebook" {{ $socialmedia->social_media_icon == 'fa fa-facebook' ? 'selected' : '' }}>Facebook</option>
                                                <option value="x-twitter" {{ $socialmedia->social_media_icon == 'fa fa-x-twitter' ? 'selected' : '' }}>X</option>
                                                <option value="youtube" {{ $socialmedia->social_media_icon == 'fa fa-youtube' ? 'selected' : '' }}>Youtube</option>
                                                <option value="linkedin" {{ $socialmedia->social_media_icon == 'fa fa-linkedin' ? 'selected' : '' }}>Linkedin</option>
                                                <option value="pinterest" {{ $socialmedia->social_media_icon == 'fa fa-pinterest' ? 'selected' : '' }}>Pinterest</option>
                                                <option value="tiktok" {{ $socialmedia->social_media_icon == 'fa fa-tiktok' ? 'selected' : '' }}>Tiktok</option>
                                                <option value="snapchat" {{ $socialmedia->social_media_icon == 'fa fa-snapchat' ? 'selected' : '' }}>Snapchat</option>
                                                <option value="telegram" {{ $socialmedia->social_media_icon == 'fa fa-telegram' ? 'selected' : '' }}>Telegram</option>
                                                <option value="github" {{ $socialmedia->social_media_icon == 'fa fa-github' ? 'selected' : '' }}>Github</option>
                                                <option value="spotify" {{ $socialmedia->social_media_icon == 'fa fa-spotify' ? 'selected' : '' }}>Spotify</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-field mx-4">
                                            <label for="social_media_url" style="color: white">Sosyal Medya URL</label>
                                            <input type="text" id="social_media_url" placeholder="Sosyal Medya Url Adresiniz" value="{{old('catalog_name',$socialmedia->social_media_url)}}" name="social_media_url" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-2" style="color: black">
                                        <div class=" form-field d-flex align-items-end mt-4 mx-4">
                                            <button type="submit" class="btn btn-success col-md-12">Sosyal Medya Hesap Bilgisini Güncelle</button>
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
