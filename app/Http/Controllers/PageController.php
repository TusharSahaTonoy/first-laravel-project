<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        $data = array(
            'title'     => 'This is a title variable from controller',
            'test'      => 'the test variable',
            'testArr'   => ['value1', 'value2','value3']
        );
        
        // return view('index',compact('title'));
        // return view('index')->with('title',$title);
        return view('pages.index')->with($data);

    }

    public function home()
    {
        return view('pages.home');
    }
}
