@extends('product::layouts.master')

@section('content')
    <form class="form-horizontal" action="{{ route('product.store') }}" method="POST">
        @csrf
        <fieldset>

            <!-- Form Name -->
            <legend>Form Name</legend>

            <!-- Password input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="passwordinput">Password Input</label>
                <div class="col-md-4">
                    <input id="passwordinput" name="passwordinput" type="password" name="password" placeholder="placeholder" class="form-control input-md">
                    <span class="help-block">help</span>
                </div>
            </div>

            <!-- Search input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="searchinput">Search Input</label>
                <div class="col-md-4">
                    <input id="searchinput" name="searchinput" type="search" name="search" placeholder="placeholder" class="form-control input-md">
                    <p class="help-block">help</p>
                </div>
            </div>

            <!-- Prepended text-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="prependedtext">Prepended Text</label>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-addon">prepend</span>
                        <input id="prependedtext" name="prependedtext" name="text" class="form-control" placeholder="placeholder" type="text">
                    </div>
                    <p class="help-block">help</p>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group">
                <label class="col-md-4 control-label" for="textinput">Text Input</label>
                <div class="col-md-4">
                    <input id="textinput" name="textinput" type="text" name="input" placeholder="placeholder" class="form-control input-md">
                    <span class="help-block">help</span>
                </div>
            </div>

        </fieldset>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
