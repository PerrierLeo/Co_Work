<?php

namespace App\Http\Controllers;

use App\Board;
use App\User;
use App\Lists;
use App\Ticket;
use App\Comment;


use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BoardController extends Controller
{
    protected function ticketsDisplay($lists)
    {
        $ticketsDisplay = [];
        foreach ($lists as $list) {

            $tickets = Ticket::where('list_id', $list->id)->get();
            $ticketsDisplay[$list->id] = $tickets;
        }
        return $ticketsDisplay;
    }
    public function show(Request $request, $board)
    {
        // version non safe = $boards = \DB::select("select * from boards where id = $board");

        $boards = Board::where('id', $board)->first();
        $lists = Lists::where('board_id', $board)->get();
        $tickets = $this->ticketsDisplay($lists);
        $comments = \DB::table('comments')->get();
        // $comments = Comment::select('id')->get();
        // dd($comments);

        return view('boards.show', ['board' => $boards, 'lists' => $lists, 'tickets' => $tickets, 'comments' => $comments]);
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
