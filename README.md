<h1 align="center">ezEMS</h1>
<h3 align="center">A simple, easy-to-use Event Management System</h3>

<p align="center">
<a href="https://github.com/CaptainIRS/ezEMS/actions/workflows/ci.yml"><img src="https://github.com/CaptainIRS/ezEMS/actions/workflows/ci.yml/badge.svg"></a>
</p>

## Demo

Demo available at https://ezems.captainirs.dev/.

Admin panel is at https://ezems.captainirs.dev/admin with email `admin@admin.com` and password `password`

> **Warning**
>
> The demo instance is seeded with fake data and is reset every 1 hour. All data will be lost.

## Setup

### Requirements

-   [Node.js](https://nodejs.org/en/) (v16 or higher)
-   [PHP](https://www.php.net/) (v8.1.x)
-   [Composer](https://getcomposer.org/)

### Installation

1.  Clone the repository

    ```bash
    git clone https://github.com/CaptainIRS/ezEMS.git
    cd ezEMS

    ```
2.  Install dependencies

    ```bash
    npm install
    ```
        
    ```bash
    composer install
    ```
3. Copy the `.env.example` file to `.env` and fill in the required values

    ```bash
    cp .env.example .env
    ```
4. Generate the application key

    ```bash
    php artisan key:generate
    ```
5. Run the migrations

    ```bash
    php artisan migrate:fresh --seed --seeder=TestSeeder
    ```
6. Start the NPM development server

    ```bash
    npm run dev
    ```
7. In a new terminal, start the PHP development server

    ```bash
    php artisan serve
    ```
8. Open the application in your browser at `http://localhost:8000`

### Developing a skin plugin
1. Clone the skin plugin repository to the `plugins` directory

    ```bash
    git clone https://github.com/CaptainIRS/ezEMS-default-skin.git plugins/ezems-default-skin
    ```
2. Install the dependencies

    ```bash
    cd plugins/ezems-default-skin
    npm install
    ```
3. Link the plugin to the application

    ```bash
    cd ../..
    npm link plugins/ezems-default-skin
    ```
4. Run the NPM development server

    ```bash
    cd plugins/ezems-default-skin
    npm run watch
    ```

## License

This project is licensed under the [MIT License](LICENSE).

(c) 2023 CaptainIRS
