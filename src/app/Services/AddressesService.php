<?php

namespace App\Services;

use App\Models\Addresses;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class AddressesService
{
    /**
     * @var Addresses
     */
    protected $addressesModel;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->addressesModel = new Addresses();
    }

    /**
     * @return Addresses[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll(): Collection
    {
        return $this->addressesModel::all()->where('status', 1);
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws \Exception
     */
    public function create(Request $request): Addresses
    {
        try {
            $address = $this->addressesModel::create($request->all());

            return $address;

        } catch (\Exception $err) {
            throw new \Exception("Erro ao criar endereço. Log: " . $err);
        }
    }


    /**
     * @param int $id
     * @return Addresses
     */
    public function get(int $id): Addresses
    {
        $address = $this->addressesModel->find($id);

        return $address;
    }

    /**
     * @param int $id
     * @return Null_|null
     * @throws \Exception
     */
    public function delete(int $id): ?Null_
    {

        try {
            $address = $this->addressesModel->find($id);
            $address->status = 0;
            $address->save();
            return null;
        } catch (\Exception $err) {
            throw new \Exception("Erro ao excluir endereço. Log: " . $err);
        }

    }

    /**
     * @param Request $request
     * @return Addresses
     * @throws \Exception
     */
    public function update(Request $request): Addresses
    {
        try {
            $address = $this->addressesModel->find($request->id);

            $address->cities_id = $request->cities_id;
            $address->logradouro = $request->logradouro;
            $address->numero = $request->numero;
            $address->bairro = $request->bairro;
            $address->save();

            return $address;

        } catch (\Exception $err) {
            throw new \Exception("Erro ao atualizar endereço. Log: " . $err);
        }


    }
}
