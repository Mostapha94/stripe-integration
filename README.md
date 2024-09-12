
# Stripe Charge and save payment cards details

This guide will help you install the project
### Prerequisites

- PHP (>= 8.3)
- Composer
- MySQL

### Installation Steps

#### 1. Clone the repository
First, clone the repository to your local machine:

```bash
git clone 
cd your-laravel-project
```

#### 2. Install dependencies
Next, install the project dependencies using Composer:

```bash
composer install
```

#### 3. Create the `.env` file
Create a `.env` file by copying the `.env.example` file:
i updated it with all intergration keys :
JWT_SECRET , STRIPE_SECRET , and STRIPE_KEY

```bash
cp .env.example .env
```

#### 4. Generate application key
Laravel requires an application key to be set in your `.env` file. You can generate it with:

```bash
php artisan key:generate
```


#### 5. Set up your database
In the `.env` file, set up your database configuration. Update the following fields with your database information:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

#### 6. Run database migrations
To set up the database tables, run the following command:

```bash
php artisan migrate
```

#### 8. Start the local development server
To start the Laravel development server, use:

```bash
php artisan serve
```

By default, the application will be served at `http://localhost:8000`.

---

### Additional Commands


- **Clear Cache**: If you encounter any caching issues, you can clear them with:

  ```bash
  php artisan cache:clear
  php artisan config:clear
  php artisan route:clear
  php artisan view:clear
  ```

### Troubleshooting

- **Permission Issues**: If you run into permission issues with storage or cache directories, try:

  ```bash
  sudo chmod -R 775 storage
  sudo chmod -R 775 bootstrap/cache
  ```
