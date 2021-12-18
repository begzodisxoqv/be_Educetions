<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Aboutsus;
use App\Models\Banners;
use App\Models\Courses;
use App\Models\Informations;
use App\Models\Meetingcatgories;
use App\Models\Metbanners;
use App\Models\Ommunications;
use App\Models\Ourunvirsitets;
use App\Models\Popularcourses;
use App\Models\Showroom;
use App\Models\Upcomment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Telegram\Bot\Laravel\Facades\Telegram;


class HomeController extends Controller
{
    public function index()
    {
        $banners = Banners::all();
        $abouts = Aboutsus::all();
        $courses = Courses::all();
        $popularcourses = Popularcourses::all();
        $meetingcatgories = Meetingcatgories::all();
        $upcomments = Upcomment::paginate(4);
        $informations =  Informations::all();
        $ourunversitet   = Ourunvirsitets::all(); 
        $communications = Ommunications::all(); 
        $metbanners = Metbanners::all();
           return view('site.index',compact('banners','abouts','courses','popularcourses','meetingcatgories','informations','ourunversitet','communications','metbanners', 'upcomments'));
    }
    public function address()
    {
        $showroom = Showroom::all();
        return view('site.address',compact('showroom'));
    }


    public function meetings_detail($slug) {
        return view('site.index');
    }

    
    public function sendToTg(Request $request) {
        $this->validate($request, ['phone' => 'required|min:8']);

        Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001704163702'),
            'parse_mode' => 'HTML',
            'text' => "<b>Новая обращение!</b>\n"
                . "\n"
                . "<b>name   </b>: $request->name\n"
                . "<b>PhoneNumber</b>: $request->phone\n"
     
                . "<b>Yo'nalish</b>: $request->subject\n"
                . "<b>message</b>: $request->message\n"
        ]);
        Alert::success('Обращение принято', 'Скоро мы свяжемся с вами');
        return redirect()->back();
    }

  
    public function meetings()
    {
        $soon = Upcomment::where('choose', 'soon')->get();
        $imp = Upcomment::where('choose', 'imp')->get();
        $att = Upcomment::where('choose', 'att')->get();
        $metbanners = Metbanners::all();
        $upcomments = Upcomment::all();
        
        return view('site.meetings', compact('upcomments', 'metbanners','soon','imp','att'));
    }
}

