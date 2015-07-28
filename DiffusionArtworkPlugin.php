<?php

namespace Craft;

class DiffusionArtworkPlugin extends BasePlugin
{
    public function getName()
    {
        return Craft::t('Diffusion Artwork');
    }

    public function getVersion()
    {
        return '0.1';
    }

    public function getDeveloper()
    {
    	// Taken to version 2.0 by Sean Delaney | DelaneyMethod
    	
        return 'Richard Arnold';
    }

    public function getDeveloperUrl()
    {
        return 'http://ambercouch.co.uk/';
    }
    
    public function hasCpSection()
    {
        return true;
    }

    /**
     * Register control panel routes
     */
    public function registerCpRoutes()
    {
        return array(
            'diffusionartwork\/new' => 'diffusionartwork/artwork/_edit',
            'diffusionartwork\/(?P<artworkId>\d+)' => 'diffusionartwork/artwork/_edit',
        );
    }

//    /**
//     * Register twig extension
//     */
//    public function addTwigExtension()
//    {
//        Craft::import('plugins.cocktailrecipes.twigextensions.CocktailRecipesTwigExtension');
//
//        return new CocktailRecipesTwigExtension();
//    }

    /**
     * Add default ingredients after plugin is installed
     */
//    public function onAfterInstall()
//    {
//        $ingredients = array(
//            array('name' => 'Gin'),
//            array('name' => 'Tonic'),
//            array('name' => 'Lime'),
//            array('name' => 'Soda'),
//            array('name' => 'Vodka'),
//        );
//
//        foreach ($ingredients as $ingredient) {
//            craft()->db->createCommand()->insert('cocktailrecipes_ingredients', $ingredient);
//        }
//    }
}
