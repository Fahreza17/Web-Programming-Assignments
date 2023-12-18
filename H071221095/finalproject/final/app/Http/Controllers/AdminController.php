<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Pasien;
use App\Models\Apoteker;
use Illuminate\Http\Request;
use App\Http\Controllers\AdminController;

class AdminController extends Controller
{
    public function doctorview() 
    {
            $data = Doctor::all();

        return view('admin.doctor', compact('data'));
    }

    public function tambahandoctor() 
    {
        return view('admin.tambahdoctor');
    }

    public function upload(Request $request){
        // image
        $doctor=new doctor;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('doctorimage', $imageName);
            $doctor->image = $imageName;
        }

        $doctor->name=$request->name;
        $doctor->phone=$request->phone;
        $doctor->room=$request->room;
        $doctor->spesialis=$request->spesialis;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Added Successfully');    
    }

    public function pasienview() 
{
    $pasien = Pasien::all();

    return view('admin.pasien', compact('pasien'));
}

public function tambahanpasien() 
    {
        return view('admin.tambahpasien');
    }

public function uploadpasien(Request $request)
{
    // Validate the request
    $request->validate([
        'name' => 'required',
        'gender' => 'required',
        'origin' => 'required',
        'birth' => 'required',
        'treatment' => 'required',
        'phone' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move('pasienimage', $imageName);

        // Save data to the database
        $pasien = new Pasien;
        $pasien->name = $request->name;
        $pasien->gender = $request->gender;
        $pasien->origin = $request->origin;
        $pasien->birth = $request->birth;
        $pasien->treatment = $request->treatment;
        $pasien->phone = $request->phone;
        $pasien->image = $imageName; // Save the image file name, not the file itself
        $pasien->save();

        return redirect()->back()->with('message', 'Pasien Added Successfully');
    }

    return redirect()->back()->with('error', 'Failed to upload image');
}

public function apotekerview() 
{
    $apoteker= Apoteker::all();

    return view('admin.apoteker', compact('apoteker'));
}

public function tambahanapoteker() 
    {
        return view('admin.tambahapoteker');
    }

public function uploadapoteker(Request $request)
{
    // Validate the request
    $request->validate([
        'name' => 'required',
        'phone' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move('apotekerimage', $imageName);

        // Save data to the database
        $apoteker = new Apoteker;
        $apoteker->name = $request->name;
        $apoteker->phone = $request->phone;
        $apoteker->image = $imageName; // Save the image file name, not the file itself
        $apoteker->save();

        return redirect()->back()->with('message', 'Apoteker Added Successfully');
    }

    return redirect()->back()->with('error', 'Failed to upload image');
}
}
