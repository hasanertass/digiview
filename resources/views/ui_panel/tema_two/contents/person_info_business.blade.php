<!--
				Card - Kişisel Bilgiler
			-->
<div class="card-inner animated active" id="about-card">
    <div class="card-wrap">
        <div class="content about">
            @if($subuser->description)
            <div class="title " style="text-align: center">{{__('personinfo.kisisel_bilgiler')}}</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-box">
                        <p style="color: white">
                            {{$subuser->description}}
                        </p>
                    </div>
                </div>
            </div>
            @endif
            <div class="title" style="text-align: center">{{__('personinfo.iletisim_bilgileri')}}</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="info-list" style="margin-top: 20px;">
                        <ul>
                            @if($subuser->title)
                            <li class="mt-6"><strong style="background-color: transparent; color:#ff9800"> {{__('personinfo.ünvan')}}</strong><a href="tel:+9{{$subuser->title}}" style="color: white">{{$subuser->tel}}</a></li>
                            <hr style="color: white">
                            @endif
                            @if($subuser->tel)
                            <li><strong style="background-color: transparent; color:#ff9800">{{__('personinfo.telefon')}}</strong><a href="tel:+9{{$subuser->tel}}" style="color: white">{{$subuser->tel}}</a></li>
                            <hr style="color: white">
                            @endif
                            @if($subuser->mail)
                            <li><strong style="background-color: transparent; color:#ff9800">{{__('personinfo.mail')}}</strong><a href="mailto:{{$subuser->mail }}" style="color: white">{{$subuser->mail }}</a></li>
                            <hr style="color: white">
                            @endif
                            @if($subuser->whatsap_connect_url)
                            <li><strong style="background-color: transparent; color:#ff9800">{{__('personinfo.whatsap')}} </strong><a href=" {{$subuser->whatsap_connect_url}}" style="color: white; text-align:right">{{$subuser->whatsap_connect_url}}</a></li>
                            @endif

                            @foreach($bankinfos as $key => $bankinfo)
                            @if($bankinfo)
                            <hr style="color: white">
                            <li onclick="copyIBAN('iban{{$key}}')" style="cursor: pointer;">
                                <strong style="background-color: transparent; color:#ff9800">{{$bankinfo->bank_name}} : </strong> <span id="iban{{$key}}" style="color: white; text-align: right;">{{$bankinfo->iban_no}}</span>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
