<?php
namespace App\Models;

class Listing{
    public static function all(){
        return [
            [
            'id' => 1,
            'title' => 'Skelbimas nr 1',
            'description' => 'Darbo skelbimo aprasymas'
            ],
            [
                'id' => 2,
                'title' => 'Skelbimas nr 2',
                'description' => 'Darbo skelbimo aprasymas'
            ]
            ];
    }

    public static function find($id) {
        $listings = self::all();

        foreach($listings as $listing){
            if($listing['id'] == $id){
                return $listing;
            }
        }
    }
}