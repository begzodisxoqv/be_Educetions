<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banners;
use App\Models\Tools;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

    class BannersController extends Controller
    {
        public function index()
        {
            
            $banners = Banners::all();
            return view('admin.banners.index',compact('banners'));
        }

    
        public function create()
        {
            $banners = Banners::all();
            return view('admin.banners.create',compact('banners'));
        }


        public function store(Request $request)
        {
            $valid = $request->validate([
                'title_1_uz'  => ['nullable', 'string'],
                'title_1_ru'  => ['nullable', 'string'],
                'title_2_uz'  => ['nullable', 'string'],
                'title_2_ru'  => ['nullable', 'string'],
                'text_1_uz'  => ['nullable', 'string'],
                'text_2_ru'  => ['nullable', 'string'],
                'link'       => ['nullable', 'string'],
                
            ]);
                if ($valid) {
                    $banners =Banners::create($request->all());
                    return redirect()->route('banners.index');
                }
        }

            
        public function edit($id)
        {
            $banners =Banners::find($id);
            return view('admin.banners.edit', compact('banners'));
        }
    


        public function update(Request $request, $id)
        {
            $valid = $request->validate([
                'title_1_uz'  => ['nullable', 'string'],
                'title_1_ru'  => ['nullable', 'string'],
                'title_2_uz'  => ['nullable', 'string'],
                'title_2_ru'  => ['nullable', 'string'],
                'text_1_uz'  => ['nullable', 'string'],
                'text_2_ru'  => ['nullable', 'string'],
                'vido'       => ['nullable', 'string'],
            ]);
                if ($valid) {
                    $banners =Banners::find($id);
                    $banners->update($request->all());
                   
                }
                return redirect()->route('banners.index');
        }

    
        public function destroy($id)
        {
            $banners =Banners::find($id);
            
            $banners->delete();
            Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
            return redirect()->route('banners.index');
        
        }
        
        public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $banners = $request->upload;
            $banners = $banners->store('bannesr', 'public');
            Image::make(public_path('/storage/' . $banners))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$banners);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }   

      
           
    }
