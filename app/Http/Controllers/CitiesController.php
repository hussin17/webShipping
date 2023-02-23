<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:اضافة مدينة|عرض المدن|تعديل المدن|حذف المدن', ['only' => ['index', 'show']]);
        $this->middleware('permission:اضافة مدينة', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل المدن', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف المدن', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = DB::table('getCities')->get();
        return view('cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = DB::table('lk_state')->get();
        return view('cities.create', compact('states'));
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
            'name' => ['required', 'unique:lk_city'],
            'state' => 'required',
        ]);

        DB::table('lk_city')->insert([
            'name' => $request->name,
            'state_id' => $request->state
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
        $city = DB::table('lk_city')->join('lk_state', 'lk_city.state_id', '=', 'lk_state.id', 'left')->where('lk_city.id', $id)->get(['lk_city.id AS cityID', 'lk_city.name AS cityName', 'lk_state.id AS stateID', 'lk_state.name AS stateName', 'lk_state.name AS stateName']);
        $states = DB::table('lk_state')->get();
        return view('cities.edit', compact('city', 'states'));
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
            'name' => ['required'],
            'state' => 'required',
        ]);


        DB::table('lk_city')->where('id', $id)->update([
            'name' => $request->name,
            'state_id' => $request->state,
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
        DB::table('lk_city')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
