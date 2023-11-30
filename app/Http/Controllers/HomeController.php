<?php

namespace App\Http\Controllers;



class HomeController extends Controller
{

    public function index()
    {
        return view("dashboard.home");
    }


    public function userProfile()
    {
        return view('dashboard.profile');
    }

    /** teacher dashboard */
    public function teacherDashboardIndex()
    {
        return view('dashboard.teacher_dashboard');
    }

    /** student dashboard */
    public function studentDashboardIndex()
    {
        return view('dashboard.student_dashboard');
    }
}
