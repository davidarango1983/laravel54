<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ResetTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:tables';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Borrado de tabla de reservas diaria';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

    \Log::info('Iniciando Proceso de borrado de tablas de reservas');

        $hoy = getdate();
        $dia = $hoy['wday'];
        $diaDel = \App\Jobs\Utiles::getDia(0);
        $reservas = DB::delete("DELETE FROM `reservas` WHERE clase_id in (SELECT clase_id from clases where dia=:dia);", ['dia' => $diaDel]);
      
         
    \Log::info("Han sido eliminadas un total de ".$reservas. " reservas");

\Log::info('La tabla de reservas diaria ha sido eliminada');
     
    }
}
