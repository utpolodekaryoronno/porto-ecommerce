<?php

namespace App\Http\Controllers;

abstract class Controller
{
    /**
     * Unique Name Generator
     */
    protected function uniqueFileName($file = null){

        if( $file ){
            $uniqueName =  md5(rand(100000,10000000) . '_' .time() . '_' . str_shuffle("qwertyuiopplkjhgfdsazxcvbnm")). "." . $file -> getClientOriginalExtension();
        }else {
            $uniqueName =  md5(rand(100000,10000000) . '_' .time() . '_' . str_shuffle("qwertyuiopplkjhgfdsazxcvbnm"));
        }

        return $uniqueName;
    }


    /**
     * File Upload Method
     */
    protected function fileUpload($file = null, $path = 'media'){

        if($file){
            // generate a unique filename
            $fileName = $this->uniqueFileName($file);

            // upload file to path
            $file -> move(public_path($path), $fileName);

            // return file name
            return $fileName;
        }

        return false;
    }


    /**
     * Make Slug
     */
    protected function makeSlug($title) {
        // Convert to lowercase
        $slug = strtolower($title);

        // Replace non-alphanumeric characters with a hyphen
        $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug);

        // Remove leading/trailing hyphens
        $slug = trim($slug, '-');

        return $slug;
    }


}
