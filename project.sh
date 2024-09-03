#!/bin/bash

# Konfigurasi Proyek
# Ubah nilai-nilai ini sesuai kebutuhan proyek
declare -A project_configs
project_configs["project_name"]="kitadiskusi"
project_configs["project_version"]="1.0.0"
project_configs["composer_version"]="2.7.7"
project_configs["php_version"]="8.3.10"
project_configs["laravel_version"]="11.9"
project_configs["node_version"]="20.16.0"
project_configs["npm_version"]="10.8.2"

# Kebutuhan Ekstensi PHP
# Tambah atau hapus ekstensi PHP sesuai kebutuhan
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
    pdo_sqlite
    zip
    gd
    intl
    sqlite3
)

# Daftar Penghapusan untuk Produksi
# Tambah atau hapus item untuk persiapan produksi
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

# Fungsi-fungsi tambahan
# Sesuaikan fungsi-fungsi ini untuk kebutuhan proyek tertentu
before_check() {
    echo "Menjalankan tugas pra-pemeriksaan..."
}

before_init() {
    echo "Menjalankan tugas pra-inisialisasi..."
}

before_uninit() {
    echo "Menjalankan tugas pra-pembatalan inisialisasi..."
}

before_production() {
    echo "Menjalankan tugas pra-produksi..."
}

after_check() {
    echo "Menjalankan tugas pasca-pemeriksaan..."
}

after_init() {
    echo "Menjalankan tugas pasca-inisialisasi..."
}

after_uninit() {
    echo "Menjalankan tugas pasca-pembatalan inisialisasi..."
}

after_production() {
    echo "Menjalankan tugas pasca-produksi..."
}

# Periksa apakah direktori saat ini adalah proyek Laravel
is_laravel_project() {
    if [ -f "artisan" ] && [ -f "composer.json" ]; then
        if grep -q "laravel/framework" composer.json; then
            return 0
        fi
    fi
    return 1
}

# Validasi eksekusi skrip dari root proyek Laravel
if ! is_laravel_project; then
    echo "Kesalahan: Jalankan skrip ini dari root proyek Laravel."
    exit 1
fi

