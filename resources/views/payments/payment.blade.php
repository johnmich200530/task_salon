<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Book Appointment</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>




<div class="container mt-4">

<div class="main-nav mb-3">
  <a href="/dashboard" class="nav-tab">Services</a>
  <a href="/appointments" class="nav-tab">appointment</a>
   <a href="/payments" class="nav-tab">payment</a>
</div>

  <h1>Manage payments</h1>


    
 



  <hr>



  <table class="product-table">

    <thead>

      <tr>

        <th>ID</th>

        <th>Service Name</th>

        <th>Customer Name</th>

          <th>Contact</th>
        
        <th>Date</th>

        <th>Time</th>

        <th>Price</th>

        <th>Status</th>

        <th>Action</th>

      </tr>

    </thead>

    <tbody>

      @foreach($appointments as $appointment)

      <tr>

        <td>{{  $appointment->id }}</td>

        <td>{{  $appointment->service->service_name}}</td>
        <td>{{  $appointment->customer_name}}</td>
        <td>{{  $appointment->contact}}</td>
        <td>{{  $appointment->date}}</td>
        <td>{{  $appointment->time}}</td>
        <td>{{  $appointment->service->price}}</td>



        <td>
          @php
            $payment = $appointment->payment;
            $status = $payment ? $payment->status : 'Unpaid';
          @endphp
          <span class="status {{ $status == 'Paid' ? 'paid' : 'unpaid' }}">
            {{ $status }}
          </span>
        </td>
        
        <td>
          @php
            $payment = $appointment->payment;
            $hasPayment = $payment && $payment->status == 'Paid';
          @endphp
          
          @if(!$hasPayment)
            <form action="/payments/{{ $appointment->id }}/pay" method="POST" style="display:inline;">
              @csrf
              <button class="pay-btn" type="submit">Pay</button>
            </form>
          @else
            <span class="paid-text">Paid</span>
          @endif
           <form action="/appointments/{{ $appointment->id }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button class="delete" type="submit" >Delete</button>
  </form>
        </td>
      </tr>
      @endforeach

    </tbody>

  </table>

</div>



</body>

</html>