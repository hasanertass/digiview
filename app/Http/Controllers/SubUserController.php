<?php

namespace App\Http\Controllers;

use App\Models\Subuser;
use App\Models\User;
use Illuminate\Http\Request;

class SubUserController extends Controller
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
        return view('merchant_panel.sub_user.create',compact('merchant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:100',
            'surname' => 'nullable|string|max:100',
            'title' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:300',
            'tel' => 'nullable|string|max:11',
            'mail' => 'nullable|email',
            'photograph' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'whatsap_connect_url' => 'nullable|url',
        ]);
        //$photoPath=null;
        if ($request->hasFile('photograph')) {
            $file = $request->file('photograph');
            $userId = auth()->user()->id; // Kullanıcı ID'sini al
            $randomNumber = uniqid(); // Benzersiz bir sayısal dizge oluştur
            $extension = $file->getClientOriginalExtension(); // Uzantıyı al
            $fileName = "Photograph_" . $userId . "_" . $randomNumber . "." . $extension; // Yeni dosya adını oluştur
            $filePath = $file->storeAs('photographs', $fileName, 'public'); // "public" diskini kullanarak photographs klasörüne kaydet
            // Dosyanın yolu
            $photoPath = 'storage/' . $filePath;
        }
        else {
            $photoPath=null;
        }
        Subuser::create([
            'merchant_id'=>$this->user->id,
            'name'=>$request->name,
            'surname'=>$request->surname,
            'title'=>$request->title,
            'description'=>$request->description,
            'tel'=>$request->tel,
            'mail'=>$request->mail,
            'photograph'=>$photoPath,
            'whatsap_connect_url'=>$request->whatsap_connect_url,
        ]);
        return redirect()->route('subuser.show', ['subuser' => $this->user->url])->with('success', 'Kullanıcı Bilgisi Kayıt Edildi.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $url)
    {
        //
        $merchant=User::where('url',$url)->first();
        $subusers=Subuser::where('merchant_id',$merchant->id)->get();
        return view('merchant_panel.sub_user.index',compact('merchant','subusers'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $merchant=User::Where('url',$this->user->url)->first();
        $subuser=Subuser::where('merchant_id',$merchant->id)->first();
        return view('merchant_panel.sub_user.edit',compact('merchant','subuser'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'nullable|string|max:100',
                'surname' => 'nullable|string|max:100',
                'title' => 'nullable|string|max:100',
                'description' => 'nullable|string|max:300',
                'tel' => 'nullable|string|max:11',
                'mail' => 'nullable|email',
                'photograph' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
                'whatsap_connect_url' => 'nullable|url',
            ]);
            $subuser=Subuser::findOrFail($id);
            if ($request->hasFile('photograph')) {
                $file = $request->file('photograph');
                $userId = auth()->user()->id; // Kullanıcı ID'sini al
                $randomNumber = uniqid(); // Benzersiz bir sayısal dizge oluştur
                $extension = $file->getClientOriginalExtension(); // Uzantıyı al
                $fileName = "Photograph_" . $userId . "_" . $randomNumber . "." . $extension; // Yeni dosya adını oluştur
                $filePath = $file->storeAs('photographs', $fileName, 'public'); // "public" diskini kullanarak photographs klasörüne kaydet
                // Dosyanın yolu
                $photoPath = 'storage/' . $filePath;
                $old_photo=$subuser->photograph;
                $subuser->photograph=$photoPath;
            }
            $subuser->name=$request->name;
            $subuser->surname=$request->surname;
            $subuser->title=$request->title;
            $subuser->tel=$request->tel;
            $subuser->mail=$request->mail;
            $subuser->description=$request->description;
            $subuser->whatsap_connect_url=$request->whatsap_connect_url;
            $subuser->save();
            unlink(public_path($old_photo));
            return redirect()->route('subuser.show', ['subuser' => $this->user->url])->with('success', 'Alt kullanıcı bilgileri güncellendi.');
        } catch (\Throwable $th) {
            return redirect()->route('subuser.show', ['subuser' => $this->user->url])->with('error', 'Alt Kullanıcı Bilgileri güncelleme işlemi başarısız.');
        }
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subuser = Subuser::findOrFail($id);

        if ($subuser) {
            $subuser->delete();
            return redirect()->route('subuser.show', ['subuser' => $this->user->url])->with('success', 'Kullanıcı başarıyla silindi.');
        } else {
            return redirect()->route('subuser.show', ['subuser' => $this->user->url])->with('error', 'Kullanıcı bulunamadı.');
        }
    }
}
