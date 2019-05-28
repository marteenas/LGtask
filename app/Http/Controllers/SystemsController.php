<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SystemsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $systems = \App\System::all();

        return view('system')->with(['systems' => $systems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('forms/edit_system')->with(['system' => new \App\System]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $system = new \App\System([
            'name' => $request->get('system_name'),
        ]);

        $system->save();

        return redirect('systems')->with('status', 'Sistema sukurta.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //$system = \App\System::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $system = \App\System::find($id);
        return view('forms/edit_system')->with(['system' => $system]);
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
            'system_name' => 'required',
        ]);

        $system = \App\System::find($id);

        $system->name = $request->get('system_name');
        $system->save();

        return redirect('systems')->with('status', 'Sistema atnaujinta.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $system = \App\System::find($id);
        $system->delete();

        return redirect('systems')->with('status', 'Sistema pašalinta.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter($id) {
        $systems = \App\Service::find($id)->systems()->get();
        return view('system')->with(['systems' => $systems]);
    }

}
