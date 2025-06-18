<?php

namespace App\Http\Controllers;

use App\Http\Requests\BurgerSaveRequest;
use App\Repositories\Infrastructure\Eloquent\BurgerRepositoryInterface;
use App\Services\BurgerService;
use Illuminate\Support\Facades\Log;

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

    public function store(BurgerSaveRequest $request){
        try {
            $burger = $this->service->saveSeparately($request->all());
    
            return response()->json([
                'success' => true,
                'id' => $burger->id,
                'message' => 'Pedido criado com sucesso'
            ]);
    
        } catch(\Exception $ex) {
            Log::error('Erro no store: ' . $ex->getMessage(), [
                'trace' => $ex->getTraceAsString()
            ]);
    
            return response()->json([
                'success' => false,
                'message' => 'Erro ao criar o pedido'
            ], 500);
        }
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
