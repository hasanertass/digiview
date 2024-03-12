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
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card my-4" style="background-color: #1a3675">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 " style="background-color:#202020">
                            <div class="border-radius-lg pt-4 pb-3" style="background-color:#202020">
                                <h5 class="text-white font-weight-bold text-capitalize ps-3 text-center">Şirket Bilgileri</h5>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <form action="{{route('companyinfo.update',['companyinfo' => $companyinfo->id])}}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4">
                                            <label for="sector" style="color: white">Sektör</label>
                                            <input type="text" id="sector" name="sector" placeholder="İş sektörünüz" value="{{ old('sector',$companyinfo->sector)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-field mx-4">
                                            <label for="website" style="color: white">Web site adresiniz</label>
                                            <input type="text" id="website" name="website" placeholder="Şirket web site adresiniz" value="{{ old('website',$companyinfo->website)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-3">
                                            <label for="mail" style="color: white">Mail Adresiniz </label>
                                            <input type="text" id="mail" name="mail" placeholder="Mail Adresiniz" value="{{ old('mail',$companyinfo->mail)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-3">
                                            <label for="tel" style="color: white">Şirket Telefon Numaranız</label>
                                            <input type="text" id="tel" name="tel" placeholder="Şirket Telefon Numaranız" value="{{ old('tel',$companyinfo->tel)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-field mx-4 mt-3">
                                            <label for="tax_administration" style="color: white">Vergi Dairesi</label>
                                            <input type="text" id="tax_administration" name="tax_administration" placeholder="Bağlı olduğunuz vergi dairesi adı" value="{{ old('tax_administration',$companyinfo->tax_administration)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-field mx-4">
                                            <label for="VKN" style="color: white">VKN</label>
                                            <input type="text" id="VKN" name="VKN" placeholder="VKN" value="{{ old('VKN',$companyinfo->VKN)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <div class="form-field mx-4">
                                            <label for="billing_address" style="color: white">Fatura Adresi</label>
                                            <input type="text" id="billing_address" name="billing_address" placeholder="Fatura Adresiniz" value="{{ old('billing_address',$companyinfo->billing_address)}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-field mx-4">
                                            <label for="address" style="color: white">Adres</label>
                                            <input type="text" id="address" name="address" placeholder="Şirket adresiniz" value="{{ old('address',$companyinfo->address)}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
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
