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

/**
 * Class ScriptController
 * @package App\Http\Controllers\Script
 */
class ScriptController extends Controller
{
    private $rowsPerPage = 10;

    const AUTHORIZED_STATUS_FOR_UPDATE = array('WaitingAdminConfirmForTest');

    public function __construct()
    {
        Log::info('contrusct script controller');
        $this->middleware('script');
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
        /**
         * $action and $method able to continue to the right form action
         * In the create method we will perform store method
         */
        $action = "store";
        $method = "POST";

        return view('scripts.form', compact('method', 'action'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateScriptRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateScriptRequest $request)
    {
        $script = Script::create($request->all());
        $script->fill(['user_id' => Auth::user()->id]);
        $script->save();
        flash()->overlay('Your article has been created', 'Thanks');
        return redirect()->action('Script\ScriptController@index');
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

        /**
         * $action and $method able to continue to the right form action
         * In the create method we will perform store method
         */
        $action = "update";
        $method = "PUT";

        return view('scripts.form', compact('method', 'action', 'script'));
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
     * Check if script's status able to update script
     * Authorized status are in constant class
     *
     * @param $script
     * @return bool
     */
    public function statusAbleUpdate($script)
    {
        foreach ($this::AUTHORIZED_STATUS_FOR_UPDATE as $status)
        {
            if ($script->status == $status)
            {
                return (true);
            }
        }
        return false;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CreateScriptRequest|Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateScriptRequest $request, $id)
    {
        $script = Script::find($id);

        if (!$this->statusAbleUpdate($script))
        {
            flash()->overlay("You cannot modify this script", "Error");
            return redirect()->back();
        }

        $script->title = $request->input('title');
        $script->content = $request->input('content');
        $script->save();

        flash()->overlay("Your script has been updated successfully", "Success");
        return redirect()->action('Script\ScriptController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $script = Script::find($id);
        $script->delete();
    }
}
