<?php

namespace App\Http\Controllers;

use App\Models\SubCategories;
use Illuminate\Http\Request;

/**
 * @OA\Info(title="SubCategories API", version="1.0.0")
 * @OA\Server(url="http://localhost:8000/api")
 */

/**
 * @OA\Schema(
 *     schema="SubCategory",
 *     type="object",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="name", type="string", example="Electronics")
 * )
 */
class SubCategoriesController extends Controller
{
    /**
     * @OA\Get(
     *     path="/subCategories",
     *     summary="Get list of subcategories",
     *     tags={"SubCategories"},
     *     @OA\Response(
     *         response=200,
     *         description="List of subcategories",
     *         @OA\JsonContent(type="array", @OA\Items(ref="#/components/schemas/SubCategory"))
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function index()
    {
        return response()->json(SubCategories::all(), 200);
    }

    /**
     * @OA\Post(
     *     path="/subCategories",
     *     summary="Create a new subcategory",
     *     tags={"SubCategories"},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 required={"name"},
     *                 @OA\Property(property="name", type="string", example="Electronics")
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="SubCategory created",
     *         @OA\JsonContent(ref="#/components/schemas/SubCategory")
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
        $subCategories = SubCategories::create($request->all());
        return response()->json($subCategories, 201);
    }

    /**
     * @OA\Delete(
     *     path="/subCategories/{id}",
     *     summary="Delete a subcategory",
     *     tags={"SubCategories"},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         description="ID of the subcategory to delete",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="SubCategory deleted",
     *         @OA\JsonContent(
     *             @OA\Property(property="message", type="string", example="Post deleted")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="SubCategory not found"
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Internal server error"
     *     )
     * )
     */
    public function destroy($id)
    {
        $subCategories = SubCategories::find($id);
        if (!$subCategories) {
            return response()->json(['message' => 'Post not found'], 404);
        }
        $subCategories->delete();
        return response()->json(['message' => 'Post deleted'], 200);
    }
}
