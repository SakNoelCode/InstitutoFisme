<?php

namespace App\Http\Controllers;

use App\Http\Resources\CursoResource;
use App\Http\Resources\EgresadoResource;
use App\Http\Resources\EquipamientoResource;
use App\Http\Resources\PostResource;
use App\Models\Curso;
use App\Models\Egresado;
use App\Models\Equipamiento;
use App\Models\Post;
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
        $posts = PostResource::collection(Post::latest()->paginate(6));
        return Inertia::render('Inicio/Noticias', ['posts' => $posts]);
    }

    public function showDetalleNoticia(Post $post)
    {
        $imgPost = asset('storage/' . $post->img_path);
        $posts = Post::latest()->take(2)->get();
        return Inertia::render('Inicio/NoticiaDetalle', ['post' => $post, 'imgPost' => $imgPost, 'posts' => $posts]);
    }

    public function showEquipamiento()
    {
        $equipos = EquipamientoResource::collection(Equipamiento::latest()->paginate(8));
        //dd($equipos);
        return Inertia::render('Inicio/Equipamiento', ['equipos' => $equipos]);
    }

    public function showCursos()
    {
        $cursos = CursoResource::collection(Curso::latest()->paginate(6));
        return Inertia::render('Inicio/Cursos', ['cursos' => $cursos]);
    }

    public function showDetalleCurso(Curso $curso)
    {
        $imgCurso = asset('storage/' . $curso->img_path);
        return Inertia::render('Inicio/CursoDetalle', compact('curso', 'imgCurso'));
    }

    public function showEgresados()
    {
        $egresados = EgresadoResource::collection(Egresado::latest()->paginate(8));
        return Inertia::render('Inicio/Egresados',compact('egresados'));
    }
}
