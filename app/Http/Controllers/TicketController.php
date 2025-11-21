<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        // 🟢 Fake data (for now, no database needed)
        $tickets = [
            (object)['id' => 'TK 005', 'title' => 'WiFi Not Working', 'location' => 'M04 Saujana 04-34B', 'category' => 'Internet Connection', 'date' => '04/01/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 023', 'title' => 'Broken Table Lamp', 'location' => 'M04 Saujana 04-34B',  'category' => 'Electrical & Lighting', 'date' => '23/02/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 036', 'title' => 'Room Door Cannot Lock', 'location' => 'M04 Saujana 04-34B',  'category' => 'Room Facilities', 'date' => '16/03/2025', 'status' => 'Cancel'],
            (object)['id' => 'TK 058', 'title' => 'Smelly Drainage in Bathroom', 'location' => 'M04 Saujana Cluster Bathroom 45',  'category' => 'Toilet & Plumbing', 'date' => '27/03/2025', 'status' => 'Pending'],
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
            (object)['id' => 'TK 005', 'title' => 'WiFi Not Working', 'category' => 'Internet Connection', 'description' => 'The WiFi connection in my room has been down since yesterday. The signal shows full bars but no internet access.', 'location' => 'M04 Saujana 04-34B',  'date' => '04/01/2025', 'status' => 'Completed', 'comment' => 'Issue has been successfully resolved and the WiFi is now working as expected.'],
            (object)['id' => 'TK 023', 'title' => 'Broken Table Lamp', 'category' => 'Electrical & Lighting', 'description' => 'The study table lamp in my room is not functioning. The switch seems loose and the bulb does not turn on.', 'location' => 'M04 Saujana 04-34B',  'category' => 'Electrical & Lighting', 'date' => '23/02/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 036', 'title' => 'Room Door Cannot Lock', 'category' => 'Room Facilities', 'description' => 'The door lock is jammed and cannot be locked properly. It is unsafe to leave belongings in the room.', 'location' => 'M04 Saujana 04-34B',  'category' => 'Room Facilities', 'date' => '16/03/2025', 'status' => 'Cancel', 'comment' => 'Ticket cancelled as the problem has been resolved.'],
            (object)['id' => 'TK 058', 'title' => 'Smelly Drainage in Bathroom', 'category' => 'Toilet & Plumbing', 'description' => 'The drainage in the shared bathroom emits a very strong smell, especially in the morning. Possibly clogged.', 'location' => 'M04 Saujana Cluster Bathroom 45',  'category' => 'Toilet & Plumbing', 'date' => '27/03/2025', 'status' => 'Pending'],
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
