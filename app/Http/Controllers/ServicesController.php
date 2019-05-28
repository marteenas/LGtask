<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $services = \App\Service::with('children')->get();
        
        return view('services_all')->with(['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('forms/edit_service')->with(['service' => new \App\Service]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'service_name' => 'required',
            'service_parent_id' => 'required|integer',
        ]);

        $service = new \App\Service([
            'name' => $request->get('service_name'),
            'parent_id' => $request->get('service_parent_id'),
        ]);

        //has to be more than 0 or null
        $service->parent_id = $request->get('service_parent_id') ? $request->get('service_parent_id') : NULL;

        $service->save();

        return redirect('services')->with('status', 'Paslauga sukurta.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $service = \App\Service::find($id);

        return view('service')->with(['service' => $service, 'systems' => $service->systems()->get()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $service = \App\Service::find($id);
        
        return view('forms/edit_service')->with(['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        if (!$id) {
            return $this->store($request);
        }

        $request->validate([
            'service_name' => 'required',
            'service_parent_id' => 'required|integer',
        ]);

        $service = \App\Service::find($id);

        $service->name = $request->get('service_name');
        $service->parent_id = $request->get('service_parent_id') ? $request->get('service_parent_id') : NULL;
        $service->save();

        return redirect('services/' . $id)->with('status', 'Paslauga atnaujinta.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $system = \App\Service::find($id);
        $system->delete();

        return redirect('services')->with('status', 'Paslauga pašalinta.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSystem($id) {
        $service = \App\Service::find($id);
        
        return view('forms/edit_service_system')->with(['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addSystem(Request $request, $id) {

        $request->validate([
            'system_id' => 'required|integer',
        ]);

        $service = \App\Service::find($id);

        $service->systems()->save(\App\System::find($request->get('system_id')));

        return redirect('services/' . $id)->with('status', 'Paslaugai pridėta sistema.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  int  $system_id
     * @return \Illuminate\Http\Response
     */
    public function unsetSystem($id, $system_id) {

        $service = \App\Service::find($id);
        $service->systems()->detach(\App\System::find($system_id));

        return redirect('services/' . $id)->with('status', 'Paslaugos sistema atsieta.');
    }

}
