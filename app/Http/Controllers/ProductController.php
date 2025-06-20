<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\AddPriceRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductPriceResource;
use App\Http\Resources\ProductPricesResource;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $query = Product::with('currency');

        // Filtros por query (name, description)
        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('description')) {
            $query->where('description', 'like', '%' . $request->description . '%');
        }

        // Ordenamiento dinámico
        $sortBy = $request->get('sort_by', 'id');
        $sortOrder = $request->get('sort_order', 'asc');

        $allowedSorts = ['id', 'name', 'price', 'tax_cost', 'manufacturing_cost'];
        if (in_array($sortBy, $allowedSorts)) {
            $query->orderBy($sortBy, $sortOrder);
        }

        // Paginación
        $perPage = $request->get('per_page', 10);
        $products = $query->paginate($perPage);

        return response()->json($products);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());

        return response()->json([
            'message' => __('messages.product_created_successfully'),
            'product' => $product,
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $product = Product::with('currency', 'prices.currency')->findOrFail($id);
        return response()->json($product);
    }

    public function update(UpdateProductRequest $request, int $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $product->update($request->validated());
        return response()->json($product);
    }

    public function destroy(int $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        $productData = $product->toArray(); 

        $product->delete();

        return response()->json([
            'message' => __('messages.product_deleted_successfully'),
            'product' => $productData,
        ], 200);
    }


    public function prices(int $id): ProductPricesResource
    {
        $product = Product::with('prices.currency')->findOrFail($id);
        return new ProductPricesResource($product);
    }

    public function addPrice(AddPriceRequest $request, int $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        $validated = $request->validated();

        $price = $product->prices()->create($validated);

        $price = $product->prices()->create($validated);
        $price->load('currency');

        return response()->json([
            'message' => __('messages.price_added_successfully'),
            'price' => new ProductPriceResource($price),
        ], 201);
    }
}
