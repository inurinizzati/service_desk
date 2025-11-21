<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Dummy data for chart
        $complaintData = [
            ['category' => 'Completed', 'value' => 12],
            ['category' => 'Pending', 'value' => 8],
            ['category' => 'Cancel', 'value' => 2],
        ];

        $feedbackData = [
            ['rating' => '1 Star', 'count' => 0],
            ['rating' => '2 Stars', 'count' => 1],
            ['rating' => '3 Stars', 'count' => 1],
            ['rating' => '4 Stars', 'count' => 8],
            ['rating' => '5 Stars', 'count' => 10],
        ];

        return view('dashboard.index', compact('complaintData', 'feedbackData'));
    }

    public function student()
    {
        // Dummy data for chart
        $complaintData = [
            ['category' => 'Completed', 'value' => 12],
            ['category' => 'Pending', 'value' => 8],
            ['category' => 'Cancel', 'value' => 2],
        ];

        $feedbackData = [
            ['rating' => '1 Star', 'count' => 0],
            ['rating' => '2 Stars', 'count' => 1],
            ['rating' => '3 Stars', 'count' => 1],
            ['rating' => '4 Stars', 'count' => 8],
            ['rating' => '5 Stars', 'count' => 10],
        ];

        return view('dashboard.student', compact('complaintData', 'feedbackData'));
    }
    public function technian()
    {
        // Dummy data for chart
        $complaintData = [
            ['category' => 'Completed', 'value' => 12],
            ['category' => 'Pending', 'value' => 8],
            ['category' => 'Cancel', 'value' => 2],
        ];

        $feedbackData = [
            ['rating' => '1 Star', 'count' => 0],
            ['rating' => '2 Stars', 'count' => 1],
            ['rating' => '3 Stars', 'count' => 1],
            ['rating' => '4 Stars', 'count' => 8],
            ['rating' => '5 Stars', 'count' => 10],
        ];

        return view('dashboard.technian', compact('complaintData', 'feedbackData'));
    }

}
