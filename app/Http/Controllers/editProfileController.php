<?php

namespace App\Http\Controllers;

use App\Models\Trainer\TrPlace;
use Illuminate\Http\Request;
use App\Models\Trainer\Trainer;
use App\Models\Trainer\TrDiscipline;
use App\Models\Trainer\TrLocation;
use App\Models\Trainer\TrCertificate;
use App\Models\Trainer\TrUniversity;
use App\Models\Trainer\TrOffer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class editProfileController extends Controller
{

    protected function updatePrimaryInfo(Request $request)
    {

        if ($request['trainer_id'] == '') $trainer_id = Auth::user()->id;  
        else $trainer_id = $request['trainer_id'];

        $trainer = Trainer::findOrFail($trainer_id);

        if ($request['name'] == '') $trainer->name = NULL;  
        else $trainer->name = $request['name'];
        if ($request['surname'] == '') $trainer->surname = NULL; 
        else $trainer->surname = $request['surname'];
        if ($request['gender'] == '') $trainer->gender = NULL; 
        else $trainer->gender = $request['gender'];
        if ($request['bdate'] == '') $trainer->bdate = NULL;      
        else $trainer->bdate = $request['bdate'];
        if ($request['phone'] == '') $trainer->phone = NULL; 
        else $trainer->phone = $request['phone'];
        if ($request['facebook'] == '') $trainer->facebook = NULL; 
        else $trainer->facebook = $request['facebook'];
        if ($request['instagram'] == '') $trainer->instagram = NULL; 
        else $trainer->instagram = $request['instagram'];
        if ($request['page'] == '') $trainer->page = NULL; 
        else $trainer->page = $request['page'];

        $trainer->save();

        return redirect('/editProfile');
        
    } 


    protected function addCity(Request $request)
    {
        if (TrLocation::where('city', '=', $request['city'])
            ->where('voivodeship', '=', $request['voivodeship'])
            ->where('trainer_id', '=', $request['id'])
            ->exists()) 
        {
            return ('Podane miasto już znajduje się w profilu.');
        }
        else
        {
            TrLocation::create([
                'city' => $request['city'],
                'voivodeship' => $request['voivodeship'],
                'trainer_id' => Auth::user()->id,
            ]);

            return redirect('/editProfile');
        }
    }


    protected function destroyCity($id)
    {

        $trLocation = TrLocation::findOrFail($id);
        $trLocation->delete();

        return redirect('/editProfile');
    }


    protected function updateSpecificInfo(Request $request)
    {
        $trainer = Trainer::findOrFail(Auth::user()->id);
        $trainer->description = $request['description'];
        $trainer->save();

        return redirect('/editProfile');
    }


    protected function updateDisciplines(Request $request)
    {

        $deletedRows = TrDiscipline::where('trainer_id', $request['trainer_id'])->delete();

        $data = $request->except('trainer_id', '_token');
        foreach($data as $discipline_url_name => $value)
        {
            if ($discipline_url_name != "MMA") {$discipline_url_name = Str::lower($discipline_url_name);};
            $discipline_name = str_replace('_', ' ', $discipline_url_name);
            if ($discipline_name != "MMA" || $discipline_name != "łyżwiarstwo") { $discipline_name = ucfirst($discipline_name); };
            if ($discipline_name == "łyżwiarstwo") { $discipline_name = "Łyżwiarstwo"; };


            TrDiscipline::create([
                'trainer_id' => $request['trainer_id'],
                'discipline_name' => $discipline_name,
                'discipline_url_name' => $discipline_url_name,
            ]);   
        }

        return redirect('/editProfile');
    }


    protected function addCourse(Request $request)
    {

        if (TrCertificate::where('name_of_institution', '=', $request['place'])
            ->where('name_of_course', '=', $request['name'])
            ->where('trainer_id', '=', Auth::user()->id)
            ->exists()) 
        {
            return ('Certyfikat zawierjący podaną placówkę oraz nazwę kursu juz istnieje.');
        }
        else
        {

            if($request->hasFile('zalacznik'))
            {
                $originalFilename = $request->file('zalacznik')->getClientOriginalName();
                $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
                $extension = $request->file('zalacznik')->getClientOriginalExtension();
                $finalFilename = $fileName.'_'.time().'.'.$extension;
                $path = $request->file('zalacznik')->storeAs('public/trainers_certificates/'.auth()->user()->id, $finalFilename);
            }
            else
            {
                $finalFilename = NULL;
            } 
            

            TrCertificate::create([
                'name_of_institution' => $request['place'],
                'name_of_course' => $request['name'],
                'begin_date' => $request['begin_date'],
                'end_date' => $request['end_date'],
                'zalacznik' => $finalFilename,
                'trainer_id' => Auth::user()->id,
            ]);

            return redirect('/editProfile');
        }
    }


    protected function editCourse(Request $request)
    {
        if (TrCertificate::where('id', '!=', $request['id'])
            ->where('name_of_institution', '=', $request['name_of_institution'])
            ->where('name_of_course', '=', $request['name_of_course'])
            ->where('trainer_id', '=', Auth::user()->id)
            ->exists()) 
        {
            return ('Taki certyfikat już znajduje się w Twojej liście.');
        }
        else
        {
            $trCertificate = TrCertificate::findOrFail($request['id']);

            if($request->hasFile('zalacznik'))
            {
                $originalFilename = $request->file('zalacznik')->getClientOriginalName();
                $fileName = pathinfo($originalFilename, PATHINFO_FILENAME);
                $extension = $request->file('zalacznik')->getClientOriginalExtension();
                $finalFilename = $fileName.'_'.time().'.'.$extension;

                if($trCertificate->zalacznik != NULL) Storage::delete('public/trainers_certificates/'.Auth::user()->id.'/'.$trCertificate->zalacznik);

                $path = $request->file('zalacznik')->storeAs('public/trainers_certificates/'.auth()->user()->id, $finalFilename);
            }

            if ($request['name_of_institution'] != '')  $trCertificate->name_of_institution = $request['name_of_institution'];
            if ($request['name_of_course'] != '')       $trCertificate->name_of_course = $request['name_of_course'];
            if ($request['begin_date'] == '')           $trCertificate->begin_date = NULL;      
            else                                        $trCertificate->begin_date = $request['begin_date'];
            if ($request['end_date'] == '')             $trCertificate->end_date = NULL;      
            else                                        $trCertificate->end_date = $request['end_date'];
            if($request->hasFile('zalacznik'))          $trCertificate->zalacznik = $finalFilename;
            $trCertificate->save();

            return redirect('/editProfile');
        }

    }

    
    protected function destroyCourse($id)
    {
        $trainer = Trainer::findOrFail(Auth()->user()->id);
        $trCertificate = TrCertificate::findOrFail($id);

        if ($trCertificate->trainer_id = $trainer->id)
        {
            if($trCertificate->zalacznik != NULL) Storage::delete('public/trainers_certificates/'.$trainer->id.'/'.$trCertificate->zalacznik);
            $trCertificate->delete();
        }

        return redirect('/editProfile');

    }


    protected function addUni(Request $request)
    {

        if (TrUniversity::where('university', '=', $request['name'])
            ->where('course', '=', $request['course'])
            ->where('degree', '=', $request['degree'])
            ->where('trainer_id', '=', Auth::user()->id)
            ->exists()) 
        {
            return ('Twoja lista uczelni zawiera podaną placówkę, kierunek oraz stopień.');
        }
        else
        {
            TrUniversity::create([
                'university' => $request['name'],
                'course' => $request['course'],
                'degree' => $request['degree'],
                'begin_date' => $request['begin_date'],
                'end_date' => $request['end_date'],
                'trainer_id' => Auth::user()->id,
            ]);

            return redirect('/editProfile');
        }
    }


    protected function editUni(Request $request)
    {
        if (TrUniversity::where('id', '!=', $request['id'])
            ->where('university', '=', $request['university'])
            ->where('course', '=', $request['course'])
            ->where('degree', '=', $request['degree'])
            ->where('trainer_id', '=', Auth::user()->id)
            ->exists()) 
        {
            return ('Taki kierunek studiów już znajduje się w Twojej liście.');
        }
        else
        {
            $trUniversity = TrUniversity::findOrFail($request['id']);
            if ($request['university'] != '')   $trUniversity->university = $request['university'];
            if ($request['course'] != '')       $trUniversity->course = $request['course'];
            if ($request['degree'] != '')       $trUniversity->degree = $request['degree'];
            if ($request['begin_date'] == '')           $trUniversity->begin_date = NULL;      
            else                                        $trUniversity->begin_date = $request['begin_date'];
            if ($request['end_date'] == '')             $trUniversity->end_date = NULL;      
            else                                        $trUniversity->end_date = $request['end_date'];
            $trUniversity->save();

            return redirect('/editProfile');
        }

    }


    protected function destroyUni($id)
    {

        $trUniversity = TrUniversity::findOrFail($id);
        $trUniversity->delete();

        return redirect('/editProfile');

    }


    protected function addTrainerOffer(Request $request)
    {

        if (TrOffer::where('name', '=', $request['classes_name'])
            ->where('price', '=', $request['price'])
            ->where('max_no_of_clients', '=', $request['numbers_of_members'])
            ->where('trainer_id', '=', Auth::user()->id)
            ->exists()) 
        {
            return ('Ten typ zajęć już istnieje.');
        }
        else
        {
            TrOffer::create([
                'name' => $request['classes_name'],
                'price' => $request['price'],
                'max_no_of_clients' => $request['numbers_of_members'],
                'trainer_id' => Auth::user()->id,
            ]);

            return redirect('/editProfile');
        }
    }


    protected function editTrainerOffer(Request $request)
    {
        if (TrOffer::where('id', '!=', $request['id'])
            ->where('name', '=', $request['name'])
            ->where('price', '=', $request['price'])
            ->where('max_no_of_clients', '=', $request['members'])
            ->where('trainer_id', '=', Auth::user()->id)
            ->exists()) 
        {
            return ('Taka oferta już znajduje się w Twojej liście.');
        }
        else
        {
            $trOffer = TrOffer::findOrFail($request['id']);
            $trOffer->name = $request['name'];
            if ($request['price'] == '')    $trOffer->price = NULL;
            else $trOffer->price = $request['price'];
            $trOffer->max_no_of_clients = $request['members'];
            $trOffer->save();

            return redirect('/editProfile');
        }

    }


    protected function destroyOffer($id)
    {

        $trOffer = TrOffer::findOrFail($id);
        $trOffer->delete();

        return redirect('/editProfile');
    }

    protected function addTrainersPlace(Request $request)
    {
        if (TrPlace::where('place', '=', $request['location-name'])
            ->where('trainer_id', '=', Auth::user()->id)
            ->exists())
        {
            return ('To miejsce znajduje się już na liście Twoich lokalizacji.');
        }
        else
        {
            TrPlace::create([
                'place' => $request['location-name'],
                'longitude' => $request['location-longitude'],
                'latitude' => $request['location-latitude'],
                'trainer_id' => Auth::user()->id,
            ]);

            return redirect('/editProfile');
        }
    }

    protected function destroyTrainersPlace($id)
    {

        $trPlace = TrPlace::findOrFail($id);
        $trPlace->delete();

        return redirect('/editProfile');

    }


    protected function updateEmailInfo(Request $request)
    {

        if ($request['current_email'] != Auth::user()->email)
        {
            return ('Podany obecny adres email jest nieprawidłowy.');
        }
        else if (Trainer::where('id', '!=', Auth::user()->id)
                ->where('email', '=', $request['new_email'])
                ->exists()) 
        {
            return ('Podany nowy adres email jest nieprawidłowy.');
        }
        else
        {
            $trainer = Trainer::findOrFail(Auth::user()->id);
            $trainer->email = $request['new_email'];
            $trainer->save();

            return redirect('/editProfile');
        }

    } 


    protected function editPasswordInfo(Request $request)
    {
        if (Hash::check($request['current_password'], Auth::user()->password))
        {
            $trainer = Trainer::findOrFail(Auth::user()->id);
            if ($request['new_password'] != '') $trainer->password = Hash::make($request['new_password']);
            $trainer->save();

            return redirect('/editProfile');
        }
        else
        {
            return ('Podano złe hasło.');
        }
    }


}
