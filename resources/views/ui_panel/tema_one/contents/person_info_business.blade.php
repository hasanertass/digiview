<!--
				Card - Kişisel Bilgiler
			-->
<div class="card-inner animated active" id="about-card">
    <div class="card-wrap">
        <div class="content about">
            @if($subuser->description)
            <div class="title " style="text-align: center">{{__('personinfo.kisisel_bilgiler')}}</div>
            <div class="row">
                <div class="col col-d-12">
                    <div class="text-box">
                        <p>
                            {{$subuser->description}}
                        </p>
                    </div>
                </div>
            </div>
            @endif
            <div class="title" style="text-align: center">{{__('personinfo.iletisim_bilgileri')}}</div>
            <div class="col col-d-12">
                <div class="info-list" style="margin-top: 20px;">
                    <ul>
                        @if($subuser->title)
                        <li><strong>{{__('personinfo.ünvan')}} . . . . .</strong><a href="#" style="color: black">{{$subuser->title}}</a></li>
                        @endif
                        @if($subuser->tel)
                        <li><strong>{{__('personinfo.telefon')}} . . . . .</strong><a href="tel:+9{{$subuser->tel}}" style="color: black">{{$subuser->tel}}</a></li>
                        @endif
                        @if($subuser->mail)
                        <li><strong>{{__('personinfo.mail')}} . . . . .</strong><a href="mailto:{{$subuser->mail }}" style="color: black">{{$subuser->mail }}</a></li>
                        @endif
                        @if($subuser->whatsap_connect_url)
                        <li><strong>{{__('personinfo.whatsap')}} . . . . .</strong> <a href="{{$subuser->whatsap_connect_url}}" style="color: black">{{$subuser->whatsap_connect_url}}</a></li>
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
