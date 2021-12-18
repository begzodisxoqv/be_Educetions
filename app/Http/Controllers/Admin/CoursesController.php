<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Courses;
use App\Models\Tools;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

    class CoursesController extends Controller
    {
        public function index()
        {
            // $tools = Tools::all();
            $courses = Courses::all();
            return view('admin.courses.index',compact('courses','courses'));
        }

    
        public function create()
        {
            $courses = Courses::all();
            return view('admin.courses.create',compact('courses'));
        }


        public function store(Request $request)
        {
            $valid = $request->validate([
                'title_uz' => ['nullable', 'string'],
                'title_ru' => ['nullable', 'string'],
                'text_uz'  => ['nullable', 'string'],
                'text_ru'  => ['nullable', 'string'],
                
            ]);
                if ($valid) {
                    $courses = Courses::create($request->all());
                    if ($request->image) {
                        $this->storeImage($courses);
                    }
                    return redirect()->route('courses.index');
                }
        }

            
        public function edit($id)
        {
            $courses = Courses::find($id);
            return view('admin.courses.edit', compact('courses'));
        }
    


        public function update(Request $request, $id)
        {
            $valid = $request->validate([
                'title_uz' => ['nullable', 'string'],
                'title_ru' => ['nullable', 'string'],
                'text_uz'  => ['nullable', 'string'],
                'text_ru'  => ['nullable', 'string'],
            ]);
                if ($valid) {
                    $courses = Courses::find($id);
                    $courses->update($request->all());
                    if ($request->image) {
                        $this->storeImage($courses);
                    }
                }
                return redirect()->route('courses.index');
        }

    
        public function destroy($id)
        {
            $courses = Courses::find($id);
            if ($courses->image){
                unlink(public_path() . '/storage/' . $courses->image );
            }
            $courses->delete();
            Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
            return redirect()->route('courses.index');
        
        }
        

        private function storeImage($courses)
        {
            if (request()->has('image')) {
                $courses->update([
                    'image' => \request()->image->store('courses', 'public'),
                ]);
            }
            $image = Image::make(public_path('storage/' . $courses->image));
            $image->save();
            
        }
           
    }
