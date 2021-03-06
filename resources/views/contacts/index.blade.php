@extends('layouts.app')
@section('title', $title)
@section('content')
<div class="row">
  <div class="offset-2">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
    @endif

    @if(!empty($contacts->count()))
      <h1>Contacts</h1>
      <table class="table table-sm table-responsive table-hover">
        <thead class="thead-dark">
          <tr>
            <td>First name</td>
            <td>Last name</td>
            <td>Address</td>
            <td></td>
            <td></td>
          </tr>
        </thead>
      @foreach($contacts as $contact)
        <tbody>
            <tr>
              <td>{{$contact->first_name}}</td>
              <td>{{$contact->last_name}}</td>
              <td>{{$contact->address}}</td>
              <td>
                <a class="btn btn-sm btn-info text-white" href="{{ route('contacts.edit', $contact->id) }}">edit<a>
              </td>
              <td>
                <form method="post" action="{{ route('contacts.destroy', $contact->id) }}">
                  @csrf
                  @method('DELETE')

                  <button class="btn btn-sm btn-danger" type="submit">Delete</button>
                  
                </form>
              </td>
            </tr>
        </tbody>
      @endforeach
      </table>
    @else
      <h1>your contact looks empty :(</h1>
    @endif
    <a href="{{ route('contacts.create') }}" class="btn btn-sm btn-primary">add contacts here</a>
  </div>
</div>
@endsection