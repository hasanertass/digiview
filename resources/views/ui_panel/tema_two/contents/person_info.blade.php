<!--
				Card - Kişisel Bilgiler
			-->
<div class="card-inner animated active" id="about-card">
    <div class="card-wrap">
        <div class="content about">
            @if($personinfo->description)
            <div class="title " style="text-align: center">{{__('personinfo.kisisel_bilgiler')}}</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-box">
                        <p style="color: white">
                            {{$personinfo->description}}
                        </p>
                    </div>
                </div>
            </div>
            @endif
            <div class="title" style="text-align: center">{{__('personinfo.iletisim_bilgileri')}}</div>
            <div class="col-md-12">
                <div class="" style="margin-top: 20px;">
                    <ul>
                        @if($personinfo->title)
                        <li><strong style="background-color: transparent; color:#ff9800"> {{__('personinfo.ünvan')}} </strong><a href="tel:+9{{$personinfo->title}}" style="color: white">{{$personinfo->tel}}</a></li>
                        <hr style="color: white">
                        @endif
                        @if($personinfo->tel)
                        <li><strong style="background-color: transparent; color:#ff9800">{{__('personinfo.telefon')}}</strong><a href="tel:+9{{$personinfo->tel}}" style="color: white">{{$personinfo->tel}}</a></li>
                        <hr style="color: white">
                        @endif
                        @if($personinfo->tel2)
                        <li><strong style="background-color: transparent; color:#ff9800">{{__('personinfo.telefon')}}</strong><a href="tel:+9{{$personinfo->tel2}}" style="color: white">{{$personinfo->tel2}}</a></li>
                        <hr style="color: white">
                        @endif
                        @if($personinfo->mail)
                        <li><strong style="background-color: transparent; color:#ff9800">{{__('personinfo.mail')}}</strong><a href="mailto:{{$personinfo->mail }}" style="color: white">{{$personinfo->mail }}</a></li>
                        <hr style="color: white">
                        @endif
                        @if($personinfo->mail2)
                        <li><strong style="background-color: transparent; color:#ff9800">{{__('personinfo.mail')}}</strong><a href="mailto:{{$personinfo->mail2 }}" style="color: white">{{$personinfo->mail2 }}</a></li>
                        <hr style="color: white">
                        @endif
                        @if($personinfo->location)
                        <li style="color: white"><strong style="background-color: transparent; color:#ff9800">{{__('personinfo.adres')}}</strong>{{$personinfo->location}}</li>
                        <hr style="color: white">
                        @endif
                        @if($personinfo->website_url)
                        <li><strong style="background-color: transparent; color:#ff9800">{{__('personinfo.website')}}</strong><a href=" {{$personinfo->website_url}}" style="color: white; text-align:right">{{$personinfo->website_url}}</a></li>
                        <hr style="color: white">
                        @endif
                        @if($personinfo->website_url2)
                        <li><strong style="background-color: transparent; color:#ff9800">{{__('personinfo.website')}}</strong><a href=" {{$personinfo->website_url2}}" style="color: white; text-align:right">{{$personinfo->website_url2}}</a></li>
                        <hr style="color: white">
                        @endif
                        @if($personinfo->whatsap_connect_url)
                        <li><strong style="background-color: transparent; color:#ff9800">{{__('personinfo.whatsap')}} </strong><a href=" {{$personinfo->whatsap_connect_url}}" style="color: white; text-align:right">{{$personinfo->whatsap_connect_url}}</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
