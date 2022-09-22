<?php

namespace App\Http\Controllers;

use App\Models\RecipeTag;
use Illuminate\Http\Request;
use App\Http\Resources\RecipeTagsResouce;

class RecipeTagsController extends Controller
{
    public function index()
    {
        return RecipeTagsResouce::collection(RecipeTag::all());
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $tag = [
            'tag'=>$request->input('tag'),
            'recipe_id'=>$request->input('recipe_id'),
        ];
        return RecipeTagsResouce(RecipeTag::create($tag)) ;
    }

    public function show(RecipeTag $recipeTag)
    {
        return new RecipeTagsResouce($recipeTag);
    }
    
    public function edit(RecipeTag $recipeTag)
    {
        //
    }

    public function update(UpdateRecipeTagRequest $request, RecipeTag $recipeTag)
    {
        //
    }

    public function destroy(RecipeTag $recipeTag)
    {   
        $recipeTag->delete();
        return "deleted successfuly";
    }
}
