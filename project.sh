#!/bin/bash

# Pengaturan Proyek
# Nilai-nilai ini dapat diubah oleh pengguna untuk memenuhi kebutuhan proyek mereka
declare -A project_configs
project_configs["project_name"]="kitadiskusi"
project_configs["project_version"]="0.0.1"
project_configs["composer_version"]="2.7.8"
project_configs["php_version"]="8.3.10"
project_configs["laravel_version"]="^11.9"
project_configs["node_version"]="22.7.0"
project_configs["npm_version"]="10.8.2"

# Persyaratan Ekstensi PHP
# Pengguna dapat menambahkan lebih banyak ekstensi PHP ke daftar ini jika diperlukan
# Pengguna juga dapat menghapus item dari daftar ini jika diperlukan
php_extension_requirements=(
    ctype
    curl
    dom
    fileinfo
    filter
    hash
    mbstring
    openssl
    pcre
    pdo
    session
    tokenizer
    xml
    bcmath
    json
    pdo_mysql
    mysqli
    zip
    gd
    intl
)

# Daftar Penghapusan Produksi
# Pengguna dapat menambahkan lebih banyak file atau direktori ke daftar ini untuk penghapusan selama persiapan produksi
# Pengguna juga dapat menghapus item dari daftar ini jika diperlukan
production_remove_list=(
    ".vscode"
    "node_modules"
    "tests"
    "storage/framework/testing"
    "storage/framework/cache"
    "storage/logs"
    "config-validation"
    "resources/vue"
    "resources/ts"
    "resources/fonts"
    "resources/css"
    "resources/assets"
    "database"
    "app/Console"
    "design"
    ".editorconfig"
    ".eslintrc.cjs"
    ".gitattributes"
    ".gitignore"
    ".prettierrc.json"
    ".env.example"
    "tsconfig.json"
    "vite.config.js"
    "tailwind.config.js"
    "README.md"
    "postcss.config.js"
    "phpunit.xml"
    "package-lock.json"
    "package.json"
    "composer.lock"
    "artisan"
)

# Fungsi Ekstensi
# Fungsi-fungsi ini dapat disesuaikan untuk kebutuhan proyek tertentu
check_extension() {
    echo "Mengjalankan periksaan ekstensi..."
    # Tambahkan kode periksaan ekstensi kustom Anda di sini
}

init_extension() {
    echo "Menginisialisasi ekstensi..."
    # Tambahkan kode inisialisasi ekstensi kustom Anda di sini
}

uninit_extension() {
    echo "Menghapus inisialisasi ekstensi..."
    # Tambahkan kode penghapusan inisialisasi ekstensi kustom Anda di sini
}

production_extension() {
    echo "Mengjalankan ekstensi produksi..."
    # Tambahkan kode ekstensi produksi kustom Anda di sini
}

# Fungsi untuk memeriksa apakah direktori saat ini adalah proyek Laravel
is_laravel_project() {
    if [ -f "artisan" ] && [ -f "composer.json" ]; then
        if grep -q "laravel/framework" composer.json; then
            return 0
        fi
    fi
    return 1
}

# Validasi bahwa skrip ini dijalankan dari direktori root proyek Laravel
if ! is_laravel_project; then
    echo "Error: Skrip ini harus dijalankan dari direktori root proyek Laravel."
    exit 1
fi

