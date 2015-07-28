<?php

namespace Craft;

/**
 * Cocktail Recipes Service
 *
 * Provides a consistent API for our plugin to access the database
 */
class DiffusionArtworkService extends BaseApplicationComponent
{
    protected $artworkRecord;

    public function __construct($artworkRecordRecord = null)
    {
        $this->artworkRecord = $artworkRecordRecord;
        if (is_null($this->artworkRecord)) {
            $this->artworkRecord = DiffusionArtworkRecord::model();
        }
    }

    public function getAllArtwork()
    {
          $records = $this->artworkRecord->findAll(array('order'=>'t.name'));

        return DiffusionArtworkModel::populateModels($records, 'id');
    }
//
    /**
     * Get a new blank artwork
     *
     * @param  array                           $attributes
     * @return CocktailRecipes_IngredientModel
     */
    public function newArtwork($attributes = array())
    {

        $model = new DiffusionArtworkModel();
        $model->setAttributes($attributes);

        return $model;
    }

    /**
     * Get a specific ingredient from the database based on ID. If no ingredient exists, null is returned.
     *
     * @param  int   $id
     * @return mixed
     */
    public function getArtworkById($id)
    {
        if ($record = $this->artworkRecord->findByPk($id)) {
            return DiffusionArtworkModel::populateModel($record);
        }
    }

    /**
     * Save a new or existing ingredient back to the database.
     *
     * @param  CocktailRecipes_IngredientModel $model
     * @return bool
     */
    public function saveArtwork(DiffusionArtworkModel &$model)
    {


        if ($id = $model->getAttribute('id')) {
            if (null === ($record = $this->artworkRecord->findByPk($id))) {
                throw new Exception(Craft::t('Can\'t find artwork with ID "{id}"', array('id' => $id)));
            }
        } else {
            $record = $this->artworkRecord->create();
        }



        $record->setAttributes($model->getAttributes());



        if ($record->save()) {
            // update id on model (for new records)
            $model->setAttribute('id', $record->getAttribute('id'));

            return true;
        } else {
            $model->addErrors($record->getErrors());

            return false;
        }
    }
//
//    /**
//     * Delete an ingredient from the database.
//     *
//     * @param  int $id
//     * @return int The number of rows affected
//     */
//    public function deleteIngredientById($id)
//    {
//        return $this->ingredientRecord->deleteByPk($id);
//    }
}
