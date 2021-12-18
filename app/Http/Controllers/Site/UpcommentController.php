<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Logotechs;
use App\Models\Metbanners;
use App\Models\Upcomment;

class UpcommentController extends Controller
{
    public function index()
    {
        $soon = Upcomment::where('choose', 'soon')->get();
        $imp = Upcomment::where('choose', 'imp')->get();
        $att = Upcomment::where('choose', 'att')->get();
        $metbanners = Metbanners::all();
        $upcomments = Upcomment::all();
        $logotechs = Logotechs::all();
        return view('site.meetings', compact('upcomments', 'metbanners','soon','imp','att', 'logotechs'));
    }

    public function meetings_details(Upcomment $slug)
    {
        $soon = Upcomment::where('choose', 'soon')->get();
        $imp = Upcomment::where('choose', 'imp')->get();
        $att = Upcomment::where('choose', 'att')->get();
        $upcomments = Upcomment::all();
        $logotechs = Logotechs::all();
        return view('site.meetings_detels', compact('slug','upcomments','soon','imp','att', 'logotechs'));
    }
}







