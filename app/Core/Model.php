<?php

namespace Core;

class Model
{
    protected $data = [];
    protected $dataFile = '';
    
    public function __construct()
    {
        $this->loadData();
    }
    
    /**
     * Load data from file
     */
    protected function loadData()
    {
        if ($this->dataFile && file_exists(APP_PATH . '/Data/' . $this->dataFile)) {
            $this->data = require APP_PATH . '/Data/' . $this->dataFile;
        }
    }
    
    /**
     * Get all data
     */
    public function all()
    {
        return $this->data;
    }
    
    /**
     * Find item by key
     */
    public function find($key, $value = null)
    {
        if ($value === null) {
            return $this->data[$key] ?? null;
        }
        
        foreach ($this->data as $item) {
            if (is_array($item) && isset($item[$key]) && $item[$key] === $value) {
                return $item;
            }
        }
        
        return null;
    }
    
    /**
     * Filter data
     */
    public function where($key, $value)
    {
        return array_filter($this->data, function($item) use ($key, $value) {
            return is_array($item) && isset($item[$key]) && $item[$key] === $value;
        });
    }
    
    /**
     * Get paginated data
     */
    public function paginate($page = 1, $perPage = 10)
    {
        $total = count($this->data);
        $offset = ($page - 1) * $perPage;
        
        return [
            'data' => array_slice($this->data, $offset, $perPage),
            'total' => $total,
            'current_page' => $page,
            'per_page' => $perPage,
            'last_page' => ceil($total / $perPage),
            'has_more' => $offset + $perPage < $total
        ];
    }
}