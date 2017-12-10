<?php

namespace App\Models;

use System\Model;

class SettingsModel extends Model
{
     /**
     * Table name
     *
     * @var string
     */
    protected $table = 'settings';

     /**
     * Loaded Settings
     *
     * @var array
     */
    private $settings = [];

     /**
     * Load And Store All settings in the database
     *
     * @return void
     */
    public function loadAll()
    {
        foreach ($this->all() AS $setting) {
            $this->settings[$setting->key] = $setting->value;
        }
    }

     /**
     * Get Settings By Key
     *
     * @param string $key
     * @return mixed
     */
    public function get($key)
    {
        return array_get($this->settings, $key);
    }

     /**
     * Update Settings
     *
     * @return void
     */
    public function updateSettings()
    {
        // pre-defined keys (settings) that will be stored in database
        $keys = ['site_name', 'site_email', 'site_status', 'site_close_msg'];

        foreach ($keys AS $key) {
            // why to not make an update ?
            $this->where('`key` = ?', $key)->delete($this->table);
            $this->data('key', $key)
                 ->data('value', $this->request->post($key))
                 ->insert($this->table);
        }

    }
}