<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="{{asset('assets/admin/css/bootstrap.min.css')}}">
    <title> Api Document</title>
</head>
<body>

    <div class="container-fluid">

        <nav class="navbar navbar-light bg-dark ">
            <div class="container">
                <a class="navbar-brand text-light" href="#">Gammers-Zone</a>
            
            </div>

          </nav>
    </div>

    <div class="container mt-5">
        <div class="card">
                <div class="row mb-4">

                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <h3>Slider</h3>
                                <p class="bg-light input-group">https://(base-url)/api/sliderdata</p>
                        </div>
                        <div class="col-lg-9">
                            <h4>
                                demo
                            </h4>
                            <code>
                            [
                                {
                                    "id": 2,
                                    "photo": "http://127.0.0.1:8000/storage/c0s4FTILi2rNA5Hk5e43i6VOdV3E7FoZwvCrNDkv.png",
                                    "link": "dftgjgf",
                                    "title": "dhzfbfg"
                                }, 
                            </code><br>
                                <code>
                                {
                                    "id": 8,
                                    "photo": "http://127.0.0.1:8000/storage/jsSh9ScAJRFdHCt7RNrIFzmJG3mqAVZfsK8d2mic.jpg",
                                    "link": "xgfjf",
                                    "title": "dgfhfg"
                                }
                            ]
                        </code>

                        </div>

                        </div>

                </div>
        </div>
        <div class="card mt-4 mb-4">
                <div class="row mb-4">

                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <h3>Register</h3>
                                <p class="bg-light input-group">https://(base-url)/api/register</p>
                        </div>
                        <div class="col-lg-9">
                            <h4>
                                demo
                            </h4>
                            <code>
                                {
                                    "user": {
                                        "fname": "mehedi",
                                        "lname": "hassan",
                                        "username": "mehedi",
                                        "email": "mehedi@admin.com",
                                        "updated_at": "2021-12-03T12:59:58.000000Z",
                                        "created_at": "2021-12-03T12:59:58.000000Z",
                                        "id": 1
                                    },
                                    "token": "1|6jlPBKvC09qHM56z2TaYJLs9fyf1oKMousqPE06G"
                                }
                            </code><br>
                                <code>
                                    fname,lname,username(unique),email(unique): all fields are requred

                                </code>

                        </div>

                        </div>

                </div>
        </div>




    </div>


    
</body>
</html>