<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Popularcourses;
use App\Models\Tools;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

    class PopularCoursesController extends Controller
    {
        public function index()
        {
            // $tools = Tools::all();
            $popularcourses = Popularcourses::all();
            return view('admin.popularcourses.index',compact('popularcourses'));
        }

    
        public function create()
        {
            $popularcourses = Popularcourses::all();
            return view('admin.popularcourses.create',compact('popularcourses'));
        }


        public function store(Request $request)
        {
            $valid = $request->validate([
                'text_uz' => ['nullable', 'string'],
                'text_ru' => ['nullable', 'string'],
                'price'  => ['nullable', 'string'],
                
                
            ]);
                if ($valid) {
                    $popularcourses = Popularcourses::create($request->all());
                    if ($request->image) {
                        $this->storeImage($popularcourses);
                    }
                    return redirect()->route('popularcourses.index');
                }
        }

            
        public function edit($id)
        {
            $popularcourses = Popularcourses::find($id);
            return view('admin.popularcourses.edit', compact('popularcourses'));
        }
    


        public function update(Request $request, $id)
        {
            $valid = $request->validate([
                'text_uz' => ['nullable', 'string'],
                'text_ru' => ['nullable', 'string'],
                'price'  => ['nullable', 'string'],
            ]);
                if ($valid) {
                    $popularcourses = Popularcourses::find($id);
                    $popularcourses->update($request->all());
                    if ($request->image) {
                        $this->storeImage($popularcourses);
                    }
                }
                return redirect()->route('popularcourses.index');
        }

    
        public function destroy($id)
        {
            $popularcourses = Popularcourses::find($id);
            if ($popularcourses->image){
                unlink(public_path() . '/storage/' . $popularcourses->image );
            }
            $popularcourses->delete();
            Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
            return redirect()->route('popularcourses.index');
        
        }
        

        private function storeImage($popularcourses)
        {
            if (request()->has('image')) {
                $popularcourses->update([
                    'image' => \request()->image->store('popularcourses', 'public'),
                ]);
            }
            $image = Image::make(public_path('storage/' . $popularcourses->image));
            $image->save();
        }
           
    }
