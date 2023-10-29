# Netheve Storage

Panduan Instalasi:

1. Copy file ```env.example``` lalu berikan nama ```.env```
2. Sesuaikan kredensil database di file ```.env``` seperti Host, Port, Password, dan lain lain.
3. Buka terminal, arahkan ke direktori project, lalu ikuti command di bawah
```console
composer install
```

```console
npm install
```

```console
php artisan migrate:fresh
```

```console
php artisan serve --port=8000
```

4. Buka browser, arahkan ke ```http://localhost:8080```
