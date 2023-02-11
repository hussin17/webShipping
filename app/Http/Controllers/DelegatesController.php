<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DelegatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $delegates = DB::table('delegates')->get();
        return view('delegates.index', compact('delegates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('delegates.create');
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
            'name' => 'required',
            'nationalID' => ['required', 'unique:delegates'],
            'age' => 'required',
            'address' => 'required',
            'personalPhoto' => 'required',
            'cardImage' => 'required',
            'phone1' => 'required',
            'phone2' => 'required',
            'phone3' => 'required',
            'fileNumber' => 'required',
            'tradeName' => 'required'
        ]);

        if ($request->file()) {
            $personalPhoto = $request->file('personalPhoto')->getClientOriginalName();
            $cardImage = $request->file('cardImage')->getClientOriginalName();
            $request->file('personalPhoto')->storeAs('delegates', $personalPhoto, 'uploads');
            $request->file('cardImage')->storeAs('delegates', $cardImage, 'uploads');

            DB::table('delegates')->insert([
                'name' => $request->name,
                'nationalID' => $request->nationalID,
                'age' => $request->age,
                'address' => $request->address,
                'personalPhoto' => $personalPhoto,
                'cardImage' => $cardImage,
                'phone1' => $request->phone1,
                'phone2' => $request->phone2,
                'phone3' => $request->phone3,
                'notes1' => $request->notes1,
                'notes2' => $request->notes2,
                'fileNumber' => $request->fileNumber,
                'tradeName' => $request->tradeName,
            ]);
        } else {
            DB::table('delegates')->insert([
                'name'          => $request->name,
                'nationalID'    => $request->nationalID,
                'age'           => $request->age,
                'address'       => $request->address,
                'phone1'        => $request->phone1,
                'phone2'        => $request->phone2,
                'phone3'        => $request->phone3,
                'notes1'        => $request->notes1,
                'notes2'        => $request->notes2,
                'fileNumber'    => $request->fileNumber,
                'tradeName'     => $request->tradeName,
            ]);
        }

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
        $delegateData = DB::table('delegates')->find($id);
        return view('delegates.edit', compact('delegateData'));
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
        // dd($request);
        $this->validate($request, [
            'name'          => 'required',
            'nationalID'    => 'required',
            'age'           => 'required',
            'address'       => 'required',
            'personalPhoto' => 'required',
            'cardImage'     => 'required',
            'phone1'        => 'required',
            'phone2'        => 'required',
            'phone3'        => 'required',
            'fileNumber'    => 'required',
            'tradeName'     => 'required'
        ]);

        // dd($request->file());

        if ($request->file('personalPhoto') && $request->file('cardImage')) {
            $personalPhoto = $request->file('personalPhoto')->getClientOriginalName();
            $cardImage = $request->file('cardImage')->getClientOriginalName();
            $request->file('personalPhoto')->storeAs('delegates', $personalPhoto, 'uploads');
            $request->file('cardImage')->storeAs('delegates', $cardImage, 'uploads');

            DB::table('delegates')->where('id', $id)->update([
                'name'              => $request->name,
                'nationalID'        => $request->nationalID,
                'age'               => $request->age,
                'address'           => $request->address,
                'personalPhoto'     => $personalPhoto,
                'cardImage'         => $cardImage,
                'phone1'            => $request->phone1,
                'phone2'            => $request->phone2,
                'phone3'            => $request->phone3,
                'notes1'            => $request->notes1,
                'notes2'            => $request->notes2,
                'fileNumber'        => $request->fileNumber,
                'tradeName'         => $request->tradeName
            ]);
        } else {
            DB::table('delegates')->where('id', $id)->update([
                'name'              => $request->name,
                'nationalID'        => $request->nationalID,
                'age'               => $request->age,
                'address'           => $request->address,
                'phone1'            => $request->phone1,
                'phone2'            => $request->phone2,
                'phone3'            => $request->phone3,
                'notes1'            => $request->notes1,
                'notes2'            => $request->notes2,
                'fileNumber'        => $request->fileNumber,
                'tradeName'         => $request->tradeName
            ]);
        }
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
        // get Path of my photos
        DB::table('delegates')->delete($id);
        Storage::disk('public_path')->delete($_FILES['personalPhoto']);
        return redirect()->back()->with('success', "تم الحذف بنجاح");
    }
}
