<?php

// use App\Http\Middleware\CheckMembership; -> udah pake alias

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $movies = [
        [
        'title' => 'Attack on Titan',
        'title_japanese' => '進撃の巨人 (Shingeki no Kyojin)',
        'description' => 'In a world where humanity resides within enormous walled cities to protect themselves from Titans, a young boy named Eren Yeager joins the Scout Regiment to get revenge after a Titan destroys his hometown. The story explores themes of survival, freedom, and the human spirit as Eren and his friends uncover the truth behind the Titans and the world they live in.',
        'description_id' => 'Di dunia di mana umat manusia tinggal di dalam kota-kota besar yang dikelilingi tembok raksasa untuk melindungi diri dari Titan, seorang anak muda bernama Eren Yeager bergabung dengan Pasukan Pengintai untuk membalas dendam setelah Titan menghancurkan kampung halamannya. Cerita ini mengeksplorasi tema bertahan hidup, kebebasan, dan semangat manusia saat Eren dan teman-temannya mengungkap kebenaran di balik Titan dan dunia tempat mereka tinggal.',
        'release_date' => '2013-04-07',
        'cast' => ['Yuki Kaji', 'Yui Ishikawa', 'Marina Inoue', 'Hiroshi Kamiya'],
        'genres' => ['Action', 'Drama', 'Fantasy'],
        'image' => 'https://image.tmdb.org/t/p/w500/hTP1DtLGFamjfu8WqjnuQdP1n4i.jpg',
        ],
        [
        'title' => 'Demon Slayer: Kimetsu no Yaiba',
        'title_japanese' => '鬼滅の刃 (Kimetsu no Yaiba)',
        'description' => 'After his family is slaughtered by demons, Tanjiro Kamado becomes a demon slayer to save his sister Nezuko, who was turned into a demon. The story follows Tanjiro’s journey as he faces powerful demons, learns new techniques, and uncovers the secrets of the demon world.',
        'description_id' => 'Setelah keluarganya dibantai oleh iblis, Tanjiro Kamado menjadi pembasmi iblis untuk menyelamatkan adiknya, Nezuko, yang berubah menjadi iblis. Cerita ini mengikuti perjalanan Tanjiro saat ia menghadapi iblis-iblis kuat, mempelajari teknik baru, dan mengungkap rahasia dunia iblis.',
        'release_date' => '2019-04-06',
        'cast' => ['Natsuki Hanae', 'Akari Kito', 'Hiro Shimono', 'Yoshitsugu Matsuoka'],
        'genres' => ['Action', 'Supernatural', 'Adventure'],
        'image' => 'https://image.tmdb.org/t/p/w500/wrCVHdkBlBWdJUZPvnJWcBRuhSY.jpg',
        ],
        [
        'title' => 'Jujutsu Kaisen',
        'title_japanese' => '呪術廻戦 (Jujutsu Kaisen)',
        'description' => 'A boy swallows a cursed talisman - the finger of a demon - and becomes cursed himself. He enters a school of sorcerers to learn how to exorcise curses and protect humanity from supernatural threats. The story delves into the dark and mysterious world of curses and sorcery.',
        'description_id' => 'Seorang anak menelan jimat terkutuk - jari iblis - dan menjadi terkutuk sendiri. Dia masuk ke sekolah penyihir untuk belajar cara mengusir kutukan dan melindungi umat manusia dari ancaman supernatural. Cerita ini menyelami dunia gelap dan misterius dari kutukan dan sihir.',
        'release_date' => '2020-10-03',
        'cast' => ['Junya Enoki', 'Yuma Uchida', 'Asami Seto', 'Yuichi Nakamura'],
        'genres' => ['Action', 'Supernatural'],
        'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/fHpKWq9ayzSk8nSwqRuaAUemRKh.jpg',
        ],
        [
        'title' => 'One Piece',
        'title_japanese' => 'ワンピース (Wan Pīsu)',
        'description' => 'Monkey D. Luffy and his pirate crew search for the ultimate treasure, the One Piece, in order to become the next Pirate King. The story is filled with epic adventures, battles, and the unbreakable bonds of friendship as they explore the vast and dangerous seas.',
        'description_id' => 'Monkey D. Luffy dan kru bajak lautnya mencari harta karun tertinggi, One Piece, untuk menjadi Raja Bajak Laut berikutnya. Cerita ini penuh dengan petualangan epik, pertempuran, dan ikatan persahabatan yang tak tergoyahkan saat mereka menjelajahi lautan yang luas dan berbahaya.',
        'release_date' => '1999-10-20',
        'cast' => ['Mayumi Tanaka', 'Kazuya Nakai', 'Akemi Okamura', 'Hiroaki Hirata'],
        'genres' => ['Action', 'Adventure', 'Fantasy'],
        'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/cMD9Ygz11zjJzAovURpO75Qg7rT.jpg',
        ],
        [
        'title' => 'Chainsaw Man',
        'title_japanese' => 'チェンソーマン (Chensō Man)',
        'description' => 'Denji, a poor young man, is forced to kill devils to pay off his deceased father’s debt. He merges with his pet devil Pochita and becomes Chainsaw Man. The story is a mix of dark humor, intense action, and emotional moments as Denji navigates his new life.',
        'description_id' => 'Denji, seorang pemuda miskin, dipaksa membunuh iblis untuk melunasi hutang ayahnya yang telah meninggal. Dia bergabung dengan iblis peliharaannya, Pochita, dan menjadi Chainsaw Man. Cerita ini adalah campuran humor gelap, aksi intens, dan momen emosional saat Denji menjalani kehidupan barunya.',
        'release_date' => '2022-10-11',
        'cast' => ['Kikunosuke Toya', 'Tomori Kusunoki', 'Shogo Sakata', 'Fairouz Ai'],
        'genres' => ['Action', 'Horror', 'Fantasy'],
        'image' => 'https://www.themoviedb.org/t/p/w600_and_h900_bestv2/yVtx7Xn9UxNJqvG2BkvhCcmed9S.jpg',
        ],
        [
            "title" => "Spy x Family",
            "title_japanese" => "スパイファミリー (Supai Famirī)",
            "description" => "A top spy codenamed Twilight must build a fake family to infiltrate an elite school. Unbeknownst to him, his wife is an assassin and his adopted daughter is a telepath. Together, they navigate daily life filled with secrets, comedy, and chaos, all while hiding their true identities.",
            "description_id" => "Seorang mata-mata top dengan nama sandi Twilight harus membangun keluarga palsu untuk menyusup ke sekolah elit. Tanpa sepengetahuannya, istrinya adalah seorang pembunuh bayaran dan anak angkatnya adalah seorang telepatis. Bersama-sama, mereka menjalani kehidupan sehari-hari penuh rahasia, komedi, dan kekacauan, sambil menyembunyikan identitas asli mereka.",
            "release_date" => "2022-04-09",
            "cast" => ["Takuya Eguchi", "Saori Hayami", "Atsumi Tanezaki"],
            "genres" => ["Action", "Comedy", "Slice of Life"],
            "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/gHZqglFWJTFwx6rnTq4vkPRnuxu.jpg"
        ],
        [
            "title" => "Tokyo Revengers",
            "title_japanese" => "東京卍リベンジャーズ (Tōkyō Ribenjāzu)",
            "description" => "Takemichi Hanagaki is a struggling adult who suddenly travels back in time to his middle school days. Determined to save his ex-girlfriend from being killed by a gang, he infiltrates the Tokyo Manji Gang and works to change the past and the future.",
            "description_id" => "Takemichi Hanagaki, seorang pria dewasa yang sedang terpuruk, tiba-tiba kembali ke masa SMP-nya. Bertekad menyelamatkan mantan pacarnya dari kematian akibat geng, ia menyusup ke Geng Tokyo Manji dan berusaha mengubah masa lalu dan masa depan.",
            "release_date" => "2021-04-11",
            "cast" => ["Yuki Shin", "Azumi Waki", "Yuu Hayashi"],
            "genres" => ["Action", "Drama", "Supernatural"],
            "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/arB3L9pZZBSzUPSC8BEv8c3X0bF.jpg"
        ],
        [
            "title" => "My Hero Academia",
            "title_japanese" => "僕のヒーローアカデミア (Boku no Hīrō Akademia)",
            "description" => "In a world where most people have superpowers known as \"Quirks\", Izuku Midoriya dreams of becoming a hero despite being born without one. After inheriting the power of the greatest hero, All Might, he joins U.A. High School to train and fight villains.",
            "description_id" => "Di dunia di mana sebagian besar orang memiliki kekuatan super yang disebut \"Quirk\", Izuku Midoriya bermimpi menjadi pahlawan meski lahir tanpa kekuatan. Setelah mewarisi kekuatan pahlawan terhebat, All Might, ia masuk Sekolah U.A. untuk berlatih dan melawan para penjahat.",
            "release_date" => "2016-04-03",
            "cast" => ["Daiki Yamashita", "Nobuhiko Okamoto", "Kenta Miyake", "Ayane Sakura"],
            "genres" => ["Action", "Superhero"],
            "image" => "https://image.tmdb.org/t/p/w500/ivOLM47yJt90P19RH1NvJrAJz9F.jpg"
        ],
        [
            "title" => "Naruto Shippuden",
            "title_japanese" => "ナルト- 疾風伝 (Naruto Shippūden)",
            "description" => "After two years of intense training under the legendary ninja Jiraiya, Naruto Uzumaki returns to Konoha to protect his friends and confront the mysterious organization known as Akatsuki. He faces new threats, reconnects with old allies, and grows stronger both in skill and spirit.",
            "description_id" => "Setelah dua tahun pelatihan intens di bawah bimbingan ninja legendaris Jiraiya, Naruto Uzumaki kembali ke Konoha untuk melindungi teman-temannya dan menghadapi organisasi misterius bernama Akatsuki. Ia menghadapi ancaman baru, bertemu kembali dengan sekutu lama, dan tumbuh lebih kuat baik dalam kemampuan maupun semangat.",
            "release_date" => "2007-02-15",
            "cast" => ["Junko Takeuchi", "Chie Nakamura", "Noriaki Sugiyama"],
            "genres" => ["Action", "Adventure"],
            "image" => "https://image.tmdb.org/t/p/w500/zAYRe2bJxpWTVrwwmBc00VFkAf4.jpg"
        ],
        [
            "title" => "Bleach: Thousand-Year Blood War",
            "title_japanese" => "ブリーチ 千年血戦篇 (Burīchi Sennen Kessen-hen)",
            "description" => "Ichigo Kurosaki returns to face the Quincy army in an all-out war that threatens the balance between the living world and the Soul Society. Reuniting with old friends, he uncovers hidden powers and confronts enemies more formidable than ever before.",
            "description_id" => "Ichigo Kurosaki kembali menghadapi tentara Quincy dalam perang penuh yang mengancam keseimbangan antara dunia nyata dan Soul Society. Bersatu kembali dengan teman lama, ia menemukan kekuatan tersembunyi dan menghadapi musuh yang lebih tangguh dari sebelumnya.",
            "release_date" => "2022-10-10",
            "cast" => ["Masakazu Morita", "Fumiko Orikasa", "Yuki Matsuoka"],
            "genres" => ["Action", "Supernatural"],
            "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/2EewmxXe72ogD0EaWM8gqa0ccIw.jpg"
        ],
        [
            "title" => "Sword Art Online",
            "title_japanese" => "ソードアート・オンライン (Sōdo Āto Onrain)",
            "description" => "Players trapped in the virtual reality MMORPG Sword Art Online must fight their way through 100 floors to escape. When death in the game means death in real life, solo player Kirito and healer Asuna form a fragile alliance to survive and uncover the game's mysteries.",
            "description_id" => "Para pemain yang terjebak dalam MMORPG realitas virtual Sword Art Online harus bertarung melewati 100 lantai untuk melarikan diri. Ketika kematian di dalam game berarti kematian di dunia nyata, pemain tunggal Kirito dan penyembuh Asuna membentuk aliansi rapuh untuk bertahan hidup dan mengungkap misteri game.",
            "release_date" => "2012-07-08",
            "cast" => ["Yoshitsugu Matsuoka", "Haruka Tomatsu", "Ayana Taketatsu"],
            "genres" => ["Action", "Adventure", "Fantasy"],
            "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/9m8bFIXPg26taNrFSXGwEORVACD.jpg"
        ],
        [
            "title" => "Fairy Tail",
            "title_japanese" => "フェアリーテイル (Fearī Teiru)",
            "description" => "Lucy Heartfilia, a celestial spirit mage, joins the Fairy Tail guild and teams up with the fire mage Natsu Dragneel and his talking cat Happy. Together, they undertake dangerous missions, forge unbreakable bonds, and defend the guild against dark forces.",
            "description_id" => "Lucy Heartfilia, seorang penyihir roh surgawi, bergabung dengan guild Fairy Tail dan bekerja sama dengan penyihir api Natsu Dragneel serta kucing berbicara bernama Happy. Bersama-sama, mereka menjalani misi berbahaya, membentuk ikatan tak terputuskan, dan melindungi guild dari kekuatan gelap.",
            "release_date" => "2009-10-12",
            "cast" => ["Tetsuya Kakihara", "Aya Hirano", "Rie Kugimiya"],
            "genres" => ["Action", "Adventure", "Fantasy"],
            "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/h50lj7xO65qafNYZCrfQ7ztkMBD.jpg"
        ],
        [
            "title" => "Black Clover",
            "title_japanese" => "ブラッククローバー (Burakku Kurōbā)",
            "description" => "Asta, a boy born without magic in a world where magic is everything, dreams of becoming the Wizard King. Armed with an anti-magic sword and relentless determination, he joins the Magic Knights and challenges fate itself to prove his worth.",
            "description_id" => "Asta, seorang anak yang lahir tanpa sihir di dunia di mana sihir adalah segalanya, bermimpi menjadi Raja Penyihir. Dipersenjatai dengan pedang anti-sihir dan tekad yang tak tergoyahkan, ia bergabung dengan Ksatria Sihir dan menantang takdir untuk membuktikan kemampuannya.",
            "release_date" => "2017-10-03",
            "cast" => ["Gakuto Kajiwara", "Nobunaga Shimazaki", "Kana Yuuki"],
            "genres" => ["Action", "Fantasy"],
            "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/kaMisKeOoTBPxPkbC3OW7Wgt6ON.jpg"
        ],
        [
            "title" => "Re:Zero - Starting Life in Another World",
            "title_japanese" => "Re:ゼロから始める異世界生活 (Re:Zero kara Hajimeru Isekai Seikatsu)",
            "description" => "Subaru Natsuki is suddenly transported to another world and discovers he has the power to return from death. Using this ability, he attempts to save his friends from tragic fates, but each reset brings new heartache and challenges.",
            "description_id" => "Subaru Natsuki tiba-tiba dipindahkan ke dunia lain dan menemukan bahwa ia memiliki kekuatan untuk kembali dari kematian. Dengan kemampuan ini, ia mencoba menyelamatkan teman-temannya dari nasib tragis, tetapi setiap kali ulang kembali membawa kesedihan dan tantangan baru.",
            "release_date" => "2016-04-04",
            "cast" => ["Yusuke Kobayashi", "Rie Takahashi", "Inori Minase"],
            "genres" => ["Action", "Drama", "Fantasy"],
            "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/aRwmcX36r1ZpR5Xq5mmFcpUDQ8J.jpg"
        ],
        [
            "title" => "Erased",
            "title_japanese" => "僕だけがいない街 (Boku dake ga Inai Machi)",
            "description" => "Satoru Fujinuma possesses the 'Revival' ability to go back in time moments before a tragedy. When his mother is murdered, he is sent 18 years into the past and must solve a series of child kidnappings to avert both murders.",
            "description_id" => "Satoru Fujinuma memiliki kemampuan 'Revival' untuk kembali ke masa lalu beberapa saat sebelum tragedi. Ketika ibunya dibunuh, ia dikirim 18 tahun ke masa lalu dan harus memecahkan serangkaian penculikan anak untuk mencegah kedua pembunuhan tersebut.",
            "release_date" => "2016-01-08",
            "cast" => ["Shinnosuke Mitsushima", "Tao Tsuchiya", "Aoi Yuki"],
            "genres" => ["Drama", "Mystery", "Supernatural"],
            "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/EljUwZJhpuYfVuSfqY8Pt1xxpH.jpg"
        ],
        [
            "title" => "Death Note",
            "title_japanese" => "デスノート (Desu Nōto)",
            "description" => "Light Yagami, a genius high school student, finds the Death Note, a notebook that kills anyone whose name is written in it. Believing he can cleanse the world of crime, he engages in a deadly cat-and-mouse game with the brilliant detective L.",
            "description_id" => "Light Yagami, seorang siswa SMA jenius, menemukan Death Note, buku catatan yang membunuh siapa saja yang namanya ditulis di dalamnya. Percaya bahwa ia dapat membersihkan dunia dari kejahatan, ia terlibat dalam permainan kucing-dan-tikus mematikan dengan detektif brilian L.",
            "release_date" => "2006-10-04",
            "cast" => ["Mamoru Miyano", "Aya Hirano", "Shido Nakamura"],
            "genres" => ["Mystery", "Supernatural", "Thriller"],
            "image" => "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/tCZFfYTIwrR7n94J6G14Y4hAFU6.jpg"
        ],
        [
            "title"=> "Fullmetal Alchemist Brotherhood",
            "title_japanese"=> "鋼の錬金術師 FULLMETAL ALCHEMIST (Hagane no Renkinjutsushi)",
            "description"=> "Brothers Edward and Alphonse Elric attempt human transmutation to revive their mother and suffer tragic consequences. They then set out to find the Philosopher’s Stone to restore their bodies, uncovering a dark government conspiracy along the way.",
            "description_id"=> "Saudara Edward dan Alphonse Elric melakukan transmutasi manusia untuk menghidupkan kembali ibu mereka dan mengalami konsekuensi tragis. Mereka kemudian memulai pencarian Batu Bertuah untuk mengembalikan tubuh mereka, sambil mengungkap konspirasi pemerintah yang gelap.",
            "release_date"=> "2009-04-05",
            "cast"=> ["Romi Park", "Rie Kugimiya", "Shinichiro Miki"],
            "genres"=> ["Action", "Adventure", "Fantasy"],
            "image"=> "https://image.tmdb.org/t/p/w500/5ZFUEOULaVml7pQuXxhpR2SmVUw.jpg"
        ],
        [
            "title"=> "Steins;Gate",
            "title_japanese"=> "シュタインズ・ゲート (Shutainzu Gēto)",
            "description"=> "Rintaro Okabe and friends accidentally invent a time machine using a microwave and a cell phone. As they alter past events to save lives, they discover that each change creates unforeseen dangers that threaten reality itself.",
            "description_id"=> "Rintaro Okabe dan teman-temannya secara tidak sengaja menemukan mesin waktu menggunakan microwave dan ponsel. Saat mereka mengubah peristiwa masa lalu untuk menyelamatkan nyawa, mereka menyadari bahwa setiap perubahan menciptakan bahaya tak terduga yang mengancam realitas itu sendiri.",
            "release_date"=> "2011-04-06",
            "cast"=> ["Mamoru Miyano", "Asami Imai", "Kana Hanazawa"],
            "genres"=> ["Drama", "Sci-Fi", "Thriller"],
            "image"=> "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/5DZix6ggRiFEbsGqUeTAI1z2wtX.jpg"
        ],
        [
            "title"=> "Hunter x Hunter",
            "title_japanese"=> "ハンター×ハンター (Hantā Hantā)",
            "description"=> "Gon Freecss learns his father, a legendary Hunter, is alive. He passes the perilous Hunter Exam and sets off across a world of dangerous beasts, political intrigue, and moral ambiguity to find him and forge his own path.",
            "description_id"=> "Gon Freecss mengetahui bahwa ayahnya, seorang Hunter legendaris, masih hidup. Ia melewati Ujian Hunter yang berbahaya dan memulai perjalanan melintasi dunia yang dipenuhi binatang buas, intrik politik, dan ambiguitas moral untuk menemukannya dan menapaki jalannya sendiri.",
            "release_date"=> "2011-10-02",
            "cast"=> ["Megumi Han", "Mariya Ise", "Miyuki Sawashiro"],
            "genres"=> ["Action", "Adventure", "Fantasy"],
            "image"=> "https://www.themoviedb.org/t/p/w600_and_h900_bestv2/i2EEr2uBvRlAwJ8d8zTG2Y19mIa.jpg"
        ],
        [
            "title"=> "The Rising of the Shield Hero",
            "title_japanese"=> "盾の勇者の成り上がり (Tate no Yūsha no Nariagari)",
            "description"=> "Naofumi Iwatani is summoned to another world as one of four Cardinal Heroes but is betrayed and falsely accused, losing his status and wealth. With only his Legendary Shield, he survives prejudice and teams up with Raphtalia to defend the kingdom.",
            "description_id"=> "Naofumi Iwatani dipanggil ke dunia lain sebagai salah satu dari empat Pahlawan Utama namun dikhianati dan difitnah, kehilangan status dan kekayaannya. Dengan hanya perisai legendarisnya, ia bertahan menghadapi prasangka dan bekerja sama dengan Raphtalia untuk melindungi kerajaan.",
            "release_date"=> "2019-01-09",
            "cast"=> ["Kaito Ishikawa", "Asami Seto", "Rina Hidaka"],
            "genres"=> ["Action", "Adventure", "Fantasy"],
            "image"=> "https://image.tmdb.org/t/p/w500/6cXf5EDwVhsRv8GlBzUTVnWuk8Z.jpg"
        ]
    ];

    return view('welcome', ['movies' => $movies]);
})->name('welcome');
// Route::get('/', [MovieController::class, 'index']);

