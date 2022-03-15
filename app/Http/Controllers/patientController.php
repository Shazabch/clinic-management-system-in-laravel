<?php

namespace App\Http\Controllers;

use App\Models\patient;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
class patientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mr_number = IdGenerator::generate(['table' => 'patients','field'=>'mr_number','length' => 6, 'prefix' =>date('y')]);
                $request->validate([
                    'first_name'=>'required',
                    'last_name'=>'required',
                    'age'=>'required',
                    'phone'=>'required',
                    'address'=>'required',
                    
                ]);
               $patient = new patient();
               $patient->first_name = $request->input('first_name');
               $patient->last_name = $request->input('last_name');
               $patient->age = $request->input('age');
               $patient->phone = $request->input('phone');
               $patient->address = $request->input('address');
               $patient->mr_number = $mr_number;
               $patient->save();
               return redirect()->route('home')->with('added','Patient Added Successfully');
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
       $patient=patient::find($id);
       return view('patient.edit',compact('patient'));

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
        $patient = patient::find($id);
        $patient->first_name = $request->first_name;
        $patient->last_name = $request->last_name;
        $patient->age = $request->age;
        $patient->phone = $request->phone;
        $patient->address = $request->address;
        $patient->save();
        return redirect()->route('home')->with('updated','The patient data is updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $patient=patient::find($id);
        $patient->delete();
        return redirect()->route('home')->with('danger','Patient Removed Successfully');
        
    }
}
