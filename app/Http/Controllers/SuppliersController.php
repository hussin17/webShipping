<?php

namespace App\Http\Controllers;

use Faker\Extension\FileExtension;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        $suppliers = DB::table('suppliers')
            ->join('lk_city AS personalAddress', 'suppliers.personalAddress', '=', 'personalAddress.id', 'left')
            ->join('lk_city AS tradeAddress', 'suppliers.tradeAddress', '=', 'tradeAddress.id')
            ->get(['suppliers.id', 'suppliers.logo', 'suppliers.name', 'suppliers.location', 'suppliers.tradeName', 'suppliers.personalPhone1', 'suppliers.personalPhone2', 'suppliers.tradePhone1', 'suppliers.tradePhone2', 'personalAddress.name AS personalAddress', 'tradeAddress.name AS tradeAddress', 'suppliers.recordNumber']);
        return view('suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getCities = DB::table("getCities")->get();
        return view('suppliers.create', compact('getCities'));
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
            'name'              => 'required',
            'tradeName'         => 'required',
            'personalPhone1'    => 'required',
            'personalPhone2'    => 'required',
            'tradePhone1'       => 'required',
            'personalAddress'   => 'required',
        ]);

        // upload image [logo]
        $logo = $request->file('logo');
        if ($logo) {
            $fileExtension = $logo->getClientOriginalExtension();
            $fileName = time() . '.' . $fileExtension;
            $path = 'uploads/suppliers';
            $logo->move($path, $fileName);
        } else {
            $fileName = NULL;
        }

        DB::table('suppliers')->insert([
            'logo'              => $fileName,
            'location'          => $request->location,
            'name'              => $request->name,
            'tradeName'         => $request->tradeName,
            'personalPhone1'    => $request->personalPhone1,
            'personalPhone2'    => $request->personalPhone2,
            'tradePhone1'       => $request->tradePhone1,
            'tradePhone2'       => $request->tradePhone2,
            'personalAddress'   => $request->personalAddress,
            'tradeAddress'      => $request->tradeAddress,
            'recordNumber'      => $request->recordNumber,
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
        // $supplierData = DB::select("call SP_getSupplierByID($id)");
        $supplierData = DB::table('suppliers')
            ->join('lk_city AS personalAddress', 'suppliers.personalAddress', '=', 'personalAddress.id', 'left')
            ->join('lk_city AS tradeAddress', 'suppliers.tradeAddress', '=', 'tradeAddress.id')
            ->where('suppliers.id', $id)
            ->get(['suppliers.id', 'suppliers.logo', 'suppliers.location', 'suppliers.name', 'suppliers.tradeName', 'suppliers.personalPhone1', 'suppliers.personalPhone2', 'suppliers.tradePhone1', 'suppliers.tradePhone2', 'personalAddress.id AS personalAddressID', 'personalAddress.name AS personalAddress', 'tradeAddress.id AS tradeAddressID', 'tradeAddress.name AS tradeAddress', 'suppliers.recordNumber']);
        $getCities = DB::table("getCities")->get();
        $supplierData = $supplierData[0];
        return view('suppliers.edit', compact('supplierData', 'getCities'));
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
            'name'              => 'required',
            'personalPhone1'    => 'required',
            'tradePhone1'       => 'required',
            'personalAddress'   => 'required'
        ]);

        if (!empty($request->file('logo'))) {
            $row = DB::table('suppliers')->find($id);
            $row->logo ? unlink('uploads/suppliers/' . $row->logo) : '';
            $fileExtension = $request->file('logo')->getClientOriginalExtension();
            $fileName = time() . '.' . $fileExtension;
            $path = 'uploads/suppliers';
            $request->file('logo')->move($path, $fileName);
            DB::table('suppliers')->where('id', $id)->update([
                'logo'              => $fileName,
                'location'          => $request->location,
                'name'              => $request->name,
                'tradeName'         => $request->tradeName,
                'personalPhone1'    => $request->personalPhone1,
                'personalPhone2'    => $request->personalPhone2,
                'tradePhone1'       => $request->tradePhone1,
                'tradePhone2'       => $request->tradePhone2,
                'personalAddress'   => $request->personalAddress,
                'tradeAddress'      => $request->tradeAddress,
                'recordNumber'      => $request->recordNumber
            ]);
        } else {
            DB::table('suppliers')->where('id', $id)->update([
                'name'              => $request->name,
                'location'          => $request->location,
                'tradeName'         => $request->tradeName,
                'personalPhone1'    => $request->personalPhone1,
                'personalPhone2'    => $request->personalPhone2,
                'tradePhone1'       => $request->tradePhone1,
                'tradePhone2'       => $request->tradePhone2,
                'personalAddress'   => $request->personalAddress,
                'tradeAddress'      => $request->tradeAddress,
                'recordNumber'      => $request->recordNumber
            ]);
        }

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
        $row = DB::table('suppliers')->find($id);
        $row->logo ? unlink('uploads/suppliers/' . $row->logo) : '';
        DB::table('suppliers')->delete($id);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
