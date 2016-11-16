<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body { background-color: #fff; color: #636b6f; font-family: 'Raleway', sans-serif; font-weight: 100; height: 100vh; margin: 0; }
            form { width: 320px; margin: 50px auto; }
            label { display: block; }
            input, select, textarea { width: 100%; margin-bottom: 10px; font-family: 'Raleway', sans-serif; font-weight: 800; font-size: 16px; }
            input { height: 50px; }
            .result { font-weight: 800; }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">

                    <form action="/form-result" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" />
                        </div>
                        <div class="form-group">
                            <label for="color">Color:</label>
                            <input type="text" name="color" id="color" />
                        </div>
                        <br/>
                        <div class="form-group">
                            <input type="submit" value="Send" />
                        </div>
                        <br/>
                        <div class="result"></div>
                    </form>

                </div>
            </div>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $('form:nth-child(1)').submit(function(e) {
                    e.preventDefault();
                    var _this = this;
                    $.post('/form-result', $(_this).serialize(), function(data) {
                        $('.result').text(data.result);
                    });
                });
            });
        </script>
    </body>
</html>
