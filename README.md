# Visit Tracker

A simple PHP application that logs visitor information to a MySQL database and visualizes it with Grafana.

## Requirements

- Docker
- Docker Compose

## Setup

1. Clone the repository (if applicable) or ensure all files (`index.php`, `Dockerfile`, `docker-compose.yml`, `visits.sql`, `README.md`) are in the same directory.

2. Build and run the Docker containers:

   ```bash
   docker-compose up --build -d
   ```

   This will:
   - Build the PHP-Apache image.
   - Start the `php-apache`, `mysql`, and `grafana` containers.
   - Initialize the MySQL database with the `visits` table using `visits.sql`.

3. Access the application:

   Open your web browser and go to `http://localhost:8080`.

4. Access Grafana:

   Open your web browser and go to `http://localhost:3000`.
   - The default Grafana login is `admin`/`admin`. You will be prompted to change the password on the first login.
   - You will need to add a MySQL data source in Grafana pointing to the `mysql` service (`host: mysql:3306`, `database: visit_db`, `user: root`, `password: root`).
   - After adding the data source, you can create dashboards to visualize the data from the `visits` table.

## Database Schema

The `visits` table has the following columns:

- `id` (INT, AUTO_INCREMENT, PRIMARY KEY)
- `ip` (VARCHAR)
- `page` (VARCHAR)
- `user_agent` (TEXT)
- `created_at` (TIMESTAMP, default to current timestamp)

## Grafana Visualizations

You can use Grafana to visualize:

- Total visits over time (using the `created_at` column)
- Most visited pages (grouping by the `page` column)
- Recent visits (displaying records from the `visits` table)

## Stopping the application

To stop the containers, run:

```bash
docker-compose down
``` 