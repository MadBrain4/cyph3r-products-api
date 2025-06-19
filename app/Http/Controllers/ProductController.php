<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ProductController extends Controller
{
    use AuthorizesRequests;

    public function __construct()
    {
        $this->authorizeResource(Product::class, 'product');
    }

    public function index(): JsonResponse
    {
        $products = Product::with('currency')->get();
        return response()->json($products);
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = Product::create($request->validated());
        return response()->json($product, 201);
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
        $product->delete();
        return response()->json(null, 204);
    }

    public function prices(int $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $prices = $product->prices()->with('currency')->get();
        return response()->json($prices);
    }

    public function addPrice(Request $request, int $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'currency_id' => 'required|exists:currencies,id',
            'price' => 'required|numeric|min:0',
        ]);

        $price = $product->prices()->create($validated);
        return response()->json($price, 201);
    }
}
