#!/bin/bash

# ==============================================
# PTERODACTYL ASTRONAUT THEME INSTALLER
# Version: 1.0.0
# Author: Aldi
# ==============================================

# Warna biar keren di terminal
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
PURPLE='\033[0;35m'
CYAN='\033[0;36m'
NC='\033[0m' # No Color

# Logo / Header
echo -e "${BLUE}"
echo '   █████╗ ███████╗████████╗██████╗  ██████╗ ███╗   ██╗ █████╗ ██╗   ██╗████████╗'
echo '  ██╔══██╗██╔════╝╚══██╔══╝██╔══██╗██╔═══██╗████╗  ██║██╔══██╗██║   ██║╚══██╔══╝'
echo '  ███████║███████╗   ██║   ██████╔╝██║   ██║██╔██╗ ██║███████║██║   ██║   ██║   '
echo '  ██╔══██║╚════██║   ██║   ██╔══██╗██║   ██║██║╚██╗██║██╔══██║██║   ██║   ██║   '
echo '  ██║  ██║███████║   ██║   ██║  ██║╚██████╔╝██║ ╚████║██║  ██║╚██████╔╝   ██║   '
echo '  ╚═╝  ╚═╝╚══════╝   ╚═╝   ╚═╝  ╚═╝ ╚═════╝ ╚═╝  ╚═══╝╚═╝  ╚═╝ ╚═════╝    ╚═╝   '
echo -e "${NC}"
echo -e "${CYAN}═══════════════════════════════════════════════════════════════════════════${NC}"
echo -e "${GREEN}           PTERODACTYL ASTRONAUT THEME INSTALLER v1.0.0${NC}"
echo -e "${CYAN}═══════════════════════════════════════════════════════════════════════════${NC}"
echo ""

# Cek root
echo -e "${YELLOW}[1/8]🔍 Memeriksa akses root...${NC}"
if [[ $EUID -ne 0 ]]; then
   echo -e "${RED}❌ Script ini harus dijalankan sebagai root (sudo)!${NC}" 
   exit 1
else
   echo -e "${GREEN}✅ Akses root terdeteksi${NC}"
fi
echo ""

# Cek direktori panel
echo -e "${YELLOW}[2/8]📁 Memeriksa direktori Pterodactyl...${NC}"
if [ -d "/var/www/pterodactyl" ]; then
    cd /var/www/pterodactyl
    echo -e "${GREEN}✅ Direktori panel ditemukan di /var/www/pterodactyl${NC}"
else
    echo -e "${RED}❌ Direktori panel tidak ditemukan di /var/www/pterodactyl${NC}"
    echo -e "${YELLOW}🔍 Mencari di lokasi lain...${NC}"
    
    # Coba cari di lokasi umum lainnya
    if [ -d "/home/container/pterodactyl" ]; then
        cd /home/container/pterodactyl
        echo -e "${GREEN}✅ Direktori panel ditemukan di /home/container/pterodactyl${NC}"
    elif [ -d "/var/www/html/pterodactyl" ]; then
        cd /var/www/html/pterodactyl
        echo -e "${GREEN}✅ Direktori panel ditemukan di /var/www/html/pterodactyl${NC}"
    else
        echo -e "${RED}❌ Tidak dapat menemukan direktori panel!${NC}"
        echo -e "${YELLOW}📝 Masukkan path manual (contoh: /var/www/pterodactyl):${NC}"
        read -p "Path: " custom_path
        if [ -d "$custom_path" ]; then
            cd "$custom_path"
            echo -e "${GREEN}✅ Menggunakan path: $custom_path${NC}"
        else
            echo -e "${RED}❌ Path tidak valid! Installasi dibatalkan.${NC}"
            exit 1
        fi
    fi
fi
echo ""

# Cek Blueprint
echo -e "${YELLOW}[3/8]🔧 Memeriksa Blueprint framework...${NC}"
if [ -f "blueprint.sh" ]; then
    echo -e "${GREEN}✅ Blueprint sudah terinstall${NC}"
else
    echo -e "${YELLOW}⚠️ Blueprint belum terinstall. Menginstall Blueprint...${NC}"
    curl -sS https://raw.githubusercontent.com/blueprint-framework/blueprint/main/install.sh | bash
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✅ Blueprint berhasil diinstall${NC}"
    else
        echo -e "${RED}❌ Gagal menginstall Blueprint${NC}"
        exit 1
    fi
fi
echo ""

# Backup file asli
echo -e "${YELLOW}[4/8]💾 Membackup file asli...${NC}"
timestamp=$(date +"%Y%m%d_%H%M%S")
backup_folder="backup_astronaut_$timestamp"
mkdir -p "$backup_folder"

# Backup file-file penting
if [ -f "resources/views/auth/login.blade.php" ]; then
    cp "resources/views/auth/login.blade.php" "$backup_folder/login.blade.php.bak"
    echo -e "${GREEN}✅ Backup login.blade.php${NC}"
fi

if [ -f "resources/views/templates/dashboard.blade.php" ]; then
    cp "resources/views/templates/dashboard.blade.php" "$backup_folder/dashboard.blade.php.bak"
    echo -e "${GREEN}✅ Backup dashboard.blade.php${NC}"
fi

if [ -f "public/custom.css" ]; then
    cp "public/custom.css" "$backup_folder/custom.css.bak"
    echo -e "${GREEN}✅ Backup custom.css${NC}"
fi

echo -e "${GREEN}✅ Backup selesai disimpan di folder: $backup_folder${NC}"
echo ""

# Tanya lokasi file tema
echo -e "${YELLOW}[5/8]📂 Menentukan lokasi file tema...${NC}"
echo -e "${CYAN}Pilih sumber file tema:${NC}"
echo "1) File sudah ada di server ini (manual upload)"
echo "2) Download dari GitHub (https://github.com/aldi-t/pterodactyl-astronaut-theme)"
read -p "Pilihan [1/2]: " source_choice

