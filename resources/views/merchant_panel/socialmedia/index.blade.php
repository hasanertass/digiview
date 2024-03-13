<!DOCTYPE html>
<html lang="en">

<head>
    @include('merchant_panel.layouts.header')
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('merchant_panel.layouts.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            @include('merchant_panel.layouts.error-success')
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient shadow-primary border-radius-lg pt-4 pb-3" style="background-color:#000000 ">
                                <h5 class="text-center text-white text-capitalize ps-3">Sosyal Medya Hesapları</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table   align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Sosyal Medya İkon</th>
                                            <th class="text-center">Sosyal Medya Url</th>
                                            <th class="text-center">Sil</th>
                                            <th class="text-center">Güncelle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($socialmedias as $socialmedia)
                                        <tr>
                                            <td class="text-center"><i class="{{$socialmedia->social_media_icon}}" style="font-size: 30px;"></i></td>
                                            <td class="text-center">{{$socialmedia->social_media_url}}</td>
                                            <td class="text-center">
                                                <form action="{{ route('socialmedia.destroy', $socialmedia->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Sil</button>
                                                </form>
                                            </td>
                                            <td class="text-center"><a href="{{ route('socialmedia.edit', $socialmedia->id) }}" class="btn btn-info">Güncelle</button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('socialmedia.create') }}" class="btn col-md-12" style="background-color:  #00a01d; color:#ffffff"> Yeni Sosyal Medya Hesabı Ekle</a>
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
