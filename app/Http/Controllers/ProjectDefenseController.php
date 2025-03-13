<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectDefenseController extends Controller
{
    public function showProjectnullDate() : View
    {
        return view('project.add-date-defence-project')->with('projects', Project::whereNull('date_defence')->get());
    }
}
