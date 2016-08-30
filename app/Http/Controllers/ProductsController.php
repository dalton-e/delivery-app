<?php

namespace DeliveryApp\Http\Controllers;

use DeliveryApp\Repositories\CategoryRepository;
use DeliveryApp\Repositories\ProductRepository;
use DeliveryApp\Http\Requests\ProductRequest;

class ProductsController extends Controller
{
    private $repository;
    private $categoryRepository;

    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->repository = $productRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $products = $this->repository->paginate();

        return view("admin.products.index", compact("products"));
    }

    public function create()
    {
        $categories = $this->categoryRepository->listAll();

        return view("admin.products.create", compact("categories"));
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);

        return redirect()->route('admin.products.index');
    }

    public function edit($id)
    {
        $product = $this->repository->find($id);
        $categories = $this->categoryRepository->listAll();

        return view ("admin.products.edit", compact("product", "categories"));
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $this->repository->update($data, $id);

        return redirect()->route('admin.products.index');
    }

    public function destroy($id)
    {
        $this->repository->delete($id);

        return redirect()->route('admin.products.index');
    }

}
