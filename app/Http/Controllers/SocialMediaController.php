<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use App\Models\User;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = auth()->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $merchant=User::Where('url',$this->user->url)->first();
        return view('merchant_panel.socialmedia.create',compact('merchant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'socialMediaSelect' => 'required|string', 
            'social_media_url' => 'nullable|url|max:2000', 
        ]);
        $selectedSocialMedia = $request->input('socialMediaSelect');
        $socialMediaParts = explode('|', $selectedSocialMedia);
        $socialMediaValue = $socialMediaParts[0]; // Örneğin: "facebook"
        $socialMediaText = $socialMediaParts[1]; // Örneğin: "Facebook"
        SocialMedia::create([
            'merchant_id'=>$this->user->id,
            'social_media_icon'=>'fa fa-'.$socialMediaValue,
            'social_media_name'=>$socialMediaText,
            'social_media_url'=>$request->social_media_url,
        ]);
        return redirect()->route('socialmedia.show', ['socialmedia' => $this->user->url])->with('success', 'Sosyal medya hesap bilgisi ekleme işlemi başarılı.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $url)
    {
        //
        $merchant=User::Where('url',$url)->first();
        $socialmedias=SocialMedia::where('merchant_id',$merchant->id)->get();
        return view('merchant_panel.socialmedia.index',compact('merchant','socialmedias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $merchant=User::Where('url',$this->user->url)->first();
        $socialmedia=SocialMedia::Where('id',$id)->first();
        return view('merchant_panel.socialmedia.edit',compact('merchant','socialmedia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $validatedData = $request->validate([
                'socialMediaSelect' => 'required|string',
                'social_media_url' => 'nullable|url|max:2000',
            ]);
            $selectedSocialMedia = $request->input('socialMediaSelect');
            $socialMediaParts = explode('|', $selectedSocialMedia);
            $socialMediaValue = $socialMediaParts[0]; // Örneğin: "facebook"
            $socialMediaText = $socialMediaParts[1]; // Örneğin: "Facebook"
            $socialmedia=SocialMedia::findOrFail($id);
            $socialmedia->social_media_icon='fa fa-'.$request->socialMediaValue;
            $socialmedia->social_media_name=$socialMediaText;
            $socialmedia->social_media_url=$request->social_media_url;
            $socialmedia->save();
            return redirect()->route('socialmedia.show', ['socialmedia' => $this->user->url])->with('success', 'Sosyal medya hesap bilgileri güncellendi.');
        } catch (\Throwable $th) {
            return redirect()->route('socialmedia.show', ['socialmedia' => $this->user->url])->with('error', 'Sosyal medya hesap bilgileri güncelleme işlemi sırasında bir hata oluştu.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $socialmedia = SocialMedia::findOrFail($id);

        if ($socialmedia) {
            $socialmedia->delete();
            return redirect()->route('socialmedia.show', ['socialmedia' => $this->user->url])->with('success', 'İban Bilgisi başarıyla silindi.');
        } else {
            return redirect()->route('socialmedia.show', ['socialmedia' => $this->user->url])->with('error', 'İban Bilgisi bulunamadı.');
        }
    
    }
}
