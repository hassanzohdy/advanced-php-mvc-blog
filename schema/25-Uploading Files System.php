<?php
|--
|- Uploading Files System
|-
|- Pre-Requisites
|- Uploading Files
|-
|- Conetent
|- UploadedFile Class
|- Completing Validation Class
|- Ajax Upload
|-
|- UploadedFile Class
|- Properties :
|- private \System\Application $app
|- private array $file : The Uploaded File Data given from _FILES variable
|- private string $fileName : Uploaded File name (With Extension)
|- private string $nameOnly : Uploaded File name (Without Extension)
|- private string $extension : Uploaded File extension
|- private string $mimeType : Uploaded File Mime Type
|- private string $tempFile : Uploaded Temp File extension
|- private int $size : File Size in bytes
|- private int $error : Get Uploaded File Error
|-
|- Methods
|- public bool   exists() : Determine whether the file is uploaded
|- public string getFileName() : Get the File Name of the uploaded file
|- public string getNameOnly() : Get the file name (without extension)
|- public string getExtension() : Get the file extension
|- public string getMimeType() : Get the file Mime Type
|- public string moveTo(string $target, string $newFileName = null) : Upload the file to the given target and rename it if $fileName has value
|- public bool   isImage() : Determine whether the uploaded file is image
|- private void  getFileInfo(string $input) : Prepare and get uploaded file info
|-
|- Your Task
|- private void setFileSize() : Set the file Size
|- public string getFileSize() : Get the file Size
|-
--|