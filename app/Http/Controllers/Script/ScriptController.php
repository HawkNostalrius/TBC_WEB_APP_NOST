<?php

namespace App\Http\Controllers\Script;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Script as Script;
use Illuminate\Support\Facades\Auth;
use Log;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateScriptRequest;

class ScriptController extends Controller
{
    private $rowsPerPage = 10;

    public function __construct()
    {
        //$this->middleware('script');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $scripts = null;

        Log::info("Lol");
        if ($user->hasRole('admin'))
        {
            $scripts = Script::paginate($this->rowsPerPage);
        }
        else
        {
            $scripts = Script::where('user_id', $user->id)->paginate($this->rowsPerPage);
        }

        return view('scripts.index', compact('scripts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $action = "store";
        $method = "POST";

        return view('scripts.form', compact('method', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateScriptRequest $request)
    {
        $currUser = Auth::user();
        $script = Script::create($request->all());
        $script->fill(['user_id' => $currUser->id]);
        $script->save();
        flash()->overlay('Your article has been created', 'Thanks');
        return Redirect::to('script');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $script = Script::find($id);

        $action = "update";
        $method = "PUT";

        return view('scripts.form', compact('method', 'action', 'script'));
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateScriptRequest $request, $id)
    {

        $script = Script::find($id);

        if ($script->status != "WaitingAdminConfirmForTest" &&
            $script->status != "RefusedAfterTest") {
            flash()->overlay("You cannot modify this script", "Error");
            return redirect()->back();
        }

        $script->title = $request->input('title');
        $script->content = $request->input('content');
        $script->save();

        flash()->overlay("Your script has been updated successfully", "Success");
        return Redirect::to("script");
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
    }
}
