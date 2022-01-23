@extends('rapyd::table')

@section('filters')
    @parent
@endsection

@section('buttons')
    buttons
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
            <th>
                <a wire:click.prevent="sortBy('firstname')" role="button" href="#">
                   firstname  <i class="{{ $this->getSortIcon('firstname') }}"></i>
                </a>
            </th>
            <th>
                <a wire:click.prevent="sortBy('lastname')" role="button" href="#">
                   lastname <i class="{{ $this->getSortIcon('lastname') }}"></i>
                </a>
            </th>
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
