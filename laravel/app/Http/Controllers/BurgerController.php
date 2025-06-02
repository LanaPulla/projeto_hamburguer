<?php

namespace App\Http\Controllers;

use App\Repositories\Infrastructure\Eloquent\BurgerRepositoryInterface;


class BurgerController extends Controller
{
    private $repository;

    public function __construct(BurgerRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
    
    public function index()
    {
        
        return view('burgerForm');
    }

    public function show()
    {
        return view('burgerTable');
    }

    public function getBreadTypes()
    {
        $bread = $this->repository->getBread();
        return response()->json($bread);
    }

    public function getMeatTypes()
    {
        $meat = $this->repository->getMeat();
        return response()->json($meat);
    }

    public function getOptionalTypes()
    {
        $optional = $this->repository->getOptional();
        return response()->json($optional);
    }


}
