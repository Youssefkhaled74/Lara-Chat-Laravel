<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lara - Developer Assistant</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        /* General Styles */
        body {
            background-color: #0a0a0a;
            color: #e0e0e0;
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding-top: 70px; /* Space for the fixed navbar */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        /* Navbar */
        nav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background: linear-gradient(90deg, #1a1a1a, #2a2a2a);
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }

        nav .logo {
            font-size: 22px;
            font-weight: 700;
            color: #4dabf7;
        }

        /* Chat Header */
        #chat-header {
            text-align: center;
            margin-bottom: 20px;
        }

        #chat-header h1 {
            font-size: 28px;
            font-weight: 700;
            color: #4dabf7;
            margin: 0;
        }

        #chat-header p {
            font-size: 16px;
            color: #a0a0a0;
            margin: 5px 0 0;
        }

        /* Online Status */
        #online-status {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
            font-size: 14px;
            color: #4caf50;
        }

        #online-status .dot {
            width: 10px;
            height: 10px;
            background-color: #4caf50;
            border-radius: 50%;
            margin-right: 8px;
        }

        /* Chat Box */
        #chat-box {
            background-color: #1e1e1e;
            width: 100%;
            max-width: 700px;
            height: 65vh;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-direction: column;
        }

        /* Messages Section */
        #messages {
            padding: 20px;
            flex: 1;
            overflow-y: auto;
            border-bottom: 1px solid #3c3c3c;
        }

        #messages div {
            margin-bottom: 15px;
            padding: 12px;
            border-radius: 8px;
            animation: fadeIn 0.3s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        #messages strong {
            font-weight: 600;
            color: #4dabf7;
        }

        #messages .bot-message {
            background-color: #2a2a2a;
            border-left: 4px solid #4dabf7;
            color: #e0e0e0;
        }

        #messages .user-message {
            background-color: #1a1a1a;
            border-left: 4px solid #4caf50;
            color: #e0e0e0;
        }

        /* Input Section */
        #input-section {
            display: flex;
            align-items: center;
            background-color: #252526;
            padding: 10px;
        }

        #message-input {
            flex: 1;
            padding: 14px;
            border: none;
            background-color: #2d2d2d;
            color: #e0e0e0;
            font-size: 16px;
            outline: none;
            border-radius: 8px;
            margin-right: 10px;
            transition: background-color 0.3s ease;
        }

        #message-input:focus {
            background-color: #3c3c3c;
        }

        #send-button {
            width: 120px;
            padding: 14px;
            border: none;
            background: linear-gradient(90deg, #4dabf7, #2196f3);
            color: #ffffff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 8px;
            transition: transform 0.2s ease, background 0.3s ease;
        }

        #send-button:hover {
            background: linear-gradient(90deg, #2196f3, #4dabf7);
            transform: scale(1.05);
        }

        #send-button:active {
            transform: scale(0.95);
        }

        /* Scrollbar */
        #messages::-webkit-scrollbar {
            width: 8px;
        }

        #messages::-webkit-scrollbar-thumb {
            background-color: #4dabf7;
            border-radius: 4px;
        }

        #messages::-webkit-scrollbar-thumb:hover {
            background-color: #2196f3;
        }

        /* Mobile Responsiveness */
        @media screen and (max-width: 768px) {
            #chat-box {
                height: 90vh;
                border-radius: 0;
            }

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
        <div class="logo">Lara</div>
    </nav>

    <!-- Chat Header -->
    <div id="chat-header">
        <h1>Lara</h1>
        <p>Your AI-powered assistant for all things technology and development.</p>
        <!-- Online Status -->
        <div id="online-status">
            <div class="dot"></div>
            <span>Online</span>
        </div>
    </div>

    <!-- Chat Box -->
    <div id="chat-box">
        <div id="messages"></div>
        <div id="input-section">
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
                        $('#messages').append('<div class="bot-message"><strong>Lara:</strong> ' + response.message + '</div>');
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