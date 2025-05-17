<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Slider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function Login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function Dashboard()
    {

        if (!Auth::user()) {
            return redirect()->route('admin.index');
        }

        return view('admin.dashboard');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin');
    }

    //////////////////////Slider Controllers///////////////////////////

    public function add_Slider()
    {
        $sliders = Slider::all();
        return view('admin.addSlider', compact('sliders'));
    }

    public function add_Slider_Post(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:80',
            'description' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (str_word_count($value) > 30) {
                        $fail('The ' . $attribute . ' must not be more than 30 words.');
                    }
                }
            ],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $slider = new Slider();
        $slider->title = $request->title;
        $slider->description = $request->description;
        $slider_img = $request->file('image');
        $extension = $slider_img->getClientOriginalExtension();
        $name = time() . "sliders." . $extension;
        $destinationPath = public_path() . '/uploads/slider_images/';
        $slider_img->move($destinationPath, $name);
        $path_new = $name;

        $slider->image = $path_new;
        $slider->save();

        return redirect()->back()->with('success', 'Added Successfully !');
    }
    public function edit_Slider($id)
    {
        $slider = Slider::find($id);
        return view('admin.editSlider', compact('slider'));
    }

    public function update_Slider(Request $request)
    {

        if ($request->has('updated_image')) {
            $request->validate([
                'title' => 'required|string|max:80',
                'description' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        if (str_word_count($value) > 30) {
                            $fail('The ' . $attribute . ' must not be more than 30 words.');
                        }
                    }
                ],
                'updated_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $slider = Slider::find($request->id);
            $filePath = public_path() . '/uploads/slider_images/' . $slider->image;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $slider_img = $request->updated_image;
            $extension = $slider_img->getClientOriginalExtension();
            $name = time() . "sliders." . $extension;
            //   $path = $slider_img->storeAs('/public/slider_images/', $name);
            $destinationPath = public_path() . '/uploads/slider_images/';
            $slider_img->move($destinationPath, $name);
            $path_new = $name;

            $slider->image = $path_new;
            $slider->title = $request->title;
            $slider->description = $request->description;

            $slider->update();

        } else {
            $request->validate([
                'title' => 'required|string|max:80',
                'description' => [
                    'required',
                    function ($attribute, $value, $fail) {
                        if (str_word_count($value) > 30) {
                            $fail('The ' . $attribute . ' must not be more than 30 words.');
                        }
                    }
                ]
            ]);
            $slider = Slider::find($request->id);
            $slider->title = $request->title;
            $slider->description = $request->description;
            $slider->update();
        }
        return redirect()->route('admin.add_slider')->with('success', 'Updated Successfully !');
    }

    public function delete_Slider($id)
    {
        $slider = Slider::find($id);

        if (!$slider) {
            return redirect()->route('admin.add_slider')->with('error', 'Slider not found.');
        }

        $filePath = public_path('uploads/slider_images/' . $slider->image);

        if (file_exists($filePath)) {
            @unlink($filePath); // Suppress errors just in case
        }

        $slider->delete();

        return redirect()->route('admin.add_slider')->with('success', 'Deleted successfully!');
    }
    
    public function contact()
    {
        $contacts = Contact::all();

        return view('admin.contact', compact('contacts'));
    }

    public function delete_contact($id)
    {
        $contact = Contact::find($id);
        $contact->delete();
        return redirect()->route('admin.contact')->with('success', 'Deleted Successfully !');
    }
}
