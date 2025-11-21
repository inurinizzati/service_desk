<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        // 🟢 Fake data (for now, no database needed)
        $tickets = [
            (object)[
                'id' => 'TK000001',
                'userid' => 'STUD000001',
                'title' => 'Fan Not Working',
                'category' => 'Room Facilities',
                'description' => 'Fan stops functioning',
                'location' => 'M04 Saujana 04-28B',
                'date' => '05/01/2025',
                'status' => 'Completed',
                'resolved_date' => '06/01/2025',
                'rating' => 4,
            ],
            (object)[
                'id' => 'TK000002',
                'userid' => 'STUD000001',
                'title' => 'Light Flickering',
                'category' => 'Electrical & Lighting',
                'description' => 'Main light flickers occasionally.',
                'location' => 'M04 Saujana 04-28B',
                'date' => '11/01/2025',
                'status' => 'Completed',
                'resolved_date' => '13/02/2025',
                'rating' => 5,
            ],
             (object)[
                'id' => 'TK000005',
                'userid' => 'STUD000001',
                'title' => 'Clogged Toilet',
                'category' => 'Toilet & Plumbing',
                'description' => 'Toilet bowl clogged.',
                'location' => 'M04 Saujana 04-28B',
                'date' => '21/01/2025',
                'status' => 'Cancel',
                'comment' => 'Ticket cancelled as the problem has been resolved.',
                'resolved_date' => '',
            ],
            (object)[
                'id' => 'TK000007',
                'userid' => 'STUD000001',
                'title' => 'Power Socket Not Working',
                'category' => 'Electrical & Lighting',
                'description' => 'Socket suddenly stopped functioning.',
                'location' => 'M04 Saujana 04-28B',
                'date' => '30/01/2025',
                'status' => 'Pending',
                'resolved_date' => '',
            ],
        ];

        // Send this data to your Blade file
        return view('complaintmodule.ticketlistdata', ['tickets' => $tickets]);
    }

//     public function edit($id)
// {
//     // Example: find ticket (for now just mock data)
//     $ticket = (object)[
//         'id' => $id,
//         'title' => 'Example Ticket',
//         'status' => 'pending',
//     ];

//     return view('complaintmodule.editticket', ['ticket' => $ticket]);
// }

    public function show($id)
    {
        $tickets = [
            (object)[
                'id' => 'TK000001',
                'userid' => 'STUD000001',
                'title' => 'Fan Not Working',
                'category' => 'Room Facilities',
                'description' => 'Fan stops functioning',
                'location' => 'M04 Saujana 04-28B',
                'date' => '05/01/2025',
                'status' => 'Completed',
                'resolved_date' => '06/01/2025',
                'rating' => 4,
            ],
            (object)[
                'id' => 'TK000002',
                'userid' => 'STUD000001',
                'title' => 'Light Flickering',
                'category' => 'Electrical & Lighting',
                'description' => 'Main light flickers occasionally.',
                'location' => 'M04 Saujana 04-28B',
                'date' => '11/01/2025',
                'status' => 'Completed',
                'resolved_date' => '13/02/2025',
                'rating' => 5,
            ],
             (object)[
                'id' => 'TK000005',
                'userid' => 'STUD000001',
                'title' => 'Clogged Toilet',
                'category' => 'Toilet & Plumbing',
                'description' => 'Toilet bowl clogged.',
                'location' => 'M04 Saujana 04-28B',
                'date' => '21/01/2025',
                'status' => 'Cancel',
                'comment' => 'Ticket cancelled as the problem has been resolved.',
                'resolved_date' => '',
            ],
            (object)[
                'id' => 'TK000007',
                'userid' => 'STUD000001',
                'title' => 'Power Socket Not Working',
                'category' => 'Electrical & Lighting',
                'description' => 'Socket suddenly stopped functioning.',
                'location' => 'M04 Saujana 04-28B',
                'date' => '30/01/2025',
                'status' => 'Pending',
                'resolved_date' => '',
            ],
        ];

        // Find ticket by id
        $ticket = collect($tickets)->firstWhere('id', $id);

        // If ticket not found, show 404 page
        if (!$ticket) {
            abort(404, 'Ticket not found');
        }

        return view('complaintmodule.ticketdetails', ['ticket' => $ticket]);
    }

}
