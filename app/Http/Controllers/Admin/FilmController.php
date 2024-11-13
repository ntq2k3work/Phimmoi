<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Film\CreateFilmRequest;
use App\Http\Resources\FilmResources;
use App\Services\CategoryService;
use App\Services\FilmService;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    protected $__filmService,$__categoryService;

    public function __construct(FilmService $filmService, CategoryService $categoryService)
    {
        $this->__filmService = $filmService;
        $this->__categoryService = $categoryService;
    }
    public function index()
    {
        $films = $this->__filmService->getAllFilms();
        return view('pages.films.index',compact('films'));
    }

    public function create()
    {
        $categories = $this->__categoryService->getAllCategories();
        return view('pages.films.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $filmData = $request->all();
        $this->__filmService->createFilm($filmData);
        alert()->success('Thành công','Thêm mới thành công');
        return redirect()->route('admin.films');
    }

    public function show($id)
    {
        $film = $this->__filmService->getFilmById($id);
        $film = FilmResources::make($film);
        return view('pages.films.show',compact('film'));
    }
}
