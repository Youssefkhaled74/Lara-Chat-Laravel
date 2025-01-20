<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MeChat</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            background-color: #1e1e1e;
            color: #d4d4d4;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding-top: 60px; /* Space for the fixed navbar */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #252526;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1000; /* Ensure it stays above other content */
        }

        nav .logo {
            font-size: 20px;
            font-weight: bold;
            color: #9cdcfe;
        }

        nav .status {
            display: flex;
            align-items: center;
            color: #d4d4d4;
        }

        nav .status span {
            margin-left: 8px;
            font-size: 14px;
        }

        #chat-box {
            background-color: #252526;
            width: 100%;
            max-width: 600px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
        }

        #messages {
            padding: 20px;
            flex: 1;
            overflow-y: auto;
            border-bottom: 1px solid #3c3c3c;
        }

        #messages div {
            margin-bottom: 12px;
        }

        #messages strong {
            font-weight: bold;
        }

        #messages .bot-message {
            background-color: #313131;
            border-left: 4px solid #dcdcaa;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            color: #d4d4d4;
        }

        #messages .user-message {
            background-color: #1e1e1e;
            border-left: 4px solid #007acc;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            color: #d4d4d4;
        }

        #message-input {
            flex: 1;
            padding: 14px;
            border: none;
            background-color: #2d2d2d;
            color: #d4d4d4;
            font-size: 16px;
            outline: none;
            border-radius: 0;
        }

        #send-button {
            width: 120px;
            padding: 14px;
            border: none;
            background-color: #007acc;
            color: #ffffff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            border-radius: 0;
            transition: background-color 0.3s ease;
        }

        #send-button:hover {
            background-color: #005a9e;
        }

        #send-button:active {
            background-color: #00497a;
        }

        #chat-box::-webkit-scrollbar,
        #messages::-webkit-scrollbar {
            width: 8px;
        }

        #chat-box::-webkit-scrollbar-thumb,
        #messages::-webkit-scrollbar-thumb {
            background-color: #4a4a4a;
            border-radius: 4px;
        }

        #chat-box::-webkit-scrollbar-thumb:hover,
        #messages::-webkit-scrollbar-thumb:hover {
            background-color: #555555;
        }

        /* Mobile Responsiveness */
        @media screen and (max-width: 768px) {
            #send-button {
                width: 100px;
                font-size: 14px;
                padding: 12px;
            }

            #message-input {
                font-size: 14px;
                padding: 12px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <div class="logo">MeChat</div>
        <div class="status">
            <span>&#x25CF;</span>
            <span>Online</span>
        </div>
    </nav>

    <div id="chat-box">
        <div id="messages"></div>
        <div style="display: flex; align-items: center;">
            <input type="text" id="message-input" placeholder="Type a message...">
            <button id="send-button">Send</button>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#send-button').click(function() {
                var message = $('#message-input').val();
                if (message.trim() === '') return;

                $.ajax({
                    url: '/send-message',
                    type: 'POST',
                    data: {
                        message: message,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        $('#messages').append('<div class="user-message"><strong>Me:</strong> ' + message + '</div>');
                        $('#messages').append('<div class="bot-message"><strong>Bot:</strong> ' + response.message + '</div>');
                        $('#message-input').val('');
                        $('#messages').scrollTop($('#messages')[0].scrollHeight);
                    }
                });
            });

            $('#message-input').keypress(function(event) {
                if (event.which === 13) {
                    $('#send-button').click();
                }
            });
        });
    </script>
</body>
</html>
