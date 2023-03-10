<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        // dd($clients);
        return view('clients.index', compact('clients'));
    }

    /**
     *  Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = DB::table('suppliers')->get();
        $states = DB::table('lk_state')->get();
        $shippingStates = DB::table('shippingStatesView')->get();
        // dd($states, $shippingStates);

        return view('clients.create', compact('states', 'suppliers', 'shippingStates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        /**
         * Get Total => vShipment - shippingValue
         */
        $this->validate($request, [
            'name' => 'required',
            'state_id' => 'required',
            'phone1' => ['required', 'numeric'],
            'supplier_id' => 'required',
            'vShipment' => 'required',
            'nPieces' => 'required',
        ]);

        // dd($request->state_id, $request->supplier_id);

        DB::table('clients')->insert([
            'name'          => $request->name,
            'code'          => $request->code,
            'date_added'    => date('Y-m-d'),
            'date_updated'    => date('Y-m-d'),

            'supplier_id'   => $request -> supplier_id,
            'state_id'      => $request -> state_id, // client State

            'phone1'        => $request -> phone1,
            'phone2'        => $request -> phone2,
            'instructions'  => $request -> instructions,
            'address'       => $request -> address,
            'nPieces'       => $request -> nPieces,
            'vShipment'     => $request -> vShipment,
            'notes1'        => $request -> notes1,
            'notes2'        => $request -> notes2,
            'dimensions'    => $request -> dimensions,
            'weight'        => $request -> weight
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
        $client = DB::table('getClients')->find($id);
        // dd($client);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = DB::table('getClients')->find($id);
        $suppliers = DB::table('suppliers')->get();
        $states = DB::table('lk_state')->get();
        $shippingStates = DB::table('shippingStatesView')->get();
        return view('clients.edit', compact('client', 'shippingStates', 'suppliers', 'states'));
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
            'state_id' => 'required',
            'phone1' => ['required', 'numeric'],
            'supplier_id' => 'required',

            'vShipment' => 'required',
            'nPieces' => 'required',
        ]);
        DB::table('clients')->where('id', $id)->update([
            'name'          => $request->name,
            'code'          => $request->code,
            'date_updated'    => date('Y-m-d'),
            'supplier_id'   => $request -> supplier_id,
            'state_id'      => $request -> state_id, // client State
            'phone1'        => $request -> phone1,
            'phone2'        => $request -> phone2,
            'instructions'  => $request -> instructions,
            'address'       => $request -> address,
            'nPieces'       => $request -> nPieces,
            'vShipment'     => $request -> vShipment,
            'notes1'        => $request -> notes1,
            'notes2'        => $request -> notes2,
            'dimensions'    => $request -> dimensions,
            'weight'        => $request -> weight
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
