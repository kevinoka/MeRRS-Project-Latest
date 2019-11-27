<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 150;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 40px;
                color: black;
            }

            .textBoxLog1 {
                align-content: center;
                text-align: center;
                margin-top: 50px;
                border: 10pt;
            }

            .textBoxLog2 {
                align-content: center;
                text-align: center;
                margin-top: 15px;
                margin-right: 26px;
                border: 10pt;
            }

            .loginButton {
                color: blue;
                align-content: center;
                text-align: center;
                margin-top: 25px;
                border: 10pt;
            }

            /* .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            } */

            .m-b-md {
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body>
            <div class="content">
                <div class="title m-b-md">
                    <div>
                      <img src="/img/LOGO-IDXSTI - Final.png" alt="" width="15%">
                    </div>
                    Meeting Room Reservation System
                </div>
            </div>
            <div class="textBoxLog1">
              <div class="txtbx-style">
              Name &nbsp;
                <textarea name="name" rows="1" cols="30"></textarea>
                <form name="email"></form>
              </div>
              <div class="textBoxLog2">
                <div class="txtbx-style">
                  Password &nbsp;
                  <textarea name="password" rows="1" cols="30"></textarea>

                </div>
            </div>
            <div class="loginButton">
              <div class="btn-style">
                <button type="button" name="Login">
                  Login
                </button>
              </div>
            </div>
        </div>
    </body>
</html>
