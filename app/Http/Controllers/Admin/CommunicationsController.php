<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ommunications;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Intervention\Image\Facades\Image;

class CommunicationsController extends Controller
{
    public function index()
        {
            
            $communications = Ommunications::all();
            return view('admin.communications.index',compact('communications'));
        }

    
        public function create()
        {
            $communications = Ommunications::all();
            return view('admin.communications.create',compact('communications'));
        }


        public function store(Request $request)
        {
            $valid = $request->validate([

                'title_uz'  => ['nullable', 'string'],
                'title_ru'  => ['nullable', 'string'],
                'text_uz'  => ['nullable', 'string'],
                'text_ru'  => ['nullable', 'string'],
                
            ]);
                if ($valid) {
                    $communications =Ommunications::create($request->all());
                    return redirect()->route('communications.index');
                }
        }

            
        public function edit($id)
        {
            $communications = Ommunications::find($id);
            return view('admin.communications.edit', compact('communications'));
        }
    


        public function update(Request $request, $id)
        {
            $valid = $request->validate([

                'title_uz'  => ['nullable', 'string'],
                'title_ru'  => ['nullable', 'string'],
                'text_uz'  => ['nullable', 'string'],
                'text_ru'  => ['nullable', 'string'],
            ]);
                if ($valid) {
                    $communications = Ommunications::find($id);
                    $communications->update($request->all());
                   
                }
                return redirect()->route('communications.index');
        }

    
        public function destroy($id)
        {
            $communications = Ommunications::find($id);
            
            $communications->delete();
            Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
            return redirect()->route('communications.index');
        
        }


        public function upload(Request $request)
        {
            if($request->hasFile('upload')) {
                $banners = $request->upload;
                $banners = $banners->store('communications', 'public');
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
