<!--
		jQuery Scripts
	-->
<script src="{{ asset('ui_template/html/template/') }}/js/jquery.min.js"></script>
<script src="{{ asset('ui_template/html/template/') }}/js/jquery.validate.js"></script>
<script src="{{ asset('ui_template/html/template/') }}/js/jquery.magnific-popup.js"></script>
<script src="{{ asset('ui_template/html/template/') }}/js/imagesloaded.pkgd.js"></script>
<script src="{{ asset('ui_template/html/template/') }}/js/isotope.pkgd.js"></script>
<script src="{{ asset('ui_template/html/template/') }}/js/jquery.slimscroll.js"></script>
<script src="{{ asset('ui_template/html/template/') }}/js/owl.carousel.js"></script>
<script src="{{ asset('ui_template/html/template/') }}/js/typed.js"></script>
<script src="https://use.fontawesome.com/8da76d029b.js"></script>

<!--
		Main Scripts
	-->
<script src="{{ asset('ui_template/html/template/') }}/js/scripts.js"></script>

<!--
		Google map api
	-->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap"></script>
<script>
    // Dosya indirildikten sonra gösterilecek olan alert
    function showDownloadAlert() {
        // Alert elementini al
        var alertElement = document.getElementById('alertMessage');
        // Alert'ı görünür hale getir
        alertElement.style.display = 'block';
        // Belirli bir süre sonra alert'ı gizle
        setTimeout(function() {
            alertElement.style.display = 'none';
        }, 10000); // 10 saniye sonra gizle (10000 milisaniye)
    }

</script>
<script>
    function copyIBAN(elementId) {
        var ibanText = document.getElementById(elementId).innerText;

        // Bir input elementi oluşturarak metni panoya kopyalıyoruz
        var tempInput = document.createElement("input");
        tempInput.value = ibanText;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);

        // Kopyalama işlemi tamamlandıktan sonra kullanıcıya bildirim göster
        var notification = document.getElementById("notification");
        notification.style.display = "block";
        setTimeout(function() {
            notification.style.bottom = "-50px";
            setTimeout(function() {
                notification.style.display = "none";
                notification.style.bottom = "0";
            }, 500);
        }, 2000);
    }

</script>
<script>
    // Rehbere kaydet butonuna basıldığında yapılacak işlem
    function rehberKaydet() {
        // Buraya rehbere kaydetmek için gerekli işlemleri ekleyebilirsiniz
        window.location.href = "{{ route('rehber', ['url' => $url]) }}";
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
<script>
    function incrementDownloads(id) {
        // Ajax isteği göndererek id'yi sunucuya iletiyoruz
        $.ajax({
            url: "{{ route('download', ['id' => ':id']) }}".replace(':id', id)
            , type: 'POST'
            , dataType: 'json'
            , data: {
                id: id
                , _token: '{{ csrf_token() }}' // CSRF tokenı ekle
            }
            , success: function(response) {
                if (response.success) {
                    console.log('İndirme sayısı başarıyla artırıldı.');
                } else {
                    console.error('Bir hata oluştu. İndirme sayısı artırılamadı.');
                }
            }
            , error: function(xhr, status, error) {
                console.error('İstek başarısız: ' + error);
            }
        });
    }

</script>
