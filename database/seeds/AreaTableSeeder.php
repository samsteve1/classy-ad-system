<?php

use Illuminate\Database\Seeder;

class AreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
            'name' => 'NG',
                'children' => [
                    [
                        'name' => 'Abia',
                        'children' => [
                            ['name' => 'Aba'],
                            ['name' => 'Amaeke'],
                            ['name' => 'Abiriba'],
                            ['name' => 'Aba South'],
                            ['name' => 'Aba North'],
                            ['name' => 'Arochukwu'],
                            ['name' => 'Ohaifia'],
                            ['name' => 'Isiala-Ngwa North'],
                            ['name' => 'Isiala-Ngwa South'],
                            ['name' => 'Osisioma Ngwa'],
                        ],
                    ],
                    [
                        'name' => 'Bayelsa',
                        'children' => [
                            ['name' => 'Bomadi'],
                            ['name' => 'Brass'],
                            ['name' => 'Oloibiri'],
                            ['name' => 'Southern Ijaw'],
                            ['name' => 'Odioma'],
                            ['name' => 'Ekeremor'],
                            ['name' => 'Nembe'],
                            ['name' => 'Sagbama'],
                            ['name' => 'Patani'],
                            ['name' => 'Ogbia'],
                            ['name' => 'Kolokuma/Opokuma'],
                        ],
                    ],
                    [
                        'name' => 'Benue',
                        'children' => [
                            ['name' => 'Buruku'],
                            ['name' => 'Agatu'],
                            ['name' => 'Guma'],
                            ['name' => 'Katsina Ala'],
                            ['name' => 'Logo'],
                            ['name' => 'Oju'],
                            ['name' => 'Otukpo'],
                            ['name' => 'Gboko'],
                            ['name' => 'Ushongo'],
                        ],
                    ],
                    [
                        'name' => 'Lagos',
                        'children' => [
                            ['name' => 'Ajeromi-Ifelodun'],
                            ['name' => 'Badagry'],
                            ['name' => 'Berger'],
                            ['name' => 'Epe'],
                            ['name' => 'Lekki'],
                            ['name' => 'Ikorodu'],
                            ['name' => 'Ikeja'],
                            ['name' => 'Oshodi'],
                            ['name' => 'Victoria Island'],
                        ],
                    ],
                    [
                        'name' => 'Ekiti',
                        'children' => [
                            ['name' => 'Ado'],
                            ['name' => 'Ayede'],
                            ['name' => 'Ayegbaju'],
                            ['name' => 'Itapa/Osin'],
                            ['name' => 'Omu/Ijelu'],
                            ['name' => 'Oye'],
                            ['name' => 'Moba'],
                            ['name' => 'Ikole'],
                            ['name' => 'Omuo'],

                        ],
                    ],
                    [
                        'name' => 'Oyo',
                        'children' => [
                            ['name' => 'Akinyele'],
                            ['name' => 'Eleyele'],
                            ['name' => 'Egbeda'],
                            ['name' => 'Ibadan'],
                            ['name' => 'Iseyin'],
                            ['name' => 'Kajola'],
                            ['name' => 'Lagelu'],
                            ['name' => 'Ona ara'],
                            ['name' => 'Ogbomoso'],
                        ],
                    ],
                    [
                        'name' => 'Osun',
                        'children' => [
                            ['name' => 'Ayedaade'],
                            ['name' => 'Ilesha'],
                            ['name' => 'Ile-Ife'],
                            ['name' => 'Ede'],
                            ['name' => 'Oshogbo'],
                            ['name' => 'Ikire'],
                            ['name' => 'Iwo'],
                            ['name' => 'Iragbiji'],
                            ['name' => 'Gbongan'],
                        ],
                    ],
                    [
                        'name' => 'Ondo',
                        'children' => [
                            ['name' => 'Akure'],
                            ['name' => 'Ikare'],
                            ['name' => 'Ondo'],
                            ['name' => 'Ile-Oluji'],
                            ['name' => 'Akungba'],
                            ['name' => 'Igbara'],
                            ['name' => 'Owo'],
                        ]
                    ],
                ],
            ],
        ];

        foreach ($areas as $area) {
            \App\Area::create($area);
        }
    }
}
