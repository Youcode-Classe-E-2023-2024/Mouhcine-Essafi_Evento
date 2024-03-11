<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmReservation;
use App\Mail\NewEventNotification;
use App\Mail\Reservation;
use App\Mail\TicketReservation;
use App\Models\Event;
use App\Models\Reserver;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function paiement($id)
    {
        $user = Auth::user();
        $event = Event::find($id);

        if ($event->reservation_type == 'manuel') {
            $reservation = new Reserver();
            $reservation->client = $user->id;
            $reservation->event = $event->id;
            $reservation->status = 'En attente';
            $reservation->save();

            Mail::to($user->email)->send(new ConfirmReservation($event, $user));
            Session::flash('success', 'Your reservation request has been submitted. You will receive a confirmation once it is approved.');

            return back()->with('success', 'Your reservation request has been submitted. You will receive a confirmation once it is approved.');

        } else {
            $event = Event::find($id);

            $reservation = new Reserver();
            $reservation->client = $user->id;
            $reservation->event = $event->id;
            $reservation->status = 'Reservée';
            $reservation->save();

            return view('paiement', compact('event'));
        }
    }


    /***
     * Envoyer un email apres la reservation
     */
    public function buy($id)
    {
        $user = Auth::user();

        $event = Event::find($id);

        if ($event && $event->nbr_place > 0) {
            $event->nbr_place -= 1;

            $event->save();

            Mail::to($user->email)->send(new TicketReservation($event, $user));

            Session::flash('success', 'Your reservation has been confirmed. An email has been sent to you.');


            return redirect('/');
        } else {
            return back()->with('error', 'No places available for reservation.');
        }
    }

    public function CheckReservation()
    {
        $events = Reserver::where('status', 'En attente')->get();

        return view('organisateur.reservations', compact('events'));
    }

    public function approveReservation($id)
    {
        $event = Reserver::findOrFail($id);
        $event->status = 'Reservée';
        $event->save();

        return redirect()->back();
    }

    public function declineReservation($id)
    {
        $event = Reserver::findOrFail($id);
        $event->status = 'Refusée';
        $event->save();

        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}