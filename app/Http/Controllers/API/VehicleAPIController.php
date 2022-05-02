<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateVehicleAPIRequest;
use App\Http\Requests\API\UpdateVehicleAPIRequest;
use App\Models\Vehicle;
use App\Repositories\VehicleRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class VehicleController
 * @package App\Http\Controllers\API
 */

class VehicleAPIController extends AppBaseController
{
    /** @var  VehicleRepository */
    private $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepo)
    {
        $this->vehicleRepository = $vehicleRepo;
    }

    /**
     * Display a listing of the Vehicle.
     * GET|HEAD /vehicles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $vehicles = $this->vehicleRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($vehicles->toArray(), 'Vehicles retrieved successfully');
    }

    /**
     * Store a newly created Vehicle in storage.
     * POST /vehicles
     *
     * @param CreateVehicleAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateVehicleAPIRequest $request)
    {
        $input = $request->all();

        $vehicle = $this->vehicleRepository->create($input);

        return $this->sendResponse($vehicle->toArray(), 'Vehicle saved successfully');
    }

    /**
     * Display the specified Vehicle.
     * GET|HEAD /vehicles/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Vehicle $vehicle */
        $vehicle = $this->vehicleRepository->find($id);

        if (empty($vehicle)) {
            return $this->sendError('Vehicle not found');
        }

        return $this->sendResponse($vehicle->toArray(), 'Vehicle retrieved successfully');
    }

    /**
     * Update the specified Vehicle in storage.
     * PUT/PATCH /vehicles/{id}
     *
     * @param int $id
     * @param UpdateVehicleAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateVehicleAPIRequest $request)
    {
        $input = $request->all();

        /** @var Vehicle $vehicle */
        $vehicle = $this->vehicleRepository->find($id);

        if (empty($vehicle)) {
            return $this->sendError('Vehicle not found');
        }

        $vehicle = $this->vehicleRepository->update($input, $id);

        return $this->sendResponse($vehicle->toArray(), 'Vehicle updated successfully');
    }

    /**
     * Remove the specified Vehicle from storage.
     * DELETE /vehicles/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Vehicle $vehicle */
        $vehicle = $this->vehicleRepository->find($id);

        if (empty($vehicle)) {
            return $this->sendError('Vehicle not found');
        }

        $vehicle->delete();

        return $this->sendSuccess('Vehicle deleted successfully');
    }
}
