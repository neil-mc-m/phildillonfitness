<?php

namespace App\Repositories;


use App\Contracts\RepositoryInterface;
use App\Price;

class PriceRepository implements RepositoryInterface
{
    private $price;

    public function __construct(Price $price)
    {
        $this->price = $price;
    }

    public function findAll()
    {
       return $this->price->all();
    }

    public function create($data)
    {
        $price = $this->price->fill($data);
        $price->save();

        return $price;
    }

    public function findById($id)
    {
        $price = $this->price->find($id);

        return $price;
    }

    public function update($data, $id)
    {
        $price = $this->price->find($id)->update($data);

        return $price;
    }

    public function delete($id)
    {
        return $this->price->find($id)->delete();
    }

    public function count()
    {
        return $this->price->count();
    }
}