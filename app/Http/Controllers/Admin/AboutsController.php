<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aboutsus;
use App\Models\Tools;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;    

    class AboutsusController extends Controller
    {
        public function index()
        {
            // $tools = Tools::all();
            $aboutsus = Aboutsus::all();
            return view('admin.aboutsus.index',compact('aboutsus','tools'));
        }

    
        public function create()
        {
            $aboutsus = Aboutsus::all();
            return view('admin.aboutsus.create',compact('aboutsus'));
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
                    $aboutsus = Aboutsus::create($request->all());
                    if ($request->image) {
                        $this->storeImage($aboutsus);
                    }
                    return redirect()->route('aboutsus.index');
                }
        }

            
        public function edit($id)
        {
            $aboutsus = Aboutsus::find($id);
            return view('admin.aboutsus.edit', compact('aboutsus'));
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
                    $aboutsus = Aboutsus::find($id);
                    $aboutsus->update($request->all());
                    if ($request->image) {
                        $this->storeImage($aboutsus);
                    }
                }
                return redirect()->route('aboutsus.index');
        }

    
        public function destroy($id)
        {
            $aboutsus = Aboutsus::find($id);
            if ($aboutsus->image){
                unlink(public_path() . '/storage/' . $aboutsus->image );
            }
            $aboutsus->delete();
            Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
            return redirect()->route('aboutsus.index');
        
        }
        

        private function storeImage($aboutsus)
        {
            if (request()->has('image')) {
                $aboutsus->update([
                    'image' => \request()->image->store('aboutsus', 'public'),
                ]);
            }
            $image = Image::make(public_path('storage/' . $aboutsus->image));
            $image->save();
            
        }
           
    }
