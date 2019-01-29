<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trainer\Trainer;
use App\Models\Trainer\TrTraining;
use App\Models\Trainer\TrOrderedTrainings;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CalendarController extends Controller
{

    protected function addTraining(Request $request)
    {

        if ($request['begin_time'] > $request['end_time'])  return ("Źle wprowadzono godziny");
        else
        {
            if (TrTraining::where('date', $request['date'])
                ->where('begin_time',$request['begin_time'])
                ->where('trainer_id',Auth::user()->id)
                ->exists())
            {
                return ("Trening na tą godzinę juz istnieje");
            }
            else
            {
                TrTraining::create([
                    'date' => $request['date'],
                    'name' => $request['name'],
                    'begin_time' => $request['begin_time'],
                    'end_time' => $request['end_time'],
                    'status' => "wolne",
                    'place' => $request['place'],
                    'price' => $request['price'],
                    'client_limit' => $request['client_limit'],
                    'description' => $request['description'],
                    'actual_client_number' => 0,
                    'trainer_id' => Auth::user()->id,
                ]);

            return redirect('/editProfile');

            }
        }

    }


    protected function editTraining(Request $request)
    {

        $training = TrTraining::findOrFail($request['id']);

        if ($request['client_limit'] < $training->actual_client_number) return ("Nowa liczba klientów jest mniejsza niż aktualna liczba klientów");
        else
        {   
            $send_mail = 0;

            if ($request['client_limit'] > $training->client_limit)                                     $training->status = "wolne";

            if ($request['name'] != '')                                                                 $training->name = $request['name'];
            if ($request['date'] != '' && $request['date'] != $training->date)                          $training->date = $request['date']; $send_mail = 1;
            if ($request['client_limit'] != '' && $request['client_limit'] != $training->client_limit)  $training->client_limit = $request['client_limit']; $send_mail = 1;
            if ($request['begin_time'] != '' && $request['begin_time'] != $training->begin_time)        $training->begin_time = $request['begin_time']; $send_mail = 1;     
            if ($request['end_time'] != '' && $request['end_time'] != $training->end_time)              $training->end_time = $request['end_time']; $send_mail = 1;   
            if ($request['price'] != $training->price)                                                  $training->price = $request['price']; $send_mail = 1;  
            if ($request['description'] != $training->description)                                      $training->description = $request['description']; $send_mail = 1;  
            $training->save();

            /*// mail do klienta
            if ($send_mail == 1)
            {

            }*/
        
        }

        return redirect('/editProfile');

    }


    protected function deleteTraining($id)
    {
        $trTraining = TrTraining::findOrFail($id);
        if ($trTraining->actual_client_number > 0)
        {  
            return ("Nie można usunąć treningu");
        }
        else 
        {
            $trTraining->delete();
            return redirect('/editProfile');
        }

    }


    protected function deleteOldTrainings(Request $request)
    {

        if ($request['begin_date'] > $request['end_date'])  return ("Źle wprowadzono dni");
        else
        {
            $trTraining = TrTraining::where('trainer_id', Auth::user()->id)
                                    ->whereBetween('date', [$request['begin_date'], $request['end_date']]);
        
            $trTraining->delete();

        }
            
        return redirect('/editProfile');
    }

    protected function orderTraining(Request $request)
    {

        if (TrOrderedTrainings::where(function ($query) use ($request)
            {
                $query->where('training_id', $request['id'])
                      ->where('email', $request['email']);
            })
            ->exists())
        {
                return ('Nie można zajerestrować się na trening z podanymi danymi.');
        }
        else
        {

            $delete_token = str_random(16);

            if (TrTraining::where('status', '=', "zajęty")
                ->where('id', '=', $request['id'])
                ->exists()) 
            {
                return ('Podany termin jest niedostępny.');
            }
            else
            {

                TrOrderedTrainings::create([
                    'name' => $request['name'],
                    'surname' => $request['surname'],
                    'phone' => $request['phone'],
                    'email' => $request['email'],
                    'comment' => $request['comment'],
                    'training_id' => $request['id'],
                    'delete_token' => Hash::make($delete_token),
                ]);


                $training = TrTraining::find($request['id']);
                $training->actual_client_number = $training->actual_client_number + 1;
                if($training->client_limit == $training->actual_client_number) $training->status = "zajęte";
                $training->save();
                
                $trainer_mail = Trainer::find($training->trainer_id)->email;


                $data  = array( 'email' => $request['email'],
                        'date'  => $training->date,
                        'begin_time' => $training->begin_time,
                        'end_time' => $training->end_time,
                        'name'  => $training->name,
                        'place' => $training->place,
                        'price' => $training->price,
                        'description' => $training->description,
                        'delete_token' => $delete_token,
                        'training_id' => $training->id);
                
                // Wysłanie maila do klienta
                app('App\Http\Controllers\MailController')->calendar_register_client_email($data);

                // Wysłanie maila do trenera
                app('App\Http\Controllers\MailController')->calendar_register_trainer_email($data, $trainer_mail);

                return redirect('/profiles/'.$training->trainer_id);
            }
        }

    }


    protected function deleteOrder(Request $request)
    {
        $parameters = request()->only(['delete_token','id']);
        $id = request()->get('id');
        $delete_token = request()->get('delete_token');

        $orderedTraining = TrOrderedTrainings::findOrFail($id);

        if (Hash::check($delete_token, $orderedTraining->delete_token))
        {
        
            $training_id = $orderedTraining->training_id;

            $training = TrTraining::findOrFail($training_id);
            $training->actual_client_number = $training->actual_client_number - 1;
            if( $training->client_limit > $training->actual_client_number) $training->status = "wolne";
            $training->save();

            // Wysłanie maila do trenera
            app('App\Http\Controllers\MailController')->calendar_resignation_trainer_email($training, $orderedTraining);

            $orderedTraining->delete();

            return ("Rejestracja z treningu została anulowana.");
        }

    }


    protected function futureTrainerTrainings($id)
    {

        $findstatus = Trainer::findOrFail($id);

        return TrTraining::orderBy('date', 'ASC')
                        ->with('trOrdTr')
                        ->where('trainer_id','=',$id)
                        ->where('date', '>=', Carbon::today())
                        ->get()->toJson(JSON_PRETTY_PRINT);

    }

    protected function pastTrainerTrainings($id)
    {

        $findstatus = Trainer::findOrFail($id);

        return TrTraining::orderBy('date', 'DESC')
                        ->with('trOrdTr')
                        ->where('trainer_id','=',$id)
                        ->where('date', '<', Carbon::today())
                        ->get()->toJson(JSON_PRETTY_PRINT);
                        
    }


}