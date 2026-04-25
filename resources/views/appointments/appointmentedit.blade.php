<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Book Appointment</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

<div class="containernavigation">
  <a href="/dashboard" class="nav-tab">Services</a>
  <a href="/appointments" class="nav-tab">appointment</a>
   <a href="/payments" class="nav-tab">payment</a>
</div>


<div class="container mt-4">

  <h1>Book Appointment</h1>



  <form action="/a_appointment" method="POST" class="product-form">

    @csrf

    

  <div class="form-group" style="max-width: 260px; margin-bottom: 20px;">
      <label for="category123">Select Service:</label>
      <select id="category123" name="service_id" class="form-select-styled">
        <option value="">Select a Service</option>
        @foreach($services as $serivce)
          <option value="{{$serivce->id }}">{{ $serivce->service_name}}
          </option>
        @endforeach
      </select>
    </div>

    
    <div class="form-group" style="max-width: 360px; margin-bottom: 20px;">

      <label for="price123">Customer Name:</label>

      <input type="text" id="price" name="customer_name">

    </div>

      <div class="form-group" style="max-width: 360px; margin-bottom: 20px;">

      <label for="price123">Customer Contact:</label>

      <input type="text" id="price" name="contact">

    </div>
    
     <div class="form-group" style="max-width: 360px; margin-bottom: 20px;">

      <label for="price123">Select Date:</label>

      <input type="date" id="price" name="date">

    </div>


     <div class="form-group" style="max-width: 360px; margin-bottom: 20px;">

      <label for="price123">Select TIme:</label>

      <input type="time" id="price" name="time">

    </div>

    
    

    <button type="submit" class="btn-submit">Save</button>

  </form>



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
          <a class="edit" href="/appointments/{{ $appointment->id }}/edit">Edit</a>
          <form action="/appointments/{{ $appointment->id }}" method="POST"
          style="display:inline;">
          @csrf
          @method('DELETE')
          <button class="delete" type="submit">Delete</button>
      </form>
      </tr>

      @endforeach

    </tbody>

  </table>

</div>



</body>

</html>