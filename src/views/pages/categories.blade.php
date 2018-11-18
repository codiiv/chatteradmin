@extends('chatter::admin')
@section('page')

<div class="chatter-admin-{{ $page }}">
  <div class="cell nexus--1-2">
    <div class="left-inner">
      <form class="" action="/chatteradmin/categories" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="payload_source" value="{{ base64_encode(base64_encode(auth()->user()->email)) }}">
        <div class="form-row">
          <h3>Add a new Category</h3>
        </div>
        <div class="form-row">
          <label for="category_title" class="cell nexus--1-3">Title</label><input type="text" name="name" class="cell nexus--2-3" placeholder="Title" required value="">
        </div>
        <div class="form-row">
          <label for="category_title" class="cell nexus--1-3">Parent Category</label><div class="cell nexus--2-3">
            <select class="parent" name="parent">
            <option value=""> — — —  Choose One — — — </option>
            <?php
              $html = '';
              $html .= $common::kidsOptions($categories);
              echo $html;
             ?>
           </select>
          </div>
        </div>
        <div class="form-row">
          <label for="category_title" class="cell nexus--1-3">Choose a color</label><input class="jscolor" name="color" class="cell nexus--2-3" value="ab2567">
        </div>
        <div class="form-row">
          <button type="submit" name="addnew-cat"><i class="fa fa-plus"></i> Add New</button>
        </div>
      </form>
    </div>
  </div><div class="cell nexus--1-2">
    <ul class="items-list">
    <li class="items-head">
      <div class="list-inner">
        <div class="pure-g">
            <div class="cell hand--1-2 nexus--1-3"><p>CATEGORY ID</p></div><!--
            --><div class="cell hand--1-2 nexus--1-3"><p>Name</p></div><!--
            --><div class="cell hand--1-2 nexus--1-3"><p>Slug</p></div>
        </div>
      </div>
    </li>

    <?php
      $html = '';
      $html .= $common::kidsOptionsUl($categoriesul);
      echo $html;
      echo $categoriesul->links();
     ?>

  </ul>
  </div>
</div>

@endsection
