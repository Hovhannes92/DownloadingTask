@extends('layout')

<h1 class="title">Tasks List</h1>

@if (count($tasks))
    <table>
        <thead>
        <tr>
            <th>Url</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
            <tr>
                <td>{{ $task->url }}</td>
                <td>{{ $task->getStatus() }}</td>
                <td><?= $task->isCompleted() ? ' <a href="/tasks/' . $task->id . '/download">Download</a>' : '' ?></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
