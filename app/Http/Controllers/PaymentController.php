<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Appointment;
use App\Models\Service;

class PaymentController extends Controller
{
    public function paymentindex()
    {
          $appointments = Appointment::with('service', 'payment')->get();

        return view('payments.payment', [
            'appointments' => $appointments
        ]);
    }

        public function payAppointment($appointmentId)
    {
        $appointment = Appointment::findOrFail($appointmentId);
        
        // Create or update payment
        $payment = $appointment->payment()->updateOrCreate(
            ['appointment_id' => $appointmentId],
            [
                'service_id' => $appointment->service_id,
                'status' => 'Paid'
            ]
        );

        return redirect('/payments')->with('success', 'Payment marked as paid successfully!');
    }


}