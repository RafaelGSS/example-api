<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sorts = explode(',', $request->input('sort', ''));

        // create a consult
        $query = Job::query();

        foreach ($sorts as $sortCol) {
            $sortDir = starts_with($sortCol, '-') ? 'desc' : 'asc';
            $sortCol = ltrim($sortCol, '-');

            $query->orderBy($sortCol, $sortDir);
        }
        // Orderning querys

        //JSON API
        return $query->with('company')->paginate(20);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $job = Job::create($data);

        return response()->json($job, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::with('company')->find($id);

        if(!$job)
        {
            return response()->json([
                'message' => 'Record not found']
                , 404);
        }

        return response()->json($job);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $job = Job::find($id);

        if(!$job) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $job->update($request->all());

        return response()->json($job, 201);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);

        if(!$job) {
            return response()->json([
                'message'   => 'Record not found',
            ], 404);
        }

        $job->delete();

        return response()->json([
            'message' => 'Deleted successfully',
            ], 200);  
    }
}
