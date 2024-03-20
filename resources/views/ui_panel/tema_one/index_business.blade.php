<!DOCTYPE html>
<html lang="tr">

@include('ui_panel.tema_one.layouts.header')


<body>
    <div class="page new-skin">

        <!-- preloader -->
        <div class="preloader">
            <div class="centrize full-width">
                <div class="vertical-center">
                    <div class="spinner">
                        <div class="double-bounce1"></div>
                        <div class="double-bounce2"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- background -->
        <div class="background gradient">
            <ul class="bg-bubbles">
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <!--
			Container
		-->
        <div class="container opened" data-animation-in="fadeInLeft" data-animation-out="fadeOutLeft">

            <!--
				Header
			-->
            <header class="header">
                @include('ui_panel.tema_one.contents.menu')

            </header>

            <!--
				Card - Started
			-->
            <div class="card-started" id="home-card">

                <!--
					Profile
				-->
                <div class="profile no-photo">

                    <!-- profile image
                    <div class="slide" style="background-image: url({{ asset('ui_template/html/template/') }}/images/man5_big.jpg);"></div>   -->
                    <div class="slide" style="background-image: url({{  asset($subuser->photograph) }});"></div>
                    <!-- profile titles -->
                    <br>
                    <div class="title" style="padding-top: 40px;">{{$subuser->name}} {{$subuser->surname}}</div>
                    <!--<div class="subtitle">Web Designer</div>-->
                    <div class="subtitle subtitle-typed" style="margin-top: 10px">
                        <div class="typing-title">
                            @if($subuser->title)
                            <p>{{$subuser->title}}</p>
                            @endif
                        </div>
                    </div>

                    @include('ui_panel.tema_one.contents.socialmedia')

                    <!-- profile buttons -->
                    <div class="lnks" style="background-color: #78cc6d">
                        <a href="{{ route('rehber2', ['url' => $url,'id'=>$subuser->id]) }}" onclick="showDownloadAlert()" class="lnk discover" style="color: black; font-size:20px" onmouseover="this.style.color='red'" onmouseout="this.style.color='black'">
                            <span class="text">{{__('personinfo.rehber')}}</span>
                        </a>
                    </div>

                </div>

            </div>

            @include('ui_panel.tema_one.contents.person_info_business')

            @include('ui_panel.tema_one.contents.company_info')

            @include('ui_panel.tema_one.contents.download_contents')


        </div>
        <div id="notification" style="display: none; background-color: #7f7f7f; color: white; padding: 16px; text-align: center; position: fixed; bottom: 0; width: 100%; transition: bottom 0.5s ease; z-index: 999;">
            {{__('genel.iban_kopyala')}}
        </div>
        <div id="infoMessage" style="display: none; background-color: #fff; color: #333; padding: 16px; text-align: center; position: fixed; bottom: 20px; left: 0; right: 0; margin: 0 auto; border-radius: 8px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); z-index: 999;">
            <p style="margin-bottom: 10px;">{{__('genel.kullanici_bilgisi')}}</p>
            <button onclick="rehberKaydet()" style="background-color: #4CAF50; color: white; padding: 10px 24px; border: none; border-radius: 4px; cursor: pointer; margin-right: 10px;">{{__('personinfo.rehber')}}</button>
            <button onclick="iptalEt()" style="background-color: #ddd; color: black; padding: 10px 24px; border: none; border-radius: 4px; cursor: pointer;">{{__('genel.simdi_değil')}}</button>
        </div>
        <div id="alertMessage" style="display: none; background-color: rgb(0, 0, 0); color: white; padding: 20px; text-align: center; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 1000; border-radius: 10px;">
            {{__('genel.kisi_rehber_kaydetme_aciklama')}}
        </div>

    </div>
    @include('ui_panel.tema_one.layouts.script')

</body>
<script>
    // Rehbere kaydet butonuna basıldığında yapılacak işlem
    function rehberKaydet() {
        // Buraya rehbere kaydetmek için gerekli işlemleri ekleyebilirsiniz
        window.location.href = "{{ route('rehber2', ['url' => $url,'id'=>$subuser->id]) }}";
        // Alert elementini al
        var alertElement = document.getElementById('alertMessage');
        // Alert'ı görünür hale getir
        alertElement.style.display = 'block';
        // Belirli bir süre sonra alert'ı gizle
        setTimeout(function() {
            alertElement.style.display = 'none';
        }, 10000); // 10 saniye sonra gizle (10000 milisaniye)
    }

    // Şimdi Değil butonuna basıldığında yapılacak işlem
    function iptalEt() {
        var infoMessage = document.getElementById("infoMessage");
        infoMessage.style.display = "none";
    }

    // Sayfa yüklendiğinde otomatik olarak model penceresini gösterme
    window.onload = function() {
        var infoMessage = document.getElementById("infoMessage");
        infoMessage.style.display = "block";
    };

</script>
</html>
