<?php


namespace App\Services;

use App\Repositories\VehicleRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class VehicleService
{
    /**
     * @var $vehicleRepository
     */
    protected $vehicleRepository;

    /**
     * VehicleService constructor.
     * @param VehicleRepository $vehicleRepository
     */
    public function __construct(VehicleRepository $vehicleRepository){

        $this->vehicleRepository = $vehicleRepository;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function save($data){
        $validator = Validator::make($data,[
            'car_license_plate' => 'required',
            'model' => 'required',
            'year' => 'required',
            'brand' => 'required',
            'chassi' => 'required'
        ]);

        if($validator->fails()){
            throw new InvalidArgumentException($validator->erros()->fisrt());
        }

        $result = $this->vehicleRepository->save($data);
        return $result;
    }

    /**
     * @return mixed
     */
    public function findAll(){
        return $this->vehicleRepository->findAll();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id){
        return $this->vehicleRepository->getById($id);
    }

    /**]
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data,$id){
        $validator = Validator::make($data,[
            'car_license_plate' => 'min:7',
            'model' => 'min:2',
            'year' => 'min:4',
            'brand' => 'min:2',
            'chassi' => 'min:11'
        ]);

        if($validator->fails()){
            throw new InvalidArgumentException($validator->erros()->fisrt());
        }

        DB::beginTransaction();

        try {
            $vehicle = $this->vehicleRepository->update($data,$id);
        } catch (Exception $e){
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Nao foi possivel alterar');
        }

        DB::commit();

        return $vehicle;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteById($id){
        DB::beginTransaction();

        try {
            $vehicle = $this->vehicleRepository->delete($id);
        } catch (Exception $e){
            DB::rollBack();
            Log::info($e->getMessage());

            throw new InvalidArgumentException('Nao foi possivel deletar');
        }

        DB::commit();

        return $vehicle;
    }

}
