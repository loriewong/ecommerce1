<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
                'name' => 'Pokemon Set 1',
                'description' => 'Made with high-quality perler beads, bring your childhood love of Pokemon to life with these detailed figurines.<br/>
Bulbasaur/Charmander: 3.5" x 4"<br/>
Ivysaur: 3.5" x 4.5"<br/>
Venusaur: 4.5" x 4.5"<br/>
Squirtle: 3.5" x 4"<br/>
Wartortle: 4" x 4"<br/>
Blastoise: 4.5" x 4"<br/>
Charizard: 4" x 5.5"<br/>
*This item is ready made and will be shipped within 1-2 business days. Feel free to ask any questions and I will do my best to answer them as quick as I can.<br/>
',
                'image' => '/img/il_570xN.940170732_2o12.jpg'
            ]
        );
        DB::table('products')->insert([
                'name' => 'Pokemon Set 2',
                'description' => 'Made with high-quality perler beads, bring your childhood love of Pokemon to life with these detailed figurines.<br/>
Seel: 5" x 4"<br/>
Dewgong: 4.25" x 4.5"<br/>
Grimer: 4" x 3.25"<br/>
Muk: 5" x 3.5"<br/>
Shellder: 3.25" x 3..25"<br/>
Cloyster: 4.25" x 5"<br/>
*This item is ready made and will be shipped within 1-2 business days. Feel free to ask any questions and I will do my best to answer them as quick as I can.<br/>

**If you only want one or two with magnets or pins, send me a message.<br/>',
                'image' => '/img/il_570xN.1134424161_g20e.jpg'
            ]
        );
        DB::table('products')->insert([
                'name' => 'Pokemon Set 3',
                'description' => 'Made with high-quality perler beads, bring your childhood love of Pokemon to life with these detailed figurines.<br/>
Tentacool: 4.5" x 4.5"<br/>
Tentacreul: 5" x 4.25"<br/>
Geodude: 4.75" x 3"<br/>
Graveler: 5" x 4.25"<br/>
Golem: 5" x 4"<br/>
Ponyta: 4.5" x 4"<br/>
Rapidash: 5.75" x 5"<br/>
*This item is ready made and will be shipped within 1-2 business days. Feel free to ask any questions and I will do my best to answer them as quick as I can.<br/>

**If you only want one or two with magnets or pins, send me a message.',
                'image' => '/img/il_570xN.1126410099_11os.jpg'
            ]
        );

        DB::table('products')->insert([
                'name' => 'Pokemon Set 4',
                'description' => 'Made with high-quality perler beads, bring your childhood love of Pokemon to life with these detailed figurines.<br/>
Abra: 3.5" x 3.5"<br/>
Kadabra: 5" x 4.25"<br/>
Alakazam: 4.5" x 4.25"<br/>
Machop: 3" x 4"<br/>
Machoke: 5" x 4.25"<br/>
Machamp: 5" x 4"<br/>
Bellsprout: 3.25" x 3"<br/>
Weepinbell: 4" x 4"<br/>
Victreebell: 5" x 4"<br/>
*This item is ready made and will be shipped within 1-2 business days. Feel free to ask any questions and I will do my best to answer them as quick as I can.<br/>
**If you only want one or two with magnets or pins, send me a message.',
                'image' => '/img/il_570xN.1094383667_bvw5.jpg'
            ]
        );

        DB::table('products')->insert([
                'name' => 'Pokemon Set 5',
                'description' => 'Made with high-quality perler beads, bring your childhood love of Pokemon to life with these detailed figurines.<br/>
Ekans: 4" x 3"<br/>
Arbok: 3.5" x 4.5"<br/>
Pikachu: 3.5" x 5"<br/>
Raichu: 4.5" x 4.5"<br/>
Sandshrew: 3.5" x 4"<br/>
Sandslash: 5" x 4.5"<br/>
*This item is ready made and will be shipped within 1-2 business days. Feel free to ask any questions and I will do my best to answer them as quick as I can.<br/>
**If you only want one or two with magnets or pins, send me a message.',
                'image' => '/img/il_570xN.992671688_dtva.jpg'
            ]
        );
    }
}
