# MetricPulse

MetricPulse is a web analytics platform built with Laravel, Docker, MySQL, and Grafana. It enables real-time visitor tracking, system monitoring, and insightful analytics for web applications.

## Overview

MetricPulse tracks website visits, capturing details such as IP address, page views, and user agents. The application is containerized using Docker for easy deployment and includes Grafana dashboards for monitoring and visualization.

## Features
- Real-time visitor tracking and analytics
- Stores visit data (IP, page, user agent, timestamp) in MySQL
- Dockerized for consistent development and deployment
- Grafana integration for system and data visualization
- RESTful API endpoints for extensibility (future-ready)

## Architecture
- **Laravel**: Backend application and API
- **MySQL**: Stores all visitor analytics data
- **Docker**: Containerizes the app, database, and monitoring tools
- **Grafana**: Visualizes metrics and analytics from MySQL

## Getting Started

### Prerequisites
- [Docker](https://www.docker.com/get-started) and Docker Compose installed

### Setup
1. Clone the repository:
   ```sh
   git clone <your-repo-url>
   cd phpProj
   ```
2. Start the application with Docker Compose:
   ```sh
   docker-compose up --build
   ```
3. Access the app at [http://localhost:8080](http://localhost:8080)
4. Access Grafana dashboards at [http://localhost:3000](http://localhost:3000) (default login: admin/admin)

### Database
- The MySQL database is initialized with `visits.sql`, which creates the `visits` table for tracking analytics data.

## License

This project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
