<?php

namespace DeliveryApp\Http\Controllers;

use DeliveryApp\Repositories\OrderRepository;
use DeliveryApp\Http\Requests\OrderRequest;
use DeliveryApp\Repositories\UserRepository;

class OrdersController extends Controller
{
    private $repository;
    private $userRepository;

    public function __construct(OrderRepository $orderRepository, UserRepository $userRepository)
    {
        $this->repository = $orderRepository;
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $orders = $this->repository->paginate();

        return view("admin.orders.index", compact("orders"));
    }

    public function create()
    {
        return view("admin.categories.create");
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.categories.index');
    }

    public function edit($id)
    {
        $order = $this->repository->find($id);
        $statuses = $this->getStatuses();
        $deliverymen = $this->userRepository->listDeliverymen();

        return view ("admin.orders.edit", compact("order", "statuses", "deliverymen"));
    }

    public function update(OrderRequest $request, $id)
    {
        $data = $request->all();
        $data["deliveryman"] = null;
        $this->repository->update($data, $id);

        return redirect()->route('admin.orders.index');
    }

    private function getStatuses()
    {
        return [0 => 'Pendente', 1 => 'Saiu para entrega', 2 => 'Entregue'];
    }

}
