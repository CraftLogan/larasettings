<?php

namespace Craftlogan\ModelSettings;

use Illuminate\Database\Eloquent\Model;

class Settings
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * Settings constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Get the model's settings.
     *
     * @return array|null
     */
    public function all()
    {
        return $this->model->settings;
    }

    /**
     * Apply the model's settings.
     *
     * @param array $settings
     * @return $this
     */
    public function apply($settings = [])
    {
        $this->model->settings = (array) $settings;
        $this->model->save();

        return $this;
    }

    /**
     * Delete the setting at the given path.
     *
     * @param string|null $path
     * @return array
     */
    public function delete($path = null)
    {
        if (! $path) {
            return $this->set([]);
        }

        $settings = $this->all();

        array_forget($settings, $path);

        return $this->apply($settings);
    }

    /**
     * Forget the setting at the given path.
     *
     * @alias delete()
     * @param null $path
     * @return array
     */
    public function forget($path = null)
    {
        return $this->delete($path);
    }

    /**
     * Return the value of the setting at the given path.
     *
     * @param string|null $path
     * @param mixed       $default
     *
     * @return mixed
     */
    public function get($path = null, $default = null)
    {
        return $path ? array_get($this->all(), $path, $default) : $this->all();
    }

    /**
     * Determine if the model has the given setting.
     *
     * @param string $path
     *
     * @return bool
     */
    public function has($path)
    {
        return (bool) array_has($this->all(), $path);
    }

    /**
     * Update the setting at given path to the given value.
     *
     * @param string|null $path
     * @param mixed       $value
     *
     * @return array
     */
    public function set($path = null, $value = [], $type = null, $typeOptions = [])
    {
        if (func_num_args() < 2) {
            $value = $path;
            $path = null;
        }
        //dd($typeOptions);
        $settings = $this->all();

        array_set($settings, $path, $value);
        array_set($settings, $path.'.type.selected', $value);
        $settings = $this->setType($settings, $path, $type);
        $settings = $this->setTypeOptions($settings, $path, $typeOptions);

        return $this->apply($settings);
    }


    /**
     * Update the settings type
     *
     * @param array $settings
     * @param string|null $path
     * @param array       $typeOptions
     *
     * @return array $settings
     */
    private function setType($settings, $path, $type = null)
    {
        if(is_null($type)){
          array_set($settings, $path.'.type.type', 'standard');
        }else{
          array_set($settings, $path.'.type.type', $type);
        }
        return $settings;
    }




    /**
     * Update the settings typeoption for a given setting path
     *
     * @param array $settings
     * @param string|null $path
     * @param array       $typeOptions
     *
     * @return array $settings
     */
    private function setTypeOptions($settings, $path, $typeOptions = [])
    {
        $i = 0;
        foreach ($typeOptions as $option) {
          array_set($settings, $path.'.type.type_options.'.$i, $option);
          $i++;
        }
        return $settings;
    }





    /**
     * Update the setting at the given path if it exists.
     *
     * @alias  set()
     *
     * @param string $path
     * @param mixed  $value
     *
     * @return $this|array
     */
    public function update($path, $value)
    {
        return $this->set($path, $value);
    }
}
