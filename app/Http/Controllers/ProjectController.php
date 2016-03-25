<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Projects;
use Input, Validator, Auth, Redirect, Session;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Projects::all();

        return view('dashboard')
            ->with('project', $project);

    }

    public function show($id)
    {


    }

    public function create()
    {
        return view('create-project');
    }

    public function store(Request $request)
    {

        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'                  => 'required',
            'url_to_image'          => 'required',
            'url_to_portfolio_image'=> 'required',
            'url_to_long_image'     => 'required',
            'description'           => 'required',
            'short_description'     => 'required',
            'url'                   => 'required|url',
            'technology'            => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);


        // process the login
        if ($validator->fails()) {
            return Redirect::to('dashboard/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));;
        } else {
            // store
            $project = new Projects();
            $project->name                      = Input::get('name');
            $project->url_to_image              = Input::get('url_to_image');
            $project->url_to_portfolio_image    = Input::get('url_to_portfolio_image');
            $project->url_to_long_image         = Input::get('url_to_long_image');
            $project->description               = Input::get('description');
            $project->short_description         = Input::get('short_description');
            $project->url                       = Input::get('url');
            $project->technology                = Input::get('technology');
            $project->save();

            // redirect
            Session::flash('message', 'Successfully added Project!');
            return Redirect::to('dashboard');
        }
    }

    public function edit($id)
    {
        // get the nerd
        $project = Projects::find($id);

        // show the edit form and pass the nerd
        return View('edit-project')
            ->with('project', $project);
    }


    public function update($id)
    {

        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'                  => 'required',
            'url_to_image'          => 'required',
            'url_to_portfolio_image'=> 'required',
            'url_to_long_image'     => 'required',
            'description'           => 'required',
            'short_description'     => 'required',
            'url'                   => 'required|url',
            'technology'            => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);



        if ($validator->fails()) {
            return Redirect::to('dashboard/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));;
        } else {
            // store
            $project =  Projects::find($id);
            $project->name                      = Input::get('name');
            $project->url_to_image              = Input::get('url_to_image');
            $project->url_to_portfolio_image    = Input::get('url_to_portfolio_image');
            $project->url_to_long_image         = Input::get('url_to_long_image');
            $project->description               = Input::get('description');
            $project->short_description         = Input::get('short_description');
            $project->url                       = Input::get('url');
            $project->technology                = Input::get('technology');
            $project->save();

            // redirect
            Session::flash('message', 'Successfully updated Project!');
            return Redirect::to('dashboard');
        }
    }


    public function destroy($id)
    {
        // delete
        $project = Projects::find($id);
        $project->delete();

        // redirect
        Session::flash('message', 'Successfully deleted Project!');
        return Redirect::to('dashboard');
    }

}
