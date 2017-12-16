
@extends('layout.master') @section('content')
<div class="widget ">
    <div class="widget-header">
        <i class="icon-book"></i>
        <h3>Perbualan</h3>
    </div>
    <section class="module">
        <ol class="discussion">
            @foreach($chats as $chat)
                @if($chat->sender_id !== auth()->user()->id)
                <li class="other">
                    <div class="avatar">
                        <img src="/avatars/los4PhNp8lYO8r99CIqEuyuZ6661oxGFK5gq7Lk3.jpeg" /> </div>
                    <div class="messages messages-other">
                        <p>{{ $chat->content }}</p>
                        <time datetime="">{{ $chat->created_at }}</time>
                    </div>
                </li>
                @else
                <li class="self">
                    <div class="avatar">
                        <img src="/avatars/los4PhNp8lYO8r99CIqEuyuZ6661oxGFK5gq7Lk3.jpeg" /> </div>
                    <div class="messages">
                        <p>{{ $chat->content }}</p>
                        <time datetime="">{{ $chat->created_at }}</time>
                    </div>
                </li>
                @endif
            @endforeach
        </ol>
        <div style="position: relative;">
        <div class="span12" style="margin-left: 0px;">
            <textarea name="message" id="messageBox" class="pull-left" style="border-top: 0px;border-top-left-radius: 0px;width: 100%;padding-right: 17px;box-sizing: border-box;" cols="30"></textarea>
            <button style="position: absolute;right: 0;height: 45px;width: 45px;border: 0;background: #00ba8b;" id="submitBtn"><i style="color: white;" class="icon-play"></i></button>
        </div>
        </div>
    </section>
</div>
@endsection 
@section('scripts')
<script>
    var discussion = $('.discussion');
    var submitBtn = $('#submitBtn');
    var messageBox = $('#messageBox');
    var userId = {{ auth()->user()->id }}

    console.log(userId);

    submitBtn.on('click', function () {
        checkIfChatIsValid();
    });

    function appendChat (chat) {

        if (userId !== chat.sender_id) {
            discussion.append(
                '<li class="self">'
                +   '<div class="avatar">'
                +       '<img src="/avatars/los4PhNp8lYO8r99CIqEuyuZ6661oxGFK5gq7Lk3.jpeg" />'
                +   '</div>'
                +   '<div class="messages">'
                +       '<p>' + chat +'</p>'
                +       '<time datetime="">' + chat.created_at + '</time>'
                +   '</div>'
                + '</li>'
            );
        }
        else {
            discussion.append(

                '<li class="other">'
                +   '<div class="avatar">'
                +       '<img src="/avatars/los4PhNp8lYO8r99CIqEuyuZ6661oxGFK5gq7Lk3.jpeg" />'
                +   '</div>'
                +   '<div class="messages messages-other">'
                +       '<p>' + chat +'</p>'
                +       '<time datetime="">' + chat.created_at + '</time>'
                +   '</div>'
                + '</li>'
            );
        }
    }

    function checkIfChatIsValid () {
        if (!messageBox.val()) return;
        
        $.post("/user/chat/create", {
            content: messageBox.val(),
            receiver_id: 1
        })
        .done(function (data) {
            appendChat(messageBox.val());
            messageBox.val('');
            discussion.scrollTop(discussion.height());
        })
        .fail(function (error) {
            console.log(error);
            messageBox.val('');
        });
    }

    function getChats () {
        $.get("/user/chat/with/admin")
        .done(function (data) {
            var chatsAppend = '';
            for (var i = 0; i < data.length; i++) {

                if (userId === data[i].sender_id) {
                    chatsAppend += 
                        '<li class="self">'
                        +   '<div class="avatar">'
                        +       '<img src="/avatars/los4PhNp8lYO8r99CIqEuyuZ6661oxGFK5gq7Lk3.jpeg" />'
                        +   '</div>'
                        +   '<div class="messages messages-other">'
                        +       '<p>' + data[i].content +'</p>'
                        +       '<time datetime="2009-11-13T20:00">' + data[i].created_at + '</time>'
                        +   '</div>'
                        + '</li>';
                }
                else {
                chatsAppend +=
                        '<li class="other">'
                        +   '<div class="avatar">'
                        +       '<img src="/avatars/los4PhNp8lYO8r99CIqEuyuZ6661oxGFK5gq7Lk3.jpeg" />'
                        +   '</div>'
                        +   '<div class="messages messages-other">'
                        +       '<p>' + data[i].content +'</p>'
                        +       '<time datetime="">' + data[i].created_at + '</time>'
                        +   '</div>'
                        + '</li>'
                }

            }
            discussion.html(chatsAppend);
            discussion.scrollTop(discussion.height())
        })
        .fail(function (error) {
            console.log(error);
        });
    }

    setInterval (function(){
        getChats()
    }, 4000);
</script>
@endsection
@section('styles')
<link href="/css/chat.css" rel="stylesheet">
@endsection