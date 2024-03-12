<?php

namespace App\Http\Controllers;

use App\Models\CompanyInfo;
use App\Models\User;
use Illuminate\Http\Request;

class CompanyInfoController extends Controller
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
        $companyinfo=CompanyInfo::Where('merchant_id',$merchant->id)->first();
        return view('merchant_panel.company.index',compact('merchant','companyinfo'));
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
            'sector' => 'required|string|max:255', // Sektör (zorunlu, en fazla 255 karakter)
            'website' => 'nullable|string|max:1000', // Web sitesi (isteğe bağlı, en fazla 255 karakter)
            'tel' => 'nullable|string|max:11', // Telefon (zorunlu, en fazla 255 karakter)
            'mail' => 'nullable|email|max:250', // E-posta (isteğe bağlı, geçerli bir e-posta adresi olmalı, en fazla 255 karakter)
            'tax_administration' => 'nullable|string|max:1000', // Vergi dairesi web sitesi (isteğe bağlı, geçerli bir URL, en fazla 255 karakter)
            'VKN' => 'nullable|string|max:50', // Vergi kimlik numarası (isteğe bağlı, en fazla 255 karakter)
            'billing_address' => 'nullable|string|max:1000', // Fatura adresi (isteğe bağlı, en fazla 1000 karakter)
            'address' => 'nullable|string|max:1000', // Adres (isteğe bağlı, en fazla 1000 karakter)
        ]);
        $companyinfo=CompanyInfo::Where('merchant_id',$this->user->id)->first();
        if($companyinfo->sector==null){
            CompanyInfo::create([
                'merchant_id'=>$this->user->id,
                'sector'=>$request->sector,
                'website'=>$request->website,
                'tel'=>$request->tel,
                'mail'=>$request->mail,
                'tax_administration'=>$request->tax_administration,
                'VKN'=>$request->VKN,
                'billing_address'=>$request->billing_address,
                'address'=>$request->address,
            ]);
        }else {
            $companyinfo->sector=$request->sector;
            $companyinfo->tel=$request->tel;
            $companyinfo->website=$request->website;
            $companyinfo->mail=$request->mail;
            $companyinfo->tax_administration=$request->tax_administration;
            $companyinfo->VKN=$request->VKN;
            $companyinfo->billing_address=$request->billing_address;
            $companyinfo->address=$request->address;
            $companyinfo->save();
        }
        return redirect()->route('companyinfo.show', ['companyinfo' => $this->user->url])->with('success', 'Şİrket Bİlgileri Güncellendi.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
