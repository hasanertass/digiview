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
                                <h5 class="text-white text-capitalize ps-3 text-center">Banka Listesi</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Banka Adı</th>
                                            <th class="text-center">Şahıs Adı</th>
                                            <th class="text-center">İban</th>
                                            <th class="text-center">Sil</th>
                                            <th class="text-center">Güncelle</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bankinfos as $bankinfo)
                                        <tr>
                                            <td class="text-center">{{$bankinfo->bank_name}}</td>
                                            <td class="text-center">{{$bankinfo->name_surname}}</td>
                                            <td class="text-center">{{$bankinfo->iban_no}}</td>
                                            <td class="text-center">
                                                <form action="{{ route('bankinfo.destroy', $bankinfo->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Sil</button>
                                                </form>
                                            </td>
                                            <td class="text-center"><a href="{{ route('bankinfo.edit', $bankinfo->id) }}" class="btn btn-info">Güncelle</button></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <a href="{{ route('bankinfo.create') }}" class="btn col-md-12" style="background-color:  #00a01d; color:#ffffff"> Yeni İban Ekle</a>
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