$movie = [];

for($i = 0; $i < 10; $i++){
    $movies[] = [
        'title' => 'Movie Title ' . $i+1,
        'description' => 'Description for movie ' . $i+1,
        'year' => 2000 + rand(1, 10),
        'rating' => rand(1, 10),
    ];
};

// misal ingin membuat semua movie hanya bisa diakses admin (isAuth)
Route::group(
    [
        'prefix' => 'movie',                // gaperlu '/movie' di route, /movie/{id} => /{id}
        'as' => 'movie.'                    // agar bisa diakses dengan route('movie.index')
    ], 
    function() use ($movies){
        // /movie, index biasanya untuk mendapatkan data yang banyak, dan contructor akan dipanggil otomatis
        Route::get('/' , [MovieController::class, 'index'])->name('index'); // name('movie.index'); dari as => movie.
        // /movie/{id}, show biasanya untuk mendapatkan data yang spesifik, dan contructor tidak dipanggil otomatis, 
        Route::get('/create', [MovieController::class, 'create'])->name('create');
        // taro create di atas show agar tidak dianggap parameter oleh route yang lain yang dibawah seperti id
        Route::get('/{id}' , [MovieController::class, 'show'])->name('show');
        //  menambah data
        Route::post('' , [MovieController::class, 'store'])->name('store');        
        // update data, karena put dan patch serupa, biasanya yang dipilih put
        Route::get('/{id}/edit' , [MovieController::class, 'edit'])->name('edit');

        // Route::put('/{id}' , [MovieController::class, 'update'])->name('update');
        Route::patch('/{id}' , [MovieController::class, 'update'])->name('update');
        // Gunakan PUT jika Anda ingin mengganti seluruh resource.
        // Gunakan PATCH jika Anda hanya ingin memperbarui sebagian resource.
        
        Route::delete('/{id}' , [MovieController::class, 'destroy'])->name('destroy'); 
});


