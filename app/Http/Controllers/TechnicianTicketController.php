<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TechnicianTicketController extends Controller
{
    // Ticket List
    public function index()
    {
        $tickets = $this->getFakeTickets();

        // For simplicity, assume all tickets are assigned to this technician
        return view('technician.ticketlist', ['tickets' => $tickets]);
    }

    // Ticket Details
    public function show($id)
    {
        $ticket = collect($this->getFakeTickets())->firstWhere('id', $id);

        if (!$ticket) {
            abort(404, 'Ticket not found');
        }

        return view('technician.ticketdetails', ['ticket' => $ticket]);
    }

    // Update page (show form)
    public function edit($id)
    {
        $ticket = collect($this->getFakeTickets())->firstWhere('id', $id);

        if (!$ticket) {
            abort(404, 'Ticket not found');
        }

        return view('technician.ticketupdate', ['ticket' => $ticket]);
    }

    // Submit update form (for demo)
    public function update(Request $request, $id)
    {
        // Normally, you would update in database
        // For demo, just redirect back with success message
        return redirect()->route('technician.ticket.list')
            ->with('success', "Ticket $id updated successfully!");
    }

    // Fake tickets data
    private function getFakeTickets()
    {
        return [
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
            ],
            (object)[
                'id' => 'TK000013',
                'userid' => 'STUD000008',
                'title' => 'Unclean Washroom',
                'category' => 'Cleanliness & Maintenance',
                'description' => 'Washroom floor dirty.',
                'location' => 'M03 Saujana 02-12A',
                'date' => '14/02/2025',
                'status' => 'Completed',
                'resolved_date' => '15/02/2025',
            ],
            (object)[
                'id' => 'TK000020',
                'userid' => 'STUD000002',
                'title' => 'Broken Chair',
                'category' => 'Room Facilities',
                'description' => 'Chair leg snapped.',
                'location' => 'M03 Saujana 03-56A',
                'date' => '25/02/2025',
                'status' => 'Completed',
                'resolved_date' => '26/02/2025',
            ],
            (object)[
                'id' => 'TK000021',
                'userid' => 'STUD000004',
                'title' => 'Light Buzzing Noise',
                'category' => 'Electrical & Lighting',
                'description' => 'Buzzing from ceiling light.',
                'location' => 'M03 Saujana 05-45A',
                'date' => '26/02/2025',
                'status' => 'Completed',
                'resolved_date' => '26/02/2025',
            ],
            (object)[
                'id' => 'TK000026',
                'userid' => 'STUD000003',
                'title' => 'Loose Water Tap',
                'category' => 'Toilet & Plumbing',
                'description' => 'Tap wiggles when used.',
                'location' => 'M03 Saujana 04-27A',
                'date' => '05/03/2025',
                'status' => 'Completed',
                'resolved_date' => '06/03/2025',
            ],
        ];
    }
}
