@extends('chatter::admin')
@section('page')
<div class="chatter-admin-{{ $page }}">
  <ul class="items-list">
    <li class="items-head">
      <div class="list-inner">
        <div class="pure-g">
            <div class="cell hand--1-2 nexus--1-5"><p>User ID</p></div><!--
            --><div class="cell hand--1-2 nexus--1-5"><p>Name</p></div><!--
            --><div class="cell hand--1-2 nexus--1-5"><p>Email</p></div><!--
            --><div class="cell hand--1-2 nexus--1-5"><p>Role</p></div><!--
            --><div class="cell hand--1-2 nexus--1-5"><p>Since</p></div>
        </div>
      </div>
    </li>
    @foreach($discs as $discussion)
    <li class="items-unique item-user-{{ $discussion->id }}">
      <div class="list-inner">
        <div class="pure-g">
            <div class="cell hand--1-2 nexus--1-5"><p>{{ $discussion->id }}</p></div><!--
          --><div class="cell hand--1-2 nexus--1-5"><p>{{ $discussion->title }}</p></div><!--
          --><div class="cell hand--1-2 nexus--1-5"><p>{{ $discussion->user_id }}</p></div><!--
          --><div class="cell hand--1-2 nexus--1-5"><p></p></div><!--
            --><div class="cell hand--1-2 nexus--1-5"><p>{{ $discussion->created_at }}</p></div>
        </div>
        <div class="update-item-actions hidden">
          <button class="edit" type="button" name="button">Edit</button><button class="delete" type="button" name="button" disabled>Delete</button>
        </div>
      </div>
    </li>
    @endforeach
    {{ $discs->links() }}
  </ul>

</div>
@endsection
