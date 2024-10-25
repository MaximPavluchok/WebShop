<?php

namespace App\Http\Controllers;

use App\Models\Categories_SubCategories;
use Illuminate\Http\Request;

/**
 * @OA\Info(title="Categories_SubCategories API", version="1.0.0")
 * @OA\Server(url="http://localhost:8000/api")
 */

/**
 * @OA\Schema(
 *     schema="Categories_SubCategories",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="CategoriesId", type="integer", example=1),
 *     @OA\Property(property="SubCategoriesId", type="integer", example=2)
 * )
 */
class CategoriesSubCategoriesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/categories_subcategories",
     *     summary="Get list of category-subcategory relationships",
     *     tags={"Categories_SubCategories"},
     *     @OA\Response(
     *         response=200,
     *         description="List of category-subcategory relationships",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/Categories_SubCategories"))
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function index()
    {
        return response()->json(Categories_SubCategories::all(), 200);
    }

    /**
     * @OA\Post(
     *     path="/categories_subcategories",
     *     summary="Create a new category-subcategory relationship",
     *     tags={"Categories_SubCategories"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"CategoriesId", "SubCategoriesId"},
     *                 @OA\Property(property="CategoriesId", type="integer", example=1),
     *                 @OA\Property(property="SubCategoriesId", type="integer", example=2)
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Category-Subcategory relationship created",
     *         @OA\JsonContent(ref="#/components/schemas/Categories_SubCategories")
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Invalid input"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $categoriesSubCategories = Categories_SubCategories::create($request->all());
        return response()->json($categoriesSubCategories, 201);
    }

    /**
     * @OA\Delete(
     *     path="/categories_subcategories/{id}",
     *     summary="Delete a category-subcategory relationship",
     *     tags={"Categories_SubCategories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the relationship to delete",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Relationship deleted",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Relationship deleted")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Relationship not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function destroy($id)
    {
        $categoriesSubCategories = Categories_SubCategories::find($id);
        if (!$categoriesSubCategories) {
            return response()->json(['message' => 'Relationship not found'], 404);
        }
        $categoriesSubCategories->delete();
        return response()->json(['message' => 'Relationship deleted'], 200);
    }
}
