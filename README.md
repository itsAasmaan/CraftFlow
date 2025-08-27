# CraftFlow – Project Management System

## Installation

1. **Clone Repository**

```bash
git clone https://github.com/your-username/craftflow.git
cd craftflow
```

2. **Install Dependencies**

```bash
composer install
npm install && npm run dev
```

3. **Setup Environment**

```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=craftflow
DB_USERNAME=root
DB_PASSWORD=
```

4. **Run Migrations & Seeders**

```bash
php artisan migrate --seed
```

Seeds will create:

* An **Admin** user (default: `admin@craftflow.test` / `password`)
* Example roles & test data

5. **Run Application**

```bash
php artisan serve
```

Now visit: [http://localhost:8000](http://localhost:8000)