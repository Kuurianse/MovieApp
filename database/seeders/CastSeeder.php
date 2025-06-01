<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Cast; // Added Cast model

class CastSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $castMembers = [
            'Yuki Kaji', 'Yui Ishikawa', 'Marina Inoue', 'Hiroshi Kamiya',
            'Natsuki Hanae', 'Akari Kito', 'Hiro Shimono', 'Yoshitsugu Matsuoka',
            'Junya Enoki', 'Yuma Uchida', 'Asami Seto', 'Yuichi Nakamura',
            'Mayumi Tanaka', 'Kazuya Nakai', 'Akemi Okamura', 'Hiroaki Hirata',
            'Kikunosuke Toya', 'Tomori Kusunoki', 'Shogo Sakata', 'Fairouz Ai',
            'Takuya Eguchi', 'Saori Hayami', 'Atsumi Tanezaki',
            'Yuki Shin', 'Azumi Waki', 'Yuu Hayashi',
            'Daiki Yamashita', 'Nobuhiko Okamoto', 'Kenta Miyake', 'Ayane Sakura',
            'Junko Takeuchi', 'Chie Nakamura', 'Noriaki Sugiyama',
            'Masakazu Morita', 'Fumiko Orikasa', 'Yuki Matsuoka', // Bleach
            // 'Yoshitsugu Matsuoka', // Already in Demon Slayer, SAO
            'Haruka Tomatsu', // SAO
            // 'Ayane Sakura', // Already in MHA
            'Tetsuya Kakihara', 'Aya Hirano', 'Rie Kugimiya', // Fairy Tail, Death Note (Aya)
            'Gakuto Kajiwara', 'Nobunaga Shimazaki', 'Kana Yuuki', // Black Clover
            'Yusuke Kobayashi', 'Rie Takahashi', 'Inori Minase', // Re:Zero
            'Shinnosuke Mitsushima', 'Tao Tsuchiya', 'Aoi Yuki', // Erased
            'Mamoru Miyano', // Death Note, Steins;Gate
            // 'Aya Hirano', // Already in Fairy Tail, Death Note
            'Shido Nakamura', // Death Note
            'Romi Park', // FMA
            // 'Rie Kugimiya', // Already in Fairy Tail
            'Shinichiro Miki', // FMA
            // 'Mamoru Miyano', // Already in Death Note, Steins;Gate
            'Asami Imai', 'Kana Hanazawa', // Steins;Gate
            'Megumi Han', 'Mariya Ise', 'Miyuki Sawashiro', // Hunter x Hunter
            'Kaito Ishikawa', // Shield Hero
            // 'Asami Seto', // Already in JJK
            'Rina Hidaka', // Shield Hero
        ];

        // Ensure uniqueness
        $uniqueCastMembers = array_unique($castMembers);

        foreach ($uniqueCastMembers as $castName) {
            Cast::updateOrCreate(
                ['slug' => Str::of($castName)->slug('-')],
                [
                    'name' => $castName,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }
    }
}
