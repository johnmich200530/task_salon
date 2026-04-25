<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Edit project</title>

  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>



<div class="container mt-4">

  <h1>Edit Products</h1>



  <form action="/dashboard/{{ $service->id }}" method="POST" class="product-form">

    @csrf
    @method('PUT')

    

   
    <div class="form-group" style="max-width: 360px; margin-bottom: 20px;">

      <label for="name123">Service Name:</label>

      <input type="text" id="name" name="service_name" value="{{$service->service_name}}">

    </div>

    

   <div class="form-group" style="max-width: 360px; margin-bottom: 20px;">

      <label for="price123">Price:</label>

      <input type="text" id="price" name="price"value="{{$service->price}}">

    </div>

           <div class="form-group" style="max-width: 360px; margin-bottom: 20px;">

      <label for="price123">Duration:</label>

      <input type="text" id="price" name="duration" value="{{$service->duration}}">

    </div>

      <div class="form-group" style="max-width: 360px; margin-bottom: 20px;">

      <label for="price123">Description:</label>

      <input type="text" id="price" name="description" value="{{$service->description}}">

    </div>
    

    <button type="submit" class="btn-submit">update</button>

</form>

<hr>

</div>

</body>
</html>