# Tampilkan pesan bantuan
if [ $# -eq 0 ] || [ "$1" = "help" ] || [ "$1" = "h" ]; then
    echo "Penggunaan: $0 <argumen>"
    echo "Berikan argumen untuk menjalankan skrip."
    echo ""
    echo "Opsi:"
    echo "  help, h    Tampilkan pesan bantuan"
    echo "  check      Verifikasi dependensi dan konfigurasi"
    echo "  init       Inisialisasi proyek (memerlukan pengecekan berhasil)"
    echo "  uninit     Batalkan inisialisasi proyek"
    echo "  production Siapkan untuk produksi"
    exit 1
fi

# Daftar argumen yang valid
valid_args=("help" "h" "check" "init" "uninit" "production")

# Validasi argumen yang diberikan
if [[ ! " ${valid_args[@]} " =~ " $1 " ]]; then
    echo "Kesalahan: Argumen '$1' tidak valid."
    echo "Gunakan argumen yang valid atau '$0 help' untuk bantuan."
    exit 1
fi

# Bandingkan versi
version_compare() {
  local IFS=.
  local ver1=($1) ver2=($2)
  for ((i=${#ver1[@]}; i<${#ver2[@]}; i++))
  do
    ver1[i]=0
  done
  for ((i=0; i<${#ver1[@]}; i++))
  do
    if [[ -z ${ver2[i]} ]]
    then
      ver2[i]=0
    fi
    ver1[i]=${ver1[i]//^/}
    ver2[i]=${ver2[i]//^/}
    if (( ${ver1[i]} > ${ver2[i]} ))
    then
      return 1
    elif (( ${ver1[i]} < ${ver2[i]} ))
    then
      return 2
    fi
  done
  return 0
}

# Lakukan pemeriksaan
check() {
    echo "Memeriksa konfigurasi proyek..."
    # Periksa file .env
    if [ ! -f .env ]; then
        echo "Membuat .env dari .env.example..."
        cp .env.example .env
        echo "File .env berhasil dibuat"
    else
        echo "File .env sudah ada"
    fi

    # Periksa versi Composer
    if command -v composer &> /dev/null; then
        composer_current_version=$(composer --version | awk '{print $3}' | sed 's/\x1B\[[0-9;]*[JKmsu]//g')
        version_compare "$composer_current_version" "${project_configs[composer_version]}"
        case $? in
            0) echo -e "\e[32mVersi Composer: $composer_current_version (Sesuai)\e[0m" ;;
            1) echo -e "\e[32mVersi Composer: $composer_current_version (Lebih tinggi dari yang diperlukan: ${project_configs[composer_version]})\e[0m" ;;
            2) echo -e "\e[31mVersi Composer: $composer_current_version (Lebih rendah dari yang diperlukan: ${project_configs[composer_version]})\e[0m"
               return 1 ;;
        esac
    else
        echo -e "\e[31mComposer tidak terinstal\e[0m"
        return 1
    fi

    # Periksa versi PHP
    if command -v php &> /dev/null; then
        php_current_version=$(php -v | awk 'NR==1{print $2}')
        version_compare "$php_current_version" "${project_configs[php_version]}"
        case $? in
            0) echo -e "\e[32mVersi PHP: $php_current_version (Sesuai)\e[0m" ;;
            1) echo -e "\e[32mVersi PHP: $php_current_version (Lebih tinggi dari yang diperlukan: ${project_configs[php_version]})\e[0m" ;;
            2) echo -e "\e[31mVersi PHP: $php_current_version (Lebih rendah dari yang diperlukan: ${project_configs[php_version]})\e[0m"
               return 1 ;;
        esac
    else
        echo -e "\e[31mPHP tidak terinstal\e[0m"
        return 1
    fi

    # Periksa versi Laravel
    if [ -f composer.json ]; then
        laravel_current_version=$(grep -o '"laravel/framework": "[^"]*"' composer.json | cut -d'"' -f4 | sed 's/^[^0-9]*//')
        version_compare "$laravel_current_version" "${project_configs[laravel_version]}"
        case $? in
            0) echo -e "\e[32mVersi Laravel: $laravel_current_version (Sesuai)\e[0m" ;;
            1) echo -e "\e[32mVersi Laravel: $laravel_current_version (Lebih tinggi dari yang diperlukan: ${project_configs[laravel_version]})\e[0m" ;;
            2) echo -e "\e[31mVersi Laravel: $laravel_current_version (Lebih rendah dari yang diperlukan: ${project_configs[laravel_version]})\e[0m"
               return 1 ;;
        esac
    else
        echo -e "\e[31mcomposer.json tidak ditemukan, tidak dapat memeriksa versi Laravel\e[0m"
        return 1
    fi

    # Periksa versi Node
    if command -v node &> /dev/null; then
        node_current_version=$(node -v | cut -c 2-)
        version_compare "$node_current_version" "${project_configs[node_version]}"
        case $? in
            0) echo -e "\e[32mVersi Node: $node_current_version (Sesuai)\e[0m" ;;
            1) echo -e "\e[32mVersi Node: $node_current_version (Lebih tinggi dari yang diperlukan: ${project_configs[node_version]})\e[0m" ;;
            2) echo -e "\e[31mVersi Node: $node_current_version (Lebih rendah dari yang diperlukan: ${project_configs[node_version]})\e[0m"
               return 1 ;;
        esac
    else
        echo -e "\e[31mNode tidak terinstal\e[0m"
        return 1
    fi

    # Periksa versi NPM
    if command -v npm &> /dev/null; then
        npm_current_version=$(npm -v)
        version_compare "$npm_current_version" "${project_configs[npm_version]}"
        case $? in
            0) echo -e "\e[32mVersi NPM: $npm_current_version (Sesuai)\e[0m" ;;
            1) echo -e "\e[32mVersi NPM: $npm_current_version (Lebih tinggi dari yang diperlukan: ${project_configs[npm_version]})\e[0m" ;;
            2) echo -e "\e[31mVersi NPM: $npm_current_version (Lebih rendah dari yang diperlukan: ${project_configs[npm_version]})\e[0m"
               return 1 ;;
        esac
    else
        echo -e "\e[31mNPM tidak terinstal\e[0m"
        return 1
    fi

    # Periksa ekstensi PHP
    echo "Memeriksa ekstensi PHP..."
    for extension in "${php_extension_requirements[@]}"; do
        if php -m | grep -q "$extension"; then
            echo -e "\e[32mEkstensi PHP $extension: Terinstal\e[0m"
        else
            echo -e "\e[31mEkstensi PHP $extension: Tidak terinstal\e[0m"
            return 1
        fi
    done

    return 0
}

