<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PixelModel;
use Illuminate\Database\Seeder;

class PixelModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    private int $rows = 64;
    private $columns = 64;

    public function run(): void
    {

        // The rows
        for($row = 0; $row < $this->rows; $row++)
        {
            // The columns
            for($column = 0; $column < $this->columns; $column++)
            {                                
              
                // Add the row to the pixels array
                PixelModel::insert([
                    'pos_x' => $column,
                    'pos_y'=> $row,
                    'color' => $this->rand_color(), // Calculate a random color
                ]);
            }
        }        
    }

    /**
     * Generate a random hexadecimal color
     */
    function rand_color() {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }
}
