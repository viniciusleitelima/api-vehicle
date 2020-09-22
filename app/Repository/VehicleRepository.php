<?php


namespace App\Repositories;

use App\Models\Vehicle;


class VehicleRepository
{

    /**
     * @var $vehicle
     */
    protected $vehicle;

    /**
     * VehicleRepository constructor.
     * @param Vehicle $vehicle
     */
    public function __construct(Vehicle $vehicle){
        $this->vehicle = $vehicle;
    }

    /**
     * Save vehicle
     * @param $data
     * @return mixed
     */
    public function save($data){
        $vehicle = new $this->vehicle;

        $vehicle->car_license_plate = $data['car_license_plate'];
        $vehicle->model = $data['model'];
        $vehicle->year = $data['year'];
        $vehicle->brand = $data['brand'];
        $vehicle->chassi = $data['chassi'];

        $vehicle->save();

        return $vehicle->fresh();
    }

    /**
     * @return mixed
     */
    public function findAll(){
        return $this->vehicle
            ->get();
    }

    /**
     * @param $id
     */
    public function getById($id){
        return $this->vehicle
            ->where('id',$id)
            ->get();
    }

    /**
     * @param $data
     * @param $id
     * @return mixed
     */
    public function update($data,$id){
        $vehicle = $this->vehicle->find($id);

        $vehicle->car_license_plate = $data['car_license_plate'];
        $vehicle->model = $data['model'];
        $vehicle->year = $data['year'];
        $vehicle->brand = $data['brand'];
        $vehicle->chassi = $data['chassi'];

        $vehicle->update();
        return $vehicle;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id){
       $vehicle = $this->vehicle->find($id);
       $vehicle->delete();
       return $vehicle;
    }
}
