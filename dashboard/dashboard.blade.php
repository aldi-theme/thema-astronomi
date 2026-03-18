@extends('layouts.admin')

@section('content')
<div class="container">
    <!-- Konten dashboard asli Pterodactyl akan muncul di sini -->
    @yield('main-content')
</div>

<!-- MUSIK PLAYER SPOTIFY -->
<div style="position: fixed; bottom: 20px; left: 20px; z-index: 9999; background: rgba(10, 20, 40, 0.85); backdrop-filter: blur(8px); border-radius: 40px; padding: 8px 15px; border: 1px solid #2b5f8a; box-shadow: 0 0 25px rgba(43, 95, 138, 0.6); transition: all 0.3s ease;"
     onmouseover="this.style.transform='scale(1.05)'"
     onmouseout="this.style.transform='scale(1)'">
    
    <!-- Judul kecil -->
    <div style="color: #b0c4de; font-size: 10px; margin-bottom: 3px; padding-left: 5px;">
        🎵 SPACE RADIO
    </div>
    
    <!-- Embed Spotify -->
    <iframe src="https://open.spotify.com/embed/playlist/37i9dQZF1DX4WYpdgoIcn6?utm_source=generator&theme=0" 
            width="250" 
            height="70" 
            frameborder="0" 
            allowtransparency="true" 
            allow="encrypted-media"
            style="border-radius: 30px;">
    </iframe>
    
    <!-- Volume indicator (opsional) -->
    <div style="display: flex; gap: 3px; justify-content: center; margin-top: 3px;">
        <div style="width: 3px; height: 8px; background: #2b5f8a; border-radius: 2px; animation: soundWave 1s ease-in-out infinite;"></div>
        <div style="width: 3px; height: 12px; background: #3a7bb5; border-radius: 2px; animation: soundWave 1s ease-in-out infinite 0.2s;"></div>
        <div style="width: 3px; height: 10px; background: #2b5f8a; border-radius: 2px; animation: soundWave 1s ease-in-out infinite 0.4s;"></div>
        <div style="width: 3px; height: 14px; background: #3a7bb5; border-radius: 2px; animation: soundWave 1s ease-in-out infinite 0.1s;"></div>
        <div style="width: 3px; height: 8px; background: #2b5f8a; border-radius: 2px; animation: soundWave 1s ease-in-out infinite 0.3s;"></div>
    </div>
</div>

<!-- FOTO PROFIL DI POJOK KANAN BAWAH -->
<div style="position: fixed; bottom: 20px; right: 20px; z-index: 9999; text-align: center;">
    <div style="position: relative; display: inline-block;">
        <!-- Badge online -->
        <div style="position: absolute; top: 0; right: 0; width: 15px; height: 15px; background: #4caf50; border-radius: 50%; border: 2px solid #0a1424; z-index: 10001;"></div>
        
        <!-- Foto profil -->
        <img src="/assets/images/foto-saya.jpg" 
             alt="Owner" 
             style="width: 65px; height: 65px; border-radius: 50%; object-fit: cover; border: 3px solid #2b5f8a; box-shadow: 0 0 25px rgba(43, 95, 138, 0.8); transition: transform 0.3s ease; cursor: pointer;"
             onmouseover="this.style.transform='scale(1.1) rotate(5deg)'"
             onmouseout="this.style.transform='scale(1) rotate(0)'">
    </div>
    
    <!-- Nama dan role -->
    <div style="color: #e8f0fe; font-size: 14px; margin-top: 8px; font-weight: bold; text-shadow: 0 0 8px black;">
        👨‍🚀 Aldi
    </div>
    <div style="color: #7ab0e6; font-size: 11px; background: rgba(10, 20, 40, 0.7); padding: 3px 12px; border-radius: 20px; margin-top: 3px; border: 1px solid #2b5f8a; backdrop-filter: blur(4px);">
        ⚡ Astronaut Admin
    </div>
</div>

<!-- QUICK STATS (INFO CEPAT) - OPSIONAL -->
<div style="position: fixed; top: 80px; right: 20px; z-index: 9998; background: rgba(10, 20, 40, 0.7); backdrop-filter: blur(5px); border-radius: 15px; padding: 12px; border: 1px solid #2b5f8a; box-shadow: 0 0 20px rgba(0,0,0,0.5); min-width: 180px;">
    <div style="color: #b0c4de; font-size: 12px; margin-bottom: 8px; border-bottom: 1px solid #2b5f8a; padding-bottom: 5px;">
        📊 SPACE STATION STATUS
    </div>
    
    <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
        <span style="color: #b0c4de;">Server Aktif:</span>
        <span style="color: #4caf50; font-weight: bold;">3</span>
    </div>
    
    <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
        <span style="color: #b0c4de;">Total RAM:</span>
        <span style="color: #7ab0e6;">8.5/16 GB</span>
    </div>
    
    <div style="display: flex; justify-content: space-between; margin-bottom: 5px;">
        <span style="color: #b0c4de;">CPU Usage:</span>
        <span style="color: #ffa500;">42%</span>
    </div>
    
    <div style="display: flex; justify-content: space-between;">
        <span style="color: #b0c4de;">Uptime:</span>
        <span style="color: #7ab0e6;">12d 8h</span>
    </div>
