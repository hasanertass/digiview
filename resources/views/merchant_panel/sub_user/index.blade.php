<!DOCTYPE html>
<html lang="en">

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
                                <h5 class="text-white text-capitalize ps-3 text-center">Kullanıcılar Listesi</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Fotoğraf</th>
                                            <th class="text-center">Adı</th>
                                            <th class="text-center">Soyadı</th>
                                            <th class="text-center">Ünvanı</th>
                                            <th class="text-center">Telefon</th>
                                            <th class="text-center">Mail</th>
                                            <th class="text-center">Açıklama</th>
                                            <th class="text-center">Sil</th>
                                            <th class="text-center">Güncelle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($subusers as $subuser)
                                        <tr>
                                            <td class="text-center">
                                                <img src="{{ asset($subuser->photograph) }}" alt="Görsel" width="200" height="150">
                                            </td>
                                            <td class="text-center">{{$subuser->name}}</td>
                                            <td class="text-center">{{$subuser->surname}}</td>
                                            <td class="text-center">{{$subuser->title}}</td>
                                            <td class="text-center">{{$subuser->tel}}</td>
                                            <td class="text-center">{{$subuser->mail}}</td>
                                            <td class="text-center">{{$subuser->description}}</td>
                                            <td class="text-center">
                                                <form action="{{ route('subuser.destroy', $subuser->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Sil</button>
                                                </form>
                                            </td>
                                            <td class="text-center"><a href="{{ route('subuser.edit', $subuser->id) }}" class="btn btn-info">Güncelle</button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('subuser.create') }}" class="btn col-md-12" style="background-color:  #00a01d; color:#ffffff"> Yeni Kullanıcı Ekle</a>
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