Route::get('/pricing', function(){
    return 'Please, buy a membership';
});

Route::get('/login', function(){
    return 'Please, login first';
})->name('login'); 

// banyak informasi yang bisa diambil dari request, seperti query string, header, dll
Route::get('/request', function(Request $request){
    // dd($request);
    // return $request->query();
    // return $request->schemeAndHttpHost();
    
    // key langsung
    // return $request->param;
    
    
    // $user =  $request->all();
    // dd($user);

    // return $user;
    
    // return [
        //     'name' => $user['name'] ?? null,
        //     'age' => $user['age'] ?? null,
        //     'gender' => $user['gender'] ?? null,
        // ];
        
    // collect adalah helper untuk mengubah array menjadi collection, agar bisa menggunakan method collection
    // $user =  $request->collect();
    // dd($user);

    
    // is_numeric adalah fitur bawaan php untuk mengecek apakah value adalah angka
    $num_filtered = $request->collect()->filter(function($value, $key){
        return is_numeric($value); 
    });
    // return $num_filtered;

    $stringToUpper = $request->collect()->map(function($value, $key){
        return strtoupper($value); 
    });
    // return $stringToUpper;

    $cekAda = $request->collect()->has('name');
    // return $cekAda;

    $hanyaNamaLokasi = $request->collect()->only(['name', 'location']);
    return $hanyaNamaLokasi;
});

