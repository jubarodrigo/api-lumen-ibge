<?php

namespace App\Services;

use App\Models\Cities;
use App\Services\IbgeService;
use phpDocumentor\Reflection\Types\Integer;

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

        foreach (json_decode($cities) as $citie) {
            $this->saveCitie($citie);
        }

        return $cities;
    }

    public function saveCitie(object $cities)
    {
        $citie = Cities::where('id_ibge',$cities->id)->first();

        if ($citie == null) {
            $newCitie = new Cities();
            $newCitie->id_ibge = $cities->id;
            $newCitie->nome = $cities->nome;
            $newCitie->uf = $cities->microrregiao->mesorregiao->UF->sigla;
            $newCitie->save();
        }

    }

}
