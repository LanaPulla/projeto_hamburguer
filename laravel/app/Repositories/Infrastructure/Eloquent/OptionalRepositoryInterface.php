<?php 

namespace App\Repositories\Infrastructure\Eloquent;

interface OptionalRepositoryInterface{

    public function save($attributes);
    public function destroy($optinal);
    public function update($id, $attributtes);

}