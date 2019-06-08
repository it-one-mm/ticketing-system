<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicket;
use App\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicket $request)
    {

        // $ticket = new Ticket();
        // $ticket->title = $request->title;
        // $ticket->content = $request->content;

        $slug = uniqid();

        Ticket::create([
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'slug' => $slug
        ]);

        return redirect(route('tickets.create'))->with('msg', 'Ticket has been sent successfully!');

    }
}