# Tampilkan pesan bantuan jika tidak ada argumen yang diberikan atau bantuan diminta
if [ $# -eq 0 ] || [ "$1" = "help" ] || [ "$1" = "h" ]; then
    echo "Usage: $0 <argumen>"
    echo "Skrip ini memerlukan setidaknya satu argumen."
    echo "Silakan berikan argumen dan coba lagi."
    echo ""
    echo "Opsi:"
    echo "  help, h    Tampilkan pesan bantuan ini"
    echo "  check      Verifikasi dependensi dan konfigurasi proyek"
    echo "  init       Inisialisasi proyek (hanya jika periksaan berhasil)"
    echo "  uninit     Hapus inisialisasi proyek"
    echo "  produksi   Siapkan proyek untuk produksi"
    exit 1
fi

# Daftar argumen yang valid
valid_args=("help" "h" "check" "init" "uninit" "produksi")

# Periksa apakah argumen yang diberikan valid
if [[ ! " ${valid_args[@]} " =~ " $1 " ]]; then
    echo "Error: Argumen '$1' tidak terdaftar."
    echo "Silakan gunakan argumen yang valid."
    echo ""
    echo "Untuk bantuan, gunakan: $0 help"
    exit 1
fi

# Fungsi untuk melakukan periksaan
check() {
    echo "Mengjalankan periksaan proyek..."
    # Periksa file .env
    if [ ! -f .env ]; then
        echo "File .env tidak ditemukan. Mengcopy .env.example ke .env..."
        cp .env.example .env
        echo "File .env berhasil dibuat dari .env.example"
    else
        echo "File .env sudah ada"
    fi

    # Periksa versi Composer
    if command -v composer &> /dev/null; then
        composer_current_version=$(composer --version | awk '{print $3}' | sed 's/\x1B\[[0-9;]*[JKmsu]//g')
        if [ "$composer_current_version" = "${project_configs[composer_version]}" ]; then
            echo -e "\e[32mVersi Composer benar: $composer_current_version\e[0m"
        else
            echo -e "\e[31mVersi Composer tidak cocok. Saat ini: $composer_current_version, Diperlukan: ${project_configs[composer_version]}\e[0m"
            return 1
        fi
    else
        echo -e "\e[31mComposer tidak terinstal\e[0m"
        return 1
    fi

    # Periksa versi PHP
    if command -v php &> /dev/null; then
        php_current_version=$(php -v | awk 'NR==1{print $2}')
        if [ "$php_current_version" = "${project_configs[php_version]}" ]; then
            echo -e "\e[32mVersi PHP benar: $php_current_version\e[0m"
        else
            echo -e "\e[31mVersi PHP tidak cocok. Saat ini: $php_current_version, Diperlukan: ${project_configs[php_version]}\e[0m"
            return 1
        fi
    else
        echo -e "\e[31mPHP tidak terinstal\e[0m"
        return 1
    fi

    # Periksa versi Laravel
    if [ -f composer.json ]; then
        laravel_current_version=$(grep -oP '"laravel/framework": "\K[^"]+' composer.json)
        if [ "$laravel_current_version" = "${project_configs[laravel_version]}" ]; then
            echo -e "\e[32mVersi Laravel benar: $laravel_current_version\e[0m"
        else
            echo -e "\e[31mVersi Laravel tidak cocok. Saat ini: $laravel_current_version, Diperlukan: ${project_configs[laravel_version]}\e[0m"
            return 1
        fi
    else
        echo -e "\e[31mcomposer.json tidak ditemukan, tidak dapat memeriksa versi Laravel\e[0m"
        return 1
    fi

    # Periksa versi Node
    if command -v node &> /dev/null; then
        node_current_version=$(node -v | cut -c 2-)
        if [ "$node_current_version" = "${project_configs[node_version]}" ]; then
            echo -e "\e[32mVersi Node benar: $node_current_version\e[0m"
        else
            echo -e "\e[31mVersi Node tidak cocok. Saat ini: $node_current_version, Diperlukan: ${project_configs[node_version]}\e[0m"
            return 1
        fi
    else
        echo -e "\e[31mNode tidak terinstal\e[0m"
        return 1
    fi

    # Periksa versi NPM
    if command -v npm &> /dev/null; then
        npm_current_version=$(npm -v)
        if [ "$npm_current_version" = "${project_configs[npm_version]}" ]; then
            echo -e "\e[32mVersi NPM benar: $npm_current_version\e[0m"
        else
            echo -e "\e[31mVersi NPM tidak cocok. Saat ini: $npm_current_version, Diperlukan: ${project_configs[npm_version]}\e[0m"
            return 1
        fi
    else
        echo -e "\e[31mNPM tidak terinstal\e[0m"
        return 1
    fi

    # Periksa ekstensi PHP
    echo "Mengcek ekstensi PHP..."
    for extension in "${php_extension_requirements[@]}"; do
        if php -m | grep -q "$extension"; then
            echo -e "\e[32mEkstensi PHP $extension terinstal\e[0m"
        else
            echo -e "\e[31mEkstensi PHP $extension tidak terinstal\e[0m"
            return 1
        fi
    done

    return 0
}

# Fungsi untuk melakukan inisialisasi
init() {
    echo "Menginisialisasi proyek..."
    
    # Jalankan composer install
    echo "Mengjalankan composer install..."
    composer install
    if [ $? -ne 0 ]; then
        echo "Error: composer install gagal"
        uninit
        exit 1
    fi

    # Buat kunci aplikasi
    echo "Membuat kunci aplikasi..."
    php artisan key:generate
    if [ $? -ne 0 ]; then
        echo "Error: pembuatan kunci aplikasi gagal"
        uninit
        exit 1
    fi

    # Jalankan migrasi database
    echo "Mengjalankan migrasi database..."
    php artisan migrate --force
    if [ $? -ne 0 ]; then
        echo "Error: migrasi database gagal"
        uninit
        exit 1
    fi

    # Jalankan penyemaian database
    echo "Mengjalankan penyemaian database..."
    php artisan db:seed
    if [ $? -ne 0 ]; then
        echo "Error: penyemaian database gagal"
        uninit
        exit 1
    fi

    # Jalankan npm install
    echo "Mengjalankan npm install..."
    npm install
    if [ $? -ne 0 ]; then
        echo "Error: npm install gagal"
        uninit
        exit 1
    fi

    # Jalankan npm audit fix jika ditemukan kerentanan
    if npm audit | grep -q "found [1-9][0-9]* vulnerabilities"; then
        echo "Ditemukan kerentanan. Mengjalankan npm audit fix..."
        npm audit fix
        if [ $? -ne 0 ]; then
            echo "Peringatan: npm audit fix mengalami masalah"
        fi
    fi

    echo "Proyek berhasil diinisialisasi."
}

# Fungsi untuk melakukan penghapusan inisialisasi
uninit() {
    echo "Menghapus inisialisasi proyek..."

    # Batalkan semua migrasi
    echo "Membatalkan semua migrasi..."
    php artisan migrate:reset --force

    # Hapus database jika dibuat selama inisialisasi
    DB_DATABASE=$(grep DB_DATABASE .env | cut -d '=' -f2)
    if [ ! -z "$DB_DATABASE" ]; then
        echo "Menghapus database $DB_DATABASE..."
        mysql -e "DROP DATABASE IF EXISTS $DB_DATABASE;"
    fi

    # Hapus direktori vendor
    if [ -d vendor ]; then
        echo "Menghapus direktori vendor..."
        rm -rf vendor
    fi

    # Hapus direktori node_modules
    if [ -d node_modules ]; then
        echo "Menghapus direktori node_modules..."
        rm -rf node_modules
    fi

    echo "Proyek berhasil dihapus inisialisasinya."
}

# Fungsi untuk melakukan tugas produksi
production() {
    echo "Apakah Anda ingin menyiapkan proyek untuk produksi? (y/n)"
    read answer

    if [ "$answer" != "${answer#[Yy]}" ]; then
        echo "Menyiapkan proyek untuk produksi..."

        # Jalankan fungsi init terlebih dahulu
        echo "Mengjalankan inisialisasi..."
        init
        if [ $? -ne 0 ]; then
            echo "Error: inisialisasi gagal"
            exit 1
        fi

        # Jalankan composer install dengan optimasi
        echo "Mengjalankan composer install dengan optimasi..."
        composer install --optimize-autoloader --no-dev
        if [ $? -ne 0 ]; then
            echo "Error: composer install gagal"
            exit 1
        fi

        # Hapus dan cache konfigurasi
        echo "Menghapus dan caching konfigurasi..."
        php artisan config:clear
        php artisan config:cache
        if [ $? -ne 0 ]; then
            echo "Error: caching konfigurasi gagal"
            exit 1
        fi

        # Hapus dan cache rute
        echo "Menghapus dan caching rute..."
        php artisan route:clear
        php artisan route:cache
        if [ $? -ne 0 ]; then
            echo "Error: caching rute gagal"
            exit 1
        fi

        # Optimalkan penggunaan kelas
        echo "Mengoptimalkan penggunaan kelas..."
        php artisan optimize
        if [ $? -ne 0 ]; then
            echo "Error: optimasi penggunaan kelas gagal"
            exit 1
        fi

        # Hapus file dan direktori yang tidak perlu
        echo "Menghapus file dan direktori yang tidak perlu..."
        for item in "${production_remove_list[@]}"
        do
            rm -rf "$item"
        done

        echo "Proyek berhasil disiapkan untuk produksi."
    else
        echo "Penyiapan produksi dibatalkan."
    fi
}

# Jalankan fungsi periksaan jika argumen adalah "check"
if [ "$1" = "check" ]; then
    check
    check_extension
fi

# Jalankan fungsi inisialisasi jika argumen adalah "init", tetapi hanya jika periksaan berhasil
if [ "$1" = "init" ]; then
    if check; then
        init
        init_extension
    else
        echo "Periksaan gagal. Tidak dapat menginisialisasi proyek."
        exit 1
    fi
fi

# Jalankan fungsi penghapusan inisialisasi jika argumen adalah "uninit"
if [ "$1" = "uninit" ]; then
    uninit
    uninit_extension
fi

# Jalankan fungsi produksi jika argumen adalah "production"
if [ "$1" = "production" ]; then
    production
    production_extension
fi