<?php

namespace App\Services;

use App\Models\Cities;
use App\Services\IbgeService;

class CitiesService
{

    protected $ibgeService;

    public function __construct()
    {
        $this->ibgeService = new IbgeService();
    }

    public function importCitiesIbge(string $uf)
    {
        $cities = $this->ibgeService->getCitiesByUf($uf);

        return $cities;
    }

    public function saveCitie(array $citie)
    {
        $citie = Cities::where('id',11);
    }

}
