<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Metbanners;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;  

class MetbannersController extends Controller
{
    public function index()
    {
        // $tools = Tools::all();
        $metbanners = Metbanners::all();
        return view('admin.metbanners.index',compact('metbanners'));
    }


    public function create()
    {
        $metbanners = Metbanners::all();
        return view('admin.metbanners.create',compact('metbanners'));
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
                $metbanners = Metbanners::create($request->all());
                if ($request->image) {
                    $this->storeImage($metbanners);
                }
                return redirect()->route('metbanners.index');
            }
    }

        
    public function edit($id)
    {
        $metbanners = Metbanners::find($id);
        return view('admin.metbanners.edit', compact('metbanners'));
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
                $metbanners = Metbanners::find($id);
                $metbanners->update($request->all());
                if ($request->image) {
                    $this->storeImage($metbanners);
                }
            }
            return redirect()->route('metbanners.index');
    }


    public function destroy($id)
    {
        $metbanners = Metbanners::find($id);
        if ($metbanners->image){
            unlink(public_path() . '/storage/' . $metbanners->image );
        }
        $metbanners->delete();
        Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('metbanners.index');
    
    }
    

    private function storeImage($metbanners)
    {
        if (request()->has('image')) {
            $metbanners->update([
                'image' => \request()->image->store('metbanners', 'public'),
            ]);
        }
        $image = Image::make(public_path('storage/' . $metbanners->image));
        $image->save();
        
    }
}
