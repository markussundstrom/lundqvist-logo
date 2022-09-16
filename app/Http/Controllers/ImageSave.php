<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageSave extends Controller
{
    
    //Testfunktion, bara för att testa saker, bortse från denna
    public function test(Request $request) {
        $imageinfo = $request->imagefile;
        $logo = $request->logocolor;
        $imageinfo->storeAs('public', $imageinfo->getClientOriginalName());
        //$image = asset('storage/' . $imageinfo->getClientOriginalName());
        $image = '../storage/' . $imageinfo->getClientOriginalName();
        return view('success', ['image' => $image, 'logo' => $logo ]);
    }
    
    //Funktion för att ta emot och behandla bild
    public function processImage (Request $request) {
        
        //Plocka ut info om bilden ur request-objektet och kolla så det verkligen skickats en bild från formuläret 
        $imageinfo = $request->imagefile;
        if ($imageinfo === null) {
            return view('error', ['errormsg' => 'Du har inte valt någon bild']);
        }
        
        //Skapa imageobjekt, path är sökvägen till den temporära filen som laddats upp
        $image = Image::make($imageinfo->path());
        
        //Kolla vilken logofärg och sociala medier som valts, skapa imageobjekt med logo av rätt färg och ställ in variabler för bredd och höjd på slutgiltig bild
        switch ($request->logocolor) {
            case 'light':
                $logo = Image::make(Storage::Disk('local')->get('lundqvist_logotyp_vit.png'));
                break;
            case 'dark':
                $logo = Image::make(Storage::Disk('local')->get('lundqvist_logotyp_vit.png'));
                break;
            default:
                return view('error', ['errormsg' => 'Du har inte valt färg för logotypen!']);
        }
        
        switch ($request->platform) {
            case 'facebook':
                $width = 1200;
                $height = 630;
                break;
            case 'instagram':
                $width = 1080;
                $height = 1080;
                break;
            default:
                return view('error', ['errormsg' => 'Du har inte valt sociala medier-plattform!']);
        }

        //Skala och beskär bilden till rätt format
        $image->fit($width, $height);
        //Skala om logo till halva bredden av bildens storlek, känns som en lämplig storlek
        $logo->widen($image->width()/2);
        //lägg in logon i nedre hörnet på bilden
        $image->insert($logo, 'bottom-right');
        
        //bygg ett filnamn, kommer att bli originalfilnamnet med -logo tillagt
        $newname = pathinfo($imageinfo->getClientOriginalName(), PATHINFO_FILENAME) 
                   . '-logo' . '.' .
                   pathinfo($imageinfo->getClientOriginalName(), PATHINFO_EXTENSION);
        //Storage::Disk('public')->put($newname, $image);
        //Spara den färdiga bilden och returnera en view där bilden visas. Vet inte om det här är bästa sättet att göra det på i Laravel
        $image->save(storage_path('app/public') . '/' . $newname);
        return view('result', ['image' => '../storage/' . $newname]);
    }


}
