<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Login | {{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}">
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
<br/><br/><br/><br/><br/><br/>
<div class="container">
    <section id="content">
         <div class="row mb-3">
        <div class="col-12 d-flex justify-content-center">
            <img width="200" src="{{ asset('images/logo-mobil.png') }}" alt="Logo">
        </div>
    </div>

    <p class="login-box-msg" style="color : red; font-weight: bold;">
            @if(Session::has('account_deactivated'))
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('account_deactivated') }}
                </div>
            @endif
     
    
         <form id="login" method="post" action="{{ url('/login') }}">
             @csrf
             <h1>Dealer App</h1>
            <div>
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}"
                                   placeholder="E-mail" />
                 @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <input id="password" type="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Password" name="password">
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <br><br>
        
            <div>
            <button id="submit" class="btn btn-sm btn-primary px-4 d-flex align-items-left" type="submit" > Log In
            </button>
            </div>
            <div class="col-8 text-right">
                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                    Forgot password?
                                </a>
            </div>    
        </form><!-- form -->
            <br><br>
           
    </section><!-- content -->
  
</div><!-- container -->

<div id="footer"  >
    <p style="text-align:center;">   
        <br><br><br><br><br><br><br><br><br><br>
        Direktorat Jenderal Perlindungan Konsumen dan Tertib Niaga, Kementerian Perdagangan Republik Indonesia Whatsapp Ditjen PKTN : 0853-1111-1010
        <br><!-- comment -->
        Customer Care (WA) : +6285141716955 
    </p>
</div>
</body>
</html>

<!-- CoreUI -->
<script src="{{ mix('js/app.js') }}" defer></script>
<script>
    let login = document.getElementById('login');
    let submit = document.getElementById('submit');
    let email = document.getElementById('email');
    let password = document.getElementById('password');
    let spinner = document.getElementById('spinner')

    login.addEventListener('submit', (e) => {
        submit.disabled = true;
        email.readonly = true;
        password.readonly = true;

        spinner.style.display = 'block';

        login.submit();
    });

    setTimeout(() => {
        submit.disabled = false;
        email.readonly = false;
        password.readonly = false;

        spinner.style.display = 'none';
    }, 3000);
</script>

</body>
</html>
