@extends('rapyd::table')

@section('filters')
    <div class="col">
        <x-rpd-input name="search" wire:model="search" placeholder="search..." />
    </div>
    <div class="col">
    </div>
@endsection

@section('buttons')
    <div class="btn-group-vertical">
        <a href="{{ route('rapyd.demo.users') }}" class="btn btn-sm btn-outline-dark">Reset</a>
    </div>
@endsection

@section('table')
    <table class="table">
        <thead>
        <tr>
            <th>
                <a wire:click.prevent="sortBy('id')" role="button" href="#">
                   id <i class="{{ $this->getSortIcon('id') }}"></i>
                </a>
            </th>
            <th>firstname</th>
            <th>lastname</th>
        </tr>
        </thead>
        <tbody>


        @foreach ($items as $user)
            <tr>
                <td>
                    <a href="{{ route('rapyd.demo.users.edit',$user->id) }}">{{ $user->id }}</a>
                </td>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->lastname }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection

