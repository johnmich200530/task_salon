<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index(){
        $services = Service::all();

        return view('dashboard', [
            'services' => $services
        ]);
    }

    public function store(Request $request){
        Service::create([
            'service_name' => $request -> service_name,
            'price' => $request -> price,
            'duration' => $request -> duration,
            'description' => $request -> description
        ]);

        return redirect('/dashboard');
    }

    public function edit($id)
    {
        $services = Service::findOrFail($id);

        return view('dashboardedit', [
            'service' => $services,
        ]);
    }

    public function update(Request $request, $id)
{
    $services = Service::findOrFail($id);
    
    $services->update([
        'service_name'=> $request->service_name,
        'price'=> $request->price,
        'duration'=> $request->duration,
        'description'=> $request->description,

    ]);
    return redirect('/dashboard');

}

public function destroy($id)
{
    $services = Service::findOrFail($id);

    $services->delete();

    return redirect('/dashboard');

}
}