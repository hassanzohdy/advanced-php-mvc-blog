<?php
|--
|- Handling Cookies
|-
|- Prerequisites
|- What are cookies
|-
|- Cookie Class
|-
|- Properties
|-
|- private \System\Application $app
|-
|- Methods                          
|- public void set(string $key, mixed $value, int $minutes) : Add New Cookie
|- public mixed get(string $key, mixed $default = null) : Get The Cookie Value for the given key or return the default if not found
|- public bool has(string $key) : Determine if the given key exists in cookies
|- public void remove(string $key) : remove the given key from cookies
|- public array all() : Get all cookies
|- public void destroy() : Remove All Cookies
--|