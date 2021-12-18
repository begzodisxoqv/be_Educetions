<?php


use App\Http\Controllers\Site\HomeController;

use App\Http\Controllers\Admin\AminController;
use App\Http\Controllers\Admin\AboutsusController;
use App\Http\Controllers\Admin\ApplyController;
use App\Http\Controllers\Admin\BannersController;
use App\Http\Controllers\Admin\CommunicationsController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\LogotechsController;
use App\Http\Controllers\Admin\MeetingcatgoriesController;
use App\Http\Controllers\Admin\MetbannersController;
use App\Http\Controllers\Admin\OurunvirsitetsController;
use App\Http\Controllers\Admin\PopularCoursesController;
use App\Http\Controllers\Admin\SetController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\ShowroomController;
use App\Http\Controllers\Admin\UpcommentController as adminUpcommentController;
use App\Http\Controllers\Site\UpcommentController;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;







Route::group(
    ['prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/meetings', [UpcommentController::class, 'index'])->name('meetings');
    Route::get('/meetings/{slug}', [UpcommentController::class, 'meetings_details'])->name('meetingsDetail');
    Route::get('/address', [HomeController::class, 'address'])->name('address');

    require __DIR__.'/auth.php';
}); 

Route::post('/contact/sendToTg', [HomeController::class, 'sendToTg'])->name('contact.send');

Route::get('/logout', function () {
    return view('site.home');
})->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AminController::class,'index'])->name('admin');
    Route::resources([
       'admin/banners'  => BannersController::class,
       'admin/aboutsus' => AboutsusController::class,
       'admin/courses'  => CoursesController::class,
       'admin/popularcourses'   => PopularCoursesController::class,
       'admin/meetingcatgories' => MeetingcatgoriesController::class,
       'admin/upcomments' => adminUpcommentController::class,
       'admin/informations' => InformationController::class,
       'admin/appleys' => ApplyController::class,
       'admin/ourunversitet' =>OurunvirsitetsController::class,
       'admin/communications' => CommunicationsController::class,
       'admin/metbanners' => MetbannersController::class,
       'admin/showroom' => ShowroomController::class,
       'admin/logotechs' => LogotechsController::class,
       
       
    ]); 

    Route::post('/admin/banners/upload', [BannersController::class, 'upload'])->name('admin.banners.upload');
    Route::post('/admin/informations/upload', [InformationController::class, 'upload'])->name('admin.informations.upload');
    Route::post('/admin/communications/upload', [CommunicationsController::class, 'upload'])->name('admin.communications.upload');
    Route::post('/admin/text/upload', [adminUpcommentController::class, 'upload'])->name('admin.text.upload');

    
}); 



