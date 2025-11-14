<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function index()
    {
        // 🟢 Fake data (for now, no database needed)
        $tickets = [
            (object)['id' => 'TK 001', 'title' => 'WiFi Not Working', 'location' => 'M04 Saujana 04-34B', 'category' => 'Internet Connection', 'date' => '04/01/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 002', 'title' => 'Broken Table Lamp', 'location' => 'M04 Saujana 04-34B',  'category' => 'Electrical & Lighting', 'date' => '23/02/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 003', 'title' => 'Room Door Cannot Lock', 'location' => 'M04 Saujana 04-34B',  'category' => 'Room Facilities', 'date' => '16/03/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 004', 'title' => 'Smelly Drainage in Bathroom', 'location' => 'M04 Saujana Cluster Bathroom 45',  'category' => 'Toilet & Plumbing', 'date' => '27/03/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 005', 'title' => 'Broken Fan', 'location' => 'M04 Saujana 04-34B',  'category' => 'Room Facilities', 'date' => '09/04/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 006', 'title' => 'Fan Making Loud Noise', 'category' => 'Electrical & Lighting', 'location' => 'M04 Saujana 04-34B', 'date' => '19/05/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 007', 'title' => 'Water Leakage on Ceiling', 'category' => 'Toilet & Plumbing', 'location' => 'M04 Saujana 04-34B', 'date' => '26/06/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 008', 'title' => 'Power Trip When Using Charger', 'category' => 'Electrical & Lighting', 'location' => 'M04 Saujana 04-34B', 'date' => '09/07/2025', 'status' => 'Pending'],
            (object)['id' => 'TK 009', 'title' => 'Dirty Pantry Area', 'category' => 'Cleanliness & Maintenance', 'location' => 'M04 Saujana Pantry Level 4', 'date' => '18/07/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 010', 'title' => 'Broken Study Chair', 'category' => 'Room Facilities', 'location' => 'M04 Saujana 04-34B', 'date' => '04/08/2025', 'status' => 'Pending'],
            (object)['id' => 'TK 011', 'title' => 'Corridor Light Not Working', 'category' => 'Electrical & Lighting', 'location' => 'M04 Saujana Level 4 Corridor', 'date' => '17/11/2025', 'status' => 'Pending'],
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
            (object)['id' => 'TK 001', 'title' => 'WiFi Not Working', 'category' => 'Internet Connection', 'description' => 'The WiFi connection in my room has been down since yesterday. The signal shows full bars but no internet access.', 'location' => 'M04 Saujana 04-34B',  'date' => '04/01/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 002', 'title' => 'Broken Table Lamp', 'category' => 'Electrical & Lighting', 'description' => 'The study table lamp in my room is not functioning. The switch seems loose and the bulb does not turn on.', 'location' => 'M04 Saujana 04-34B',  'category' => 'Electrical & Lighting', 'date' => '23/02/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 003', 'title' => 'Room Door Cannot Lock', 'category' => 'Room Facilities', 'description' => 'The door lock is jammed and cannot be locked properly. It is unsafe to leave belongings in the room.', 'location' => 'M04 Saujana 04-34B',  'category' => 'Room Facilities', 'date' => '16/03/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 004', 'title' => 'Smelly Drainage in Bathroom', 'category' => 'Toilet & Plumbing', 'description' => 'The drainage in the shared bathroom emits a very strong smell, especially in the morning. Possibly clogged.', 'location' => 'M04 Saujana Cluster Bathroom 45',  'category' => 'Toilet & Plumbing', 'date' => '27/03/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 005', 'title' => 'Broken Fan', 'category' => 'Room Facilities', 'description' => 'The ceiling fan rotates very slowly and sometimes stops completely.', 'location' => 'M04 Saujana 04-34B',  'category' => 'Room Facilities', 'date' => '09/04/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 006', 'title' => 'Fan Making Loud Noise', 'category' => 'Electrical & Lighting', 'description' => 'The fan makes a loud rattling noise whenever it’s turned on', 'location' => 'M04 Saujana 04-34B', 'date' => '19/05/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 007', 'title' => 'Water Leakage on Ceiling', 'category' => 'Toilet & Plumbing', 'description' => 'Water is dripping from the ceiling near the cupboard. The floor gets wet every morning.', 'location' => 'M04 Saujana 04-34B', 'date' => '26/06/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 008', 'title' => 'Power Trip When Using Charger', 'category' => 'Electrical & Lighting', 'description' => 'Whenever I plug my phone charger, the power trips and all lights go off in the room.', 'location' => 'M04 Saujana 04-34B', 'date' => '09/07/2025', 'status' => 'Pending'],
            (object)['id' => 'TK 009', 'title' => 'Dirty Pantry Area', 'category' => 'Cleanliness & Maintenance', 'description' => 'The pantry has not been cleaned. Trash is overflowing and there is food waste attracting ants.', 'location' => 'M04 Saujana Pantry Level 4', 'date' => '18/07/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 010', 'title' => 'Broken Study Chair', 'category' => 'Room Facilities', 'description' => 'The study chair leg is unstable and bends when sitting. Might break soon.', 'location' => 'M04 Saujana 04-34B', 'date' => '04/08/2025', 'status' => 'Pending'],
            (object)['id' => 'TK 011', 'title' => 'Corridor Light Not Working', 'category' => 'Electrical & Lighting', 'description' => 'The corridor is dark at night because the light has been out for two days.', 'location' => 'M04 Saujana Level 4 Corridor', 'date' => '17/11/2025', 'status' => 'Pending'],
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
