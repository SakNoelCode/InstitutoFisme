<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Egresado;
use App\Models\Equipamiento;
use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Post::count();
        $cursos = Curso::count();
        $egresados = Egresado::count();
        $equipos = Equipamiento::count();
        return Inertia::render('Dashboard', compact('posts', 'cursos', 'egresados', 'equipos'));
    }
}
