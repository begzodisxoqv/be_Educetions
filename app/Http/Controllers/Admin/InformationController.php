<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Informations;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class InformationController extends Controller
{
    public function index()
    {
        
        $informations = Informations::all();
        return view('admin.informations.index',compact('informations'));
    }


    public function create()
    {
        $informations = Informations::all();
        return view('admin.informations.create',compact('informations'));
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
                $informations =Informations::create($request->all());
                return redirect()->route('informations.index');
            }
    }

        
    public function edit($id)
    {
        $informations =Informations::find($id);
        return view('admin.informations.edit', compact('informations'));
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
                $informations =Informations::find($id);
                $informations->update($request->all());
               
            }
            return redirect()->route('informations.index');
    }


    public function destroy($id)
    {
        $informations =Informations::find($id);
        
        $informations->delete();
        Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('informations.index');
    
    }
}
