<?php

function setting_type(){
    return [
        'text' => trans('home.text'),
        'textarea' => trans('home.textarea'),
        'image' => trans('home.image'),
    ];
}

function newsStatus(){
    return [
        'wating' => 'wating',
        'reject' => 'reject',
        'success' => 'success',
    ];
}