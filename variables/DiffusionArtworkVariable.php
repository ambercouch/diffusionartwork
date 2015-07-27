<?php

namespace Craft;

/**
 * Cocktail Recipes Variable provides access to database objects from templates
 */
class diffusionArtworkVariable
{
    /**
     * Get all available ingredients
     *
     * @return array
     */
    public function getAllArtwork()
    {
        return craft()->diffusionArtwork->getAllArtwork();
    }

    /**
     * Get a specific ingredient. If no ingredient is found, returns null
     *
     * @param  int   $id
     * @return mixed
     */
//    public function getIngredientById($id)
//    {
//        return craft()->cocktailRecipes_ingredients->getIngredientById($id);
//    }
}
