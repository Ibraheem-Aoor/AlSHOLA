<?php

namespace App\Http\Controllers\User\Employer\Jobs\Notes;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index($id)
    {
        $job = Job::select(['id' , 'title' , 'status'])->with('notes')->findOrFail($id);
        return view('user.employer.jobs.notes.all-job-notes' , compact('job'));
    }
}
