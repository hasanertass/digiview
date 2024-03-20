<!--
				Card - İndirilebilir İçerikler
			-->
@if(isset($catalogs) && count($catalogs) > 0)
<div class="card-inner contacts" id="contacts-card">
    <div class="card-wrap">
        <div class="content about d-flex align-items-center justify-content-center flex-column">
            <div class="title" style="text-align: center; font-size: 24px;">{{__('downloadcontent.indirilebilir')}}</div>
            <div class="col col-d-12">
                <div class="info-list" style="margin-top: 20px;">
                    <ul>
                        @foreach($catalogs as $key => $catalog)
                        <li>
                            <strong style="background-color: transparent; color:#ff9800">{{$catalog->catalog_name}}</strong>
                            <a href="{{ asset($catalog->file_path) }}" style="color: white; text-align:right" target="_blank" onclick="incrementDownloads('{{ $catalog->id }}')" download>{{__('downloadcontent.file_download')}}</a>
                        </li>
                        @endforeach
                    </ul>
                    <i class="fab fa-x-twitter" style="line-height: 1; color: rgb(30, 48, 80);"></i>
                </div>
            </div>
        </div>

    </div>
</div>
@endif
