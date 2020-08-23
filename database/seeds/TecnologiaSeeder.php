<?php

use Illuminate\Database\Seeder;
use App\Technology;
class TecnologiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->criarTecnologias();
    }

    private function criarTecnologias(){
        Technology::create([
            'name' => 'JavaScript',            
        ]);
        Technology::create([
            'name' => 'CSS',            
        ]);
        Technology::create([
            'name' => 'Angular',            
        ]);
        Technology::create([
            'name' => 'Ionic',            
        ]);
        Technology::create([
            'name' => 'Swift',            
        ]);
        Technology::create([
            'name' => '.NET',            
        ]);
        Technology::create([
            'name' => 'React JS',            
        ]);
        Technology::create([
            'name' => 'PHP',            
        ]);
        Technology::create([
            'name' => 'Node JS',            
        ]);
        Technology::create([
            'name' => 'Laravel',            
        ]);
        Technology::create([
            'name' => 'Power BI',            
        ]);
    }
}
