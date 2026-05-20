<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sorcerer;

class SorcererSeeder extends Seeder
{
    public function run(): void
{
    \App\Models\Sorcerer::truncate(); 

    \App\Models\Sorcerer::insert([
        [
            'name' => 'Yuji Itadori', 
            'grade' => 'Grade 1 (Candidate)', 
            'cursed_technique' => 'Divergent Fist / Black Flash', 
            'affiliation' => 'Tokyo Jujutsu High',
            'image_url' => 'images/yuji.jpg',
            'description' => 'A kind-hearted teenager with immense physical strength who became the vessel for Ryomen Sukuna.',
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'name' => 'Satoru Gojo', 
            'grade' => 'Special Grade', 
            'cursed_technique' => 'Limitless / Six Eyes', 
            'affiliation' => 'Tokyo Jujutsu High',
            'image_url' => 'images/gojo.jpg',
            'description' => 'The strongest sorcerer in the world, known for his overwhelming cursed energy and charismatic personality.',
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'name' => 'Ryomen Sukuna', 
            'grade' => 'Special Grade (King of Curses)', 
            'cursed_technique' => 'Dismantle and Cleave', 
            'affiliation' => 'Independent',
            'image_url' => 'images/sukuna.jpg',
            'description' => 'A deadly four-armed sorcerer from the golden age of jujutsu, currently sharing a body with Yuji Itadori.',
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'name' => 'Megumi Fushiguro', 
            'grade' => 'Grade 2', 
            'cursed_technique' => 'Ten Shadows Technique', 
            'affiliation' => 'Tokyo Jujutsu High',
            'image_url' => 'images/megumi.jpg',
            'description' => 'A stoic first-year student who summons powerful Shikigami to fight alongside him.',
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'name' => 'Nobara Kugisaki', 
            'grade' => 'Grade 3', 
            'cursed_technique' => 'Straw Doll Technique', 
            'affiliation' => 'Tokyo Jujutsu High',
            'image_url' => 'images/nobara.jpg',
            'description' => 'A confident and skilled sorcerer who uses a hammer, nails, and voodoo-like techniques.',
            'created_at' => now(), 'updated_at' => now()
        ],
        [
            'name' => 'Yuta Okkotsu', 
            'grade' => 'Special Grade', 
            'cursed_technique' => 'Rika Manipulation', 
            'affiliation' => 'Tokyo Jujutsu High',
            'image_url' => 'images/yuta.jpg',
            'description' => 'A powerful sorcerer haunted by his childhood friend Rika, possessing nearly infinite cursed energy.',
            'created_at' => now(), 'updated_at' => now()
        ],
    ]);
}
}