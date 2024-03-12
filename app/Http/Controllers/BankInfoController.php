<?php

namespace App\Http\Controllers;

use App\Models\BankInfo;
use App\Models\User;
use Illuminate\Http\Request;

class BankInfoController extends Controller
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
        return view('merchant_panel.bankinfo.create',compact('merchant'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validatedData = $request->validate([
            'iban' => 'required|string|max:26',
            'receiverName' => 'required|string',
            'bankName' => 'required|',
        ]);
        BankInfo::create([
            'bank_name'=>$request->bankName,
            'name_surname'=>$request->receiverName,
            'iban_no'=>$request->iban,
            'merchant_id'=>$this->user->id,
        ]);
        return redirect()->route('bankinfo.show', ['bankinfo' => $this->user->url])->with('success', 'İban ekleme işlemi başarılı.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $url)
    {
        //
        $merchant=User::Where('url',$this->user->url)->first();
        $bankinfos=BankInfo::Where('merchant_id',$merchant->id)->get();
        return view('merchant_panel.bankinfo.index',compact('bankinfos','merchant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $merchant=User::Where('url',$this->user->url)->first();
        $bankinfo=BankInfo::Where('id',$id)->first();
        return view('merchant_panel.bankinfo.edit',compact('merchant','bankinfo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $validatedData = $request->validate([
                'iban' => 'required|string|max:26',
                'receiverName' => 'required|string',
                'bankName' => 'required|',
            ]);
            $bankinfo=BankInfo::findOrFail($id);
            $bankinfo->iban_no=$request->iban;
            $bankinfo->name_surname=$request->receiverName;
            $bankinfo->bank_name=$request->bankName;
            $bankinfo->save();
            return redirect()->route('bankinfo.show', ['bankinfo' => $this->user->url])->with('success', 'İban bilgileri güncelleme işlemi başarılı.');
        } catch (\Throwable $th) {
            return redirect()->route('bankinfo.show', ['bankinfo' => $this->user->url])->with('error', 'İban bilgileri güncelleme işlemi sırasında bir hata oluştu.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $bankinfo = BankInfo::findOrFail($id);

        if ($bankinfo) {
            $bankinfo->delete();
            return redirect()->route('bankinfo.show', ['bankinfo' => $this->user->url])->with('success', 'İban Bilgisi başarıyla silindi.');
        } else {
            return redirect()->route('bankinfo.show', ['bankinfo' => $this->user->url])->with('error', 'İban Bilgisi bulunamadı.');
        }
    }
}
