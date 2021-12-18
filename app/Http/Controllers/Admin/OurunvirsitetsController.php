<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ourunvirsitets;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OurunvirsitetsController extends Controller
{
    public function index()
    {
        
        $ourunversitet = Ourunvirsitets::all();
        return view('admin.ourunversitet.index',compact('ourunversitet'));
    }


    public function create()
    {
        $ourunversitet = Ourunvirsitets::all();
        return view('admin.ourunversitet.create',compact('ourunversitet'));
    }


    public function store(Request $request)
    {
        $valid = $request->validate([

           
            'text_uz'  => ['nullable', 'string'],
            'text_ru'  => ['nullable', 'string'],
            'number' => ['nullable', 'string'],
            
        ]);
            if ($valid) {
                $ourunversitet =Ourunvirsitets::create($request->all());
                return redirect()->route('ourunversitet.index');
            }
    }

        
    public function edit($id)
    {
        $ourunversitet = Ourunvirsitets::find($id);
        return view('admin.ourunversitet.edit', compact('ourunversitet'));
    }



    public function update(Request $request, $id)
    {
        $valid = $request->validate([


            'text_uz'  => ['nullable', 'string'],
            'text_ru'  => ['nullable', 'string'],
            'number' => ['nullable', 'string'],
        ]);
            if ($valid) {
                $ourunversitet = Ourunvirsitets::find($id);
                $ourunversitet->update($request->all());
               
            }
            return redirect()->route('ourunversitet.index');
    }


    public function destroy($id)
    {
        $ourunversitet = Ourunvirsitets::find($id);
        
        $ourunversitet->delete();
        Alert::success('Muvaffaqiyatli', 'Yakunlandi!');
        return redirect()->route('ourunversitet.index');
    
    }
}
