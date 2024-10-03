<?php

namespace v1\models\validator;

/**
 * Client map search model which supports the search with keyword and enabled values.
 *
 *  @OA\Schema(
 *   schema="ClientMapSearch",
 *   oneOf={
 *      @OA\Schema(ref="#/components/schemas/ApiSearchModel"),
 *   }
 * )
 */
class ClientMapSearch extends ApiSearchModel
{
    /**
     * @var null|string Query related models, using comma(,) be seperator
     * @OA\Property(enum={""}, default=null)
     */
    public $expand;

    /**
     * @var null|string keyword for search
     * @OA\Property(default=null)
     */
    public $keyword;

    public function rules()
    {
        $rules = parent::rules();
        $rules[] = [['keyword'], 'string'];

        return $rules;
    }
}
