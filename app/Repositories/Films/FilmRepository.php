<?php

namespace App\Repositories\Films;

use App\Models\Film;
use App\Repositories\BaseRepository;

class FilmRepository extends BaseRepository
{
    public function __construct(Film $film)
    {
        parent::__construct($film);
    }
}
