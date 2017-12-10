<?php

namespace System\Http;

use System\Application;

class UploadedFile
{
     /**
     * Application Object
     *
     * @var \System\Application
     */
    private $app;

     /**
     * The uploaded file
     *
     * @var array
     */
    private $file = [];

     /**
     * The uploaded file name
     *
     * @var string
     */
    private $fileName;

     /**
     * The uploaded file name without its extension
     *
     * @var string
     */
    private $nameOnly;

     /**
     * The uploaded file extension
     *
     * @var string
     */
    private $extension;

     /**
     * The uploaded file mime type
     *
     * @var string
     */
    private $mimeType;

     /**
     * The uploaded temp file path
     *
     * @var string
     */
    private $tempFile;

     /**
     * The uploaded file size in bytes
     *
     * @var int
     */
    private $size;

     /**
     * The uploaded file error
     *
     * @var int
     */
    private $error;

     /**
     * The allowed image extensions
     *
     * @var array
     */
    private $allowedImageExtensions = ['gif', 'jpg', 'jpeg', 'png', 'webp'];

     /**
     * Constructor
     *
     * @param string $input
     */
    public function __construct($input)
    {
        $this->getFileInfo($input);
    }

     /**
     * Start collecting uploaded file data
     *
     * @param string $input
     * @return void
     */
    private function getFileInfo($input)
    {
        if (empty($_FILES[$input])) {
            return;
        }

        $file = $_FILES[$input];

        $this->error = $file['error'];

        if ($this->error != UPLOAD_ERR_OK) {
            return;
        }

        $this->file = $file;

        $this->fileName = $this->file['name'];

        $fileNameInfo = pathinfo($this->fileName);

        $this->nameOnly = $fileNameInfo['basename'];

        $this->extension = strtolower($fileNameInfo['extension']);

        $this->mimeType = $this->file['type'];

        $this->tempFile = $this->file['tmp_name'];

        $this->size = $this->file['size'];
    }

     /**
     * Determine if the file is uploaded
     *
     * @return bool
     */
    public function exists()
    {
        return ! empty($this->file);
    }

     /**
     * Get File Name
     *
     * @return string
     */
    public function getFileName()
    {
        return $this->fileName;
    }

     /**
     * Get File Name only without extension
     *
     * @return string
     */
    public function getNameOnly()
    {
        return $this->nameOnly;
    }

     /**
     * Get File extension
     *
     * @return string
     */
    public function getExtension()
    {
        return $this->extension;
    }

     /**
     * Get File mime type
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

     /**
     * Determine whether the uploaded file is image
     *
     * @return bool
     */
    public function isImage()
    {
        return strpos($this->mimeType, 'image/') === 0 AND
               in_array($this->extension, $this->allowedImageExtensions);
    }

     /**
     * Move the uploaded file to the given destination "target"
     *
     * @param string $target
     * @param string $newFileName
     * @return string
     */
    public function moveTo($target, $newFileName = null)
    {
        $fileName = $newFileName ?: sha1(mt_rand()) . '_' . sha1(mt_rand()); // total length = 81 char

        $fileName .= '.' .$this->extension;

        if (! is_dir($target)) {
            mkdir($target, 0777, true);
        }

        $uploadedFilePath = rtrim($target , '/') . '/' . $fileName;

        move_uploaded_file($this->tempFile, $uploadedFilePath);

        return $fileName;
    }
}