<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReadMail;

class ContactController extends Controller
{
    public function index()
    {
        $comment = Contact::all();
        return view('admin.comments.index')->with(['comment' => $comment]);
    }
    public function read(Request $request)
    {
        $commentId = $request->input('commentId');
        $comment = Contact::findOrFail($commentId);
        $comment->status = 1;
        $comment->save();

        Mail::to($comment->email)->send(new ReadMail($comment));


        return response()->json(['success' => true]);
    }
    public function delete($id)
    {
        $comment = Contact::findOrFail($id);
        $comment->delete();
        return response()->json(['success' => true]);
    }
}
