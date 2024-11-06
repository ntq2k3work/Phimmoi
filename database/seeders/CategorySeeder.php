<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Phim Hành Trình'],
            ['name' => 'Phim Tâm Lý'],
            ['name' => 'Phim Hài'],
            ['name' => 'Phim Võ Thuyết'],
            ['name' => 'Phim Hồi Kiếp'],
            ['name' => 'Phim Kinh Dị'],
            ['name' => 'Phim Thriller'],
            ['name' => 'Phim Khoa Học'],
            ['name' => 'Phim Cổ Trang'],
            ['name' => 'Phim Chính Trị'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
