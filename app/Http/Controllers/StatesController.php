<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = DB::table("lk_state")->join('shippingList', 'lk_state.shippingList_id', '=', 'shippingList.id', 'inner')->get(['lk_state.id as id', 'lk_state.name as name', 'lk_state.shippingValue as shippingValue', 'shippingList.name as shippingName']);
        return view('states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shippingList = DB::table('shippingList')->get();
        return view('states.create', compact('shippingList'));
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
            'name' => ['required', 'unique:lk_state'],
            'shippingValue' => 'required',
            'shippingList_id' => 'required'
        ]);

        DB::table('lk_state')->insert([
            'name' => $request->name,
            'shippingValue' => $request->shippingValue,
            'shippingList_id' => $request->shippingList_id
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
        $state = DB::table('lk_state')->find($id); // 1Row
        return view('states.edit', compact('state'));
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
        // dd($request, $id);
        $this->validate($request, [
            'name' => 'required',
            'shippingValue' => 'required'
        ]);

        DB::table('lk_state')->where('id', $id)->update([
            'name' => $request->name,
            'shippingValue' => $request->shippingValue
        ]);
        return redirect()->back()->with('success', "تم التعديل بنجاح");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('lk_state')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
