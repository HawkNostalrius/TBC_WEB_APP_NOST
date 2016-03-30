@extends('app')

@section('content')

    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <h2>Scripts list</h2>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-2 col-lg-offset-10">
                        <a href="{{ action('Script\ScriptController@create') }}">
                            <button type="button" class="btn btn-primary">Add script</button>
                        </a>
                    </div>
                </div>

                <!-- Table -->
                <table class="table">
                    <thead>
                    <tr>
                        <th>
                            <strong>Title</strong>
                        </th>
                        <th>
                            <strong>Created at</strong>
                        </th>
                        @if (Auth::user()->hasRole('admin'))
                            <th>
                                <strong>Created By</strong>
                            </th>
                        @endif
                        <th>
                            <strong>Status</strong>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="body-list-scripts">
                    @foreach($scripts as $script)
                            <tr>
                            <td class="col-lg-6">
                                <a href="{!! action('Script\ScriptController@show', ['id' => $script->id]) !!}">
                                    {{ $script->title }}
                                </a>
                            </td>
                            <td class="col-lg-2">
                                {{ $script->created_at or "Unknown" }}
                            </td>
                                @if (Auth::user()->hasRole('admin'))
                                    <td class="col-lg-2">
                                        {{ $script->user()->first()->login }}
                                    </td>
                                @endif
                            <td class="col-lg-2">
                                <?php
                                    $btnClassColor = "btn-primary";
                                    $btnStatusMessage = "Waiting to be confirmed by an admin";
                                ?>
                                @if ($script->status == "WaitingAdminConfirmForTest")
                                    <?php
                                        $btnClassColor = "btn-primary";
                                        $btnStatusMessage = "Waiting to be confirmed by an admin"
                                        ?>
                                @elseif ($script->status == "AcceptedForTestStep")
                                        <?php
                                        $btnClassColor = "btn-primary";
                                        $btnStatusMessage = "Accepted for test";
                                        ?>
                                @elseif ($script->status == "Testing")
                                    <?php
                                        $btnClassColor = "btn-warning";
                                        $btnStatusMessage = "Testing into server";
                                        ?>
                                @elseif ($script->status == "AcceptedAfterTest")
                                    <?php
                                        $btnClassColor = "btn-success";
                                        $btnStatusMessage = "Accepted";
                                        ?>
                                @elseif ($script->status == "RefusedAfterTest")
                                    <?php
                                        $btnClassColor = "btn-danger";
                                        $btnStatusMessage = "Refused";
                                        ?>
                                @endif
                                    <button class="btn disabled {{ $btnClassColor }}">
                                        {{ $btnStatusMessage }}
                                    </button>
                                    <div>

                                </div>
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-lg-offset-4">
        <div class="text-center">
            {!! $scripts->links() !!}
        </div>
    </div>
@endsection