<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Service;

class AppointmentController extends Controller
{
    public function appointmentindex(){
        $appointments = Appointment::all();
        $services = Service::all();

        return view('appointments.appointment',[
            'appointments' => $appointments,
            'services'=> $services
        ]);
    }

    public function appointmentstore(Request $request){
        Appointment::create([
            'customer_name' => $request -> customer_name,
            'contact'=> $request -> contact,
            'date' => $request -> date,
            'time' => $request -> time,
            "service_id" => $request -> service_id 
        ]);
        return redirect('/appointments');

    }

    public function appointmentedit($id)
    {
        $appointments = Appointment::findOrFail($id);
        $services = Service::all();

        return view('appointments.appointmentedit', [
            'appointment' => $appointments,
            'services'=> $services
        ]);
    }

    public function appointmentupdate(Request $request, $id)
{
    $appointments = Appointment::findOrFail($id);
    
    $appointments->update([
           'customer_name' => $request -> customer_name,
            'contact'=> $request -> contact,
            'date' => $request -> date,
            'time' => $request -> time,
            "service_id" => $request -> service_id 

    ]);
    return redirect('/appointments');

}

public function appointmentdestroy($id)
{
    $appointments = Appointment::findOrFail($id);

    $appointments->delete();

    return redirect('/appointments');

}
}