Route::post('/permintaan', function(Request $request){
    // $input = $request()->input();
    // $input = $request()->input('colors.2');
     // array colors, ambil index ke 2
    // $input = $request()->input('colors.*');
    // $input = $request()->query(); 
    // hanya mengambil query string tidak dari form, kalo post input biasa ambil form dan query
    // return $input;

    // Date ======================================================================  
    // $date = $request->date('schedule');
    // $date = $request->date('schedule', 'Y-m-d', 'Asia/Jakarta')
    //                 ->addDays(5)->addMinutes(30)->format('Y-m-d H:i:s');
    // return $date;

    $date = $request->date('schedule', 'Y-m-d', 'Asia/Jakarta')
                     ->addMinutes(30);
    return $date->diffForHumans();        
    // 29 minutes from now
});

Route::post('/permintaan1', function(Request $request){
    // Cek data dari request ======================================================
    
        // "name": "Castorice",
        // "age": "1000",
        // "path": "remembrance",
        // "element": "Quantum"

    // if($request->has('name')){
    //     return 'Name: ' . $request->input('name');
    // }
    // AND
    // if($request->has(['name', 'age'])){
    //     return 'I Love You ' . $request->input('name');
    // }
    // return "Cas....";

    // OR
    // if($request->hasAny(['name', 'age'])){
    //     return 'u are still alive ' . $request->input('name');
    // }
    // return "gone";

    // Cek data hilang ======================================================
    if($request->missing('gmail')){
        $request->merge(['gmail' => 'abc@gmail.com']);
        return 'Gmail is missing and added with ' . $request->input('gmail'); 
        
        // Print all request data
        // return $request->all();
    }
    else{
        return 'Gmail is exist';
    }

    return 'Error';
});


