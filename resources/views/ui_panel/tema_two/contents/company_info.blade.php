<!--
				Card - Şİrket Bilgileri
			-->
<div class="card-inner" id="resume-card">
    <div class="card-wrap">
        <div class="content about">
            @if($companyinfo->description)
            <div class="title " style="text-align: center">{{ __('companyinfo.sirket_aciklama') }}</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-box">
                        <p>
                            {{$companyinfo->description}}
                        </p>
                    </div>
                </div>
            </div>
            @endif
            <div class="title" style="text-align: center">{{ __('companyinfo.sirket_bilgileri') }}</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="info-list" style="margin-top: 20px;">
                        <ul>
                            @if($companyinfo->sector)
                            <li class="mt-6"><strong style="background-color: transparent; color:#ff9800">{{ __('companyinfo.sektör') }}</strong><a href="tel:+9{{$companyinfo->sector}}" style="color: white">{{$companyinfo->tel}}</a></li>
                            @endif
                            <hr style="color: white">
                            @if($companyinfo->tel)
                            <li><strong style="background-color: transparent; color:#ff9800">{{ __('companyinfo.telefon') }}</strong><a href="tel:+9{{$companyinfo->tel}}" style="color: white">{{$companyinfo->tel}}</a></li>
                            <hr style="color: white">
                            @endif
                            @if($companyinfo->mail)
                            <li><strong style="background-color: transparent; color:#ff9800">{{ __('companyinfo.mail') }}</strong><a href="mailto:{{$companyinfo->mail }}" style="color: white">{{$companyinfo->mail }}</a></li>
                            <hr style="color: white">

                            @endif
                            @if($companyinfo->website)
                            <li><strong style="background-color: transparent; color:#ff9800">{{ __('companyinfo.website') }}</strong><a href=" {{$companyinfo->website_url}}" style="color: white; text-align:right">{{$companyinfo->website}}</a></li>
                            <hr style="color: white">

                            @endif
                            @if($companyinfo->tax_administration)
                            <li style="color: white"><strong style="background-color: transparent; color:#ff9800">{{ __('companyinfo.vergi_dairesi') }}</strong>{{$companyinfo->tax_administration}}</li>
                            <hr style="color: white">

                            @endif
                            @if($companyinfo->VKN)
                            <li style="color: white"><strong style="background-color: transparent; color:#ff9800">{{ __('companyinfo.vkn') }}</strong>{{$companyinfo->VKN}}</li>
                            <hr style="color: white">

                            @endif
                            @if($companyinfo->address)
                            <li style="color: white"><strong style="background-color: transparent; color:#ff9800">{{ __('companyinfo.adres') }}</strong>{{$companyinfo->address}}</li>
                            <hr style="color: white">

                            @endif
                            @if($companyinfo->billing_address)
                            <li style="color: white"><strong style="background-color: transparent; color:#ff9800">{{ __('companyinfo.fatura_adresi') }}</strong>{{$companyinfo->billing_address}}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
