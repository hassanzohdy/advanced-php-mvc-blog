<?php

namespace System;

class Validation
{
     /**
     * Application Object
     *
     * @var \System\Application
     */
    private $app;

     /**
     * Errors container
     *
     * @var array
     */
    private $errors = [];

     /**
     * Constructor
     *
     * @param \System\Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

     /**
     * Determine if the given input is not empty
     *
     * @param string $inputName
     * @param string $customErrorMessage
     * @return $this
     */
    public function required($inputName, $customErrorMessage = null)
    {
        if ($this->hasErrors($inputName)) {
            return $this;
        }

        $inputValue = $this->value($inputName);

        if ($inputValue === '') {
            $message = $customErrorMessage ?: sprintf('%s Is Required', ucfirst($inputName));
            $this->addError($inputName, $message);
        }

        return $this;
    }

     /**
     * Determine if the given input file exists
     *
     * @param string $inputName
     * @param string $customErrorMessage
     * @return $this
     */
    public function requiredFile($inputName, $customErrorMessage = null)
    {
        if ($this->hasErrors($inputName)) {
            return $this;
        }

        $file = $this->app->request->file($inputName);

        if (! $file->exists()) {
            $message = $customErrorMessage ?: sprintf('%s Is Required', ucfirst($inputName));
            $this->addError($inputName, $message);
        }

        return $this;
    }

     /**
     * Determine if the given input is an image
     *
     * @param string $inputName
     * @param string $customErrorMessage
     * @return $this
     */
    public function image($inputName, $customErrorMessage = null)
    {
        if ($this->hasErrors($inputName)) {
            return $this;
        }

        $file = $this->app->request->file($inputName);

        if (! $file->exists()) {
            return $this;
        }

        if (! $file->isImage()) {
            $message = $customErrorMessage ?: sprintf('%s Is not valid Image', ucfirst($inputName));
            $this->addError($inputName, $message);
        }

        return $this;
    }

     /**
     * Determine if the given input is valid email
     *
     * @param string $inputName
     * @param string $customErrorMessage
     * @return $this
     */
    public function email($inputName, $customErrorMessage = null)
    {
        if ($this->hasErrors($inputName)) {
            return $this;
        }

        $inputValue = $this->value($inputName);

        if (! filter_var($inputValue, FILTER_VALIDATE_EMAIL)) {
            $message = $customErrorMessage ?: sprintf('%s is not valid email', ucfirst($inputName));
            $this->addError($inputName, $message);
        }

        return $this;
    }

     /**
     * Determine if the given input has float value
     *
     * @param string $inputName
     * @param string $customErrorMessage
     * @return $this
     */
    public function float($inputName, $customErrorMessage = null)
    {
        if ($this->hasErrors($inputName)) {
            return $this;
        }

        $inputValue = $this->value($inputName);

        if (! is_float($inputValue)) {
            $message = $customErrorMessage ?: sprintf('%s Accepts only floats', ucfirst($inputName));
            $this->addError($inputName, $message);
        }

        return $this;
    }

     /**
     * Determine if the given input value should be at least the given length
     *
     * @param string $inputName
     * @param int $length
     * @param string $customErrorMessage
     * @return $this
     */
    public function minLen($inputName, $length, $customErrorMessage = null)
    {
        if ($this->hasErrors($inputName)) {
            return $this;
        }

        $inputValue = $this->value($inputName);

        if (strlen($inputValue) < $length) {
            $message = $customErrorMessage ?: sprintf('%s should be at least %d', ucfirst($inputName), $length);
            $this->addError($inputName, $message);
        }

        return $this;
    }

     /**
     * Determine if the given input value should be at most the given length
     *
     * @param string $inputName
     * @param int $length
     * @param string $customErrorMessage
     * @return $this
     */
    public function maxLen($inputName, $customErrorMessage = null)
    {
        if ($this->hasErrors($inputName)) {
            return $this;
        }

        $inputValue = $this->value($inputValue);

        if (strlen($inputValue) > $length) {
            $message = $customErrorMessage ?: sprintf('%s should be at most %d', ucfirst($inputName), $length);
            $this->addError($inputName, $message);
        }

        return $this;

    }

     /**
     * Determine if the first input matches the second input
     *
     * @param string $fistInput
     * @param string $secondInput
     * @param string $customErrorMessage
     * @return $this
     */
    public function match($firstInput, $secondInput, $customErrorMessage = null)
    {
        $firstInputValue = $this->value($firstInput);
        $secondInputValue = $this->value($secondInput);

        if ($firstInputValue != $secondInputValue) {
            $message = $customErrorMessage ?: sprintf('%s should match %s', ucfirst($secondInput), ucfirst($firstInput));
            $this->addError($secondInput, $message);
        }

        return $this;
    }

     /**
     * Determine if the given input is unique in database
     *
     * @param string $inputName
     * @param array $databaseData
     * @param string $customErrorMessage
     * @return $this
     */
    public function unique($inputName, array $databaseData, $customErrorMessage = null)
    {
        if ($this->hasErrors($inputName)) {
            return $this;
        }

        $inputValue = $this->value($inputName);

        $table = null;
        $column = null;
        $exceptionColumn = null;
        $exceptionColumnValue = null;

        if (count($databaseData) == 2) {
            list($table, $column) = $databaseData;
        } elseif (count($databaseData == 4)) {
            list($table, $column, $exceptionColumn, $exceptionColumnValue) = $databaseData;
        }

        if ($exceptionColumn AND $exceptionColumnValue) {
            $result = $this->app->db->select($column)
                                    ->from($table)
                                    ->where($column . ' = ? AND ' . $exceptionColumn . ' != ?' , $inputValue, $exceptionColumnValue)
                                    ->fetch();
        } else {
            $result = $this->app->db->select($column)
                                    ->from($table)
                                    ->where($column . ' = ?' , $inputValue)
                                    ->fetch();
        }

        if ($result) {
            $message = $customErrorMessage ?: sprintf('%s already exists', ucfirst($inputName));
            $this->addError($inputName, $message);
        }
    }

     /**
     * Add Custom Message
     *
     * @param string $message
     * @return $this
     */
    public function message($message)
    {
        $this->errors[] = $message;

        return $this;
    }

     /**
     * Determine if there are any invalid inputs
     *
     * @return bool
     */
    public function fails()
    {
        return ! empty($this->errors);
    }

     /**
     * Determine if all inputs are valid
     *
     * @return bool
     */
    public function passes()
    {
        return empty($this->errors);
    }

     /**
     * Get All errors
     *
     * @return array
     */
    public function getMessages()
    {
        return $this->errors;
    }

     /**
     * Flatten errors and make it as a string imploded with break
     *
     * @return string
     */
    public function flattenMessages()
    {
        return implode('<br>', $this->errors);
    }

     /**
     * Get the value for the given input name
     *
     * @param string $input
     * @return mixed
     */
    private function value($input)
    {
        return $this->app->request->post($input);
    }

     /**
     * Add input error
     *
     * @param string $inputName
     * @param string $errorMessage
     * @return void
     */
    private function addError($inputName, $errorMessage)
    {
        $this->errors[$inputName] = $errorMessage;
    }

     /**
     * Determine if the given input has previous errors
     *
     * @param string $inputName
     */
    private function hasErrors($inputName)
    {
        return array_key_exists($inputName, $this->errors);
    }
}