<!DOCTYPE html>
<html lang="en">

<head>
    @include('merchant_panel.layouts.header')
</head>

<body class="g-sidenav-show  bg-gray-200">
    @include('merchant_panel.layouts.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <div class="container-fluid py-4">
            <div class="card-header p-0 position-relative mt-2 mx-3 z-index-2">
                <div class="bg-gradient border-radius-lg pt-4 pb-3" style="background-color: #0c2a6d">
                    <h6 class="text-center text-white text-capitalize ps-3">Kişisel Bilgiler</h6>
                </div>
            </div>
            <div class="row mx-3 position-relative mt-4">
                <div class="row col-md-4">
                    <div class="col-md-4 text-end">
                        Telefon No :
                    </div>
                    <div class="col-md-8">
                        <input type="text" pattern="[0-9]" maxlength="11" placeholder="Telefon numaranız" class="col-12">
                    </div>
                </div>
                <div class="row col-md-4">
                    <div class="col-md-4 text-end">
                        Telefon No 2 :
                    </div>
                    <div class="col-md-8">
                        <input type="text" pattern="[0-9]" maxlength="11" placeholder="2. Telefon numaranız" class="col-12">
                    </div>
                </div>
                <div class="row col-md-4">
                    <div class="col-md-4 text-end">
                        Mail :
                    </div>
                    <div class="col-md-8">
                        <input type="text" pattern="[0-9]" maxlength="11" placeholder="Mail Adresiniz" class="col-12">
                    </div>
                </div>
            </div>
            <div class="row mx-3 position-relative mt-4">
                <div class="row col-md-4">
                    <div class="col-md-4 text-end">
                        Web site url :
                    </div>
                    <div class="col-md-8">
                        <input type="text" pattern="[0-9]" maxlength="11" placeholder="Web site adresiniz." class="col-12">
                    </div>
                </div>
                <div class="row col-md-4">
                    <div class="col-md-4 text-end">
                        Web site url 2 :
                    </div>
                    <div class="col-md-8">
                        <input type="text" pattern="[0-9]" maxlength="11" placeholder="2. web site adresiniz" class="col-12">
                    </div>
                </div>
                <div class="row col-md-4">
                    <div class="col-md-4 text-end">
                        Mail 2 :
                    </div>
                    <div class="col-md-8">
                        <input type="text" pattern="[0-9]" maxlength="11" placeholder="2. Mail Adresinz" class="col-12">
                    </div>
                </div>
            </div>
            <div class="row mx-3 position-relative mt-4">
                <div class="row col-md-6">
                    <div class="col-md-4 text-center">
                        Adresiniz :
                    </div>
                    <div class="col-md-8">
                        <input type="text" pattern="[0-9]" maxlength="11" placeholder="Telefon numaranız" class="col-12">
                    </div>
                </div>
                <div class="row col-md-6">
                    <div class="col-md-4 text-end">
                        Adresiniz google konum lokasyonu :
                    </div>
                    <div class="col-md-8">
                        <input type="text" pattern="[0-9]" maxlength="11" placeholder="Telefon numaranız" class="col-12">
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('merchant_panel.layouts.fixed-plugin')
    @include('merchant_panel.layouts.script')
</body>

</html>
