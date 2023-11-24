<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class welcomeController extends Controller
{
    public function showWelcome()
    {
        return Inertia::render('Inicio/Welcome');
    }

    public function showNosotros()
    {
        return Inertia::render('Inicio/Nosotros');
    }

    public function showNoticias()
    {
        $posts = Post::orderBy('created_at','desc')->get();
        return Inertia::render('Inicio/Noticias', ['posts' => $posts]);
    }

    public function showEquipamiento()
    {
        return Inertia::render('Inicio/Equipamiento');
    }

    public function showCursos()
    {
        return Inertia::render('Inicio/Cursos');
    }

    public function showEgresados()
    {
        return Inertia::render('Inicio/Egresados');
    }
}
