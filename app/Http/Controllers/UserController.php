<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Student;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 
    public function home()
    {
        return view('welcome');
    }

    public function contact_us(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobile = $request->mobile;
        $contact->message = $request->message;
        $contact->save();

        return redirect()->back()->with('success', 'Message Sent Successfully !');

    }

    public function admission(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'mobile' => 'required|string|regex:/^[0-9]{10}$/',
            'dob' => 'required|date',
            'occupation' => 'required|string|max:100',
            'education' => 'required|string|max:100',
            'age' => 'required|integer|min:1|max:150',
            'bloodgroup' => 'required|string|max:5',
            'height' => 'nullable|numeric|min:0|max:300',
            'weight' => 'nullable|numeric|min:0|max:500',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'branch_id' => 'required|integer',
            'sub_branch_id' => 'required|integer',

            // 'sub_branch_id' => 'required|integer|exists:sub_branches,id',
        ]);
        $studentPhoto = $request->file('photo');
        $extension = $studentPhoto->getClientOriginalExtension();
        $name = time() . "student." . $extension;
        $destinationPath = public_path() . '/uploads/student_images/';
        $studentPhoto->move($destinationPath, $name);
        $photoPath = $name;
        try {
            $student = Student::create([
                'name' => $request->name,
                'address' => $request->address,
                'mobile' => $request->mobile,
                'dob' => $request->dob,
                'occupation' => $request->occupation,
                'education' => $request->education,
                'age' => $request->age,
                'bloodgroup' => $request->bloodgroup,
                'height' => $request->height,
                'weight' => $request->weight,
                'photo' => $photoPath,
                'branch_id' => $request->branch_id,
                'sub_branch_id' => $request->sub_branch_id,
            ]);
            return redirect()->back()->with('success', 'Admission Successfully Done !');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
