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
                'id' => 'TK001',
                'title' => 'WiFi Not Working',
                'category' => 'Internet',
                'description' => 'WiFi connection is down.',
                'location' => 'M04 Saujana 04-34B',
                'date' => '04/01/2025',
                'status' => 'Completed',
                'resolved_date' => '05/01/2025',
            ],
            (object)[
                'id' => 'TK002',
                'title' => 'Broken Table Lamp',
                'category' => 'Electrical & Lighting',
                'description' => 'Table lamp is broken.',
                'location' => 'M04 Saujana 04-34B',
                'date' => '23/02/2025',
                'status' => 'Pending',
            ],
            (object)[
                'id' => 'TK003',
                'title' => 'Fan Making Loud Noise',
                'category' => 'Electrical & Lighting',
                'description' => 'Fan rattling sound.',
                'location' => 'M04 Saujana 04-34B',
                'date' => '19/05/2025',
                'status' => 'Pending',
            ],
            (object)[
                'id' => 'TK004',
                'title' => 'Dirty Pantry Area',
                'category' => 'Cleanliness & Maintenance',
                'description' => 'Pantry not clean.',
                'location' => 'M04 Saujana Pantry Level 4',
                'date' => '18/07/2025',
                'status' => 'Completed',
                'resolved_date' => '19/07/2025',
            ],
        ];
    }
}
