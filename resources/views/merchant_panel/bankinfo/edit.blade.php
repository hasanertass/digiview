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
                                <h5 class="text-white font-weight-bold text-capitalize ps-3 text-center">Banka İban Bilgisi Düzenleme</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <form action="{{ route('bankinfo.update',['bankinfo' => $bankinfo->id])  }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4">
                                            <label for="receiverName" style="color: white">Alıcı Ad-Soyad</label>
                                            <input type="text" id="receiverName" value="{{ old('receiverName',$bankinfo->name_surname)}}" placeholder="İban sahibi adı ve soyadı" name="receiverName" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-field mx-4">
                                            <label for="bankName" style="color: white">Bank Name</label>
                                            <input type="text" id="bankName" value="{{ old('bankname',$bankinfo->bank_name)}}" placeholder="Banka Adı" name="bankName" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class=" form-field mx-4">
                                            <label for="iban" class="mt-2" style="color: white">IBAN</label>
                                            <input type="text" id="iban" value="{{ old('iban',$bankinfo->iban_no)}}" placeholder="İban Numarası" name="iban" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-2" style="color: black">
                                        <div class=" form-field d-flex align-items-end mt-4 mx-4">
                                            <button type="submit" class="btn btn-success col-md-12">İban Bilgisini Güncelle</button>
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
