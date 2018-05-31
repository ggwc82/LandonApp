<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Room as Room;
use App\Client as Client;
use App\Reservation as Reservation;

class ReservationsController extends Controller
{
    //
    public function bookRoom($client_id,$room_id, $date_in, $date_out)
    {   
        $reservation = new Reservation();
        $client_instance = new Client();
        $room_instance = new Room();

        $client = $client_instance->find($client_id);
        $room = $room_instance->find($room_id);
        $reservation->date_in = $date_in;
        $reservation->date_out = $date_out;

        //need to associate the client and room with the reservation before saving
        $reservation->room()->associate($room);
        $reservation->client()->associate($client);

        $reservation->save();

        return redirect()->route('clients');
        // return view('reservations/bookRoom');
    }
}
