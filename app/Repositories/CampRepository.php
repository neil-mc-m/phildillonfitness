<?php
/**
 * Created by PhpStorm.
 * User: neil
 * Date: 02/01/2018
 * Time: 22:33
 */

namespace App\Repositories;


use App\Camp;
use App\Contracts\CampRepositoryInterface;

class CampRepository implements CampRepositoryInterface
{
    protected $camp;

    public function __construct(Camp $camp)
    {
        $this->camp = $camp;
    }

    public function findAll()
    {
        return $this->camp->all();
    }

    public function create($data)
    {
        $camp = new $this->camp;
        $camp->name = $data['name'];
        $camp->duration = $data['duration'];
        $camp->price = $data['price'];
        $camp->feature_1 = $data['feature_1'];
        $camp->feature_2 = $data['feature_2'];
        $camp->save();

        return $camp;
    }

    public function findById($id)
    {
        return $this->camp->find($id);
    }

    public function update($data, $id)
    {
        return $this->camp->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->camp->find($id)->delete();
    }
}