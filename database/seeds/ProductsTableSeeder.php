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
                'description' => 'Made with high-quality perler beads, bring your childhood love of Pokemon to life with these detailed figurines.
Bulbasaur/Charmander: 3.5" x 4"
Ivysaur: 3.5" x 4.5"
Venusaur: 4.5" x 4.5"
Squirtle: 3.5" x 4"
Wartortle: 4" x 4"
Blastoise: 4.5" x 4"
Charizard: 4" x 5.5"
*This item is ready made and will be shipped within 1-2 business days. Feel free to ask any questions and I will do my best to answer them as quick as I can.
',
                'image' => 'https://img0.etsystatic.com/107/1/10924417/il_570xN.940170732_2o12.jpg'
            ]
        );
        DB::table('products')->insert([
                'name' => 'Pokemon Set 2',
                'description' => 'Made with high-quality perler beads, bring your childhood love of Pokemon to life with these detailed figurines.
Seel: 5" x 4"
Dewgong: 4.25" x 4.5"
Grimer: 4" x 3.25"
Muk: 5" x 3.5"
Shellder: 3.25" x 3..25"
Cloyster: 4.25" x 5"
*This item is ready made and will be shipped within 1-2 business days. Feel free to ask any questions and I will do my best to answer them as quick as I can.

**If you only want one or two with magnets or pins, send me a message.',
                'image' => 'https://img1.etsystatic.com/141/0/10924417/il_570xN.1134424161_g20e.jpg'
            ]
        );
        DB::table('products')->insert([
                'name' => 'Pokemon Set 3',
                'description' => 'Made with high-quality perler beads, bring your childhood love of Pokemon to life with these detailed figurines.
Tentacool: 4.5" x 4.5"
Tentacreul: 5" x 4.25"
Geodude: 4.75" x 3"
Graveler: 5" x 4.25"
Golem: 5" x 4"
Ponyta: 4.5" x 4"
Rapidash: 5.75" x 5"
*This item is ready made and will be shipped within 1-2 business days. Feel free to ask any questions and I will do my best to answer them as quick as I can.

**If you only want one or two with magnets or pins, send me a message.',
                'image' => 'https://img1.etsystatic.com/150/0/10924417/il_570xN.1126410099_11os.jpg'
            ]
        );

        DB::table('products')->insert([
                'name' => 'Pokemon Set 4',
                'description' => 'Made with high-quality perler beads, bring your childhood love of Pokemon to life with these detailed figurines.
Abra: 3.5" x 3.5"
Kadabra: 5" x 4.25"
Alakazam: 4.5" x 4.25"
Machop: 3" x 4"
Machoke: 5" x 4.25"
Machamp: 5" x 4"
Bellsprout: 3.25" x 3"
Weepinbell: 4" x 4"
Victreebell: 5" x 4"
*This item is ready made and will be shipped within 1-2 business days. Feel free to ask any questions and I will do my best to answer them as quick as I can.
**If you only want one or two with magnets or pins, send me a message.',
                'image' => 'https://img1.etsystatic.com/134/0/10924417/il_570xN.1094383667_bvw5.jpg'
            ]
        );

        DB::table('products')->insert([
                'name' => 'Pokemon Set 5',
                'description' => 'Made with high-quality perler beads, bring your childhood love of Pokemon to life with these detailed figurines.
Ekans: 4" x 3"
Arbok: 3.5" x 4.5"
Pikachu: 3.5" x 5"
Raichu: 4.5" x 4.5"
Sandshrew: 3.5" x 4"
Sandslash: 5" x 4.5"
*This item is ready made and will be shipped within 1-2 business days. Feel free to ask any questions and I will do my best to answer them as quick as I can.
**If you only want one or two with magnets or pins, send me a message.',
                'image' => 'https://img0.etsystatic.com/105/1/10924417/il_570xN.992671688_dtva.jpg'
            ]
        );
    }
}
