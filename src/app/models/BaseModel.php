<?php

/**
 * An Eloquent Model: 'BaseModel'
 *
 */
class BaseModel extends Eloquent
{
    /**
     * Error message bag
     *
     * @var Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * Validation rules
     *
     * @var Array
     */
    protected static $rules = array();

    /**
     * Validator instance
     *
     * @var Illuminate\Validation\Validators
     */
    protected $validator;

    public function __construct(array $attributes = array(), Validator $validator = null)
    {
        parent::__construct($attributes);

        $this->validator = $validator ? : \App::make('validator');
    }

    /**
     * Saves the passed attributes to the model
     * @param array $data
     * @return bool
     */
    public function save(array $data = array())
    {
        $this->beforeValidate();

        if ($this->validate($data)) {
            $this->afterValidate();
            $this->beforeSave();

            $result = parent::save($data);

            $this->afterSave();

            return $result;
        } else {
            return false;
        }
    }

    /**
     * Validates current attributes against rules
     */
    public function validate(array $data = array())
    {
        $v = $this->validator->make($data, static::$rules);

        if ($v->passes())
            return true;

        $this->setErrors($v->messages());

        return false;
    }

    /**
     * Set error message bag
     *
     * @var Illuminate\Support\MessageBag
     */
    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Retrieve error message bag
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Inverse of wasSaved
     */
    public function hasErrors()
    {
        return !empty($this->errors);
    }

    /**
     * Overridable hooks
     */
    public function beforeValidate()
    {

    }

    public function afterValidate()
    {

    }

    public function beforeSave()
    {

    }

    public function afterSave()
    {

    }

}