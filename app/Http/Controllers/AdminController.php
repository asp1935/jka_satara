<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Event;
use App\Models\News;
use App\Models\Slider;
use App\Models\Student;
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

    /////////////////////// Event controllers///////////////////////

    public function event()
    {
        $events = Event::all();
        return view('admin.website.event', compact('events'));
    }

    public function addEvent(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30',
            'date' => 'required|date',
            'city' => 'required|string|max:20',
            'description' => 'required|string|max:50',

        ]);
        $event = new Event();
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->save();

        return redirect()->back()->with('success', 'Added Successfully !');
    }

    public function editEvent($id)
    {
        $event = Event::find($id);
        return view('admin.website.editEvent', compact('event'));
    }

    public function updateEvent(Request $request)
    {


        $request->validate([
            'title' => 'required|string|max:30',
            'date' => 'required|date',
            'city' => 'required|string|max:20',
            'description' => 'required|string|max:50',

        ]);

        $event = Event::find($request->id);
        $event->title = $request->title;
        $event->date = $request->date;
        $event->city = $request->city;
        $event->description = $request->description;
        $event->update();

        return redirect()->route('admin.event')->with('success', 'Updated Successfully !');
    }

    public function deleteEvent($id)
    {
        $event = Event::find($id);

        if (!$event) {
            return redirect()->route('admin.event')->with('error', 'News not found.');
        }

        $event->delete();

        return redirect()->route('admin.event')->with('success', 'Deleted successfully!');
    }


    /////////////////////// News controllers///////////////////////

    public function news()
    {
        $news = News::all();
        return view('admin.website.news', compact('news'));
    }

    public function addNews(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:80',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $news = new News();
        $news->title = $request->title;
        $news->date = $request->date;
        $news_img = $request->file('image');
        $extension = $news_img->getClientOriginalExtension();
        $name = time() . "news." . $extension;
        $destinationPath = public_path() . '/uploads/news_images/';
        $news_img->move($destinationPath, $name);
        $path_new = $name;

        $news->image = $path_new;
        $news->save();

        return redirect()->back()->with('success', 'Added Successfully !');
    }

    public function editNews($id)
    {
        $news = News::find($id);
        return view('admin.website.editNews', compact('news'));
    }

    public function updateNews(Request $request)
    {

        if ($request->has('updated_image')) {
            $request->validate([
                'title' => 'required|string|max:80',
                'date' => 'required|date',
                'updated_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $news = News::find($request->id);
            $filePath = public_path() . '/uploads/news_images/' . $news->image;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            $news_img = $request->updated_image;
            $extension = $news_img->getClientOriginalExtension();
            $name = time() . "news." . $extension;
            $destinationPath = public_path() . '/uploads/news_images/';
            $news_img->move($destinationPath, $name);
            $path_new = $name;

            $news->image = $path_new;
            $news->title = $request->title;
            $news->date = $request->date;

            $news->update();

        } else {
            $request->validate([
                'title' => 'required|string|max:80',
                'date' => 'required|date',
            ]);
            $news = News::find($request->id);
            $news->title = $request->title;
            $news->date = $request->date;
            $news->update();
        }
        return redirect()->route('admin.news')->with('success', 'Updated Successfully !');
    }

    public function deleteNews($id)
    {
        $news = News::find($id);

        if (!$news) {
            return redirect()->route('admin.news')->with('error', 'News not found.');
        }

        $filePath = public_path('uploads/news_images/' . $news->image);

        if (file_exists($filePath)) {
            @unlink($filePath); // Suppress errors just in case
        }

        $news->delete();

        return redirect()->route('admin.news')->with('success', 'Deleted successfully!');
    }
    ////////////////////// contact controllers////////////////////

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




    ///////////////////////// student controllers ////////////////////////////

    public function students()
    {
        $students = Student::all();
        return view('admin.student.studentList', compact('students'));
    }

}

