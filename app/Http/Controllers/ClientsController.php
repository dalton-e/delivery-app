<?php

namespace DeliveryApp\Http\Controllers;

use DeliveryApp\Repositories\ClientRepository;
use DeliveryApp\Http\Requests\ClientRequest;

class ClientsController extends Controller
{
    private $repository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->repository = $clientRepository;
    }

    public function index()
    {
        $clients = $this->repository->paginate();

        return view("admin.clients.index", compact("clients"));
    }

    public function create()
    {
        return view("admin.clients.create");
    }

    public function store(ClientRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.clients.index');
    }

    public function edit($id)
    {
        $client = $this->repository->find($id);

        return view ("admin.clients.edit", compact("client"));
    }

    public function update(ClientRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.clients.index');
    }

}
