<h1 align="center">ezEMS</h1>
<h3 align="center">A simple, easy-to-use Event Management System</h3>

<p align="center">
<a href="https://github.com/CaptainIRS/ezEMS/actions/workflows/ci.yml"><img src="https://github.com/CaptainIRS/ezEMS/actions/workflows/ci.yml/badge.svg"></a>
<a href="https://codecov.io/github/CaptainIRS/ezEMS"><img src="https://codecov.io/github/CaptainIRS/ezEMS/branch/main/graph/badge.svg?token=DoL1Nnk6YU"/></a>
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

## Features/Roadmap

- [x] One CMS instance per event, same CMS instance for multiple editions of the event
UI skin would be an npm package, which can be customised for each year. The CMS would use the CSS components provided by the npm package. Every year, a new package will be released for the UI skin and the CDN link for importing the UI skin will be updated
- [ ] Solid user profile integration
  - [x] SSO/Federated login, with facility to attach multiple providers(like DAuth, Google, GitHub, Facebook, etc.) to the same account
  - [ ] Well-defined scopes to manage permissions
  - [ ] Can login with same profile into any event of the fest after registration, irrespective of whether the event is hosted in-CMS or as an external event
  - [ ] Public/private profiles
  - [ ] Public profile - display achievements, participations, scores, etc.
- [x] Editions
    - [x] CRUD editions
    - [x] CRUD clusters
    - [x] CRUD categories
- [x] Venues
- [ ] Events
  - [x] Type: event, workshop, guest lecture, panel
  - [x] CRUD events
  - [x] Team creation, invites
  - [x] Event has an FAQ page, details, links, registration fee payment, etc.
  - [x] Event venue
  - [ ] Online certificate generation and download
  - [ ] Public leaderboard
  - [ ] In-CMS events - quizzes, document submission
  - [ ] Online/offline
  - [ ] Mail participants from past editions
  - [ ] Mail for reminders
  - [ ] Calendar entry for event
- [x] Announcements
- [x] News/newsletter
- [ ] Campus Ambassador
- [ ] Solid analytics to capture all interactions with the site, like visits to events, participation, activity, etc.
- [ ] Powerful SEO
- [ ] Audit logs to log activity of members with privileges
- [ ] User roles:
  - [x] Participant
  - [ ] Event manager
    - [ ] Manage participants (add/ban)
Manage event pages, clusters
    - [ ] Set questions for quizzes or other in-CMS events
    - [ ] Edit/download leaderboard
    - [ ] View checklists for offline/online
    - [ ] View payment information, QR scan to verify payment
  - [ ] Content manager
    - [ ] Manage news/newsletter
    - [ ] Content of about page
  - [ ] WebOps
    - [ ] View analytics
    - [ ] View audit logs
    - [ ] Add/remove event managers, workshop managers
  - [ ] WebOps head
    - [ ] Add/remove WebOps members

## Database Design
![Database Design](http://www.plantuml.com/plantuml/png/fLPTSjmW37xd5BnrfZE-GrvwWLx0eu3MomG3GI9RDvkxrs1SboRsviSFcK_asqyI-gpn7J54JgELFxgVKXiO8epYcpmRZPBFA2bu5YLI9YgBOludF7cZPOZ-tk98ycBuBC4D5hLKqLz8dX1Pq8Dn0MOvQOr3dW9A7_diXK37XYUP22F9Po7dvxiqke2kgx634Il44OojE03HnKSjNlxgA6yj3dWijV5puITZT_a3EesnG0Til0DhU2enQ1sHg62r7X83Oq71k5vvlGJAEmR5lKlZVPNJE4J40YU4sFjJJvpqr5QRhwKtkaQrkNomTK31E_BlkpooQQYGOSYZMFD4Mr6UJVjxr2PttcQjX_jPSrCL5blrRBOPEhs4cvu2ni57Wn_jGoEfQ48kvXrbAvk8RpbjHxccRUYrxAdDWayp-6eZCLcaWa8qlokCI3v5LQCHVlK18Xjb0ZXUAOCXZb2QFs5ZmFzhxAjvTaijhCs0bTvs2yxvv1IEXqtFL8iLvshGyKwgJVa4Z_k2Zmdfdzc0eml6cvB4CE37nt_aunfQhs0ndEldl0aFRx8msjBoqITBgybhg210sKYRDYECDwHRSfy8zsrH64QtI-gLkJ9hHwACOLK8C8sPJmoSwa8zethmQJv38kFTuLtcF6r-XvUlEB7T7Ekcgy_rsdN-US7hxZqaRQjDrCKWtw9binyHgdLVKLvyrrsl2rxNcrX1I_f8FUs246kdjvd7cgilnEB8MxGZjMRn78yW-q6K-zkvkENTEofgUoj4_lCvrffk_UeG5Rmzf_ef8yGTEfr6A_u0)

## License

This project is licensed under the [MIT License](LICENSE).

(c) 2023 CaptainIRS