if [ "$source_choice" == "2" ]; then
    echo -e "${YELLOW}📥 Mendownload tema dari GitHub...${NC}"
    
    # Cek git
    if ! command -v git &> /dev/null; then
        echo -e "${YELLOW}📦 Git belum terinstall. Menginstall git...${NC}"
        apt-get update && apt-get install -y git
    fi
    
    # Clone repository
    rm -rf /tmp/astronaut-theme
    git clone https://github.com/aldi-theme/thema-astronomi.git /tmp/astronaut-theme
    
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✅ Berhasil download tema${NC}"
        theme_path="/tmp/astronaut-theme"
    else
        echo -e "${RED}❌ Gagal download dari GitHub${NC}"
        echo -e "${YELLOW}📝 Masukkan path manual file tema:${NC}"
        read -p "Path: " theme_path
    fi
else
    echo -e "${YELLOW}📝 Masukkan path folder tema (contoh: /root/astronaut-theme):${NC}"
    read -p "Path: " theme_path
fi

if [ ! -d "$theme_path" ]; then
    echo -e "${RED}❌ Folder tema tidak ditemukan di: $theme_path${NC}"
    exit 1
fi
echo ""

# Copy file CSS
echo -e "${YELLOW}[6/8]🎨 Memasang file CSS...${NC}"
if [ -f "$theme_path/custom.css" ]; then
    cp "$theme_path/custom.css" public/custom.css
    echo -e "${GREEN}✅ custom.css berhasil dipasang${NC}"
else
    echo -e "${RED}❌ File custom.css tidak ditemukan di folder tema${NC}"
fi
echo ""

# Copy file view
echo -e "${YELLOW}[7/8]📄 Memasang file view...${NC}"
if [ -f "$theme_path/login-page/login.blade.php" ]; then
    cp "$theme_path/login-page/login.blade.php" resources/views/auth/
    echo -e "${GREEN}✅ login.blade.php berhasil dipasang${NC}"
else
    echo -e "${YELLOW}⚠️ File login.blade.php tidak ditemukan, melewati...${NC}"
fi

if [ -f "$theme_path/dashboard/dashboard.blade.php" ]; then
    cp "$theme_path/dashboard/dashboard.blade.php" resources/views/templates/
    echo -e "${GREEN}✅ dashboard.blade.php berhasil dipasang${NC}"
else
    echo -e "${YELLOW}⚠️ File dashboard.blade.php tidak ditemukan, melewati...${NC}"
fi
echo ""

# Buat folder assets
echo -e "${YELLOW}[8/8]🖼️  Menyiapkan folder assets...${NC}"
mkdir -p public/assets/images

# Copy contoh gambar kalau ada
if [ -d "$theme_path/assets" ]; then
    cp -r "$theme_path/assets/"* public/assets/images/ 2>/dev/null
    echo -e "${GREEN}✅ File assets berhasil disalin${NC}"
else
    echo -e "${YELLOW}⚠️ Folder assets tidak ditemukan, buat manual nanti${NC}"
fi
echo ""

# Clear cache
echo -e "${YELLOW}🧹 Membersihkan cache...${NC}"
php artisan view:clear
php artisan config:clear
php artisan cache:clear
echo -e "${GREEN}✅ Cache dibersihkan${NC}"
echo ""

# Set permission
echo -e "${YELLOW}🔧 Mengatur permission...${NC}"
chown -R www-data:www-data public/assets/images 2>/dev/null
chmod -R 755 public/assets/images 2>/dev/null
echo -e "${GREEN}✅ Permission diatur${NC}"
echo ""

# Selesai
echo -e "${CYAN}═══════════════════════════════════════════════════════════════════════════${NC}"
echo -e "${GREEN}✅ INSTALLASI SELESAI! ✅${NC}"
echo -e "${CYAN}═══════════════════════════════════════════════════════════════════════════${NC}"
echo ""
echo -e "${YELLOW}📝 LANGKAH SELANJUTNYA:${NC}"
echo -e "${BLUE}1️⃣ Upload gambar astronot${NC}"
echo -e "   - Simpan di: ${GREEN}public/assets/images/astronot-icon.png${NC}"
echo -e "   - Simpan di: ${GREEN}public/assets/images/astronot-small.png${NC}"
echo ""
echo -e "${BLUE}2️⃣ Upload logo dan foto${NC}"
echo -e "   - Logo bulat: ${GREEN}public/assets/images/logo-bulat.png${NC}"
echo -e "   - Foto profil: ${GREEN}public/assets/images/foto-saya.jpg${NC}"
echo ""
echo -e "${BLUE}3️⃣ Ganti playlist musik (opsional)${NC}"
echo -e "   - Edit file: ${GREEN}resources/views/templates/dashboard.blade.php${NC}"
echo -e "   - Ganti link Spotify embed"
echo ""
echo -e "${BLUE}4️⃣ Refresh panel kamu!${NC}"
echo -e "   - Buka panel di browser"
echo -e "   - Nikmati tema astronotnya! 🚀"
echo ""
echo -e "${CYAN}═══════════════════════════════════════════════════════════════════════════${NC}"
echo -e "${GREEN}🎉 TERIMA KASIH TELAH MENGGUNAKAN ASTRONAUT THEME! 🎉${NC}"
echo -e "${CYAN}═══════════════════════════════════════════════════════════════════════════${NC}"
echo -e "${YELLOW}⭐ Jangan lupa kasih star di GitHub:${NC}"
echo -e "${BLUE}   https://github.com/aldi-t/pterodactyl-astronaut-theme${NC}"
echo ""
