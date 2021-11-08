<?php

namespace App\Console\Commands;

use App\Models\Ufs;
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
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function handle()
    {
        $uf = $this->argument('uf');

        $validate = Ufs::where('sigla', $uf)->first();
        if ($validate == null) {
            throw new \Exception("UF informada não valida: " . $uf);
        }

        $citiesService = new CitiesService();
        $citiesService->importCitiesIbge($uf);

        $this->info('Importações concluidas: ' . $uf);
    }

}
