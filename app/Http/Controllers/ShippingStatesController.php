<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingStatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippingStates = DB::table('shippingStatesView')->get();
        return view('shippingStates.index', compact('shippingStates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = DB::table('lk_state')->get();
        $lists = DB::table('shippingList')->get();
        return view('shippingStates.create', compact('states', 'lists'));
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
            'state_id' => 'required',
            'list_id' => 'required',
            'shippingValue' => ['required', 'numeric']
        ]);
        DB::table('shippingStates')->insert([
            'list_id' => $request->list_id,
            'state_id' => $request->state_id,
            'shippingValue' => $request->shippingValue
        ]);
        return redirect()->back()->with('success', 'تم الاضافة بنجاح');
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
        $shippingState = DB::table('shippingStatesView')->find($id);
        $states = DB::table('lk_state')->get();
        $lists = DB::table('shippingList')->get();
        return view('shippingStates.edit', compact('shippingState', 'lists', 'states'));
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
        // dd($id, $request->list_id, $request->state_id);
        $this->validate($request, [
            'list_id' => 'required',
            'state_id' => 'required',
            'shippingValue' => 'required',
        ]);
        DB::table('shippingStates')->where('id', $id)->update([
            'list_id' => $request->list_id,
            'state_id' => $request->state_id,
            'shippingValue' => $request->shippingValue
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
        DB::table('shippingStates')->delete($id);
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
