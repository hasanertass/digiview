<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\CatalogLink;
use App\Models\User;
use Illuminate\Http\Request;

class CatalogLinkController extends Controller
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
        return view('merchant_panel.catalog.create',compact('merchant'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'catalog_name' => 'required|string|max:25',
            'file_path' => 'nullable|mimes:pdf|max:10000',
        ]);
        $count=CatalogLink::where('merchant_id',$this->user->id)->count();
        if ($this->user->packet_type=='digiviewpro'&&$count<5) {
            $path=null;
            if ($request->hasFile('file_path')) {
                $lastCatalogId = CatalogLink::orderBy('id', 'desc')->first();
                if ($lastCatalogId) {
                    $newCatalogId = $lastCatalogId->id + 1; // Son ID'den bir sonraki ID'yi belirle
                } else {
                    // Eğer hiç kayıt yoksa, yeni bir ID olarak 1'i kullanabiliriz
                    $newCatalogId = 1;
                }                $file = $request->file('file_path');
                $userId = auth()->user()->id; // Kullanıcı ID'sini al
                $extension = $file->getClientOriginalExtension(); // Uzantıyı al
                $fileName = $userId."Catalog" . $newCatalogId .'.'. $extension; // Yeni dosya adını oluştur
                $filePath = $file->storeAs('catalogs', $fileName, 'public'); // "public" diskini kullanarak photographs klasörüne kaydet

                // Dosyanın yolu
                $path = 'storage/' . $filePath;
            }
            CatalogLink::create([
                'merchant_id'=>$this->user->id,
                'file_path'=>$path,
                'catalog_name'=>$request->catalog_name,
            ]);
            return redirect()->route('catalog.show', ['catalog' => $this->user->url])->with('success', 'İndirilebilir içerik kayıt edildi');
        }elseif ($this->user->packet_type=='digiviewbusiness'&&$count<10) {
            $path=null;
            if ($request->hasFile('file_path')) {
                $lastCatalogId = CatalogLink::orderBy('id', 'desc')->first();
                $newCatalogId = $lastCatalogId + 1; // Son ID'den bir sonraki ID'yi belirle
                $file = $request->file('file_path');
                $userId = auth()->user()->id; // Kullanıcı ID'sini al
                $extension = $file->getClientOriginalExtension(); // Uzantıyı al
                $fileName = $userId."Catalog" . $newCatalogId . $extension; // Yeni dosya adını oluştur
                $filePath = $file->storeAs('catalogs', $fileName, 'public'); // "public" diskini kullanarak photographs klasörüne kaydet

                // Dosyanın yolu
                $path = 'storage/' . $filePath;
            }
            CatalogLink::create([
                'merchant_id'=>$this->user->id,
                'file_path'=>$path,
                'catalog_name'=>$request->catalog_name,
            ]);
            return redirect()->route('catalog.show', ['catalog' => $this->user->url])->with('success', 'İndirilebilir içerik kayıt edildi');
        }else {
            return redirect()->route('catalog.show', ['catalog' => $this->user->url])->with('error', 'İndirilebilir içerik sınırna ulaştınız');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $url)
    {
        //
        $merchant=User::Where('url',$url)->first();
        $catalogs=CatalogLink::Where('merchant_id',$merchant->id)->get();
        return view('merchant_panel.catalog.index',compact('merchant','catalogs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $merchant=User::Where('url',$this->user->url)->first();
        $catalog=CatalogLink::Where('id',$id)->first();
        return view('merchant_panel.catalog.edit',compact('merchant','catalog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'catalog_name' => 'required|string|max:25',
            'file_path' => 'nullable|mimes:pdf|max:10000',
        ]);
        $old_catalog=CatalogLink::findOrFail($id);
        if ($request->hasFile('file_path')) {

            if (file_exists(public_path($old_catalog->file_path))) {
                unlink(public_path($old_catalog->file_path));
            }

            $lastCatalogId = CatalogLink::orderBy('id', 'desc')->first();
            $newCatalogId = $lastCatalogId->id + 1; // Son ID'den bir sonraki ID'yi belirle
            $file = $request->file('file_path');
            $userId = auth()->user()->id; // Kullanıcı ID'sini al
            $extension = $file->getClientOriginalExtension(); // Uzantıyı al
            $fileName = $userId."Catalog" . $newCatalogId .'.'. $extension; // Yeni dosya adını oluştur
            $filePath = $file->storeAs('catalogs', $fileName, 'public'); // "public" diskini kullanarak photographs klasörüne kaydet
            $path = 'storage/' . $filePath;

            $old_catalog->file_path=$path;
        }
        $old_catalog->catalog_name=$request->catalog_name;
        $old_catalog->save();
        return redirect()->route('catalog.show', ['catalog' => $this->user->url])->with('success', 'İndirilebilir içerik güncelleme işlemi başarılı.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $catalog = CatalogLink::findOrFail($id);
        $catalog->delete();
    
        // 2. İlgili dosyayı public dizininden sil
        if (file_exists(public_path($catalog->file_path))) {
            unlink(public_path($catalog->file_path));
        }
        return redirect()->route('catalog.show', ['catalog' => $this->user->url])->with('success', 'İndirilebilir içerik silindi');
    }

}
