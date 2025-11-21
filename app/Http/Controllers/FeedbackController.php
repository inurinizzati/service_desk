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
                    'ticket_id' => 'TK000001',
                    'userid' => 'STUD000001',
                    'student_name' => 'Siti Nawwarah',
                    'title' => 'Fan Not Working',
                    'technician_name' => 'Ahmad Bin Norman',
                    'rating' => 4,
                    'comment' => 'Technician repaired the fan quickly and efficiently.'
                ],
                (object)[
                    'ticket_id' => 'TK000002',
                    'userid' => 'STUD000001',
                    'student_name' => 'Siti Nawwarah',
                    'title' => 'Light Flickering',
                    'technician_name' => 'Ahmad Bin Norman',
                    'rating' => 5,
                    'comment' => 'Fast response, light issue fixed perfectly.'
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
                    'ticket_id' => 'TK000001',
                    'userid' => 'STUD000001',
                    'student_name' => 'Siti Nawwarah',
                    'title' => 'Fan Not Working',
                    'technician_name' => 'Ahmad Bin Norman',
                    'rating' => 4,
                    'comment' => 'Technician repaired the fan quickly and efficiently.'
                ],
                (object)[
                    'ticket_id' => 'TK000002',
                    'userid' => 'STUD000001',
                    'student_name' => 'Siti Nawwarah',
                    'title' => 'Light Flickering',
                    'technician_name' => 'Ahmad Bin Norman',
                    'rating' => 5,
                    'comment' => 'Fast response, light issue fixed perfectly.'
                ],
                (object)[
                    'ticket_id' => 'TK000004',
                    'userid' => 'STUD000003',
                    'student_name' => 'Asilah Zarifah',
                    'title' => 'Dirty Pantry Area',
                    'technician_name' => 'Siti Nur Izzah binti Abdul Rahman',
                    'rating' => 5,
                    'comment' => 'Very clean work and friendly attitude.'
                ],
                (object)[
                    'ticket_id' => 'TK000006',
                    'userid' => 'STUD000004',
                    'student_name' => 'Nurin Balqis',
                    'title' => 'Broken Study Table',
                    'technician_name' => 'Syafiq Hakim Bin Razali',
                    'rating' => 2,
                    'comment' => 'Table not fixed properly.'
                ],
                (object)[
                    'ticket_id' => 'TK000009',
                    'userid' => 'STUD000006',
                    'student_name' => 'Aishah Binti Azmi',
                    'title' => 'Dusty Corridor',
                    'student_name' => 'Aishah Binti Azmi',
                    'technician_name' => 'Siti Nur Izzah binti Abdul Rahman',
                    'rating' => 3,
                    'comment' => 'Corridor not really cleaned'
                ],
                (object)[
            'ticket_id' => 'TK000010',
            'userid' => 'STUD000002',
            'student_name' => 'Aminah Farhana',
            'title' => 'Air Conditioner Leaking',
            'technician_name' => 'Syafiq Hakim Bin Razali',
            'rating' => 4,
            'comment' => 'Leak fixed properly and fast.'
        ],
        (object)[
            'ticket_id' => 'TK000012',
            'userid' => 'STUD000004',
            'student_name' => 'Nurin Balqis',
            'title' => 'Intermittent Wi-Fi Drop',
            'technician_name' => 'Izwan Firdaus Bin Omar',
            'rating' => 3,
            'comment' => 'Improved but still occasionally drops.'
        ],
        (object)[
            'ticket_id' => 'TK000013',
            'userid' => 'STUD000008',
            'student_name' => 'Hani Sofea',
            'title' => 'Unclean Washroom',
            'technician_name' => 'Nurin Farah Izzati binti Rusdi',
            'rating' => 5,
            'comment' => 'Very clean and hygienic afterward.'
        ],
        (object)[
            'ticket_id' => 'TK000015',
            'userid' => 'STUD000001',
            'student_name' => 'Aminah Farhana',
            'title' => 'Broken Door Lock',
            'technician_name' => 'Syafiq Hakim Bin Razali',
            'rating' => 4,
            'comment' => 'Door fixed and now secure.'
        ],
        (object)[
            'ticket_id' => 'TK000017',
            'userid' => 'STUD000007',
            'student_name' => 'Pei Wei',
            'title' => 'No Water Supply',
            'technician_name' => 'Nurin Farah Izzati binti Rusdi',
            'rating' => 5,
            'comment' => 'Resolved instantly, great work!'
        ],
        (object)[
            'ticket_id' => 'TK000018',
            'userid' => 'STUD000003',
            'student_name' => 'Asilah Zarifah',
            'title' => 'Dirty Laundry Area',
            'technician_name' => 'Nurin Farah Izzati binti Rusdi',
            'rating' => 5,
            'comment' => 'Area looks very clean now.'
        ],
        (object)[
            'ticket_id' => 'TK000020',
            'userid' => 'STUD000002',
            'student_name' => 'Aminah Farhana',
            'title' => 'Broken Chair',
            'technician_name' => 'Ahmad Bin Norman',
            'rating' => 3,
            'comment' => 'Chair fixed but still slightly shaky.'
        ],
        (object)[
            'ticket_id' => 'TK000021',
            'userid' => 'STUD000004',
            'student_name' => 'Nurin Balqis',
            'title' => 'Light Buzzing Noise',
            'technician_name' => 'Ahmad Bin Norman',
            'rating' => 4,
            'comment' => 'Buzzing noise gone.'
        ],
        (object)[
            'ticket_id' => 'TK000023',
            'userid' => 'STUD000008',
            'student_name' => 'Hani Sofea',
            'title' => 'Wet Corridor',
            'technician_name' => 'Nurin Farah Izzati binti Rusdi',
            'rating' => 5,
            'comment' => 'Corridor dried and cleaned well.'
        ],
        (object)[
            'ticket_id' => 'TK000025',
            'userid' => 'STUD000006',
            'student_name' => 'Aishah Binti Azmi',
            'title' => 'Dusty Cupboard',
            'technician_name' => 'Nurin Farah Izzati binti Rusdi',
            'rating' => 3,
            'comment' => 'Still a bit dusty but acceptable.'
        ],
        (object)[
            'ticket_id' => 'TK000026',
            'userid' => 'STUD000003',
            'student_name' => 'Asilah Zarifah',
            'title' => 'Loose Water Tap',
            'technician_name' => 'Siti Nur Izzah binti Abdul Rahman',
            'rating' => 4,
            'comment' => 'Tap now stable.'
        ],
        (object)[
            'ticket_id' => 'TK000028',
            'userid' => 'STUD000007',
            'student_name' => 'Pei Wei',
            'title' => 'Light Switch Hot',
            'technician_name' => 'Izwan Firdaus Bin Omar',
            'rating' => 5,
            'comment' => 'Switch replaced safely.'
        ],
        (object)[
            'ticket_id' => 'TK000029',
            'userid' => 'STUD000010',
            'student_name' => 'Nur Izzati',
            'title' => 'Dirty Pantry Sink',
            'technician_name' => 'Nurin Farah Izzati binti Rusdi',
            'rating' => 4,
            'comment' => 'Cleaned thoroughly.'
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
                    'ticket_id' => 'TK000001',
                    'userid' => 'STUD000001',
                    'student_name' => 'Siti Nawwarah',
                    'title' => 'Fan Not Working',
                    'technician_name' => 'Ahmad Bin Norman',
                    'rating' => 4,
                    'comment' => 'Technician repaired the fan quickly and efficiently.'
                ],
                (object)[
                    'ticket_id' => 'TK000002',
                    'userid' => 'STUD000001',
                    'student_name' => 'Siti Nawwarah',
                    'title' => 'Light Flickering',
                    'technician_name' => 'Ahmad Bin Norman',
                    'rating' => 5,
                    'comment' => 'Fast response, light issue fixed perfectly.'
                ],
                (object)[
                    'ticket_id' => 'TK000020',
                    'userid' => 'STUD000002',
                    'student_name' => 'Aminah Farhana',
                    'title' => 'Broken Chair',
                    'technician_name' => 'Ahmad Bin Norman',
                    'rating' => 3,
                    'comment' => 'Chair fixed but still slightly shaky.'
                ],
                (object)[
                    'ticket_id' => 'TK000021',
                    'userid' => 'STUD000004',
                    'student_name' => 'Aminah Farhana',
                    'title' => 'Light Buzzing Noise',
                    'technician_name' => 'Ahmad Bin Norman',
                    'rating' => 5,
                    'comment' => 'Fast response, light issue fixed perfectly.'
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
            'title' => 'Fan Not Working',
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
