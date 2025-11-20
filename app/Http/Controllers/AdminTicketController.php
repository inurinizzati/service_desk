<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTicketController extends Controller
{
    public function index()
    {
        $tickets = [
            (object)['id' => 'TK 001', 'student_id' => 'S001', 'title' => 'WiFi Not Working', 'location' => 'M04 Saujana 04-34B', 'category' => 'Internet Connection', 'date' => '04/01/2025', 'status' => 'Completed','resolved_date' => '05/01/2025'],
            (object)['id' => 'TK 008', 'student_id' => 'S008', 'title' => 'Power Trip', 'location' => 'M04 Saujana 04-34B', 'category' => 'Electrical & Lighting', 'date' => '09/07/2025', 'status' => 'Pending'],
            // Add more tickets
        ];

        $technicians = [
            (object)['id' => 1, 'name' => 'Technician A'],
            (object)['id' => 2, 'name' => 'Technician B'],
            (object)['id' => 3, 'name' => 'Technician C'],
        ];

        return view('admin.ticketlist', ['tickets' => $tickets, 'technicians' => $technicians]);
    }

    public function show($id)
    {
        $tickets = [
            (object)['id' => 'TK 001', 'student_id' => 'S001', 'title' => 'WiFi Not Working', 'category' => 'Internet Connection', 'description' => 'WiFi not working in room', 'location' => 'M04 Saujana 04-34B', 'date' => '04/01/2025', 'status' => 'Completed'],
            (object)['id' => 'TK 008', 'student_id' => 'S008', 'title' => 'Power Trip', 'category' => 'Electrical & Lighting', 'description' => 'Power trips when charging', 'location' => 'M04 Saujana 04-34B', 'date' => '09/07/2025', 'status' => 'Pending'],
        ];

        $ticket = collect($tickets)->firstWhere('id', $id);

        if (!$ticket) {
            abort(404, 'Ticket not found');
        }

        $technicians = [
            (object)['id' => 1, 'name' => 'Technician A'],
            (object)['id' => 2, 'name' => 'Technician B'],
            (object)['id' => 3, 'name' => 'Technician C'],
        ];

        return view('admin.ticketdetails', ['ticket' => $ticket, 'technicians' => $technicians]);
    }

    public function assignTechnician(Request $request)
    {
        $ticketId = $request->ticket_id;
        $technicianId = $request->technician_id;

        // Here you would update DB to assign technician
        // For now, just flash success
        return redirect()->back()->with('success', 'Technician assigned successfully!');
    }
}
