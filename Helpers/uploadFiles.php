<?php

function getFileFieldsName(){
    return [
        'image',
        'file',
        'photo',
        'logo',
        'attached',
        'body_setting',
    ];
}

function allowExtentionsImage(){
    return [
        'png',
        'jpg',
        'jpeg',
        'gif',
        'IMG'
    ];
}

function allowExtentionsFiles(){
    return [
        'txt',
        'zip',
        'sql'
    ];
}

function getFileType($filedName , $value){
    if(in_array($filedName , getFileFieldsName())) {
        if (in_array(getExtention($value), allowExtentionsImage())) {
            return 'Image';
        }
        if (in_array(getExtention($value), allowExtentionsFiles())) {
            return 'File';
        }
    }
}

function getExtention($fileName){
    $array = explode('.' , $fileName);
    return end($array);
}


function checkIfFiledFile($array){
    foreach($array as $key => $file){
        if(in_array($key , getFileFieldsName())){
            return $key;
        }
    }
    return false;
}

function uploadFile($request , $field){
    if($request->file($field) != null){
        $destinationPath = env('UPLOAD_PATH');
        $all = [];
        $imageName = '';
        if(is_array($request->file($field))){
            foreach($request->file($field)  as $file){
                $all[] = uploadFileOrMultiUpload($file , $destinationPath);
            }
        }else{
            $imageName = uploadFileOrMultiUpload($request->file($field) , $destinationPath);
        }
        $request = $request->except($field);
        if(count($all) > 0){
            $request[$field] = json_encode($all);
            return $request;
        }
        $request[$field] = $imageName;
        return $request;
    }
    return $request->all();
}

function uploadFileOrMultiUpload($image , $destinationPath){
    $extension = $image->getClientOriginalExtension();
    $fileName = rand(11111,99999).'_'.time().'.'.$extension;
    if($image->move($destinationPath  , $fileName)){
        return $fileName ;
    }
}

function expectSigment(){
    return [
        'register' ,
        'login',
        'setting'
    ];
}