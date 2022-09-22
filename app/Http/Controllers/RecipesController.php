<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\User;
use App\Models\Rating;
use App\Models\Follow;
use App\Models\RecipeTag;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Resources\RecipesResource;
use Auth;


class RecipesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RecipesResource::collection(Recipe::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRecipeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $recipe = [
        //     'title'=>(string)$request->input('title'),
        //     'image_url'=>(string)$request->input('image_url'),
        //     'preparation_time'=>(string)$request->input('preparation_time'),
        //     'cooking_time'=>(string)$request->input('cooking_time'),
        //     'level'=>(string)$request->input('level'),
        //     'serves'=>(string)$request->input('serves'),
        //     'ingredients'=>json_encode($request->input('ingredients')) ,
        //     'method'=>json_encode($request->input('method')),
        // ];
        // return new RecipesResource(Recipe::create($recipe));

        $follow = [
            'user_id'=>2,
            'cook_id'=>3,
            'created_at'=> new \DateTime('now'),
        ];

        return Follow::create($follow);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function show(Recipe $recipe)
    {
        // return new RecipesResource($recipe);
        // $user = User::where('id',2)->first();
        // $followers = $user->followers;
        // $following = $user->following;
        // $list = array();
        // foreach ($followers as $follower) {
        //     array_push( $list,$follower->user);
        // }
        // return $followers;
        $recipe = Recipe::where('id',1)->first();
        return $recipe->ratings->first()->user;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRecipeRequest  $request
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recipe $recipe)
    {
        $recipe->update([
            'title'=>(string)($request->input('title')?? $recipe->title),
            'image_url'=>(string)($request->input('image_url')?? $recipe->image_url),
            'preparation_time'=>(string)($request->input('preparation_time')?? $recipe->preparation_time),
            'cooking_time'=>(string)($request->input('cooking_time')?? $recipe->cooking_time),
            'level'=>(string)($request->input('level')?? $recipe->level),
            'serves'=>(string)($request->input('serves')?? $recipe->serves),
            'cook_id'=>(string)($request->input('cook_id')?? $recipe->cook_id),
            'ingredients'=>json_encode($request->input('ingredients'))?? $recipe->ingredients,
            'method'=>json_encode($request->input('method'))?? $recipe->method,
        ]);
        return new RecipesResource($recipe);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Recipe  $recipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return "Deleted Successfuly";
    }
}
