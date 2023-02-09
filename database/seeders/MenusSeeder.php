<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $special_id = DB::table('categories')->Where('name','Specials')->value('id');
        $beverages_id = DB::table('categories')->Where('name','Beverages')->value('id');
        $beef_steak_id = DB::table('categories')->Where('name','Beef steak')->value('id');

        //Specials
        Menu::create([
            'name' => 'Strip steak',
            'price' => '12',
            'quantity' => '100',
            'description' => 'Tender juicy strip steak cooked in a cast iron skillet on the stove, with a simple garlic butter wine pan sauce. It is sliced thin and flat, usually cut perpendicular to the muscle fibers and then grilled, lightly fried, combined with accompaniments such as french fries, onions, salad, bread, etc.',
            'ingredients' => 'Strip steak, salt - 65%, garlic - 45%, olive oil - 40%, onion - 25%, ...',
            'image' => 'public/menus/strip_steak.jpg',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $special_id,
            'menu_id' => '1'
        ]);

        Menu::create([
            'name' => 'Tenderloin steak',
            'price' => '10',
            'quantity' => '100',
            'description' => 'This is a simple treatment for tender cuts. No long marinating, no complicated basting sauce - just the steak and a little garlic. It is sliced thin and flat, usually cut perpendicular to the muscle fibers and then grilled, lightly fried, combined with accompaniments such as french fries, onions, salad, bread, etc. the meat is 70% raw, unprocessed, bright red and still warm. To this extent, beef is often used to prepare the famous French Tartare. Rare meat will cook slightly more than raw meat because they are lightly browned on both sides. They are usually baked for about 2 minutes on each side.',
            'ingredients' => 'Tenderloin steak, salt - 65%, garlic - 45%, olive oil - 40%, onion - 25%, ...',
            'image' => 'public/menus/tenderloin_steak.jpg',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $special_id,
            'menu_id' => '2'
        ]);

        Menu::create([
            'name' => 'Hamburger steak',
            'price' => '9',
            'quantity' => '100',
            'description' => 'Tasty hamburger "steaks" smothered in gravy and onions. Serve with hot rice or potatoes for an easy-to-make dinner classic. It is sliced thin and flat, usually cut perpendicular to the muscle fibers and then grilled, lightly fried, combined with accompaniments such as french fries, onions, salad, bread, etc. the meat is 70% raw, unprocessed, bright red and still warm. To this extent, beef is often used to prepare the famous French Tartare. Rare meat will cook slightly more than raw meat because they are lightly browned on both sides. They are usually baked for about 2 minutes on each side.',
            'ingredients' => 'Hamburger steak, salt - 65%, garlic - 45%, olive oil - 40%, onion - 25%, ...',
            'image' => 'public/menus/hamburger_steak.jpg',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $special_id,
            'menu_id' => '3'
        ]);

        Menu::create([
            'name' => 'Passion wine',
            'price' => '3',
            'quantity' => '100',
            'description' => 'The 2019 passion breaks down to 55% Shiraz and 45% Cabernet Sauvignon. The wine is not filtered and keeps its original vitality.',
            'ingredients' => 'Passion wine',
            'image' => 'public/menus/passion_wine.jpg',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $special_id,
            'menu_id' => '4'
        ]);


        //Beverages
        DB::table('category_menu')->insert([
            'category_id' => $beverages_id,
            'menu_id' => '4'
        ]);

        Menu::create([
            'name' => 'Orange juice',
            'price' => '2',
            'quantity' => '100',
            'ingredients' => 'Orange juice',
            'description' => 'A liquid extract of the orange tree fruit, produced by squeezing or reaming oranges. It comes in several different varieties, including blood orange, navel oranges, valencia orange, clementine, and tangerine.With a crystalline appearance of lemon yellow and apple green, this wine is as elegant as a bouquet of fresh flowers and fruit. Crunchy, generously permeable and with a hint of fresh citrus, this wine is perfect to accompany life is simple pleasures.',
            'image' => 'public/menus/orange.png',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $beverages_id,
            'menu_id' => '5'
        ]);

        Menu::create([
            'name' => 'Red wine',
            'price' => '2',
            'quantity' => '100',
            'ingredients' => 'Red wine',
            'description' => 'Red wines range in hue from deep, opaque purple to pale ruby and everything in between. As red wine ages, its bright, youthful colors turn garnet and even brown. With a crystalline appearance of lemon yellow and apple green, this wine is as elegant as a bouquet of fresh flowers and fruit. Crunchy, generously permeable and with a hint of fresh citrus, this wine is perfect to accompany life is simple pleasures.',
            'image' => 'public/menus/red_wine.webp',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $beverages_id,
            'menu_id' => '6'
        ]);

        Menu::create([
            'name' => 'White wine',
            'price' => '5',
            'quantity' => '100',
            'ingredients' => 'White wine',
            'description' => 'White wines get their sweetness from residual sugar (RS), which is leftover glucose from grape juice that wasn’t completely fermented into alcohol. With a crystalline appearance of lemon yellow and apple green, this wine is as elegant as a bouquet of fresh flowers and fruit. Crunchy, generously permeable and with a hint of fresh citrus, this wine is perfect to accompany life is simple pleasures.',
            'image' => 'public/menus/white_wine.webp',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $beverages_id,
            'menu_id' => '7'
        ]);

        Menu::create([
            'name' => 'Rose wine',
            'price' => '4',
            'quantity' => '100',
            'ingredients' => 'Rose wine',
            'description' => 'The flavors lean on the fruity side, so you can expect notes of strawberry, citrus, melon, raspberry, cherry, and fresh flowers. With a crystalline appearance of lemon yellow and apple green, this wine is as elegant as a bouquet of fresh flowers and fruit. Crunchy, generously permeable and with a hint of fresh citrus, this wine is perfect to accompany life is simple pleasures.',
            'image' => 'public/menus/rose_wine.webp',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $beverages_id,
            'menu_id' => '8'
        ]);
    
        Menu::create([
            'name' => 'Spakling wine',
            'price' => '11',
            'quantity' => '100',
            'ingredients' => 'Spakling wine',
            'description' => 'Sparkling wine is any fizzy wine made with carbon dioxide. Sparkling is a style of wine, not a specific varietal. With a crystalline appearance of lemon yellow and apple green, this wine is as elegant as a bouquet of fresh flowers and fruit. Crunchy, generously permeable and with a hint of fresh citrus, this wine is perfect to accompany life is simple pleasures.',
            'image' => 'public/menus/sparkling_wine.webp',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $beverages_id,
            'menu_id' => '9'
        ]);
        
        Menu::create([
            'name' => 'Dessert wine',
            'price' => '13',
            'quantity' => '100',
            'ingredients' => 'Dessert wine',
            'description' => 'Sweet wines taste sweet, that is for sure. Can wine is a word used to refer to wine that contains 45g/l or more of sugar. With a crystalline appearance of lemon yellow and apple green, this wine is as elegant as a bouquet of fresh flowers and fruit. Crunchy, generously permeable and with a hint of fresh citrus, this wine is perfect to accompany life is simple pleasures.',
            'image' => 'public/menus/dessert_wine.jpg',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $beverages_id,
            'menu_id' => '10'
        ]);

        Menu::create([
            'name' => 'Fortified wine',
            'price' => '10',
            'quantity' => '100',
            'ingredients' => 'Fortified wine',
            'description' => 'Sparkling wine is liquid that is the resulting solution has a very unique flavor that normal wine cannot have. With a crystalline appearance of lemon yellow and apple green, this wine is as elegant as a bouquet of fresh flowers and fruit. Crunchy, generously permeable and with a hint of fresh citrus, this wine is perfect to accompany life is simple pleasures.',
            'image' => 'public/menus/fortified_wine.jpg',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $beverages_id,
            'menu_id' => '11'
        ]);

        //Beef steak
        DB::table('category_menu')->insert([
            'category_id' => $beef_steak_id,
            'menu_id' => '1'
        ]);

        DB::table('category_menu')->insert([
            'category_id' => $beef_steak_id,
            'menu_id' => '2'
        ]);

        DB::table('category_menu')->insert([
            'category_id' => $beef_steak_id,
            'menu_id' => '3'
        ]);

        Menu::create([
            'name' => 'Rump steak',
            'price' => '25',
            'quantity' => '100',
            'ingredients' => 'Rump steak, salt - 65%, garlic - 45%, olive oil - 40%, onion - 25%, ...',
            'description' => 'It is a lean cut of meat with very little fat, making it a healthier option than other steaks. It is sliced thin and flat, usually cut perpendicular to the muscle fibers and then grilled, lightly fried, combined with accompaniments such as french fries, onions, salad, bread, etc. the meat is 70% raw, unprocessed, bright red and still warm. To this extent, beef is often used to prepare the famous French Tartare. Rare meat will cook slightly more than raw meat because they are lightly browned on both sides. They are usually baked for about 2 minutes on each side.',
            'image' => 'public/menus/rump-steak.jpg',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $beef_steak_id,
            'menu_id' => '12'
        ]);

        Menu::create([
            'name' => 'Bone steak',
            'price' => '32',
            'quantity' => '100',
            'ingredients' => 'Bone steak, salt - 65%, garlic - 45%, olive oil - 40%, onion - 25%, ...',
            'description' => 'Crosscut from the forward section of the short loin on a steer is middle back, a T-bone steak contains a strip of the top loin and a chunk of tenderloin, both desired cuts on their own. It is sliced thin and flat, usually cut perpendicular to the muscle fibers and then grilled, lightly fried, combined with accompaniments such as french fries, onions, salad, bread, etc. the meat is 70% raw, unprocessed, bright red and still warm. To this extent, beef is often used to prepare the famous French Tartare. Rare meat will cook slightly more than raw meat because they are lightly browned on both sides. They are usually baked for about 2 minutes on each side.',
            'image' => 'public/menus/bone_steak.jpg',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $beef_steak_id,
            'menu_id' => '13'
        ]);

        Menu::create([
            'name' => 'Scotch steak',
            'price' => '26',
            'quantity' => '100',
            'ingredients' => 'Scotch steak, salt - 65%, garlic - 45%, olive oil - 40%, onion - 25%, ...',
            'description' => 'Considered the best cut of beef, from the mostly widely acclaimed provenance (Scotland) in the world for beef. It is sliced thin and flat, usually cut perpendicular to the muscle fibers and then grilled, lightly fried, combined with accompaniments such as french fries, onions, salad, bread, etc. the meat is 70% raw, unprocessed, bright red and still warm. To this extent, beef is often used to prepare the famous French Tartare. Rare meat will cook slightly more than raw meat because they are lightly browned on both sides. They are usually baked for about 2 minutes on each side.',
            'image' => 'public/menus/scotch_steak.jpeg',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $beef_steak_id,
            'menu_id' => '14'
        ]);

        Menu::create([
            'name' => 'Striploin steak',
            'price' => '25',
            'quantity' => '100',
            'ingredients' => 'Striploin steak, salt - 65%, garlic - 45%, olive oil - 40%, onion - 25%, ...',
            'description' => 'The "Striploin" known as the New York Strip, Kansas City, is the finest marbled cut of all red and marbled beef cuts, identifiable by the thick fat in the area. It is sliced thin and flat, usually cut perpendicular to the muscle fibers and then grilled, lightly fried, combined with accompaniments such as french fries, onions, salad, bread, etc. the meat is 70% raw, unprocessed, bright red and still warm. To this extent, beef is often used to prepare the famous French Tartare. Rare meat will cook slightly more than raw meat because they are lightly browned on both sides. They are usually baked for about 2 minutes on each side.',
            'image' => 'public/menus/striploin_steak.jpg',
        ]);
        DB::table('category_menu')->insert([
            'category_id' => $beef_steak_id,
            'menu_id' => '15'
        ]);
    }
}
