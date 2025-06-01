<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Genre; // Added
use App\Models\Cast;  // Added
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; // Added

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $moviesData = [
            [
                'title' => 'Attack on Titan',
                'title_japanese' => '進撃の巨人 (Shingeki no Kyojin)',
                'slug' => 'attack-on-titan',
                'description' => 'In a world where humanity resides within enormous walled cities to protect themselves from Titans, a young boy named Eren Yeager joins the Scout Regiment to get revenge after a Titan destroys his hometown. The story explores themes of survival, freedom, and the human spirit as Eren and his friends uncover the truth behind the Titans and the world they live in.',
                'description_id' => 'Di dunia di mana umat manusia tinggal di dalam kota-kota besar yang dikelilingi tembok raksasa untuk melindungi diri dari Titan, seorang anak muda bernama Eren Yeager bergabung dengan Pasukan Pengintai untuk membalas dendam setelah Titan menghancurkan kampung halamannya. Cerita ini mengeksplorasi tema bertahan hidup, kebebasan, dan semangat manusia saat Eren dan teman-temannya mengungkap kebenaran di balik Titan dan dunia tempat mereka tinggal.',
                'release_date' => '2013-04-07',
                'cast_names' => ['Yuki Kaji', 'Yui Ishikawa', 'Marina Inoue', 'Hiroshi Kamiya'],
                'genre_names' => ['Action', 'Drama', 'Fantasy'],
                'image' => 'https://image.tmdb.org/t/p/w500/hTP1DtLGFamjfu8WqjnuQdP1n4i.jpg',
            ],
            [
                'title' => 'Demon Slayer: Kimetsu no Yaiba',
                'title_japanese' => '鬼滅の刃 (Kimetsu no Yaiba)',
                'slug' => 'demon-slayer-kimetsu-no-yaiba',
                'description' => 'After his family is slaughtered by demons, Tanjiro Kamado becomes a demon slayer to save his sister Nezuko, who was turned into a demon. The story follows Tanjiro\'s journey as he faces powerful demons, learns new techniques, and uncovers the secrets of the demon world.',
                'description_id' => 'Setelah keluarganya dibantai oleh iblis, Tanjiro Kamado menjadi pembasmi iblis untuk menyelamatkan adiknya, Nezuko, yang berubah menjadi iblis. Cerita ini mengikuti perjalanan Tanjiro saat ia menghadapi iblis-iblis kuat, mempelajari teknik baru, dan mengungkap rahasia dunia iblis.',
                'release_date' => '2019-04-06',
                'cast_names' => ['Natsuki Hanae', 'Akari Kito', 'Hiro Shimono', 'Yoshitsugu Matsuoka'],
                'genre_names' => ['Action', 'Supernatural', 'Adventure'],
                'image' => 'https://image.tmdb.org/t/p/w500/wrCVHdkBlBWdJUZPvnJWcBRuhSY.jpg',
            ],
            [
                'title' => 'Jujutsu Kaisen',
                'title_japanese' => '呪術廻戦 (Jujutsu Kaisen)',
                'slug' => 'jujutsu-kaisen',
                'description' => 'A boy swallows a cursed talisman - the finger of a demon - and becomes cursed himself. He enters a school of sorcerers to learn how to exorcise curses and protect humanity from supernatural threats. The story delves into the dark and mysterious world of curses and sorcery.',
                'description_id' => 'Seorang anak menelan jimat terkutuk - jari iblis - dan menjadi terkutuk sendiri. Dia masuk ke sekolah penyihir untuk belajar cara mengusir kutukan dan melindungi umat manusia dari ancaman supernatural. Cerita ini menyelami dunia gelap dan misterius dari kutukan dan sihir.',
                'release_date' => '2020-10-03',
                'cast_names' => ['Junya Enoki', 'Yuma Uchida', 'Asami Seto', 'Yuichi Nakamura'],
                'genre_names' => ['Action', 'Supernatural'],
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/fHpKWq9ayzSk8nSwqRuaAUemRKh.jpg',
            ],
            [
                'title' => 'One Piece',
                'title_japanese' => 'ワンピース (Wan Pīsu)',
                'slug' => 'one-piece',
                'description' => 'Monkey D. Luffy and his pirate crew search for the ultimate treasure, the One Piece, in order to become the next Pirate King. The story is filled with epic adventures, battles, and the unbreakable bonds of friendship as they explore the vast and dangerous seas.',
                'description_id' => 'Monkey D. Luffy dan kru bajak lautnya mencari harta karun tertinggi, One Piece, untuk menjadi Raja Bajak Laut berikutnya. Cerita ini penuh dengan petualangan epik, pertempuran, dan ikatan persahabatan yang tak tergoyahkan saat mereka menjelajahi lautan yang luas dan berbahaya.',
                'release_date' => '1999-10-20',
                'cast_names' => ['Mayumi Tanaka', 'Kazuya Nakai', 'Akemi Okamura', 'Hiroaki Hirata'],
                'genre_names' => ['Action', 'Adventure', 'Fantasy'],
                'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/cMD9Ygz11zjJzAovURpO75Qg7rT.jpg',
            ],
            [
                "title" => "Chainsaw Man",
                "title_japanese" => "チェンソーマン (Chensō Man)",
                "slug" => "chainsaw-man",
                "description" => "Denji, a poor young man, is forced to kill devils to pay off his deceased father's debt. He merges with his pet devil Pochita and becomes Chainsaw Man. The story is a mix of dark humor, intense action, and emotional moments as Denji navigates his new life.",
                "description_id" => "Denji, seorang pemuda miskin, dipaksa membunuh iblis untuk melunasi hutang ayahnya yang telah meninggal. Dia bergabung dengan iblis peliharaannya, Pochita, dan menjadi Chainsaw Man. Cerita ini adalah campuran humor gelap, aksi intens, dan momen emosional saat Denji menjalani kehidupan barunya.",
                "release_date" => "2022-10-11",
                "cast_names" => ["Kikunosuke Toya", "Tomori Kusunoki", "Shogo Sakata", "Fairouz Ai"],
                "genre_names" => ["Action", "Horror", "Fantasy"],
                "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/yVtx7Xn9UxNJqvG2BkvhCcmed9S.jpg",
            ],
            [
                "title" => "Spy x Family",
                "title_japanese" => "スパイファミリー (Supai Famirī)",
                "slug" => "spy-x-family",
                "description" => "A top spy codenamed Twilight must build a fake family to infiltrate an elite school. Unbeknownst to him, his wife is an assassin and his adopted daughter is a telepath. Together, they navigate daily life filled with secrets, comedy, and chaos, all while hiding their true identities.",
                "description_id" => "Seorang mata-mata top dengan nama sandi Twilight harus membangun keluarga palsu untuk menyusup ke sekolah elit. Tanpa sepengetahuannya, istrinya adalah seorang pembunuh bayaran dan anak angkatnya adalah seorang telepatis. Bersama-sama, mereka menjalani kehidupan sehari-hari penuh rahasia, komedi, dan kekacauan, sambil menyembunyikan identitas asli mereka.",
                "release_date" => "2022-04-09",
                "cast_names" => ["Takuya Eguchi", "Saori Hayami", "Atsumi Tanezaki"],
                "genre_names" => ["Action", "Comedy", "Slice of Life"],
                "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/gHZqglFWJTFwx6rnTq4vkPRnuxu.jpg"
            ],
            [
                "title" => "Tokyo Revengers",
                "title_japanese" => "東京卍リベンジャーズ (Tōkyō Ribenjāzu)",
                "slug" => "tokyo-revengers",
                "description" => "Takemichi Hanagaki is a struggling adult who suddenly travels back in time to his middle school days. Determined to save his ex-girlfriend from being killed by a gang, he infiltrates the Tokyo Manji Gang and works to change the past and the future.",
                "description_id" => "Takemichi Hanagaki, seorang pria dewasa yang sedang terpuruk, tiba-tiba kembali ke masa SMP-nya. Bertekad menyelamatkan mantan pacarnya dari kematian akibat geng, ia menyusup ke Geng Tokyo Manji dan berusaha mengubah masa lalu dan masa depan.",
                "release_date" => "2021-04-11",
                "cast_names" => ["Yuki Shin", "Azumi Waki", "Yuu Hayashi"],
                "genre_names" => ["Action", "Drama", "Supernatural"],
                "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/arB3L9pZZBSzUPSC8BEv8c3X0bF.jpg"
            ],
            [
                "title" => "My Hero Academia",
                "title_japanese" => "僕のヒーローアカデミア (Boku no Hīrō Akademia)",
                "slug" => "my-hero-academia",
                "description" => "In a world where most people have superpowers known as \"Quirks\", Izuku Midoriya dreams of becoming a hero despite being born without one. After inheriting the power of the greatest hero, All Might, he joins U.A. High School to train and fight villains.",
                "description_id" => "Di dunia di mana sebagian besar orang memiliki kekuatan super yang disebut \"Quirk\", Izuku Midoriya bermimpi menjadi pahlawan meski lahir tanpa kekuatan. Setelah mewarisi kekuatan pahlawan terhebat, All Might, ia masuk Sekolah U.A. untuk berlatih dan melawan para penjahat.",
                "release_date" => "2016-04-03",
                "cast_names" => ["Daiki Yamashita", "Nobuhiko Okamoto", "Kenta Miyake", "Ayane Sakura"],
                "genre_names" => ["Action", "Superhero"],
                "image" => "https://image.tmdb.org/t/p/w500/ivOLM47yJt90P19RH1NvJrAJz9F.jpg"
            ],
            [
                "title" => "Naruto Shippuden",
                "title_japanese" => "ナルト- 疾風伝 (Naruto Shippūden)",
                "slug" => "naruto-shippuden",
                "description" => "After two years of intense training under the legendary ninja Jiraiya, Naruto Uzumaki returns to Konoha to protect his friends and confront the mysterious organization known as Akatsuki. He faces new threats, reconnects with old allies, and grows stronger both in skill and spirit.",
                "description_id" => "Setelah dua tahun pelatihan intens di bawah bimbingan ninja legendaris Jiraiya, Naruto Uzumaki kembali ke Konoha untuk melindungi teman-temannya dan menghadapi organisasi misterius bernama Akatsuki. Ia menghadapi ancaman baru, bertemu kembali dengan sekutu lama, dan tumbuh lebih kuat baik dalam kemampuan maupun semangat.",
                "release_date" => "2007-02-15",
                "cast_names" => ["Junko Takeuchi", "Chie Nakamura", "Noriaki Sugiyama"],
                "genre_names" => ["Action", "Adventure"],
                "image" => "https://image.tmdb.org/t/p/w500/zAYRe2bJxpWTVrwwmBc00VFkAf4.jpg"
            ],
            [
                "title" => "Bleach: Thousand-Year Blood War",
                "title_japanese" => "ブリーチ 千年血戦篇 (Burīchi Sennen Kessen-hen)",
                "slug" => "bleach-thousand-year-blood-war",
                "description" => "Ichigo Kurosaki returns to face the Quincy army in an all-out war that threatens the balance between the living world and the Soul Society. Reuniting with old friends, he uncovers hidden powers and confronts enemies more formidable than ever before.",
                "description_id" => "Ichigo Kurosaki kembali menghadapi tentara Quincy dalam perang penuh yang mengancam keseimbangan antara dunia nyata dan Soul Society. Bersatu kembali dengan teman lama, ia menemukan kekuatan tersembunyi dan menghadapi musuh yang lebih tangguh dari sebelumnya.",
                "release_date" => "2022-10-10",
                "cast_names" => ["Masakazu Morita", "Fumiko Orikasa", "Yuki Matsuoka"],
                "genre_names" => ["Action", "Supernatural"],
                "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/2EewmxXe72ogD0EaWM8gqa0ccIw.jpg"
            ],
            [
                "title" => "Sword Art Online",
                "title_japanese" => "ソードアート・オンライン (Sōdo Āto Onrain)",
                "slug" => "sword-art-online",
                "description" => "Players trapped in the virtual reality MMORPG Sword Art Online must fight their way through 100 floors to escape. When death in the game means death in real life, solo player Kirito and healer Asuna form a fragile alliance to survive and uncover the game's mysteries.",
                "description_id" => "Para pemain yang terjebak dalam MMORPG realitas virtual Sword Art Online harus bertarung melewati 100 lantai untuk melarikan diri. Ketika kematian di dalam game berarti kematian di dunia nyata, pemain tunggal Kirito dan penyembuh Asuna membentuk aliansi rapuh untuk bertahan hidup dan mengungkap misteri game.",
                "release_date" => "2012-07-08",
                "cast_names" => ["Yoshitsugu Matsuoka", "Haruka Tomatsu", "Ayana Taketatsu"],
                "genre_names" => ["Action", "Adventure", "Fantasy"],
                "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/9m8bFIXPg26taNrFSXGwEORVACD.jpg"
            ],
            [
                "title" => "Fairy Tail",
                "title_japanese" => "フェアリーテイル (Fearī Teiru)",
                "slug" => "fairy-tail",
                "description" => "Lucy Heartfilia, a celestial spirit mage, joins the Fairy Tail guild and teams up with the fire mage Natsu Dragneel and his talking cat Happy. Together, they undertake dangerous missions, forge unbreakable bonds, and defend the guild against dark forces.",
                "description_id" => "Lucy Heartfilia, seorang penyihir roh surgawi, bergabung dengan guild Fairy Tail dan bekerja sama dengan penyihir api Natsu Dragneel serta kucing berbicara bernama Happy. Bersama-sama, mereka menjalani misi berbahaya, membentuk ikatan tak terputuskan, dan melindungi guild dari kekuatan gelap.",
                "release_date" => "2009-10-12",
                "cast_names" => ["Tetsuya Kakihara", "Aya Hirano", "Rie Kugimiya"],
                "genre_names" => ["Action", "Adventure", "Fantasy"],
                "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/h50lj7xO65qafNYZCrfQ7ztkMBD.jpg"
            ],
            [
                "title" => "Black Clover",
                "title_japanese" => "ブラッククローバー (Burakku Kurōbā)",
                "slug" => "black-clover",
                "description" => "Asta, a boy born without magic in a world where magic is everything, dreams of becoming the Wizard King. Armed with an anti-magic sword and relentless determination, he joins the Magic Knights and challenges fate itself to prove his worth.",
                "description_id" => "Asta, seorang anak yang lahir tanpa sihir di dunia di mana sihir adalah segalanya, bermimpi menjadi Raja Penyihir. Dipersenjatai dengan pedang anti-sihir dan tekad yang tak tergoyahkan, ia bergabung dengan Ksatria Sihir dan menantang takdir untuk membuktikan kemampuannya.",
                "release_date" => "2017-10-03",
                "cast_names" => ["Gakuto Kajiwara", "Nobunaga Shimazaki", "Kana Yuuki"],
                "genre_names" => ["Action", "Fantasy"],
                "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/kaMisKeOoTBPxPkbC3OW7Wgt6ON.jpg"
            ],
            [
                "title" => "Re:Zero - Starting Life in Another World",
                "slug" => "re-zero-starting-life-in-another-world",
                "title_japanese" => "Re:ゼロから始める異世界生活 (Re:Zero kara Hajimeru Isekai Seikatsu)",
                "description" => "Subaru Natsuki is suddenly transported to another world and discovers he has the power to return from death. Using this ability, he attempts to save his friends from tragic fates, but each reset brings new heartache and challenges.",
                "description_id" => "Subaru Natsuki tiba-tiba dipindahkan ke dunia lain dan menemukan bahwa ia memiliki kekuatan untuk kembali dari kematian. Dengan kemampuan ini, ia mencoba menyelamatkan teman-temannya dari nasib tragis, tetapi setiap kali ulang kembali membawa kesedihan dan tantangan baru.",
                "release_date" => "2016-04-04",
                "cast_names" => ["Yusuke Kobayashi", "Rie Takahashi", "Inori Minase"],
                "genre_names" => ["Action", "Drama", "Fantasy"],
                "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/aRwmcX36r1ZpR5Xq5mmFcpUDQ8J.jpg"
            ],
            [
                "title" => "Erased",
                "title_japanese" => "僕だけがいない街 (Boku dake ga Inai Machi)",
                "slug" => "erased",
                "description" => "Satoru Fujinuma possesses the 'Revival' ability to go back in time moments before a tragedy. When his mother is murdered, he is sent 18 years into the past and must solve a series of child kidnappings to avert both murders.",
                "description_id" => "Satoru Fujinuma memiliki kemampuan 'Revival' untuk kembali ke masa lalu beberapa saat sebelum tragedi. Ketika ibunya dibunuh, ia dikirim 18 tahun ke masa lalu dan harus memecahkan serangkaian penculikan anak untuk mencegah kedua pembunuhan tersebut.",
                "release_date" => "2016-01-08",
                "cast_names" => ["Shinnosuke Mitsushima", "Tao Tsuchiya", "Aoi Yuki"],
                "genre_names" => ["Drama", "Mystery", "Supernatural"],
                "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/EljUwZJhpuYfVuSfqY8Pt1xxpH.jpg"
            ],
            [
                "title" => "Death Note",
                "title_japanese" => "デスノート (Desu Nōto)",
                "slug" => "death-note",
                "description" => "Light Yagami, a genius high school student, finds the Death Note, a notebook that kills anyone whose name is written in it. Believing he can cleanse the world of crime, he engages in a deadly cat-and-mouse game with the brilliant detective L.",
                "description_id" => "Light Yagami, seorang siswa SMA jenius, menemukan Death Note, buku catatan yang membunuh siapa saja yang namanya ditulis di dalamnya. Percaya bahwa ia dapat membersihkan dunia dari kejahatan, ia terlibat dalam permainan kucing-dan-tikus mematikan dengan detektif brilian L.",
                "release_date" => "2006-10-04",
                "cast_names" => ["Mamoru Miyano", "Aya Hirano", "Shido Nakamura"],
                "genre_names" => ["Mystery", "Supernatural", "Thriller"],
                "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/tCZFfYTIwrR7n94J6G14Y4hAFU6.jpg"
            ],
            [
                "title"=> "Fullmetal Alchemist Brotherhood",
                "title_japanese"=> "鋼の錬金術師 FULLMETAL ALCHEMIST (Hagane no Renkinjutsushi)",
                "slug"=> "fullmetal-alchemist-brotherhood",
                "description"=> "Brothers Edward and Alphonse Elric attempt human transmutation to revive their mother and suffer tragic consequences. They then set out to find the Philosopher's Stone to restore their bodies, uncovering a dark government conspiracy along the way.",
                "description_id"=> "Saudara Edward dan Alphonse Elric melakukan transmutasi manusia untuk menghidupkan kembali ibu mereka dan mengalami konsekuensi tragis. Mereka kemudian memulai pencarian Batu Bertuah untuk mengembalikan tubuh mereka, sambil mengungkap konspirasi pemerintah yang gelap.",
                "release_date"=> "2009-04-05",
                "cast_names"=> ["Romi Park", "Rie Kugimiya", "Shinichiro Miki"],
                "genre_names"=> ["Action", "Adventure", "Fantasy"],
                "image"=> "https://image.tmdb.org/t/p/w500/5ZFUEOULaVml7pQuXxhpR2SmVUw.jpg"
            ],
            [
                "title"=> "Steins;Gate",
                "title_japanese"=> "シュタインズ・ゲート (Shutainzu Gēto)",
                "slug"=> "steins-gate",
                "description"=> "Rintaro Okabe and friends accidentally invent a time machine using a microwave and a cell phone. As they alter past events to save lives, they discover that each change creates unforeseen dangers that threaten reality itself.",
                "description_id"=> "Rintaro Okabe dan teman-temannya secara tidak sengaja menemukan mesin waktu menggunakan microwave dan ponsel. Saat mereka mengubah peristiwa masa lalu untuk menyelamatkan nyawa, mereka menyadari bahwa setiap perubahan menciptakan bahaya tak terduga yang mengancam realitas itu sendiri.",
                "release_date"=> "2011-04-06",
                "cast_names"=> ["Mamoru Miyano", "Asami Imai", "Kana Hanazawa"],
                "genre_names"=> ["Drama", "Sci-Fi", "Thriller"],
                "image"=> "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/5DZix6ggRiFEbsGqUeTAI1z2wtX.jpg"
            ],
            [
                "title"=> "Hunter x Hunter",
                "title_japanese"=> "ハンター×ハンター (Hantā Hantā)",
                "slug"=> "hunter-x-hunter",
                "description"=> "Gon Freecss learns his father, a legendary Hunter, is alive. He passes the perilous Hunter Exam and sets off across a world of dangerous beasts, political intrigue, and moral ambiguity to find him and forge his own path.",
                "description_id"=> "Gon Freecss mengetahui bahwa ayahnya, seorang Hunter legendaris, masih hidup. Ia melewati Ujian Hunter yang berbahaya dan memulai perjalanan melintasi dunia yang dipenuhi binatang buas, intrik politik, dan ambiguitas moral untuk menemukannya dan menapaki jalannya sendiri.",
                "release_date"=> "2011-10-02",
                "cast_names"=> ["Megumi Han", "Mariya Ise", "Miyuki Sawashiro"],
                "genre_names"=> ["Action", "Adventure", "Fantasy"],
                "image"=> "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/i2EEr2uBvRlAwJ8d8zTG2Y19mIa.jpg"
            ],
            [
                "title"=> "The Rising of the Shield Hero",
                "title_japanese"=> "盾の勇者の成り上がり (Tate no Yūsha no Nariagari)",
                "slug"=> "the-rising-of-the-shield-hero",
                "description"=> "Naofumi Iwatani is summoned to another world as one of four Cardinal Heroes but is betrayed and falsely accused, losing his status and wealth. With only his Legendary Shield, he survives prejudice and teams up with Raphtalia to defend the kingdom.",
                "description_id"=> "Naofumi Iwatani dipanggil ke dunia lain sebagai salah satu dari empat Pahlawan Utama namun dikhianati dan difitnah, kehilangan status dan kekayaannya. Dengan hanya perisai legendarisnya, ia bertahan menghadapi prasangka dan bekerja sama dengan Raphtalia untuk melindungi kerajaan.",
                "release_date"=> "2019-01-09",
                "cast_names"=> ["Kaito Ishikawa", "Asami Seto", "Rina Hidaka"],
                "genre_names"=> ["Action", "Adventure", "Fantasy"],
                "image"=> "https://image.tmdb.org/t/p/w500/6cXf5EDwVhsRv8GlBzUTVnWuk8Z.jpg"
            ]
        ];

        foreach ($moviesData as $movieData) {
            // Prepare movie data, excluding cast and genres for now
            $moviePayload = [
                'title' => $movieData['title'],
                'title_japanese' => $movieData['title_japanese'],
                'slug' => $movieData['slug'],
                'description' => $movieData['description'],
                'description_id' => $movieData['description_id'],
                'release_date' => $movieData['release_date'],
                'image' => $movieData['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ];

            $movie = Movie::updateOrCreate(['slug' => $movieData['slug']], $moviePayload);

            // Attach Genres
            if (!empty($movieData['genre_names'])) {
                $genreIds = [];
                foreach ($movieData['genre_names'] as $genreName) {
                    $genre = Genre::firstWhere('slug', Str::of($genreName)->slug('-'));
                    if ($genre) {
                        $genreIds[] = $genre->id;
                    }
                }
                $movie->genres()->sync($genreIds); // Assumes 'genres' relationship in Movie model
            }

            // Attach Cast
            if (!empty($movieData['cast_names'])) {
                $castIds = [];
                foreach ($movieData['cast_names'] as $castName) {
                    $castMember = Cast::firstWhere('slug', Str::of($castName)->slug('-'));
                    if ($castMember) {
                        $castIds[] = $castMember->id;
                    }
                }
                $movie->castMembers()->sync($castIds); // Assumes 'castMembers' relationship in Movie model
            }
        }
    }
}