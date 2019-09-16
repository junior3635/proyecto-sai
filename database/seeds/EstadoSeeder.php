<?php

use Illuminate\Database\Seeder;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('estado')->insert(['nombre' => 'Distrito Capital']);
        
        \DB::table('estado')->insert(['nombre' => 'Amazonas']);
        
        \DB::table('estado')->insert(['nombre' => 'Anzoátegui']);
        
        \DB::table('estado')->insert(['nombre' => 'Apure']);
        
        \DB::table('estado')->insert(['nombre' => 'Aragua']);
        
        \DB::table('estado')->insert(['nombre' => 'Barinas']);
        
        \DB::table('estado')->insert(['nombre' => 'Bolivar']);
        
        \DB::table('estado')->insert(['nombre' => 'Carabobo']);
        
        \DB::table('estado')->insert(['nombre' => 'Cojedes']);
        
        \DB::table('estado')->insert(['nombre' => 'Delta Amacuro']);
        
        \DB::table('estado')->insert(['nombre' => 'Falcón']);
        
        \DB::table('estado')->insert(['nombre' => 'Guárico']);
       
        \DB::table('estado')->insert(['nombre' => 'Lara']);
        
        \DB::table('estado')->insert(['nombre' => 'Mérida']);
        
        \DB::table('estado')->insert(['nombre' => 'Miranda']);
        
        \DB::table('estado')->insert(['nombre' => 'Monagas']);
        
        \DB::table('estado')->insert(['nombre' => 'Nueva Esparta']);
        
        \DB::table('estado')->insert(['nombre' => 'Portuguesa']);
        
        \DB::table('estado')->insert(['nombre' => 'Sucre']);
        
        \DB::table('estado')->insert(['nombre' => 'Táchira']);
        
        \DB::table('estado')->insert(['nombre' => 'Trujillo']);
       
        \DB::table('estado')->insert(['nombre' => 'Vargas']);
        
        \DB::table('estado')->insert(['nombre' => 'Yaracuy']);
       
        \DB::table('estado')->insert(['nombre' => 'Zulia']);

    }
}
