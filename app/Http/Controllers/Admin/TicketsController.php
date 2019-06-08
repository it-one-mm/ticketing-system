<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTicket;
use App\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
