<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index() {
        $data = array('title' => 'Admin');
        return view('admin.index', $data);
    }

    public function form() {
        $data = array('title' => 'form');
        return view('admin.form', $data);
    }

    public function list() {
        $data = array('title' => 'list');
        return view('admin.list', $data);
    }

}