<?php

namespace App\Http\Controllers;

use App\Models\BankInfo;
use App\Models\CatalogLink;
use App\Models\CompanyInfo;
use App\Models\PersonalInfo;
use App\Models\SocialMedia;
use App\Models\Subuser;
use App\Models\User;
use Illuminate\Http\Request;

class Ui_Controller extends Controller
{
    //
    public function ui(string $url){
        //dd($url);
        $tema='tema_two';
        $merchant=User::where('url',$url)->first();
        $merchant_id=$merchant->id;
        $url=$merchant->url;
        $personinfo=PersonalInfo::where('merchant_id',$merchant_id)->first();
        $companyinfo=CompanyInfo::where('merchant_id',$merchant_id)->first();
        $bankinfos=BankInfo::where('merchant_id',$merchant_id)->get();
        $socialmedias=SocialMedia::where('merchant_id',$merchant_id)->get();
        $catalogs=CatalogLink::where('merchant_id',$merchant_id)->get();
        return view('ui_panel.'.$tema.'.index',compact('url','merchant','personinfo','companyinfo','bankinfos','socialmedias','catalogs'));
    }
    public function ui_business(string $url,$id){
        $tema='tema_two';
        $merchant=User::where('url',$url)->first();
        $merchant_id=$merchant->id;
        $url=$merchant->url;
        $merchant_type=$merchant->packet_type;
        $packet='';
        if ($merchant_type=='digiviewbusiness') {
            $packet='_business';
        }
        $subuser=Subuser::where('merchant_id',$merchant_id)->first();
        $personinfo=PersonalInfo::where('merchant_id',$merchant_id)->first();
        $companyinfo=CompanyInfo::where('merchant_id',$merchant_id)->first();
        $bankinfos=BankInfo::where('merchant_id',$merchant_id)->get();
        $socialmedias=SocialMedia::where('merchant_id',$merchant_id)->get();
        $catalogs=CatalogLink::where('merchant_id',$merchant_id)->get();
        return view('ui_panel.'.$tema.'.index'.$packet,compact('url','merchant','subuser','personinfo','companyinfo','bankinfos','socialmedias','catalogs'));
    }
    public function download(string $id){
        try {
            $catalog = CatalogLink::findOrFail($id);
            $number = $catalog->download_number;
            $catalog->download_number = $number + 1;
            $catalog->save();
            
            return response()->json(['success' => true, 'message' => 'İndirme sayısı başarıyla artırıldı.']);
        } catch (\Exception $e) {
            return response()->json(['error' => false, 'message' => 'Bir hata oluştu. İndirme sayısı artırılamadı.']);
        }
    }
    
    
}
