var username;
$(document).ready(function()
{
    username = $('#username').html();
    pullData();
    $(document).keyup(function(e)
    {
        if(e.keyCode == 13)
            sendMessage();
        else
            isTyping();
    });
 });
function openForm() {
    document.getElementById("myForm").style.display = "block";
}

function closeForm() {
    document.getElementById("myForm").style.display = "none";
}
function pullData()
{
    retrieveConversationMessages();
    retrieveTypingStatus();
    setTimeout(pullData, 3000);
}

function retrieveConversationMessages()
{
    $.post('http://localhost:8000/conversation/retrieveConversationMessages', {username: username}, function (data)
    {
        if(data.length > 0)
            $('#chat-window').append('<br><div>'+data+'</div><br>');
    });
}

function retrieveTypingStatus()
{
    $.post('http://localhost:8000/conversation/retrieveTypingStatus', {username: username}, function (username)
    {
        if(username.length > 0)
            $('#typingStatus').html(username+' is typing');
        else
            $('#typingStatus').html('');
    })
}

function sendMessage() {
    var msg = $('#msg').val();
    if(msg.length > 0)
    {
        $.post('http://localhost:8000/conversation/sendMessage', {msg: msg, username: username}, function () {
            $('#chat-window').append('<br><div style="text-align: right; color: #fff; background-color: #0c203a">'+msg+'</div>');
            $('#msg').val('');
            notTyping();
        })
    }
}

function isTyping()
{
    $.post('http://localhost:8000/conversation/isTyping', {username: username});
}

function notTyping()
{
    $.post('http://localhost:8000/conversation/notTyping', {username: username});
}