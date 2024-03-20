<?php

namespace App\Http\Controllers;

use App\Models\PersonalInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PersonalInfoController extends Controller
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
        return view('merchant_panel.personalinfo');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $url)
    {
        //
        $merchant=User::Where('url',$this->user->url)->first();
        $personinfo=PersonalInfo::Where('merchant_id',$merchant->id)->first();
        return view('merchant_panel.person.index',compact('merchant','personinfo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request);
        $validatedData = $request->validate([
            'title' => 'nullable|string|max:50',
            'description' => 'nullable|string|max:300',
            'tel' => 'nullable|string|max:11',
            'tel2' => 'nullable|string|max:11',
            'mail' => 'nullable|email',
            'mail2' => 'nullable|email',
            'website_url' => 'nullable|url',
            'website_url2' => 'nullable|url',
            'location' => 'nullable|string',
            'location_detail' => 'nullable|string',
            'photograph' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'backand_photograph' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'whatsap_connect_url' => 'nullable|url',
        ]);
        $personinfo=PersonalInfo::Where('merchant_id',$this->user->id)->first();
        if(!isset($personinfo->tel) && !isset($personinfo->mail) && !isset($personinfo->photograph)) {
            if ($request->hasFile('photograph')) {
                $file = $request->file('photograph');
                $userId = auth()->user()->id; // Kullanıcı ID'sini al
                $extension = $file->getClientOriginalExtension(); // Uzantıyı al
                $fileName = "Photograph_" . $userId . "." . $extension; // Yeni dosya adını oluştur
                $filePath = $file->storeAs('photographs', $fileName, 'public'); // "public" diskini kullanarak photographs klasörüne kaydet

                // Dosyanın yolu
                $photoPath = 'storage/' . $filePath;
            } else {
                return redirect()->back()->with('error', 'Profil fotoğrafı seçilmedi.');
            }
            $backand_photograph=null;
            if ($request->hasFile('backand_photograph')) {
                $file = $request->file('backand_photograph');
                $userId = auth()->user()->id; // Kullanıcı ID'sini al
                $extension = $file->getClientOriginalExtension(); // Uzantıyı al
                $fileName = "BackandPhotograph_" . $userId . "." . $extension; // Yeni dosya adını oluştur
                $filePath = $file->storeAs('BackandPhotographs', $fileName, 'public'); // "public" diskini kullanarak photographs klasörüne kaydet

                // Dosyanın yolu
                $backand_photograph = 'storage/' . $filePath;
            }
            PersonalInfo::create([
                'title'=>$request->title,
                'description'=>$request->description,
                'merchant_id'=>$this->user->id,
                'tel'=>$request->tel,
                'tel2'=>$request->tel2,
                'mail'=>$request->mail,
                'mail2'=>$request->mail2,
                'website_url'=>$request->website_url,
                'website_url2'=>$request->website_url2,
                'location'=>$request->location,
                'location_detail'=>$request->location_detail,
                'photograph'=>$photoPath,
                'backand_photograph'=>$backand_photograph,
                'whatsap_connect_url'=>$request->whatsap_connect_url,
            ]);
            return redirect()->route('personinfo.show', ['personinfo' => $this->user->url])->with('success', 'Kişisel Bİlgiler Güncellendi.');
        }else {
            if ($request->hasFile('backand_photograph')) {
                
                $file = $request->file('backand_photograph');
                $userId = auth()->user()->id; // Kullanıcı ID'sini al
                $extension = $file->getClientOriginalExtension(); // Uzantıyı al
                $fileName = "BackandPhotograph" . $userId . "." . $extension; // Yeni dosya adını oluştur
                $filePath = $file->storeAs('BackandPhotographs', $fileName, 'public'); // "public" diskini kullanarak photographs klasörüne kaydet
                // Dosyanın yolu
                $backand_photograph = 'storage/' . $filePath;
                $personinfo->backand_photograph=$backand_photograph;
            }
            if ($request->hasFile('photograph')) {
                
                $file = $request->file('photograph');
                $userId = auth()->user()->id; // Kullanıcı ID'sini al
                $extension = $file->getClientOriginalExtension(); // Uzantıyı al
                $fileName = "Photograph" . $userId . "." . $extension; // Yeni dosya adını oluştur
                $filePath = $file->storeAs('photographs', $fileName, 'public'); // "public" diskini kullanarak photographs klasörüne kaydet

                // Dosyanın yolu
                $photoPath = 'storage/' . $filePath;
                $personinfo->photograph=$photoPath;
            }
            $personinfo->title=$request->title;
            $personinfo->description=$request->description;
            $personinfo->tel=$request->tel;
            $personinfo->tel2=$request->tel2;
            $personinfo->mail=$request->mail;
            $personinfo->mail2=$request->mail2;
            $personinfo->location=$request->location;
            $personinfo->location_detail=$request->location_detail;
            $personinfo->website_url=$request->website_url;
            $personinfo->website_url2=$request->website_url2;
            $personinfo->whatsap_connect_url=$request->whatsap_connect_url;
            $personinfo->save();
            return redirect()->route('personinfo.show', ['personinfo' => $this->user->url])->with('success', 'Kişisel Bİlgiler Güncellendi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
