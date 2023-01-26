<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::select('call getClients()');
        // dd($clients);
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getCities = DB::select('call SP_GetCities()');
        $dealingTypes = DB::table('dealing_type')->get();
        return view('clients.create', compact('getCities', 'dealingTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'unique:clients'],
            'phone' => 'required',
            'address' => 'required',
            'dealing_id' => 'required',
        ]);

        DB::table('clients')->insert([
            'name' => $request->name,
            'city_id' => $request->address,
            'phone' => $request->phone,
            'dealing_id' => $request->dealing_id
        ]);

        return redirect()->back()->with('success', "تمت الاضافة بنجاح");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get ClientData
        $clientData = DB::select("call getClientById($id)");
        // Get Cities
        $cities = DB::select('call SP_getCities()');
        // Get DealingType
        $dealingTypes = DB::table('dealing_type')->get();
        return view('clients.edit', compact('clientData', 'cities', 'dealingTypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'dealing_id' => 'required'
        ]);


        DB::table('clients')->where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'dealing_id' => $request->dealing_id,
            'city_id' => $request->address
        ]);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('clients')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
