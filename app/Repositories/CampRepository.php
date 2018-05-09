<?php
/**
 * Created by PhpStorm.
 * User: neil
 * Date: 02/01/2018
 * Time: 22:33
 */

namespace App\Repositories;


use App\Camp;
use App\Contracts\RepositoryInterface;

class CampRepository implements RepositoryInterface
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

    /**
     * @param $data
     * @return $this
     */
    public function create($data)
    {
        $camp = $this->camp->fill($data);
        $camp->save();

        return $camp;
    }

    public function findById($id)
    {
        return $this->camp->find($id);
    }

    public function update($data, $id)
    {
        $camp = $this->camp->find($id)->update($data);

        return $camp;
    }

    public function delete($id)
    {
        return $this->camp->find($id)->delete();
    }
    public function count()
    {
        return $this->camp->count();
    }
}