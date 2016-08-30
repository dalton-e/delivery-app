<?php

namespace DeliveryApp\Http\Controllers;

use DeliveryApp\Repositories\CategoryRepository;
use DeliveryApp\Http\Requests\CategoryRequest;

class CategoriesController extends Controller
{
    private $repository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->repository = $categoryRepository;
    }

    public function index()
    {
        $categories = $this->repository->paginate();

        return view("admin.categories.index", compact("categories"));
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
        $category = $this->repository->find($id);

        return view ("admin.categories.edit", compact("category"));
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.categories.index');
    }

}
