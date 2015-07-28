<?php

namespace Craft;

/**
 * Ingredients Controller
 *
 * Defines actions which can be posted to by forms in our templates.
 */
class DiffusionArtworkController extends BaseController
{
    /**
     * Save Ingredient
     *
     * Create or update an existing ingredient, based on POST data
     */
    public function actionSaveArtwork()
    {


        $this->requirePostRequest();


        if ($id = craft()->request->getPost('artworkId')) {

            $model = craft()->diffusionArtwork->getArtworkById($id);

        } else {
            $model = craft()->diffusionArtwork->newArtwork($id);

        }

        $attributes = craft()->request->getPost('artwork');
        $model->setAttributes($attributes);



        if (craft()->diffusionArtwork->saveArtwork($model)) {
            craft()->userSession->setNotice(Craft::t('Artwork saved.'));

            return $this->redirectToPostedUrl(array('artworkId' => $model->getAttribute('id')));
        } else {
            craft()->userSession->setError(Craft::t("Couldn't save artwork."));

            craft()->urlManager->setRouteVariables(array('artwork' => $model));
        }
    }

    /**
     * Delete Ingredient
     *
     * Delete an existing ingredient
     */
    public function actionDeleteIngredient()
    {
        $this->requirePostRequest();
        $this->requireAjaxRequest();

        $id = craft()->request->getRequiredPost('id');
        craft()->cocktailRecipes_ingredients->deleteIngredientById($id);

        $this->returnJson(array('success' => true));
    }
}
