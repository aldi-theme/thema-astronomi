@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <!-- LOGO BULAT DI ATAS FORM -->
                <div style="text-align: center; margin-top: 30px; margin-bottom: 20px;">
                    <img src="/assets/images/logo-bulat.png" 
                         alt="Logo Astronaut" 
                         style="width: 120px; height: 120px; border-radius: 50%; object-fit: cover; border: 4px solid #2b5f8a; box-shadow: 0 0 30px rgba(43, 95, 138, 0.8); animation: pulseGlow 3s infinite alternate;">
                </div>
                
                <div class="panel-heading" style="text-align: center; background: transparent; border: none; color: #e8f0fe; font-size: 28px; font-weight: bold; text-shadow: 0 0 10px #2b5f8a; margin-bottom: 15px;">
                    {{ config('app.name', 'Pterodactyl') }}
                </div>

                <div class="panel-body" style="background: rgba(10, 20, 40, 0.6); border-radius: 10px; padding: 25px; backdrop-filter: blur(5px);">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label" style="color: #b0c4de;">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus style="background: rgba(10, 20, 40, 0.8); border: 1px solid #2b5f8a; color: white; border-radius: 5px;">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label" style="color: #b0c4de;">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required style="background: rgba(10, 20, 40, 0.8); border: 1px solid #2b5f8a; color: white; border-radius: 5px;">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label style="color: #b0c4de;">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" style="background: #1a3a5f; border: 1px solid #2b5f8a; padding: 10px 25px; font-weight: bold; transition: all 0.3s ease;">
                                    🚀 Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}" style="color: #7ab0e6;">
                                    Forgot Password?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
                
                <!-- Footer kecil -->
                <div style="text-align: center; margin-top: 20px; color: #6c8db0; font-size: 12px;">
                    ✨ Astronaut Theme by Aldi ✨
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FOTO PROFIL DI POJOK KANAN BAWAH -->
<div style="position: fixed; bottom: 20px; right: 20px; z-index: 9999; text-align: center;">
    <img src="/assets/images/foto-saya.jpg" 
         alt="Owner" 
         style="width: 70px; height: 70px; border-radius: 50%; object-fit: cover; border: 3px solid #2b5f8a; box-shadow: 0 0 20px rgba(43, 95, 138, 0.7); transition: transform 0.3s ease;"
         onmouseover="this.style.transform='scale(1.1)'"
         onmouseout="this.style.transform='scale(1)'">
    <div style="color: #e8f0fe; font-size: 14px; margin-top: 8px; font-weight: bold; text-shadow: 0 0 5px black;">
        👨‍🚀 Aldi
    </div>
    <div style="color: #b0c4de; font-size: 11px;">
        Space Commander
    </div>
</div>

<!-- EFEK ASTRONOT TERBANG -->
<div class="astronot-flying"></div>

<!-- BINTANG JATUH (3 buah) -->
<div class="shooting-star" style="animation-delay: 1s;"></div>
<div class="shooting-star" style="top: 40%; animation-delay: 4s;"></div>
<div class="shooting-star" style="top: 70%; animation-delay: 7s;"></div>

<!-- BULAN SABIT -->
<div class="moon-crescent"></div>

<!-- PLANET SATURNUS -->
<div class="planet-ring"></div>

<!-- NEBULA (KABUT ANGKASA) -->
<div class="nebula-cloud"></div>

<!-- UFO TERBANG (2 buah) -->
<div class="ufo-flying" style="animation-delay: 2s;"></div>
<div class="ufo-flying" style="bottom: 50%; animation-delay: 6s;"></div>

<!-- BINTANG BERGERAK -->
<div class="stars-moving"></div>

<!-- ASTRONOT DUDUK DI POJOK -->
<div class="astronot-corner"></div>

<!-- TAMBAHAN: METEOR JAUH (opsional) -->
<div style="position: fixed; top: 10%; right: 10%; width: 30px; height: 30px; background: rgba(160, 120, 80, 0.3); border-radius: 50%; filter: blur(8px); animation: meteorDrift 20s linear infinite; z-index: 9990;"></div>

@push('styles')
<style>
    /* Animasi tambahan */
    @keyframes pulseGlow {
        0% { box-shadow: 0 0 20px rgba(43, 95, 138, 0.5); }
        100% { box-shadow: 0 0 40px rgba(43, 95, 138, 0.9); }
    }
    
    @keyframes meteorDrift {
        0% { transform: translate(0, 0) rotate(0deg); opacity: 0; }
        10% { opacity: 0.5; }
        30% { transform: translate(-200px, 200px) rotate(45deg); opacity: 0; }
        100% { opacity: 0; }
    }
    
    /* Efek hover untuk form */
    .form-control:hover {
        border-color: #3a7bb5 !important;
        box-shadow: 0 0 15px rgba(58, 123, 181, 0.5) !important;
    }
    
    /* Styling panel biar transparan */
    .panel {
        background: rgba(10, 20, 40, 0.4) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(43, 95, 138, 0.3) !important;
        border-radius: 15px !important;
    }
</style>
@endpush
@endsection
