<?php
/**
 * Created by PhpStorm.
 * User: neil
 * Date: 02/01/2018
 * Time: 22:37
 */

namespace App\Contracts;


interface CampRepositoryInterface
{
    public function findAll();

    public function create($data);

    public function findById($id);

    public function update($data, $id);

    public function delete($id);
}