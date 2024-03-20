<!-- profile socials -->
<div class="social">
    @foreach($socialmedias as $key => $socialmedia)
    <a target="_blank" href="{{$socialmedia->social_media_url}}" style="display: inline-block;">
        @if($socialmedia->social_media_icon=='fa fa-x-twitter')
        <td class="text-center">
            <img src="{{ asset('storage/x-twitter.svg') }}" style="width: 30px; height: 30px;" alt="SVG Image">
        </td>
        @else
        <span class="{{$socialmedia->social_media_icon}}" style="font-size: 35px;"></span>
        @endif
    </a>
    @endforeach
</div>
