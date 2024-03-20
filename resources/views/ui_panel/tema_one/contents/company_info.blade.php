<!--
				Card - Şİrket Bilgileri
			-->
<div class="card-inner" id="resume-card">
    <div class="card-wrap">
        <div class="content about">
            @if($companyinfo->description)
            <div class="title " style="text-align: center">{{ __('companyinfo.sirket_aciklama') }}</div>
            <div class="row">
                <div class="col col-d-12">
                    <div class="text-box">
                        <p>
                            {{$companyinfo->description}}
                        </p>
                    </div>
                </div>
            </div>
            @endif
            <div class="title" style="text-align: center">{{ __('companyinfo.sirket_bilgileri') }}</div>
            <div class="col col-d-12">
                <div class="info-list" style="margin-top: 20px;">
                    <ul>
                        @if($companyinfo->sector)
                        <li style="color: black"><strong>{{__('companyinfo.sektör')}} . . . . .</strong>{{$companyinfo->sector}}</li>
                        @endif
                        @if($companyinfo->tel)
                        <li><strong>{{ __('companyinfo.telefon') }} . . . . .</strong><a href="tel:+9{{ $companyinfo->tel }}" style="color: black">{{ $companyinfo->tel }}</a></li>
                        @endif
                        @if($companyinfo->mail)
                        <li><strong>{{ __('companyinfo.mail') }} . . . . .</strong><a href="mailto:{{$companyinfo->mail }}" style="color: black">{{$companyinfo->mail }}</a></li>
                        @endif
                        @if($companyinfo->website)
                        <li><strong>{{ __('companyinfo.website') }} . . . . .</strong><a href=" {{$companyinfo->website_url}}" style="color: black">{{$companyinfo->website}}</a></li>
                        @endif
                        @if($companyinfo->tax_administration)
                        <li style="color: black"><strong>{{ __('companyinfo.vergi_dairesi') }} . . . . .</strong>{{$companyinfo->tax_administration}}</li>
                        @endif
                        @if($companyinfo->VKN)
                        <li style="color: black"><strong>{{ __('companyinfo.vkn') }} . . . . .</strong>{{$companyinfo->VKN}}</li>
                        @endif
                        @if($companyinfo->address)
                        <li style="color: black"><strong>{{ __('companyinfo.adres') }} . . . . .</strong>{{$companyinfo->address}}</li>
                        @endif
                        @if($companyinfo->billing_address)
                        <li style="color: black"><strong>{{ __('companyinfo.fatura_adresi') }} . . . . .</strong>{{$companyinfo->billing_address}}</li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
