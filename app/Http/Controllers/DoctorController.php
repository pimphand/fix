<?php

namespace App\Http\Controllers;

use App\Model\Doctor;
use App\User;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = Doctor::all();
        $doctors->map(function ($itme) {
            $itme->user = User::find($itme->user);
        });
        $data = [
            'doctors' => $doctors
        ];
        return view('doctor.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $doctors = Doctor::where('user', 0)->get();

        $data = [
            'doctors' => $doctors
        ];
        return view('doctor.create', $data);
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
            'str'   => 'required|string',
            'title' => 'required|string',
            'place'   => 'required| string',
            'address' => 'required|string',
            'graduated' => 'required|string',
            // 'active' => 'required|string',
            // 'unactivated' => 'required|string',
        ]);

        $doctor = new Doctor();
        $doctor->str = $request->str;
        $doctor->title = $request->title;
        $doctor->place = $request->place;
        $doctor->address = $request->place;
        $doctor->graduated = $request->graduated;
        $doctor->save();

        return redirect()->route('doctors.create')->with(['message' => 'input data berhasil']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $id)
    {
        //
    }
}
