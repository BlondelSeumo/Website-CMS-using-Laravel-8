<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest; 
use App\Http\Requests\UserEditRequest; 
use Illuminate\Support\Facades\Session;

use App\Models\Post;
use App\Models\Project;
use App\Models\Service;

use App\Models\Testimonial;
use App\Models\Member;
use App\Models\Client;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$post_number = Post::with('post_id')->count();
    	$project_number = Project::with('project_id')->count();
    	$service_number = Service::with('service_id')->count();

    	$testimonial_number = Testimonial::with('testimonial_id')->count();
    	$member_number = Member::with('member_id')->count();
    	$client_number = Client::with('client_id')->count();
        return view('dashboard.index', compact('post_number', 'project_number', 'service_number', 'testimonial_number', 'member_number', 'client_number'));
    }

}
