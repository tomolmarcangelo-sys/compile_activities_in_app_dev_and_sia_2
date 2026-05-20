<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Song;

class SongSeeder extends Seeder
{
    public function run()
    {
        $songs = [
            ['title' => 'Blinding Lights', 'artist' => 'The Weeknd', 'genre' => 'Pop', 'description' => 'A synth-pop masterpiece inspired by 80s nostalgia.'],
            ['title' => 'Starboy', 'artist' => 'The Weeknd', 'genre' => 'Pop', 'description' => 'Electronic and R&B fusion featuring Daft Punk.'],
            ['title' => 'Sicko Mode', 'artist' => 'Travis Scott', 'genre' => 'Hip Hop', 'description' => 'A multi-part hip hop anthem from the Astroworld era.'],
            ['title' => 'God\'s Plan', 'artist' => 'Drake', 'genre' => 'Hip Hop', 'description' => 'A chill, uplifting track about destiny and success.'],
            ['title' => 'Bohemian Rhapsody', 'artist' => 'Queen', 'genre' => 'Rock', 'description' => 'The legendary progressive rock opera.'],
            ['title' => 'Smells Like Teen Spirit', 'artist' => 'Nirvana', 'genre' => 'Rock', 'description' => 'The definitive grunge anthem of the 90s.'],
            ['title' => 'Coffee Shop', 'artist' => 'Lofi Girl', 'genre' => 'Lofi', 'description' => 'Perfect background beats for studying or coding.'],
            ['title' => 'Rainy Night', 'artist' => 'Chillhop Music', 'genre' => 'Lofi', 'description' => 'Soothing rain sounds mixed with jazz-inspired beats.'],
            ['title' => 'Levitating', 'artist' => 'Dua Lipa', 'genre' => 'Pop', 'description' => 'A disco-infused pop track that feels like space travel.'],
            ['title' => 'HUMBLE.', 'artist' => 'Kendrick Lamar', 'genre' => 'Hip Hop', 'description' => 'Hard-hitting production with a powerful message.'],
            ['title' => 'Hotel California', 'artist' => 'Eagles', 'genre' => 'Rock', 'description' => 'Classic rock storytelling at its finest.'],
            ['title' => 'Midnight City', 'artist' => 'M83', 'genre' => 'Pop', 'description' => 'Dreamy electronic pop for late-night drives.'],
            ['title' => 'Lose Yourself', 'artist' => 'Eminem', 'genre' => 'Hip Hop', 'description' => 'The ultimate motivational hip hop track.'],
            ['title' => 'Comfortably Numb', 'artist' => 'Pink Floyd', 'genre' => 'Rock', 'description' => 'Atmospheric rock with an iconic guitar solo.'],
            ['title' => 'Study Session', 'artist' => 'ChilledCow', 'genre' => 'Lofi', 'description' => 'No vocals, just pure focus and relaxation.'],
            ['title' => 'Golden Hour', 'artist' => 'JVKE', 'genre' => 'Pop', 'description' => 'Cinematic piano pop that feels like a sunset.'],
        ];

        foreach ($songs as $song) {
            Song::create($song);
        }
    }
}