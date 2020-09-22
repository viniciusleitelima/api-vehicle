<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Services\VehicleService;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * @var $vehicleService
     */
    protected $vehicleService;

    public function __construct(VehicleService $vehicleService){
        $this->vehicleService = $vehicleService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index()
    {
        $result = ['status' => 200];
        try {
            $result['data'] = $this->vehicleService->findAll();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'car_license_plate',
            'model',
            'year',
            'brand',
            'chassi'
        ]);

        $result = ['status' => 200];

        try{
          $result['data'] = $this->vehicleService->save($data);
        } catch (Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $result = ['status' => 200];

        try {
            $result['data'] = $this->vehicleService->getById($id);
        } catch (Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        //
    }

    /**
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->only([
            'car_license_plate',
            'model',
            'year',
            'brand',
            'chassi'
        ]);

        $result = ['status' => 200];

        try{
            $result['data'] = $this->vehicleService->update($data,$id);
        } catch (Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        $result = ['status' => 200];

        try{
            $result['data'] = $this->vehicleService->deleteById($id);
        } catch (Exception $e){
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }
}
