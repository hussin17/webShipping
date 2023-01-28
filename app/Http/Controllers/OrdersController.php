<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = DB::select('Call SP_getOrders()');
        return view('orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = DB::table('clients')->get();
        $suppliers = DB::table('suppliers')->get();
        $lk_city = DB::table('lk_city')->get();
        return view('orders.create', compact('clients', 'suppliers', 'lk_city'));
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
            'clientName' => 'required',
            'supplierName' => 'required',
            'mount' => 'required',
            'originPlace' => 'required',
            'deliveryPlace' => 'required'
        ]);

        DB::table('orders')->insert([
            'client_id' => $request->clientName,
            'supplier_id' => $request->supplierName,
            'mount' => $request->mount,
            'size' => $request->size,
            'weight' => $request->weight,
            'notes' => $request->notes,
            'origin_place' => $request->originPlace,
            'delivery_place' => $request->deliveryPlace,
            'details_address' => $request->details_address
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
        $orderData = DB::select("Call SP_getOrderById($id)");
        $clients = DB::table('clients')->get();
        $suppliers = DB::table('suppliers')->get();
        $lk_city = DB::table('lk_city')->get();
        $orderData = $orderData[0];
        return view('orders.edit', compact('orderData', 'clients', 'suppliers', 'lk_city'));
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
            'mount' => 'required',
            'notes' => 'required',

        ]);

        DB::table('orders')->where('id', $id)->update([
            'client_id' => $request->clientName,
            'supplier_id' => $request->supplierName,
            'mount' => $request->mount,
            'size' => $request->size,
            'weight' => $request->weight,
            'notes' => $request->notes,
            'origin_place' => $request->originPlace,
            'delivery_place' => $request->deliveryPlace,
            'details_address' => $request->details_address
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
        DB::table('orders')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