</div>

<!-- =================================== -->
<!-- EFEK ASTRONOT (SESUAI CSS)          -->
<!-- =================================== -->

<!-- Astronot Terbang Besar -->
<div class="astronot-flying"></div>

<!-- Bintang Jatuh (3 buah) -->
<div class="shooting-star" style="animation-delay: 1s;"></div>
<div class="shooting-star" style="top: 40%; animation-delay: 4s;"></div>
<div class="shooting-star" style="top: 70%; animation-delay: 7s;"></div>

<!-- Bulan Sabit -->
<div class="moon-crescent"></div>

<!-- Planet Saturnus -->
<div class="planet-ring"></div>

<!-- Nebula (Kabut Angkasa) -->
<div class="nebula-cloud"></div>

<!-- UFO Terbang (2 buah) -->
<div class="ufo-flying" style="animation-delay: 2s;"></div>
<div class="ufo-flying" style="bottom: 50%; animation-delay: 6s;"></div>

<!-- Bintang Bergerak (Warp Effect) -->
<div class="stars-moving"></div>

<!-- Astronot Kecil di Corner -->
<div class="astronot-corner"></div>

<!-- METEOR JAUH -->
<div style="position: fixed; top: 20%; right: 5%; width: 40px; height: 40px; background: radial-gradient(circle, #8b6b4d, #4a3a2a); border-radius: 50%; filter: blur(10px); opacity: 0.3; animation: meteorDrift 25s linear infinite; z-index: 9990;"></div>

<!-- SATELIT (opsional) -->
<div style="position: fixed; top: 15%; left: 5%; width: 20px; height: 20px; background: #c0c0c0; border-radius: 50%; box-shadow: -5px 0 0 #808080, 5px 0 0 #808080; filter: blur(1px); opacity: 0.4; animation: satelitOrbit 30s linear infinite; z-index: 9990;"></div>

<!-- TOOLTIP INFORMASI (muncul saat hover foto) -->
<div id="tooltip" style="position: fixed; bottom: 100px; right: 100px; background: rgba(10, 20, 40, 0.95); color: white; padding: 10px; border-radius: 10px; border: 1px solid #2b5f8a; display: none; z-index: 10002; backdrop-filter: blur(5px);">
    <div style="font-weight: bold;">📡 Astronaut Admin</div>
    <div style="font-size: 12px; color: #b0c4de;">Online sejak 08:00</div>
    <div style="font-size: 11px; margin-top: 5px;">🔧 Manage Server</div>
</div>

@endsection

@push('styles')
<style>
    /* Animasi tambahan untuk dashboard */
    @keyframes meteorDrift {
        0% { transform: translate(0, 0) rotate(0deg); opacity: 0; }
        10% { opacity: 0.3; }
        30% { transform: translate(-300px, 300px) rotate(45deg); opacity: 0; }
        100% { opacity: 0; }
    }
    
    @keyframes satelitOrbit {
        0% { transform: translateX(0) translateY(0) rotate(0deg); }
        25% { transform: translateX(50px) translateY(-20px) rotate(90deg); }
        50% { transform: translateX(100px) translateY(0) rotate(180deg); }
        75% { transform: translateX(50px) translateY(20px) rotate(270deg); }
        100% { transform: translateX(0) translateY(0) rotate(360deg); }
    }
    
    @keyframes soundWave {
        0%, 100% { height: 8px; }
        50% { height: 15px; }
    }
    
    /* Efek hover untuk card server (biar lebih hidup) */
    .card:hover, .server-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(43, 95, 138, 0.4) !important;
        transition: all 0.3s ease;
    }
    
    /* Welcome message */
    .welcome-message {
        background: linear-gradient(90deg, transparent, rgba(43, 95, 138, 0.2), transparent);
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 20px;
    }
</style>
@endpush

@push('scripts')
<script>
    // Tooltip sederhana (opsional)
    document.addEventListener('DOMContentLoaded', function() {
        const foto = document.querySelector('img[alt="Owner"]');
        const tooltip = document.getElementById('tooltip');
        
        if (foto && tooltip) {
            foto.addEventListener('mouseenter', function(e) {
                tooltip.style.display = 'block';
            });
            
            foto.addEventListener('mouseleave', function() {
                tooltip.style.display = 'none';
            });
            
            foto.addEventListener('mousemove', function(e) {
                tooltip.style.left = (e.clientX - 150) + 'px';
                tooltip.style.top = (e.clientY - 80) + 'px';
            });
        }
    });
</script>
@endpush