# Inisialisasi proyek
init() {
    echo "Memulai inisialisasi proyek..."
    
    echo "Menjalankan composer install..."
    composer install
    if [ $? -ne 0 ]; then
        echo "Kesalahan: composer install gagal"
        uninit
        exit 1
    fi

    echo "Membuat kunci aplikasi..."
    php artisan key:generate
    if [ $? -ne 0 ]; then
        echo "Kesalahan: Pembuatan kunci aplikasi gagal"
        uninit
        exit 1
    fi

    echo "Menjalankan migrasi database..."
    php artisan migrate --force
    if [ $? -ne 0 ]; then
        echo "Kesalahan: Migrasi database gagal"
        uninit
        exit 1
    fi

    echo "Menjalankan seeding database..."
    php artisan db:seed
    if [ $? -ne 0 ]; then
        echo "Kesalahan: Seeding database gagal"
        uninit
        exit 1
    fi

    echo "Menjalankan npm install..."
    npm install
    if [ $? -ne 0 ]; then
        echo "Kesalahan: npm install gagal"
        uninit
        exit 1
    fi

    if npm audit | grep -q "found [1-9][0-9]* vulnerabilities"; then
        echo "Memperbaiki kerentanan npm..."
        npm audit fix
        if [ $? -ne 0 ]; then
            echo "Peringatan: npm audit fix menemui masalah"
        fi
    fi

    echo "Inisialisasi proyek berhasil."
}

# Membatalkan inisialisasi proyek
uninit() {
    echo "Membatalkan inisialisasi proyek..."

    echo "Mengembalikan semua migrasi..."
    php artisan migrate:reset --force

    DB_DATABASE=$(grep DB_DATABASE .env | cut -d '=' -f2)
    if [ ! -z "$DB_DATABASE" ]; then
        echo "Menghapus database $DB_DATABASE..."
        mysql -e "DROP DATABASE IF EXISTS $DB_DATABASE;"
    fi

    if [ -d vendor ]; then
        echo "Menghapus direktori vendor..."
        rm -rf vendor
    fi

    if [ -d node_modules ]; then
        echo "Menghapus direktori node_modules..."
        rm -rf node_modules
    fi

    echo "Pembatalan inisialisasi proyek berhasil."
}

# Persiapan untuk produksi
production() {
    echo "Siapkan proyek untuk produksi? (y/n)"
    read answer

    if [ "$answer" != "${answer#[Yy]}" ]; then
        echo "Mempersiapkan untuk produksi..."

        echo "Menginisialisasi proyek..."
        init
        if [ $? -ne 0 ]; then
            echo "Kesalahan: Inisialisasi gagal"
            exit 1
        fi

        echo "Mengoptimalkan autoloader Composer..."
        composer install --optimize-autoloader --no-dev
        if [ $? -ne 0 ]; then
            echo "Kesalahan: Optimasi Composer gagal"
            exit 1
        fi

        echo "Menyimpan konfigurasi ke cache..."
        php artisan config:clear
        php artisan config:cache
        if [ $? -ne 0 ]; then
            echo "Kesalahan: Penyimpanan konfigurasi ke cache gagal"
            exit 1
        fi

        echo "Menyimpan rute ke cache..."
        php artisan route:clear
        php artisan route:cache
        if [ $? -ne 0 ]; then
            echo "Kesalahan: Penyimpanan rute ke cache gagal"
            exit 1
        fi

        echo "Mengoptimalkan aplikasi..."
        php artisan optimize
        if [ $? -ne 0 ]; then
            echo "Kesalahan: Optimasi aplikasi gagal"
            exit 1
        fi

        echo "Menghapus file pengembangan..."
        for item in "${production_remove_list[@]}"
        do
            rm -rf "$item"
        done

        echo "Persiapan proyek untuk produksi berhasil."
    else
        echo "Persiapan produksi dibatalkan."
    fi
}

# Menjalankan fungsi berdasarkan argumen
if [ "$1" = "check" ]; then
    before_check
    check
    after_check
fi

if [ "$1" = "init" ]; then
    if check; then
        before_init
        init
        after_init
    else
        echo "Pemeriksaan gagal. Inisialisasi dibatalkan."
        exit 1
    fi
fi

if [ "$1" = "uninit" ]; then
    before_uninit
    uninit
    after_uninit
fi

if [ "$1" = "production" ]; then
    before_production
    production
    after_production
fi
