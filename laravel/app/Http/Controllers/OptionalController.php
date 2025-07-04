<?php

namespace App\Http\Controllers;

use App\Repositories\Infrastructure\Eloquent\OptionalRepositoryInterface;
use Illuminate\Http\Request;

class OptionalController extends Controller
{
    private $repository;

    public function __construct(OptionalRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function delete(Request $request, $id){
        $this->repository->destroy($request, $id);
    }
}
