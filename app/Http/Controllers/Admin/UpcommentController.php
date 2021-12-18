<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Upcomment;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;

    class UpcommentController extends Controller
    {
        public function index()
        {
            // $tools = Tools::all();
            $upcomments = Upcomment::all();
            return view('admin.upcomments.index',compact('upcomments'));
        }

    
        public function create()
        {
            $upcomments = Upcomment::all();
            return view('admin.upcomments.create',compact('upcomments'));
        }


        public function store(Request $request)
        {
            $valid = $request->validate([
                'title_uz' => ['nullable', 'string'],
                'title_ru' => ['nullable', 'string'],
                'text_uz'  => ['nullable', 'string'],
                'text_ru'  => ['nullable', 'string'],
                'price'  => ['nullable', 'string'],
                'type' =>['nullable','string'],
                'data' =>['nullable','string'],
               
                
            ]);
                if ($valid) {
                    $upcomments = Upcomment::create($request->all());
                    if ($request->image) {
                        $this->storeImage($upcomments);
                    }
                    return redirect()->route('upcomments.index');
                }
        }

            
        public function edit($id)
        {
            $upcomments = Upcomment::find($id);
            return view('admin.upcomments.edit', compact('upcomments'));
        }
    


        public function update(Request $request, $id)
        {
            $valid = $request->validate([
                'title_uz' => ['nullable', 'string'],
                'title_ru' => ['nullable', 'string'],
                'text_uz'  => ['nullable', 'string'],
                'text_ru'  => ['nullable', 'string'],
                'price'  => ['nullable', 'string'],
                'type' =>['nullable','string'],
                'data' =>['nullable','string'],
               
                
            ]);
                if ($valid) {
                    $upcomments = Upcomment::find($id);
                    $upcomments->update($request->all());
                    if ($request->image) {
                        $this->storeImage($upcomments);
                    }
                }
                return redirect()->route('upcomments.index');
        }

    
        public function destroy($id)
        {
            $upcomments = Upcomment::find($id);
            if ($upcomments->image){
                unlink(public_path() . '/storage/' . $upcomments->image );
            }
            $upcomments->delete();
            Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
            return redirect()->route('upcomments.index');
        
        }
        

        private function storeImage($upcomments)
        {
            if (request()->has('image')) {
                $upcomments->update([
                    'image' => \request()->image->store('upcomments', 'public'),
                ]);
            }
            $image = Image::make(public_path('storage/' . $upcomments->image));
            $image->save();
            
        }

        public function upload(Request $request)
        {
            if($request->hasFile('upload')) {
                $upcomments = $request->upload;
                $upcomments = $upcomments->store('bannesr', 'public');
                Image::make(public_path('/storage/' . $upcomments))->save();
    
                $CKEditorFuncNum = $request->input('CKEditorFuncNum');
                $url = asset('/storage/'.$upcomments);
                $msg = 'Успешно!';
                $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
                @header('Content-type: text/html; charset=utf-8');
                echo $re;
            }
        }   
           
    }
