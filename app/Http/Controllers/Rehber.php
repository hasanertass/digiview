<?php

namespace App\Http\Controllers;

use App\Models\BankInfo;
use App\Models\CompanyInfo;
use App\Models\PersonalInfo;
use App\Models\SocialMedia;
use App\Models\Subuser;
use App\Models\User;
use Illuminate\Http\Request;

class Rehber extends Controller
{
    //
    
    public function index(string $url){

        // Kişi bilgilerini veritabanından al
        $person = User::where('url', $url)->first();
        $person_info=PersonalInfo::where('merchant_id',$person->id)->first();
        $socialmedias=SocialMedia::where('merchant_id',$person->id)->get();
        $bankinfos=BankInfo::where('merchant_id',$person->id)->get();
        // Eğer kişi bulunamazsa veya bilgileri eksikse işlemi sonlandır
        if(!$person || !$person->name || !$person->surname || !$person_info->tel || !$person->email) {
            return redirect()->back()->with('error', 'Kişi bilgileri eksik veya hatalı.');
        }
    
        // Kişinin adı ve soyadını birleştirerek tam ad oluştur
        $tamAd = $person->name . ' ' . $person->surname;
    
        // VCF dosyasının adı ve yolu
        $dosyaAdi = $person->name . '_' . $person->surname . '.vcf';
    
        // VCF dosyasını oluştur
        $dosya = fopen($dosyaAdi, 'w');
    
        // Kişinin VCF formatına uygun bilgilerini dosyaya yaz
        fwrite($dosya, "BEGIN:VCARD\r\n");
        fwrite($dosya, "VERSION:3.0\r\n");
        fwrite($dosya, "N:{$person->surname};{$person->name};;;\r\n");
        fwrite($dosya, "FN:$tamAd\r\n");
        fwrite($dosya, "TEL;TYPE=CELL:{$person_info->tel}\r\n");
        if($person_info->tel2){
            fwrite($dosya, "TEL;TYPE=CELL:{$person_info->tel2}\r\n");
        }
        fwrite($dosya, "EMAIL:{$person_info->mail}\r\n");
        if ($person_info->mail2) {
            fwrite($dosya, "EMAIL:{$person_info->mail2}\r\n");
        }
        if ($person_info->website_url) {
            fwrite($dosya, "URL:{$person_info->website_url}\r\n");
        }
        if ($person_info->website_url2) {
            fwrite($dosya, "URL:{$person_info->website_url2}\r\n");
        }
        fwrite($dosya, "ADR:{$person_info->location}\r\n");

        foreach ($socialmedias as $socialmedia) {
            fwrite($dosya, "URL:{$socialmedia->social_media_url}\r\n");
        }
        $fotoBase64 = base64_encode(file_get_contents($person_info->photograph));
        fwrite($dosya, "PHOTO;ENCODING=b;TYPE=JPEG:{$fotoBase64}\r\n");

        if ($bankinfos->isEmpty()) {
            // $bankinfos dizisi boş ise, bir işlem yapma
            fwrite($dosya, "NOTE:IBAN: Banka bilgisi bulunamadı\r\n");
        } else {
            $bankInfoString='';
            foreach ($bankinfos as $key => $bankinfo) {
                $bankInfoString .= $bankinfo->iban_no . '; \n';
            }
            fwrite($dosya, "NOTE:$bankInfoString\r\n");

        }

        fwrite($dosya, "END:VCARD\r\n");
        // Dosyayı kapat
        fclose($dosya);

        // Dosyanın tam yolunu elde et
        $dosyaYolu = public_path($dosyaAdi);

        // Dosyayı indirme bağlantısını oluştur
        return response()->download($dosyaYolu)->deleteFileAfterSend();
    }
    public function index2(string $url,$id){

        // Kişi bilgilerini veritabanından al
        $person = User::where('url', $url)->first();
        $subuser=Subuser::where('id',$id)->first();
        $socialmedias=SocialMedia::where('merchant_id',$person->id)->get();
        $bankinfos=BankInfo::where('merchant_id',$person->id)->get();
        $companyinfo=CompanyInfo::where('merchant_id',$person->id)->first();
        // Eğer kişi bulunamazsa veya bilgileri eksikse işlemi sonlandır
        if(!$subuser || !$subuser->name || !$subuser->surname || !$subuser->tel || !$subuser->mail) {
            return redirect()->back()->with('error', 'Kişi bilgileri eksik veya hatalı.');
        }
    
        // Kişinin adı ve soyadını birleştirerek tam ad oluştur
        $tamAd = $subuser->name . ' ' . $subuser->surname;
    
        // VCF dosyasının adı ve yolu
        $dosyaAdi = $subuser->name . '_' . $subuser->surname . '.vcf';
    
        // VCF dosyasını oluştur
        $dosya = fopen($dosyaAdi, 'w');
    
        // Kişinin VCF formatına uygun bilgilerini dosyaya yaz
        fwrite($dosya, "BEGIN:VCARD\r\n");
        fwrite($dosya, "VERSION:3.0\r\n");
        fwrite($dosya, "N:{$subuser->surname};{$subuser->name};;;\r\n");
        fwrite($dosya, "FN:$tamAd\r\n");
        if($subuser->tel){
            fwrite($dosya, "TEL;TYPE=CELL:{$subuser->tel}\r\n");
        }
        if ($subuser->mail) {
            fwrite($dosya, "EMAIL:{$subuser->mail}\r\n");
        }
        if ($companyinfo->website_url) {
            fwrite($dosya, "URL:{$companyinfo->website_url}\r\n");
        }
        foreach ($socialmedias as $socialmedia) {
            fwrite($dosya, "URL:{$socialmedia->social_media_url}\r\n");
        }
        $fotoBase64 = base64_encode(file_get_contents($subuser->photograph));
        fwrite($dosya, "PHOTO;ENCODING=b;TYPE=JPEG:{$fotoBase64}\r\n");

        if ($bankinfos->isEmpty()) {
            // $bankinfos dizisi boş ise, bir işlem yapma
            fwrite($dosya, "NOTE:IBAN: Banka bilgisi bulunamadı\r\n");
        } else {
            $bankInfoString='';    
            foreach ($bankinfos as $key => $bankinfo) {
                $bankInfoString .= 'Banka Adı : '.$bankinfo->bank_name.' \n    Alıcı Ad-Soyad : '.$bankinfo->name_surname.' \n    İban No : '.$bankinfo->iban_no . '; \n';
            }
            fwrite($dosya, "NOTE:$bankInfoString\r\n");

        }

        fwrite($dosya, "END:VCARD\r\n");
        // Dosyayı kapat
        fclose($dosya);

        // Dosyanın tam yolunu elde et
        $dosyaYolu = public_path($dosyaAdi);

        // Dosyayı indirme bağlantısını oluştur
        return response()->download($dosyaYolu)->deleteFileAfterSend();
    }
}
