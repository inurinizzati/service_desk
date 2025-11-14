<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        // 🟢 Fake data (for now, no database needed)
        $tickets = [
            (object)['id' => 1, 'title' => 'Login Issue', 'status' => 'Completed'],
            (object)['id' => 2, 'title' => 'Server Down', 'status' => 'Pending'],
            // (object)['id' => 3, 'title' => 'Payment Error', 'status' => 'pending'],
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
            (object)['id' => 1, 'title' => 'Login Issue', 'category' => 'Account', 'description' => 'Unable to log in since yesterday.', 'location' => 'Hostel A, Room 101', 'date' => '2025-11-01', 'status' => 'Completed'],
            (object)['id' => 2, 'title' => 'Server Down', 'category' => 'Network', 'description' => 'Main server not responding.', 'location' => 'IT Room', 'date' => '2025-11-05', 'status' => 'Pending'],
            // (object)['id' => 3, 'title' => 'Payment Error', 'category' => 'Finance', 'description' => 'Payment gateway timed out.', 'location' => 'Finance Office', 'date' => '2025-11-06', 'status' => 'Pending'],
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
