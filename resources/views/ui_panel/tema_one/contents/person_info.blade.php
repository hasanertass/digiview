<!--
				Card - Kişisel Bilgiler
			-->
<div class="card-inner animated active" id="about-card">
    <div class="card-wrap">
        <div class="content about">
            @if($personinfo->description)
            <div class="title " style="text-align: center">{{__('personinfo.kisisel_bilgiler')}}</div>
            <div class="row">
                <div class="col col-d-12">
                    <div class="text-box">
                        <p>
                            {{$personinfo->description}}
                        </p>
                    </div>
                </div>
            </div>
            @endif
            <div class="title" style="text-align: center">{{__('personinfo.iletisim_bilgileri')}}</div>
            <div class="col col-d-12">
                <div class="info-list" style="margin-top: 20px;">
                    <ul>
                        @if($personinfo->title)
                        <li><strong>{{__('personinfo.ünvan')}} . . . . .</strong><a href="#" style="color: black">{{$personinfo->title}}</a></li>
                        @endif
                        @if($personinfo->tel)
                        <li><strong>{{__('personinfo.telefon')}} . . . . .</strong><a href="tel:+9{{$personinfo->tel}}" style="color: black">{{$personinfo->tel}}</a></li>
                        @endif
                        @if($personinfo->tel2)
                        <li><strong>{{__('personinfo.telefon')}} . . . . .</strong><a href="tel:+9{{$personinfo->tel2}}" style="color: black">{{$personinfo->tel2}}</a></li>
                        @endif
                        @if($personinfo->mail)
                        <li><strong>{{__('personinfo.mail')}} . . . . .</strong><a href="mailto:{{$personinfo->mail }}" style="color: black">{{$personinfo->mail }}</a></li>
                        @endif
                        @if($personinfo->mail2)
                        <li><strong>{{__('personinfo.mail')}} . . . . .</strong><a href="mailto:{{$personinfo->mail2 }}" style="color: black">{{$personinfo->mail2}}</a></li>
                        @endif
                        @if($personinfo->location)
                        <li><strong>{{__('personinfo.adres')}} . . . . .</strong> <a href="#" style="color: black">{{$personinfo->location}}</a></li>
                        @endif
                        @if($personinfo->website_url)
                        <li><strong>{{__('personinfo.website')}} . . . . .</strong><a href=" {{$personinfo->website_url}}" style="color: black">{{$personinfo->website_url}}</a></li>
                        @endif
                        @if($personinfo->website_url2)
                        <li><strong>{{__('personinfo.website')}} . . . . .</strong><a href=" {{$personinfo->website_url2}}" style="color: black">{{$personinfo->website_url2}}</a></li>
                        @endif
                        @if($personinfo->whatsap_connect_url)
                        <li><strong>{{__('personinfo.whatsap')}} . . . . .</strong> <a href="{{$personinfo->whatsap_connect_url}}" style="color: black">{{$personinfo->whatsap_connect_url}}</a></li>
                        @endif

                        @foreach($bankinfos as $key => $bankinfo)
                        @if($bankinfo)
                        <li onclick="copyIBAN('iban{{$key}}')" style="cursor: pointer;">
                            <strong>{{$bankinfo->bank_name}} :</strong>
                            <span id="iban{{$key}}">{{$bankinfo->iban_no}}</span>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
