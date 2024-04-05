<?php

namespace App\Http\Controllers;

use App\Models\AcademicAdvisor;
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

        $getIdAdvisor = AcademicAdvisor::where('user_id', $user->id)->first();

        $comment = new Comment();
        $comment->content_message = $validatedData['content_message'];
        $comment->academic_advisor_id = $getIdAdvisor->id;
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

    public function destroy(Comment $comment)
    {
        if (Auth::check() && Auth::user()->id === $comment->user_id) {
            $comment->delete();
            return back()->with('error', 'Comentario eliminado correctamente.');
        } else {
            return back()->with('error', 'No tienes permiso para eliminar este comentario.');
        }
    }
}
