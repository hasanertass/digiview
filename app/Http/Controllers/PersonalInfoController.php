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
            'tel' => 'required|string|max:11',
            'tel2' => 'nullable|string|max:11',
            'mail' => 'required|email',
            'mail2' => 'nullable|email',
            'website_url' => 'nullable|url',
            'website_url2' => 'nullable|url',
            'location' => 'nullable|string',
            'location_detail' => 'nullable|string',
            'photograph' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'cv_path' => 'nullable|mimes:pdf|max:10000',
            'whatsap_connect_url' => 'required|url',
        ]);
        $personinfo=PersonalInfo::Where('merchant_id',$this->user->id)->first();
        if($personinfo->tel==null&&$personinfo->mail==null&&$personinfo->photograph==null){
            if ($request->hasFile('photograph')) {
                $file = $request->file('photograph');
                $userId = auth()->user()->id; // Kullanıcı ID'sini al
                $extension = $file->getClientOriginalExtension(); // Uzantıyı al
                $fileName = "Photograph_" . $userId . "." . $extension; // Yeni dosya adını oluştur
                $filePath = $file->storeAs('photographs', $fileName, 'public'); // "public" diskini kullanarak photographs klasörüne kaydet

                // Dosyanın yolu
                $photoPath = 'storage/' . $filePath;
            } else {
                dd('profil fotoğrafı');
                return redirect()->back()->with('error', 'Profil fotoğrafı seçilmedi.');
            }
            $cvPath=null;
            if ($request->hasFile('cv_path')) {
                $file = $request->file('cv_path');
                $userId = auth()->user()->id; // Kullanıcı ID'sini al
                $extension = $file->getClientOriginalExtension(); // Uzantıyı al
                $fileName = "CV_" . $userId . "." . $extension; // Yeni dosya adını oluştur
                $filePath = $file->storeAs('cv_files', $fileName, 'public'); // "public" diskini kullanarak photographs klasörüne kaydet

                // Dosyanın yolu
                $cvPath = 'storage/' . $filePath;
            }
            PersonalInfo::create([
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
                'cv_path'=>$cvPath,
                'whatsap_connect_url'=>$request->whatsap_connect_url,
            ]);
        }else {
            if ($request->hasFile('cv_path')) {
                $file = $request->file('cv_path');
                $userId = auth()->user()->id; // Kullanıcı ID'sini al
                $extension = $file->getClientOriginalExtension(); // Uzantıyı al
                $fileName = "CV" . $userId . "." . $extension; // Yeni dosya adını oluştur
                $filePath = $file->storeAs('cv_files', $fileName, 'public'); // "public" diskini kullanarak photographs klasörüne kaydet
                // Dosyanın yolu
                $cvPath = 'storage/' . $filePath;
                $personinfo->cv_path=$cvPath;
            }
            if ($request->hasFile('photograph')) {
                $file = $request->file('photograph');
                $userId = auth()->user()->id; // Kullanıcı ID'sini al
                $extension = $file->getClientOriginalExtension(); // Uzantıyı al
                $fileName = "Photograph" . $userId . "." . $extension; // Yeni dosya adını oluştur
                $filePath = $file->storeAs('photographs', $fileName, 'public'); // "public" diskini kullanarak photographs klasörüne kaydet

                // Dosyanın yolu
                $photoPath = 'storage/' . $filePath;
            } else {
                return redirect()->back()->with('error', 'Profil fotoğrafı seçilmedi.');
            }
            
            $personinfo->tel=$request->tel;
            $personinfo->tel2=$request->tel2;
            $personinfo->mail=$request->mail;
            $personinfo->mail2=$request->mail2;
            $personinfo->location=$request->location;
            $personinfo->location_detail=$request->location_detail;
            $personinfo->website_url=$request->website_url;
            $personinfo->website_url2=$request->website_url2;
            $personinfo->photograph=$photoPath;
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
