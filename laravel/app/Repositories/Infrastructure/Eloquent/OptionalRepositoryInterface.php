<?php 

namespace App\Repositories\Infrastructure\Eloquent;

interface OptionalRepositoryInterface{

    public function save($attributes);
    public function destroy($optinal, $id);
    public function update($id, $attributtes);

}