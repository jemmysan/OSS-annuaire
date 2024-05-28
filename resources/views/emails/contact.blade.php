@extends('layouts.admin')

@section('title')
    Nous joindre
@endsection
@section('content')
    <style>
        .section-title {
            margin: 15px;
            text-align: center;
            padding-bottom: 30px;
        }

        .section-title h2 {
            font-size: 32px;
            font-weight: bold;
            text-transform: uppercase;
            padding-bottom: 20px;
            position: relative;
            color: #37517e;
        }

        .section-title h2::before {
            content: '';
            position: absolute;
            display: block;
            width: 120px;
            height: 1px;
            background: #ddd;
            bottom: 1px;
            left: calc(50% - 60px);
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            display: block;
            width: 40px;
            height: 3px;
            background: #47b2e4;
            bottom: 0;
            left: calc(50% - 20px);
        }

        /*--------------------------------------------------------------
        # Contact
        --------------------------------------------------------------*/
        .contact .info {
            border-top: 3px solid #47b2e4;
            border-bottom: 3px solid #47b2e4;
            padding: 30px;
            background: #fff;
            width: 100%;
            box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.1);
        }

        .contact .info i {
            font-size: 20px;
            color: #47b2e4;
            float: left;
            width: 44px;
            height: 44px;
            background: #e7f5fb;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50px;
            transition: all 0.3s ease-in-out;
        }

        .contact .info h4 {
            padding: 0 0 0 60px;
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 5px;
            color: #37517e;
        }

        .contact .info p {
            padding: 0 0 10px 60px;
            margin-bottom: 20px;
            font-size: 14px;
            color: #6182ba;
        }

        .contact .info .email p {
            padding-top: 5px;
        }

        .contact .info .social-links {
            padding-left: 60px;
        }

        .contact .info .social-links a {
            font-size: 18px;
            display: inline-block;
            background: #333;
            color: #fff;
            line-height: 1;
            padding: 8px 0;
            border-radius: 50%;
            text-align: center;
            width: 36px;
            height: 36px;
            transition: 0.3s;
            margin-right: 10px;
        }

        .contact .info .social-links a:hover {
            background: #47b2e4;
            color: #fff;
        }

        .contact .info .email:hover i, .contact .info .address:hover i, .contact .info .phone:hover i {
            background: #47b2e4;
            color: #fff;
        }

        .contact .php-email-form {
            width: 100%;
            border-top: 3px solid #47b2e4;
            border-bottom: 3px solid #47b2e4;
            padding: 30px;
            background: #fff;
            box-shadow: 0 0 24px 0 rgba(0, 0, 0, 0.12);
        }

        .contact .php-email-form .form-group {
            padding-bottom: 8px;
        }

        .contact .php-email-form .validate {
            display: none;
            color: red;
            margin: 0 0 15px 0;
            font-weight: 400;
            font-size: 13px;
        }

        .contact .php-email-form .error-message {
            display: none;
            color: #fff;
            background: #ed3c0d;
            text-align: left;
            padding: 15px;
            font-weight: 600;
        }

        .contact .php-email-form .error-message br + br {
            margin-top: 25px;
        }

        .contact .php-email-form .sent-message {
            display: none;
            color: #fff;
            background: #18d26e;
            text-align: center;
            padding: 15px;
            font-weight: 600;
        }

        .contact .php-email-form .loading {
            display: none;
            background: #fff;
            text-align: center;
            padding: 15px;
        }

        .contact .php-email-form .loading:before {
            content: "";
            display: inline-block;
            border-radius: 50%;
            width: 24px;
            height: 24px;
            margin: 0 10px -6px 0;
            border: 3px solid #18d26e;
            border-top-color: #eee;
            -webkit-animation: animate-loading 1s linear infinite;
            animation: animate-loading 1s linear infinite;
        }

        .contact .php-email-form .form-group {
            margin-bottom: 20px;
        }

        .contact .php-email-form label {
            padding-bottom: 8px;
        }

        .contact .php-email-form input, .contact .php-email-form textarea {
            border-radius: 0;
            box-shadow: none;
            font-size: 14px;
            border-radius: 4px;
        }

        .contact .php-email-form input:focus, .contact .php-email-form textarea:focus {
            border-color: #47b2e4;
        }

        .contact .php-email-form input {
            height: 44px;
        }

        .contact .php-email-form textarea {
            padding: 10px 12px;
        }

        .contact .php-email-form button[type="submit"] {
            background: #47b2e4;
            border: 0;
            padding: 12px 34px;
            color: #fff;
            transition: 0.4s;
            border-radius: 50px;
        }

        .contact .php-email-form button[type="submit"]:hover {
            background: #209dd8;
        }
    </style>
    <div class="section-title" >
         <h2>Contact</h2>
        </div>
    <div class="card" >
        <div class="card-body row" >
            <div class="col-5 text-center d-flex align-items-center justify-content-center" >
                    <div class="col-5 d-flex align-items-stretch">
                        <div class="info" >
                            <div class="address">
                                <i class="bi bi-geo-alt " style="color: deepskyblue;"></i>
                                <h4>Location:</h4>
                                <p>Siège social,VDN, BP 64 Dakar/Sénégal</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope" style="color: deepskyblue;"></i>
                                <h4>Email:</h4>
                                <p>servicepresse.startup@orange-sonatel.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone" style="color: deepskyblue;"></i>
                                <h4>Call:</h4>
                                <p>+221 33 839 12 00</p>
                            </div>
                        </div>
                    </div>
            </div>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                <div class="container">
                    <form action="{{ route('send.email') }}" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Nom:</label>
                                <input type="text" name="name" class="form-control" placeholder="Entrer votre nom">
                                @error('name')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror

                            </div>
                            <div class="form-group col-md-6">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Entrer l'email destinataire">
                                @error('email')
                                <span class="text-danger"> {{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Objet:</label>
                            <input type="text" name="subject" class="form-control" placeholder="Objet du mail">
                            @error('subject')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <strong>Message:</strong>
                            <textarea name="messages" rows="5" class="form-control" placeholder="Message"></textarea>
                            @error('messages')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-success save-data">Envoyer</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
