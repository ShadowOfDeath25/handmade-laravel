<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AuthController;

abstract class ResourceController
{
    protected static $model;
    protected static $viewPath;
    protected static $editViewPath;


    public static function index()
    {
        $relatedData = [];
        foreach (static::$model::getRelations() as $key => $model) {
            $relatedData[$key . "s"] = $model::all();
            $key = $key . 's';
            $$key = $model::all();

        }
        AuthController::checkAuth();
        $variableName = strtolower(static::$model::getModelName()) . 's';
        $$variableName = static::$model::all();
        require static::$viewPath;
    }

    public static function store($data = [])
    {
        AuthController::checkAuth();
        if ($data == []) {
            $data = [];
            foreach (static::$model::getFillable() as $key) {
                $data[$key] = $_POST[$key];
            }
        }
        $item = new static::$model($data);
        if ($item->save()) {
            $_SESSION['msg'] = static::$model::getModelName() . " created successfully";
            header("location:/" . strtolower(static::$model::getModelName()) . "s");
        }
    }

    public static function show($id)
    {
        AuthController::checkAuth();
        $item = static::$model::find($id);
        if ($item) {
            return [
                'status' => true,
                'data' => $item
            ];
        }
        return [
            'status' => false,
            'message' => static::$model::getModelName() . ' not found'
        ];
    }

    public static function update($id, $data = [])
    {
        AuthController::checkAuth();
        if ($data == []) {
            foreach (static::$model::getFillable() as $key) {
                $data [$key] = $_POST[$key];
            }
        }
        $item = static::$model::find($id);
        if ($item) {
            foreach ($data as $key => $value) {
                $item->$key = $value;
            }
            if ($item->save()) {
                $_SESSION["msg"] = static::$model::getModelName() . " updated successfully";
            } else {
                $_SESSION["msg"] = "Failed to update " . strtolower(static::$model::getModelName());
            }
        } else {
            $_SESSION['msg'] = static::$model::getModelName() . " not found";
        }
        header("Location:/" . strtolower(static::$model::getModelName()) . "s");
        exit();
    }

    public static function destroy($id)
    {
        AuthController::checkAuth();
        $item = static::$model::find($id);
        if ($item) {
            $_SESSION["msg"] = static::$model::getModelName() . " deleted successfully";
            if ($item->delete()) {
                header("Location:/" . strtolower(static::$model::getModelName()) . "s");
                exit();
            }
            return [
                'status' => false,
                'message' => 'Failed to delete ' . strtolower(static::$model::getModelName())];
        }
        return [
            'status' => false,
            'message' => static::$model::getModelName() . ' not found'
        ];
    }

    public static function renderEditView($id)
    {
        AuthController::checkAuth();
        $data = static::show($id);
        $relatedData = [];
        foreach (static::$model::getRelations() as $key => $model) {
            $variableName = $key . 's';
            $$variableName = $model::all();
        }
        if ($data['status']) {
            $variableName = strtolower(static::$model::getModelName());
            $$variableName = $data['data'];
            require static::$editViewPath;
        } else {
            $_SESSION['msg'] = $data['message'];
            header("Location:/" . strtolower(static::$model::getModelName()) . "s");
            exit();
        }
    }
}


?>