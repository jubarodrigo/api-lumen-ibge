<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressesRequest;
use App\Models\Addresses;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Services\AddressesService;
use phpDocumentor\Reflection\Types\Null_;

class AddressesController extends Controller
{

    /**
     * @var AddressesService
     */
    protected $addressesService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->addressesService = new AddressesService();
    }

    /**
     * @return Collection
     */
    public function index(): Collection
    {
        $result = $this->addressesService->getAll();
        return $result;
    }

    /**
     * @param Request $request
     * @return Addresses
     * @throws \Exception
     */
    public function create(Request $request): Addresses
    {
        $this->validate($request, AddressesRequest::rules());
        $result = $this->addressesService->create($request);

        return $result;
    }

    /**
     * @param int $id
     * @return Addresses
     */
    public function show(int $id): Addresses
    {
        $result = $this->addressesService->get($id);

        return $result;
    }


    /**
     * @param Request $request
     * @return Addresses
     * @throws \Exception
     */
    public function update(Request $request): Addresses
    {
        $result = $this->addressesService->update($request);

        return $result;
    }


    /**
     * @param int $id
     * @return Null_|null
     * @throws \Exception
     */
    public function destroy(int $id): ?Null_
    {
        $result = $this->addressesService->delete($id);

        return $result;
    }
}
