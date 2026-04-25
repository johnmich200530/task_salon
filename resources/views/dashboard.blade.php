<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Create Service</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>


<div class="container mt-4">

<div class="main-nav mb-3">
  <a href="/dashboard" class="nav-tab">Services</a>
  <a href="/appointments" class="nav-tab">appointment</a>
   <a href="/payments" class="nav-tab">payment</a>
</div>

  <h1>Add Service</h1>



  <form action="/s_service" method="POST" class="product-form">

    @csrf

    

    <div class="form-group" style="max-width: 360px; margin-bottom: 20px;">

      <label for="name123">Service Name:</label>

      <input type="text" id="name" name="service_name">

    </div>

    
    <div class="form-group" style="max-width: 360px; margin-bottom: 20px;">

      <label for="price123 ">Price</label>

      <input type="text" id="price" name="price">

    </div>

     <div class="form-group" style="max-width: 360px; margin-bottom: 20px;">

      <label for="price123">Duration:</label>

      <input type="text" id="price" name="duration">

    </div>


     <div class="form-group" style="max-width: 360px; margin-bottom: 20px;">

      <label for="price123">Description:</label>

      <input type="text" id="price" name="description">

    </div>

    
    

    <button type="submit" class="btn-submit">Save</button>

  </form>




  <hr>



  <table class="product-table">

    <thead>

      <tr>

        <th>ID</th>

        <th>Service Name</th>

        <th>Price</th>
        
        <th>duration</th>

        <th>description</th>

        <th>Action</th>

      </tr>

    </thead>

    <tbody>

      @foreach($services as $service)

      <tr>

        <td>{{  $service->id }}</td>

        <td>{{  $service->service_name}}</td>

        <td>{{  $service->price}}</td>
        <td>{{  $service->duration}}</td>
        <td>{{  $service->description}}</td>



        <td>
          <a class="edit" href="/dashboard/{{ $service->id }}/edit">Edit</a>
          <form action="/dashboard/{{ $service->id }}" method="POST"
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