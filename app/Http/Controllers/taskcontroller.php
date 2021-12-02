<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class taskcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        //
        $data = task::orderBy('id' , 'desc')->where('user_id', $user->id)->get();
       return view('index' , ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data =  $this->validate($request , [

            'title'     => "required|string",
            'description' => "required|string",
            'startdate' => "required|date",
            'enddate'   => "required|date|after:startdate",
            'image'     => "required|image",
        ]);

        
        $image = $request->file('image');
        $finalname = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("images"),$finalname);
        $data['image'] = $finalname;

        $user = Auth::user();
        $data['user_id'] = $user->id;

        $op = task::create($data);
        // dd($op);
        if($op){
            return redirect('/task');
           
        }else{
            $message = "error";
        }
        session()->flash('Message', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = task::find($id);
        return view('edit', ['data' => $data]);

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
        //
        $data = $this->validate($request, [
            'title'     => "required|string",
            'description' => "required|string",
            'startdate' => "required|date",
            'enddate'   => "required|date|after:startdate",
        ]);

        $op = task::where('id', $id)->update($data);

        if ($op) {
            $message = 'Raw Updated';
        } else {
            $message = 'Error Try Again';
        }

        session()->flash('Message', $message);

        return redirect(url('/task'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $op = task::where('id', $id)->delete();

        if ($op) {
            $message = 'Raw Removed';
        } else {
            $message = 'Error Try Again';
        }
        session()->flash('Message', $message);

        return redirect(url('/task'));
    }
}
