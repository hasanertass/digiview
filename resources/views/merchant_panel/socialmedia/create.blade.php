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
                                <h5 class="text-white font-weight-bold text-capitalize ps-3 text-center">Sosyal Medya Hesap Bilgisi Ekleme</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <form action="{{route('socialmedia.store')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 ">
                                            <label for="bankName" class="mt-2" style="color: white">Sosyal Medya Adı</label>
                                            <select id="socialMediaSelect" name="socialMediaSelect" onchange="updateSocialMediaFields()" class="form-control" style="background-color: #ffffff">
                                                <option value="facebook">Facebook</option>
                                                <option value="x-twitter">X</option>
                                                <option value="youtube">Youtube</option>
                                                <option value="linkedin">Linkedin</option>
                                                <option value="pinterest">Pinterest</option>
                                                <option value="tiktok">Tiktok</option>
                                                <option value="snapchat">Snapchat</option>
                                                <option value="telegram">Telegram</option>
                                                <option value="github">Github</option>
                                                <option value="spotify">Spotify</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class=" form-field mx-4">
                                            <label for="social_media_url" class="mt-2" style="color: white">Sosyal Medya URL</label>
                                            <input type="text" id="social_media_url" name="social_media_url" class="form-control" style="background-color: #ffffff" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mt-2" style="color: black">
                                        <div class=" form-field d-flex align-items-end mt-4 mx-4">
                                            <button type="submit" class="btn btn-success col-md-12">Sosyal Medya Hesap Bilgisini Kaydet</button>
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
