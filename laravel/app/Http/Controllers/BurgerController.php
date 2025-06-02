<?php

namespace App\Http\Controllers;

use App\Repositories\Infrastructure\Eloquent\BurgerRepositoryInterface;
use App\Services\BurgerService;
use Illuminate\Http\Request;

class BurgerController extends Controller
{
    private $repository;
    private $service;

    public function __construct(BurgerRepositoryInterface $repository, BurgerService $service)
    {
        $this->repository = $repository;
        $this->service = $service;

    }
    
    public function index()
    {
        
        return view('burgerForm');
    }

    public function show()
    {
        return view('burgerTable');
    }

    public function store(Request $request, ){
        $this->service->saveSeparately()->
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
