<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuppliersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get Client name, phone
        // Get Supplier name, phone
        $suppliers = DB::table('suppliers')->get();
        // dd($suppliers);
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
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
            'name' => ['required', 'unique:suppliers'],
            'phone' => 'required',
            // 'address' => 'required',
            // 'dealing_id' => 'required',
        ]);

        DB::table('suppliers')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            // 'city_id' => $request->address,
            // 'dealing_id' => $request->dealing_id
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
        $supplierData = DB::table('suppliers')->find($id);
        return view('suppliers.edit', compact('supplierData'));
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
            // 'address' => 'required',
            // 'dealing_id' => 'required'
        ]);

        DB::table('suppliers')->where('id', $id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            // 'dealing_id' => $request->dealing_id,
            // 'city_id' => $request->address
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
        DB::table('suppliers')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
