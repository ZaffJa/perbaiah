<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="/js/dropzone.js"></script>


    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .padding-20 {
            padding: 20px;
        }

        .dropzone {
            min-height: 150px;
            border: 2px solid rgba(0, 0, 0, 0.3);
            background: white;
            padding: 20px 20px;
        }

        .dropzone.dz-clickable {
            cursor: pointer;
        }
        /* Hide all the .dz-preview */

        .dropzone .dz-preview {
            display: none;
        }
        /* Display only the first .dz-preview */

        .dropzone .dz-default+.dz-preview {
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
        <div class="top-right links">
            @auth
            <a href="{{ url('/home') }}">Home</a>
            @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel
            </div>

            <div style="padding-20">
                <form method="get" class="dropzone" id="profile-dropzone"></form>
            </div>

        </div>
    </div>

    <script>
        var removingFiles = false;
        Dropzone.options.profileDropzone = {
            maxFiles: 1,
            addRemoveLinks: true, // Without this you would need to refresh the page each time you want to upload another file
            dictDefaultMessage: '<strong>Drop a file here</strong><br /><small class="muted">From your computer</small>',
            dictRemoveFile: 'Remove file',
            method: 'get', // Trick to use on Codepen
            url: '?', // Trick to use on Codepen
            init: function () {
                this.on('removedfile', function () {
                    // Remove all the files when clicking on "Remove file"
                    if (!removingFiles) {
                        removingFiles = true;
                        this.removeAllFiles();
                    } else if (!this.files.length) {
                        removingFiles = false;
                    }
                });
            }
        };
    </script>

</body>

</html>