Route::get('/response', function(){
    return response('OK', 201)->header('Content-Type', 'text/plain');
});

// cache untuk menyimpan data di browser
Route::get('/cache-control', function(){
    return Response::make('page allow to cache', 200)->header('Cache-Control', 'public, max-age=86400');
});

// biar bisa grouping, middleware yang mengganti peran Response
// max-age untuk menyimpan cache di browser, 1 bulan = 2628000 detik
Route::middleware('cache.headers:public;max_age=2628000;etag')->group(function () {
    
    Route::get('/privacy', function () {
        return 'Privacy Page';
    });
    
    Route::get('/terms', function () {
        return 'Terms Page';
    });

    // Cookie =========================================================================================================
    Route::get('/dashboard', function(){
        $user = 'admin';
        return response('login success', 200)->cookie('user', $user);
    });
    // menghapus cookie
    Route::get('/logout', function(){
        // return response('logout success', 200)->withoutCookie('user');
        // return redirect()->route('home', ['sourceURL' => 'logout'])->withoutCookie('user');
                                          // biar sourceURL bisa diambil di route home
        return redirect()->action([HomeController::class, 'index'], ['authenticated' => true]) ->withoutCookie('user');
    });
    // Route::get('/' , [MovieController::class, 'index']);

    // Route::get('/home', function(){
    //     return 'Home dari halaman ' . request()->sourceURL;
        
    // })->name('home');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::get('/externalUrl', function(){
    // return redirect()->away('https://www.google.com');
    // return redirect('https://www.apple.com');
    return redirect('/');
});

