<?php

use App\Http\Controllers\User\Employer\Jobs\JobController;
use App\Http\Controllers\User\Employer\Jobs\PDF\PdfController;
use App\Http\Helpers\ApplicationHelper;
use App\Http\Helpers\DemandHelper;
use App\Http\Livewire\Admin\Views\Applications\AllAplications;
use App\Http\Livewire\Admin\Views\Demands\DemandDetails;
use App\Http\Livewire\Admin\Views\Jobs\SendJobToAgent;
use App\Http\Livewire\Coordinator\AllDemands;
use App\Http\Livewire\Coordinator\Dashboard;
use App\Http\Livewire\Coordinator\Views\BrokerDemandDetails;
use App\Http\Livewire\Coordinator\Views\NewDemand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Coordinator\Views\AllApplications;
use App\Http\Livewire\Coordinator\Views\BrokerApplicationDetails;
use App\Models\Application;
use App\Models\ApplicationAttachment;
use Illuminate\Support\Facades\Storage;

Route::redirect('/' , '/broker/login')->middleware('guest');
Route::get('login' , function()
{
    if(!Cache::has('businessSetting'))
    {
        Cache::rememberForever('businessSetting' , function()
        {
            return DB::table('business_settings')->get();
        });
    }
        return view('auth.admin.login');
});

Route::get('test' , function(){
    return Auth::user();
});
Route::group([ 'middleware' => 'auth'  , 'as' => 'broker.'] , function()
{
    Route::get('/dashboard' , Dashboard::class)->name('dashboard');
    Route::get('/demands' , AllDemands::class)->name('demands');
    Route::get('/demands/new' , NewDemand::class)->name('demands.new');
    Route::get('/demand/{id}/details' , BrokerDemandDetails::class)->name('demand.details');
    Route::get('/sector/{id}' , [JobController::class , 'setSelectedSector']);
    Route::get('/applications/all', AllApplications::class)->name('applications.all');
    Route::get('job/{id}/send-to-agent', SendJobToAgent::class)->name('send-job-to-agent');
    Route::post('/demand/{id}/set-terms', [DemandHelper::class, 'setDemandTermsAndSendToAgent'])->name('demand.set-terms');
    Route::get('/application/{id}/details', BrokerApplicationDetails::class)->name('application.details');
    Route::post('/application/delete', [ApplicationHelper::class, 'deleteApplication'])->name('application.delete');
    Route::get('/aplication/pdf/{id}', [PdfController::class, 'generateApplicationPDF'])->name('application.pdf.generate');
    Route::post('/application/{id}/status/change', [ApplicationHelper::class, 'postChangeApplicationStatus'])->name('application.change-status');
    Route::get('/application/substatus/{id}', [ApplicationHelper::class, 'getSubStatuses']);
    Route::post('/application/{id}/status/change', [ApplicationHelper::class, 'postChangeApplicationStatus'])->name('application.change-status');






    Route::get('/application/{id}/attachment/{fileName}/download', function ($id, $fileName,) {
        $application = Application::with('job:id')->findOrFail($id);
        try {
            // 'public/uploads/applications/jobs/'.$application->id.'/'.Auth::id().'/attachments'.'/';
            return Storage::download('public/uploads/applications/' . $application->id . '/' . 'attachments' . '/' . $fileName);
        } catch (Throwable $e) {
            return dd($e->getMessage());
            return redirect()->back();
        }
    })->name('application.attachment.download');

    Route::get('/application/{id}/attachment/{fileName}/oepn', function ($id, $fileName,) {
        $application = Application::with('job:id')->findOrFail($id);
        try {
            return response()->file(public_path('storage/uploads/applications/' . $application->id . '/attachments' . '/' . $fileName));
        } catch (Throwable $e) {
            return dd($e->getMessage());
            return redirect()->back();
        }
    })->name('application.attachment.open');

    Route::get('/application/{id}/attachment/{fileName}/delete', function ($id, $fileName,) {
        $application = Application::with('job:id')->findOrFail($id);
        try {
            // 'public/uploads/applications/jobs/'.$application->id.'/'.Auth::id().'/attachments'.'/';
            Storage::delete('public/uploads/applications/' . $application->id . '/' . 'attachments' . '/' . $fileName);
            ApplicationAttachment::whereApplicationId($id)->where('name', $fileName)->first()->delete();
            notify()->success('Attachment Deleted Successfully');
            return redirect()->back();
        } catch (Throwable $e) {
            return redirect()->back();
        }
    })->name('application.attachment.delete');






});
