<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CitiesService;


class IbgeCitiesImport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ibge:cities:import {uf}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando para importação das cidades referentes pelo estado via integração com api do IBGE';

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
        $uf = $this->argument('uf');

        $citiesService = new CitiesService();
        $teste = $citiesService->importCitiesIbge($uf);

        var_dump($teste);exit();


        $this->info('hello world.'.$uf);
    }
}
