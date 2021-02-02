<?php

namespace App\Http\Controllers;

use App\Residents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResidentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       	$file = base64_decode($request->userPhoto);
	
		if(empty($request->userId)){
			
			$Residents = new Residents(); 
			$Residents->fullname   		=  (@$request->Fullname != '') ? @$request->Fullname : "";
			$Residents->address    		=  (@$request->Address != '') ? @$request->Address : "";
			$Residents->picture_path    =  "";
			$Residents->save();
			$user_id = $Residents->id;
			
			$PhotoPath = 'Residents/'.$user_id.'_'.$request->Fullname.'.png';
			$photoUrl = 'https://mygreenapplebucket.s3-ap-southeast-1.amazonaws.com/'.$PhotoPath;
		
			$models = Residents::where('id',$user_id);
			$models->update(['picture_path'=>$photoUrl]);
			
		}
		else{
			
			$user_id = $request->userId;
			$PhotoPath = 'Residents/'.$user_id.'_'.$request->Fullname.'.png';
			$photoUrl = 'https://mygreenapplebucket.s3-ap-southeast-1.amazonaws.com/'.$PhotoPath;
			
			$models = Residents::where('id',$user_id);
			$models->update(['picture_path'=>$photoUrl,'fullname'=> @$request->Fullname,'address' => @$request->Address]);
			
		}
		
	
		
		\Storage::disk('s3')->put($PhotoPath,$file);
		
		return response()->json(array('success' => 'success'));
		
    }
	
	
	public function camera($id=""){
		$userData = Residents::where('id',$id)->first();		
		return view('camera',array('userData'=>$userData));	
	}
	
	
    /**
     * Display the specified resource.
     *
     * @param  \App\Residents  $residents
     * @return \Illuminate\Http\Response
     */
    public function show(Residents $residents)
    {
        $getallData = Residents::all();
	
		$data = array();
		
		if(!empty($getallData))
		{
		
			foreach ($getallData as $dd) 
			{
				
				$link = asset("camera/user/".$dd->id);
				
				$row = array();
				$row['id'] = $dd->id;
				$row['fullname'] = $dd->fullname;
				$row['address'] = $dd->address;
				$row['picture_path'] =  '<img src="'.$dd->picture_path.'" class="imageStyle" alt="User Image">';
				$row['action'] = "<a href='".$link."' class='btn btn-raised btn-primary'><i class='fa fa-fw fa-pencil-square-o'></i> Edit</a>&nbsp;";
				$data[] = $row;
			}
		}
		else
		{
			$data = [];
		}
		
		$output = array("data" => $data);
		return response()->json($output);
		
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Residents  $residents
     * @return \Illuminate\Http\Response
     */
    public function edit(Residents $residents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Residents  $residents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Residents $residents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Residents  $residents
     * @return \Illuminate\Http\Response
     */
    public function destroy(Residents $residents)
    {
        //
    }
}
