<?php

namespace App\Http\Controllers;

use App\Http\Requests\BurgerSaveRequest;
use App\Models\Burger;
use App\Repositories\Infrastructure\Eloquent\BurgerRepositoryInterface;
use App\Services\BurgerService;
use Illuminate\Http\Request;
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
        $burgers = $this->repository->findAll();
        return view('burgerTable', compact('burgers')); 
    }

    public function store(BurgerSaveRequest $request){
            $burger = $this->service->saveSeparately($request->all());
    
            return response()->json([
                'success' => true,
                'id' => $burger->id,
                'message' => 'Pedido N°' . $burger->id . ' criado com sucesso'
            ], 200);
        
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

    public function getRoutes(){

        return response()->json([
            'home' => route('burger.index'),
            'pedidos' => route('burger.show'),
            //'detalhes' => route('burger.show'),
        ]);
    }

}
