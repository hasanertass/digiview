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
                        <li style="margin-bottom: 10px;">
                            <strong>{{$catalog->catalog_name}}</strong>
                            <a href="{{ asset($catalog->file_path) }}" class="btn btn-primary" target="_blank" download onclick="incrementDownloads('{{ $catalog->id }}')">{{__('downloadcontent.file_download')}}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
@endif
