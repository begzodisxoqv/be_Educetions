<?php

namespace App\Http\Controllers\Admin;
use App\Models\Set;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;


class SetController extends Controller
{
    public function index()
    {
        
        $set = Set::all();
        return view('admin.set.index',compact('set'));
    }

    public function create()
    {
        $set = Set::all();
        return view('admin.set.create',compact('set'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([
            'houre_uz'  => ['nullable', 'string'],
            'houre_ru'  => ['nullable', 'string'],
            'locetion_uz'  => ['nullable', 'string'],
            'locetion_ru'  => ['nullable', 'string'],
            'phone'  => ['nullable', 'string'],

            
        ]);
            if ($valid) {
                $set =Set::create($request->all());
                return redirect()->route('set.index');
            }
    }

        
    public function edit($id)
    {
        $set =Set::find($id);
        return view('admin.set.edit', compact('set'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([
            'houre_uz'  => ['nullable', 'string'],
            'houre_ru'  => ['nullable', 'string'],
            'locetion_uz'  => ['nullable', 'string'],
            'locetion_ru'  => ['nullable', 'string'],
            'phone'  => ['nullable', 'string'],

        ]);
            if ($valid) {
                $set =Set::find($id);
                $set->update($request->all());
               
            }
            return redirect()->route('set.index');
    }


    public function destroy($id)
    {
        $set =Set::find($id);
        
        $set->delete();
        Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('set.index');
    
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $set = $request->upload;
            $set = $set->store('set', 'public');
            Image::make(public_path('/storage/' . $set))->save();

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('/storage/'.$set);
            $msg = 'Успешно!';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }   

    
}
