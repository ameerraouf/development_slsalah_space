{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Chat GPT Laravel | Code with Ross</title>
  <link rel="icon" href="https://assets.edlin.app/favicon/favicon.ico"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- JavaScript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <!-- End JavaScript -->

  <!-- CSS -->
  <link rel="stylesheet" href="/style.css">
  <!-- End CSS -->

</head>

<body> --}}

@extends('layouts.primary')
@section('head')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="{{PUBLIC_DIR}}/css/gpt.css">
@endsection
@section('content')
<div class="chat">

  <!-- Header -->
  <div class="top">
    @if (Auth::user()->photo)
    <img src="{{PUBLIC_DIR}}/uploads/{{Auth::user()->photo}}"  style="width:80px" alt="Avatar">

    @else
    <img src="{{PUBLIC_DIR}}/img/useravatar.png" style="width:80px" alt="Avatar">

    @endif

    <div>
      <p>{{Auth::user()->first_name}}</p>
      <small>Online</small>
    </div>
  </div>
  <!-- End Header -->

  <!-- Chat -->
  <div class="messages">
    <div class="left message">
        <p>{{__('Hello')}} {{__('how can i help you')}}</p>
        <img src="{{PUBLIC_DIR}}/img/chatgpt-icon.png" alt="Avatar">
    </div>
  </div>
  <!-- End Chat -->

  <!-- Footer -->
  <div class="bottom">
    <form>
      <input type="text" id="message" name="message" placeholder="Enter message..." autocomplete="off">
      <button type="submit"></button>
    </form>
  </div>
  <!-- End Footer -->

</div>

@endsection

@section('script')
<script>
  //Broadcast messages
  $("form").submit(function (event) {
    event.preventDefault();

    //Stop empty messages
    if ($("form #message").val().trim() === '') {
      return;
    }

    //Disable form
    $("form #message").prop('disabled', true);
    $("form button").prop('disabled', true);

    $.ajax({
      url: "{{route('gpt-send-message')}}",
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': "{{csrf_token()}}"
      },
      data: {
        "model": "gpt-3.5-turbo",
        "content": $("form #message").val()
      }
    }).done(function (res) {

      //Populate sending message
      $(".messages > .message").last().after('<div class="right message">' +
        '<img src="{{PUBLIC_DIR}}/uploads/{{Auth::user()->photo}}" alt="Avatar">' +
        '<p>' + $("form #message").val() + '</p>' +
        '</div>');

      //Populate receiving message
      $(".messages > .message").last().after('<div class="left message">' +
        '<img src="{{PUBLIC_DIR}}/img/chatgpt-icon.png" alt="Avatar">' +
        '<p>' + res + '</p>' +
        '</div>');

      //Cleanup
      $("form #message").val('');
      $(document).scrollTop($(document).height());

      //Enable form
      $("form #message").prop('disabled', false);
      $("form button").prop('disabled', false);
    });
  });

</script>
@endsection
