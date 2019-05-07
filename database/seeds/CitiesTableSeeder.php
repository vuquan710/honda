<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    const TABLE_NAME = 'cities';

    /**
     * @var array of data
     */
    protected $data = [
        [
            'city_id' => '01',
            'vehicle_id' => '29',
            'name' => 'Hà Nội',
            'created_by' => 'quanvt',
            'updated_by' => 'quanvt',
            'deleted_by' => 'quanvt',
        ],
        [
            'city_id' => '01',
            'vehicle_id' => '30',
            'name' => 'Hà Nội',
            'created_by' => 'quanvt',
            'updated_by' => 'quanvt',
            'deleted_by' => 'quanvt',
        ],
        [
            'city_id' => '01',
            'vehicle_id' => '31',
            'name' => 'Hà Nội',
            'created_by' => 'quanvt',
            'updated_by' => 'quanvt',
            'deleted_by' => 'quanvt',
        ],
        [
            'city_id' => '01',
            'vehicle_id' => '32',
            'name' => 'Hà Nội',
            'created_by' => 'quanvt',
            'updated_by' => 'quanvt',
            'deleted_by' => 'quanvt',
        ],
        [
            'city_id' => '01',
            'vehicle_id' => '33',
            'name' => 'Hà Nội',
            'created_by' => 'quanvt',
            'updated_by' => 'quanvt',
            'deleted_by' => 'quanvt',
        ],
        [
            'city_id' => '02',
            'vehicle_id' => '23',
            'name' => 'Hà Giang',
            'created_by' => 'quanvt',
            'updated_by' => 'quanvt',
            'deleted_by' => 'quanvt',
        ],
        [
            'city_id' => '04',
            'vehicle_id' => '11',
            'name' => 'Cao Bằng',
            'created_by' => 'quanvt',
            'updated_by' => 'quanvt',
            'deleted_by' => 'quanvt',
        ],
        [
            'city_id' => '06',
            'vehicle_id' => '97',
            'name' => 'Bắc Cạn',
            'created_by' => 'quanvt',
            'updated_by' => 'quanvt',
            'deleted_by' => 'quanvt',
        ],
        [
            'city_id' => '10',
            'vehicle_id' => '24',
            'name' => 'Lào Cai',
            'created_by' => 'quanvt',
            'updated_by' => 'quanvt',
            'deleted_by' => 'quanvt',
        ],
        [
            'city_id' => '11',
            'vehicle_id' => '27',
            'name' => 'Điện Biên',
            'created_by' => 'quanvt',
            'updated_by' => 'quanvt',
            'deleted_by' => 'quanvt',
        ],
        [
            'city_id' => '12',
            'vehicle_id' => '25',
            'name' => 'Lai Châu',
            'created_by' => 'quanvt',
            'updated_by' => 'quanvt',
            'deleted_by' => 'quanvt',
        ],

    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table($this::TABLE_NAME)->truncate();
        foreach($this->data as $item) {
            \DB::table($this::TABLE_NAME)->insert($item);
        }
    }
}
