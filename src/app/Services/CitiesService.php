<?php

namespace App\Services;

use App\Models\Cities;

class CitiesService
{

    /**
     * @var IbgeService
     */
    protected $ibgeService;

    public function __construct()
    {
        $this->ibgeService = new IbgeService();
    }

    /**
     * @param string $uf
     * @return bool
     * @throws \Exception|\GuzzleHttp\Exception\GuzzleException
     */
    public function importCitiesIbge(string $uf): bool
    {
        $cities = $this->ibgeService->getCitiesByUf($uf);

        foreach (json_decode($cities) as $citie) {
            $this->saveCitie($citie);
        }

        return true;
    }

    /**
     * @param object $cities
     * @throws \Exception
     */
    public function saveCitie(object $cities)
    {
        try {

            $citie = Cities::where('id_ibge', $cities->id)->first();

            if ($citie == null) {
                $newCitie = new Cities();
                $newCitie->id_ibge = $cities->id;
                $newCitie->nome = $cities->nome;
                $newCitie->uf = $cities->microrregiao->mesorregiao->UF->sigla;
                $newCitie->save();
            }

            return;

        } catch (\Exception $err) {
            throw new \Exception("Erro ao salvar cidade. Log: " . $err);
        }

    }

}
