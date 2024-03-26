<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Project;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request, Project $project)
{
    $validatedData = $request->validate([
        'content_message' => 'required|max:255'
    ]);

    if (Auth::check()) {
        $user = Auth::user();

        $comment = new Comment();
        $comment->content_message = $validatedData['content_message'];
        $comment->user_id = $user->id;
        $comment->project_id = $project->id;
        $comment->save();

        return back()->with('success', 'Comentario agregado correctamente.');
    } else {
        return redirect()->route('login')->with('error', 'Debe iniciar sesión para agregar un comentario.');
    }
}


    public function show(Project $project)
    {
        $user = Auth::user();
        return view('projects.Forms.show-formstudent', ['project' => $project, 'user' => $user]);
    }
}
