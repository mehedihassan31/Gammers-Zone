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

        <div class="card mt-4 mb-4">
            <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="col-lg-6">
                            <h3>Header Type</h3>
                            <code>Accept:application/json</code>
                            <p class="bg-light input-group"> <strong>GET | POST | </strong> https://(base-url)/api/</p>
                    </div>
                    <div class="col-lg-9">
                        <h4>
                            Demo
                        </h4>
                        <code>

                        </code>
                    </div>

                    </div>
            </div>
    </div>








        <div class="card">
                <div class="row mb-4">

                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <h3>Slider</h3>
                                <p class="bg-light input-group"><strong>GET | </strong> https://(base-url)/api/sliderdata</p>
                        </div>
                        <div class="col-lg-9">
                            <h4>
                                Demo
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
                            <div class="col-lg-6">
                                <h3>Register</h3>
                                <p class="bg-light input-group"> <strong>POST | </strong>https://(base-url)/api/register</p>
                        </div>
                        <div class="col-lg-9">
                            <h4>
                                Demo
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
                                <h5>
                                    fname,lname,username(unique),email(unique): all fields are required

                                </h5>
                        </div>

                        </div>
                </div>
        </div>
        <div class="card mt-4 mb-4">
                <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <h3>Log In</h3>
                                <p class="bg-light input-group"> <strong>POST | </strong>https://(base-url)/api/login</p>
                        </div>
                        <div class="col-lg-9">
                            <h4>
                                Demo
                            </h4>
                            <code>
                                {
                                    "user": {
                                        "id": 1,
                                        "fname": "mehedi",
                                        "lname": "hassan",
                                        "username": "mehedi",
                                        "email": "mehedi@admin.com",
                                        "phone": null,
                                        "balance": null,
                                        "winbalance": null,
                                        "Dpbalance": null,
                                        "reference": null,
                                        "email_verified_at": null,
                                        "created_at": "2021-12-03T12:59:58.000000Z",
                                        "updated_at": "2021-12-03T12:59:58.000000Z"
                                    },
                                    "token": "11|fpZv6No53YiIM0fb1ajfc4x3x4idFYrwMbMODNeB"
                                }
                            </code><br>
                                <h6>
                                   email:<br>
                                   password:

                                </h6>
                        </div>

                        </div>
                </div>
        </div>





        <div class="card mt-4 mb-4">
                <div class="row mb-4">
                        <div class="col-lg-12">
                            <div class="col-lg-6">
                                <h3>Products</h3>
                                <p class="bg-light input-group"> <strong>Get | </strong>https://(base-url)/api/products</p>
                        </div>
                        <div class="col-lg-9">
                            <h4>
                                Demo
                            </h4>
                            <code>
                                [
                                    {
                                        "id": 1,
                                        "p_name": "198 uC",
                                        "price": 320,
                                        "sale_price": 300,
                                        "photo": "#",
                                        "icon": "#",
                                        "category": "pubg Uc",
                                        "created_at": null,
                                        "updated_at": null
                                    }
                                ]
                            </code>
                        </div>

                        </div>
                </div>
        </div>






    </div>

</body>
</html>