Route::get('/home', function(){
    $user = [
        'name' => 'Castorice',
        'email' => 'castoriceUwU@gmail.com',
        'role' => 'admin'
    ];

    $movieCategory = 'comedy';

    $movies = [
        [
            'title' => 'Attack on Titan',
            'description' => 'A story of humanity\'s fight against Titans.',
            'year' => 2013,
            'rating' => 9.0,
        ],
        [
            'title' => 'Demon Slayer',
            'description' => 'A tale of a boy avenging his family and saving his sister.',
            'year' => 2019,
            'rating' => 8.7,
        ],
        [
            'title' => 'My Hero Academia',
            'description' => 'A world where almost everyone has superpowers.',
            'year' => 2016,
            'rating' => 8.4,
        ],
        [
            'title' => 'One Piece',
            'description' => 'The journey of Luffy to become the Pirate King.',
            'year' => 1999,
            'rating' => 9.1,
        ],
        [
            'title' => 'Naruto',
            'description' => 'The story of a ninja striving to become Hokage.',
            'year' => 2002,
            'rating' => 8.3,
        ],
        [
            'title' => 'Death Note',
            'description' => 'A psychological battle between Light and L.',
            'year' => 2006,
            'rating' => 9.0,
        ],
        [
            'title' => 'Fullmetal Alchemist: Brotherhood',
            'description' => 'Two brothers seek the Philosopher\'s Stone.',
            'year' => 2009,
            'rating' => 9.2,
        ],
        [
            'title' => 'Jujutsu Kaisen',
            'description' => 'A boy fights curses to protect humanity.',
            'year' => 2020,
            'rating' => 8.8,
        ],
    ];

    return view('home', compact(['user', 'movieCategory', 'movies']))->with('pageTitle', 'Home');
});