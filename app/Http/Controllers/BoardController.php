<?php

namespace App\Http\Controllers;

use App\Board;
use App\User;
use App\Lists;
use App\Ticket;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function show($board)
    {
        // version non safe = $boards = \DB::select("select * from boards where id = $board");
        $boards = Board::where('id', $board)->first();
        $lists = Lists::where('board_id', $board)->get();
        //$list_id = auth()->user()->boards()->with('lists.ticket')->where('board_id', $board)->first();
        $tickets = Ticket::where('list_id', 8)->get();
        return view('boards.show', ['board' => $boards, 'lists' => $lists, 'tickets' => $tickets]);
    }


    public function store(Request $request)
    {
        // validation des inputs
        $data = $request->validate([
            'name' => ['required', 'string'],
            'url_picture' => ['required', 'string']
        ]);

        $board = new Board();
        $board->user_id = auth()->user()->id;
        $board->name = $data['name'];
        $board->url_picture = $data['url_picture'];
        $board->save();


        return back();
    }

    public function destroy($id)
    {
        Board::where('id', $id)->delete();
        return back();
    }
}
