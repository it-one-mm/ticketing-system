<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTicket;
use Illuminate\Http\Request;
use App\Ticket;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();

        return view('tickets.index', compact('tickets'));
    }

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
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $slug
        ]);

        return redirect(route('tickets.create'))->with('msg', 'Ticket has been sent successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        
        return view('tickets.show', compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();

        return view('tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTicket $request, $slug)
    {
        // $ticket = Ticket::whereSlug($slug)->firstOrFail();
        // $ticket->title = $request->title;
        // $ticket->content = $request->content;

        $status = 1;
        if($request->status != null) {
            $status = 0;
        } else {
            $status = 1;
        }

        Ticket::where('slug', $slug)
            ->update([
                'title' => $request->title,
                'content' => $request->content,
                'status' => $status
                ]);

        return redirect(route('tickets.edit', $slug))->with('msg', "Ticket '{$slug}' has been updated!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $ticket = Ticket::whereSlug($slug)->firstOrFail();
        
        $ticket->delete();

        return redirect(route('tickets.index'))->with('secondary', "Ticket '{$slug}' has been deleted!");
    }
}
