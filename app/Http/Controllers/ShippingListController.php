<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShippingListController extends Controller
{
    public function index()
    {
        $shippingList = DB::table('shippingList')->get();
        return view('shippingList.index', compact('shippingList'));
    }

    public function create()
    {
        return view('shippingList.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        DB::table('shippingList')->insert([
            'name' => $request->name
        ]);
        return redirect()->back()->with('success', 'تم الحفظ بنجاح');
    }

    public function show()
    {
        //
    }

    public function edit($id)
    {
        $shippingList = DB::table('shippingList')->find($id);
        return view('shippingList.edit', compact('shippingList'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        DB::table('shippingList')->where('id', $id)->update([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'تم التعديل بنجاح');
    }

    public function destroy($id)
    {
        DB::table('shippingList')->delete($id);
        return redirect()->back()->with('success', 'تم الحذف بنجاح');
    }
}
