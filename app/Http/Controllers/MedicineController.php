<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\MedicineCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $medicineCategories = MedicineCategory::all();
        // $medicines          = Medicine::all();
        // return json_encode(array('medicineCategories'=>$medicineCategories,'medicines'=>$medicines));

        $medicines = DB::table('medicines')
        ->leftJoin('medicine_categories','medicines.medicineCategory','medicine_categories.id')
        ->select('medicines.*','medicine_categories.categoryName','medicine_categories.medicineType')
        ->get();
        return $medicines;
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicines = Medicine::create($request->all());
        return $medicines;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medicines = DB::table('medicines')
        ->leftJoin('medicine_categories','medicines.medicineCategory','medicine_categories.id')
        ->select('medicines.*','medicine_categories.categoryName','medicine_categories.medicineType')
        ->where('medicines.id',$id)
        ->first();
        return json_encode($medicines);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return Medicine::find($id)->update($request->all());
        $medicine = array();
        $medicine['barcode'] = $request->barcode;
        $medicine['medicineName'] = $request->medicineName;
        $medicine['strength'] = $request->strength;
        $medicine['medicineCategory'] = $request->medicineCategory;
        $medicine['medicineType'] = $request->medicineType;
        $medicine['generic'] = $request->generic;
        $medicine['medicineCompanay'] = $request->medicineCompanay;
        $medicine['medicineIndication'] = $request->medicineIndication;
        $medicine['unit'] = $request->unit;
        $medicine['minLevel'] = $request->minLevel;
        $medicine['tax'] = $request->tax;
        $medicine['packing'] = $request->packing;
        $medicine['packSize'] = $request->packSize;
        $medicine['modeOfAction'] = $request->modeOfAction;
        $medicine['photo'] = $request->photo;
        $medicine['note'] = $request->note;
        $medicine['updated_at'] = date('Y-m-d H:i:s');
        return DB::table('medicines')->where('id',$request->id)->update($medicine);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Medicine::find($id)->delete();
        return response()->json(['massage' => 'data deleted'],200);
    }
}