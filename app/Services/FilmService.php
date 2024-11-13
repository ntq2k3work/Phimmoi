<?php

namespace App\Services;

use App\Repositories\Categories\CategoryRepository;
use App\Repositories\Films\FilmRepository;

class FilmService
{
    protected $__filmRepository;
    protected $__categoryRepository;

    public function __construct(FilmRepository $filmRepository, CategoryRepository $categoryRepository)
    {
        $this->__filmRepository = $filmRepository;
        $this->__categoryRepository = $categoryRepository;
    }

    public function getAllFilms()
    {
        return $this->__filmRepository->getAll();
    }

    public function createFilm(array $data)
    {

        $film = $this->__filmRepository->create($data);
        if(isset($data['category_id'])){
            $film->category()->sync($data['category_id']);
            return $film;
        }
    }

    public function getFilmById($id)
    {
        $film = $this->__filmRepository->findById($id);
        $film->load('category');
        return $film;
    }
}
