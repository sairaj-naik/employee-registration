<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;
use DB;
use App\Models\employee;
use App\Http\Requests;
use App\Http\Controllers\Controller;
class empController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 
        return view('employees.emp_layouts');
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employee = DB::select('select * from employee');
        return view('employees.emp_list',['employee'=>$employee]);
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
        {
            $rules = [
                'name'      => 'required|string|min:3|max:255',
                'Address'   => 'required|string|min:3|max:255',
                'email'     => 'required|string|email|max:255|unique:employee',
                'phone'     => 'required|string|min:11|numeric|unique:employee',
                'Position'  => 'required',
                'resume'  => 'required'
            ];

            $validator = Validator::make($request->all(),$rules);
            if ($validator->fails()) {
                return redirect('insert')
                ->withInput()
                ->withErrors($validator);
            }
            else
            {
                $data = $request->all();
                //return $data;
                //dd($request->all());
                try
                {
                    $employee = new employee;
                    $employee->name     = $data['name'];
                    $employee->Address  = $data['Address'];
                    $employee->email    = $data['email'];
                    $employee->phone    = $data['phone'];
                    $employee->Position = $data['Position'];
                    //$employee->resume = Form::file('resume');
                    
                    if($request->hasFile('resume')) 
                    {
                        //return "entered";
                        $file = $request->file('resume');
                        
                        //Validator::make($request->all(),['resume'=>"required|string|mimes:pdf,zip"])->validate();

                        $employee->resume = $request->resume->store('resume', 'public');
                        // Storage::disk('local')->put('example.txt', $FileEnconded);
                     }
                    
                    $employee->save();
                    return redirect('dashboard')->with('status',"Insert successfully");
                }
                catch(Exception $e){
                    return redirect('insert')->with('failed',"operation failed");
                }
            }
        }
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
        $employee = DB::select('select * from employee where id = ?',[$id]);
        return view('employees.emp_update',['employee'=>$employee]);
        
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
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        
           

        {
           

            $data     = $request->all();
            //dd($request->all());

            $id       =  $data['id'];
            $name     =  $data['name'];
            $Address  =  $data['Address'];
            $email    =  $data['email'];
            $phone    =  $data['phone'];
            $Position =  $data['Position'];
            //$resume =  $data['resume'];
            
            if($request->hasFile('resume')) 
            {
                //return "entered";
                $file = $request->file('resume');
                
                //Validator::make($request->all(),['resume'=>"required|string|mimes:pdf,zip"])->validate();

                $resume = $request->resume->store('resume', 'public');
                // Storage::disk('local')->put('example.txt', $FileEnconded);

                try
                {
                    DB::update('update employee set name = ?, Address=?, email=?, phone=?, Position=?, resume=? where id = ?',[$name,$Address,$email,$phone,$Position,$resume,$id]);
                    echo "Record updated successfully.";
                    return redirect('dashboard')->with('status',"Update successfully");
                }
                catch(Exception $e){
                    return redirect('edit/{id}')->with('failed',"operation failed");
                }
            }
            else
            {
                try{
                    DB::update('update employee set name = ?, Address=?, email=?, phone=?, Position=? where id = ?',[$name,$Address,$email,$phone,$Position,$id]);
                    echo "Record updated successfully.";
                    return redirect('dashboard')->with('status',"Update successfully");
                }
                catch(Exception $e){
                    return redirect('edit/{id}')->with('failed',"operation failed");
                }
            }          
        }
    }        
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('delete from employee where id = ?',[$id]);
        $employee = DB::select('select * from employee');
        return view('dashboard',['employee'=>$employee]);
    }
    public function display(){
        $employee = DB::select('select * from employee');
        return view('dashboard',['employee'=>$employee]);

        
    }
}
