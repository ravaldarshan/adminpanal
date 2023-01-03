<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\policy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $policys = policy::paginate(5);
        return view('admin.policy.index', ['policys'=>$policys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.policy.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'policy_title'=> 'required',
            'policy_desc'=> 'required',
            'policy_link'=> 'required',
            'policy_image'=> 'required'
        ]);
        $policy = new policy;
        $policy->policy_title = $request->policy_title;
        $policy->policy_desc = $request->policy_desc;
        $policy->policy_link = $request->policy_link;
        if ($request->policy_image != null) {

            //delate alrady exist image
            // Storage::disk('public')->delete('profiles/'.$employees->profile_pic);

            //store image
            // $path = Storage::putFile('profiles_pic', $request->file('profile_pic'));

            $imageName = time().'.'.$request->policy_image->getClientOriginalExtension();
            $request->policy_image->move(public_path('policy_pic'), $imageName);
            $policy->policy_image = $imageName;
        }
        $policy->save();

        return redirect()->route('policy.index')->with('success','Policy Are Created!');
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
        $policy = Policy::where('id', $id)->first();
        return view('admin.policy.edit', ['policy' => $policy]);

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
        $this->validate($request,[
            'policy_title'=> 'required',
            'policy_desc'=> 'required',
            'policy_link'=> 'required',
            'policy_image'=> 'nullable',
        ]);
        $policy =policy::find($id);
        $policy->policy_title = $request->policy_title;
        $policy->policy_desc = $request->policy_desc;
        $policy->policy_link = $request->policy_link;
        if ($request->policy_image != null) {

            //delate alrady exist image
            // Storage::disk('public')->delete('profiles/'.$employees->profile_pic);

            //store image
            // $path = Storage::putFile('profiles_pic', $request->file('profile_pic'));

            $imageName = time().'.'.$request->policy_image->getClientOriginalExtension();
            $request->policy_image->move(public_path('policy_pic'), $imageName);
            $policy->policy_image = $imageName;
        }
        $policy->save();

        return redirect()->route('policy.index')->with('success','Policy Are Updated!');
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
        $policy = Policy::find($id)->delete();
        if ($policy) {
            return redirect()->route('policy.index')->with('success', 'Policy Has Beed Deleted. ' . '#' . $id);
        }
    }
}
