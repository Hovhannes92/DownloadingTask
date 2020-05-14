@extends('layout')

    <form method="POST" action="/tasks">
        {{ csrf_field() }}
        <div class="field">
            <div class="control">
                <input  name="url" value="{{ old('url') }}" placeholder="Resource URL" type="url" required>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Add Task</button>
            </div>
        </div>
    </form>
