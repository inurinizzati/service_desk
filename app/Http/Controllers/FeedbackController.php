<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;


class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $feedback = [
            (object)[
                'ticket_id' => 'TK001',
                'technician_name' => 'Ahmad Bin Norman',
                'rating' => 4,
                'comment' => 'Technician responds fast and friendly.'
            ],
            (object)[
                'ticket_id' => 'TK002',
                'technician_name' => 'Siti Anisah Binti Jamin',
                'rating' => 5,
                'comment' => 'Excellent service, very helpful!'
            ],
            (object)[
                'ticket_id' => 'TK003',
                'technician_name' => 'Muhammad Naufal Bin Nabil',
                'rating' => 3,
                'comment' => 'Service okay, but took some time.'
            ],
            (object)[
                'ticket_id' => 'TK004',
                'technician_name' => 'Nur Aina Binti Rahman',
                'rating' => 5,
                'comment' => 'Very professional and kind.'
            ],
            (object)[
                'ticket_id' => 'TK005',
                'technician_name' => 'Muhammad Izzat Bin Razlan',
                'rating' => 2,
                'comment' => 'Slow response but problem resolved.'
            ],
            (object)[
                'ticket_id' => 'TK006',
                'technician_name' => 'Farah Nadhirah Binti Kamarul',
                'rating' => 4,
                'comment' => 'Good service overall.'
            ],
            (object)[
                'ticket_id' => 'TK007',
                'technician_name' => 'Syafiq Hakim Bin Razali',
                'rating' => 5,
                'comment' => 'Fast and efficient, highly recommended!'
            ],
            (object)[
                'ticket_id' => 'TK008',
                'technician_name' => 'Aishah Binti Azmi',
                'rating' => 3,
                'comment' => 'Average service, can be improved.'
            ],
            (object)[
                'ticket_id' => 'TK009',
                'technician_name' => 'Izwan Firdaus Bin Omar',
                'rating' => 4,
                'comment' => 'Friendly technician and quick fix.'
            ],
            (object)[
                'ticket_id' => 'TK010',
                'technician_name' => 'Nurin Syafika Binti Salleh',
                'rating' => 5,
                'comment' => 'Excellent work and clear communication!'
            ],
            (object)[
                'ticket_id' => 'TK011',
                'technician_name' => 'Faizal Bin Rosli',
                'rating' => 1,
                'comment' => 'Issue not fully resolved, need follow-up.'
            ],
        ];


        $data = [
            'feedback' => $feedback,
        ];

        return  view ('feedback.index', $data);

    }

    public function index_admin()
    {
        $feedback = [
            (object)[
                'ticket_id' => 'TK001',
                'student_name' => "Siti Nawwarah",
                'technician_name' => 'Ahmad Bin Norman',
                'rating' => 4,
                'comment' => 'Technician responds fast and friendly.'
            ],
            (object)[
                'ticket_id' => 'TK002',
                'student_name' => "Muhammad Danish Hakim",
                'technician_name' => 'Siti Anisah Binti Jamin',
                'rating' => 5,
                'comment' => 'Excellent service, very helpful!'
            ],
            (object)[
                'ticket_id' => 'TK003',
                'student_name' => "Nur Aina Sofea",
                'technician_name' => 'Muhammad Naufal Bin Nabil',
                'rating' => 3,
                'comment' => 'Service okay, but took some time.'
            ],
            (object)[
                'ticket_id' => 'TK004',
                'student_name' => "Aiman Faiz Bin Kamarul",
                'technician_name' => 'Nur Aina Binti Rahman',
                'rating' => 5,
                'comment' => 'Very professional and kind.'
            ],
            (object)[
                'ticket_id' => 'TK005',
                'student_name' => "Haziq Firdaus",
                'technician_name' => 'Muhammad Izzat Bin Razlan',
                'rating' => 2,
                'comment' => 'Slow response but problem resolved.'
            ],
            (object)[
                'ticket_id' => 'TK006',
                'student_name' => "Nurin Balqis",
                'technician_name' => 'Farah Nadhirah Binti Kamarul',
                'rating' => 4,
                'comment' => 'Good service overall.'
            ],
            (object)[
                'ticket_id' => 'TK007',
                'student_name' => "Afiq Haziq Bin Hanafi",
                'technician_name' => 'Syafiq Hakim Bin Razali',
                'rating' => 5,
                'comment' => 'Fast and efficient, highly recommended!'
            ],
            (object)[
                'ticket_id' => 'TK008',
                'student_name' => "Siti Balqis Binti Adnan",
                'technician_name' => 'Aishah Binti Azmi',
                'rating' => 3,
                'comment' => 'Average service, can be improved.'
            ],
            (object)[
                'ticket_id' => 'TK009',
                'student_name' => "Muhammad Aidil",
                'technician_name' => 'Izwan Firdaus Bin Omar',
                'rating' => 4,
                'comment' => 'Friendly technician and quick fix.'
            ],
            (object)[
                'ticket_id' => 'TK010',
                'student_name' => "Yasmin Zahra",
                'technician_name' => 'Nurin Syafika Binti Salleh',
                'rating' => 5,
                'comment' => 'Excellent work and clear communication!'
            ],
            (object)[
                'ticket_id' => 'TK011',
                'student_name' => "Adam Zafran",
                'technician_name' => 'Faizal Bin Rosli',
                'rating' => 1,
                'comment' => 'Issue not fully resolved, need follow-up.'
            ],
        ];


        $data = [
            'feedback' => $feedback,
        ];

        return  view ('feedback.index-admin',$data);
    }
    public function index_technian()
    {
        $feedback = [
            (object)[
                'ticket_id' => 'TK001',
                'student_name' => "Siti Nawwarah",
                'rating' => 4,
                'comment' => 'Technician responds fast and friendly.'
            ],
            (object)[
                'ticket_id' => 'TK002',
                'student_name' => "Muhammad Danish Hakim",
                'rating' => 5,
                'comment' => 'Excellent service, very helpful!'
            ],
            (object)[
                'ticket_id' => 'TK003',
                'student_name' => "Nur Aina Sofea",
                'rating' => 3,
                'comment' => 'Service okay, but took some time.'
            ],
            (object)[
                'ticket_id' => 'TK004',
                'student_name' => "Aiman Faiz Bin Kamarul",
                'rating' => 5,
                'comment' => 'Very professional and kind.'
            ],
            (object)[
                'ticket_id' => 'TK005',
                'student_name' => "Haziq Firdaus",
                'rating' => 2,
                'comment' => 'Slow response but problem resolved.'
            ],
            (object)[
                'ticket_id' => 'TK006',
                'student_name' => "Nurin Balqis",
                'rating' => 4,
                'comment' => 'Good service overall.'
            ],
            (object)[
                'ticket_id' => 'TK007',
                'student_name' => "Afiq Haziq Bin Hanafi",
                'rating' => 5,
                'comment' => 'Fast and efficient, highly recommended!'
            ],
            (object)[
                'ticket_id' => 'TK008',
                'student_name' => "Siti Balqis Binti Adnan",
                'rating' => 3,
                'comment' => 'Average service, can be improved.'
            ],
            (object)[
                'ticket_id' => 'TK009',
                'student_name' => "Muhammad Aidil",
                'rating' => 4,
                'comment' => 'Friendly technician and quick fix.'
            ],
            (object)[
                'ticket_id' => 'TK010',
                'student_name' => "Yasmin Zahra",
                'rating' => 5,
                'comment' => 'Excellent work and clear communication!'
            ],
            (object)[
                'ticket_id' => 'TK011',
                'student_name' => "Adam Zafran",
                'rating' => 1,
                'comment' => 'Issue not fully resolved, need follow-up.'
            ],
        ];


        $data = [
            'feedback' => $feedback,
        ];

        return  view ('feedback.index-technian',$data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ticket = (object) [
            'id' => 001,
            'ticket_num' => 'TK001',
            'technician' => (object)[
                'id' => 88,
                'name' => 'Dummy Technician'
            ]
        ];


        $data = [
            'ticket' => $ticket,
        ];

        return  view ('feedback.create',$data);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'rating' => 'required',
            'comment' => 'required'
        ]);

        if ($validator->fails()) {
            Alert::error('Error!', 'Please fill in all required fields.');
            return back()->withErrors($validator)->withInput();
        }

        Alert::success('Thank you!', 'Your feedback has been submitted successfully.');
        return redirect()->route('feedback.index');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
