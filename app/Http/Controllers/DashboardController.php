<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Dummy data for chart
        $complaintData = [
            ['category' => 'Completed', 'value' => 18],
            ['category' => 'Pending', 'value' => 7],
            ['category' => 'Cancel', 'value' => 4],
        ];

        $feedbackData = [
            ['rating' => '1 Star', 'count' => 0],
            ['rating' => '2 Stars', 'count' => 1],
            ['rating' => '3 Stars', 'count' => 4],
            ['rating' => '4 Stars', 'count' => 6],
            ['rating' => '5 Stars', 'count' => 7],
        ];

        return view('dashboard.index', compact('complaintData', 'feedbackData'));
    }

    public function student()
    {
        // Dummy data for chart
        $complaintData = [
            ['category' => 'Completed', 'value' => 2],
            ['category' => 'Pending', 'value' => 1],
            ['category' => 'Cancel', 'value' => 1],
        ];

        $feedbackData = [
            ['rating' => '1 Star', 'count' => 0],
            ['rating' => '2 Stars', 'count' => 0],
            ['rating' => '3 Stars', 'count' => 0],
            ['rating' => '4 Stars', 'count' => 1],
            ['rating' => '5 Stars', 'count' => 1],
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
            ['rating' => '2 Stars', 'count' => 0],
            ['rating' => '3 Stars', 'count' => 1],
            ['rating' => '4 Stars', 'count' => 3],
            ['rating' => '5 Stars', 'count' => 2],
        ];

        return view('dashboard.technian', compact('complaintData', 'feedbackData'));
    }

}
