# Rancangan Database KitaDiskusi

## Tabel Utama

### 1. `users`
Menyimpan data pengguna yang dapat membuat topik diskusi, komentar, dan memberikan suara.

| Kolom            | Tipe Data    | Deskripsi                                         |
|------------------|--------------|---------------------------------------------------|
| `id`             | `BIGINT`     | Primary key                                       |
| `username`       | `VARCHAR`    | Nama unik pengguna                                |
| `email`          | `VARCHAR`    | Alamat email pengguna                             |
| `password`       | `VARCHAR`    | Kata sandi pengguna yang di-hash                  |
| `created_at`     | `TIMESTAMP`  | Waktu pendaftaran pengguna                        |
| `updated_at`     | `TIMESTAMP`  | Waktu pembaruan data pengguna                     |

### 2. `topics`
Menyimpan topik diskusi yang dibuat oleh pengguna.

| Kolom            | Tipe Data    | Deskripsi                                         |
|------------------|--------------|---------------------------------------------------|
| `id`             | `BIGINT`     | Primary key                                       |
| `user_id`        | `BIGINT`     | Foreign key ke tabel `users`                      |
| `title`          | `VARCHAR`    | Judul topik diskusi                               |
| `body`           | `TEXT`       | Isi dari topik diskusi                            |
| `category`       | `VARCHAR`    | Kategori dari topik diskusi                       |
| `created_at`     | `TIMESTAMP`  | Waktu pembuatan topik                             |
| `updated_at`     | `TIMESTAMP`  | Waktu pembaruan topik                             |

### 3. `comments`
Menyimpan komentar yang diberikan pada suatu topik diskusi.

| Kolom            | Tipe Data    | Deskripsi                                         |
|------------------|--------------|---------------------------------------------------|
| `id`             | `BIGINT`     | Primary key                                       |
| `topic_id`       | `BIGINT`     | Foreign key ke tabel `topics`                     |
| `user_id`        | `BIGINT`     | Foreign key ke tabel `users`                      |
| `parent_id`      | `BIGINT`     | ID komentar utama jika ini adalah balasan         |
| `body`           | `TEXT`       | Isi komentar                                      |
| `created_at`     | `TIMESTAMP`  | Waktu pembuatan komentar                          |
| `updated_at`     | `TIMESTAMP`  | Waktu pembaruan komentar                          |

### 4. `votes`
Menyimpan informasi tentang suara (upvote/downvote) yang diberikan oleh pengguna pada komentar.

| Kolom            | Tipe Data    | Deskripsi                                         |
|------------------|--------------|---------------------------------------------------|
| `id`             | `BIGINT`     | Primary key                                       |
| `comment_id`     | `BIGINT`     | Foreign key ke tabel `comments`                   |
| `user_id`        | `BIGINT`     | Foreign key ke tabel `users`                      |
| `vote_type`      | `ENUM`       | Tipe suara (`upvote`, `downvote`)                 |
| `created_at`     | `TIMESTAMP`  | Waktu pembuatan suara                             |

## Tabel Pendukung

### 5. `categories`
Menyimpan daftar kategori untuk mengelompokkan topik diskusi.

| Kolom            | Tipe Data    | Deskripsi                                         |
|------------------|--------------|---------------------------------------------------|
| `id`             | `BIGINT`     | Primary key                                       |
| `name`           | `VARCHAR`    | Nama kategori                                     |
| `description`    | `TEXT`       | Deskripsi kategori                                |
| `created_at`     | `TIMESTAMP`  | Waktu pembuatan kategori                          |
| `updated_at`     | `TIMESTAMP`  | Waktu pembaruan kategori                          |