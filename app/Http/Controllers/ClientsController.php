<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = DB::table('getClients')->get();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getCities = DB::table('getCities')->get();
        return view('clients.create', compact('getCities'));
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
            'address' => 'required'
        ]);

        DB::table('clients')->insert([
            'name' => $request->name,
            'city_id' => $request->address,
            'phone' => $request->phone
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
        $clientData = DB::table('clients')
            ->join('lk_city', 'clients.city_id', '=', 'lk_city.id', 'left')
            ->join('lk_state', 'lk_city.state_id', '=', 'lk_state.id', 'left')
            ->where('clients.id', $id)
            ->get(['clients.id', 'clients.name', 'clients.phone', 'lk_city.name as cityName', 'lk_city.id AS city_id', 'lk_state.name AS stateName']);

        $cities = DB::table('getCities')->get();
        return view('clients.edit', compact('clientData', 'cities'));
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
            'address' => 'required'
        ]);


        DB::table('clients')->where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
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
