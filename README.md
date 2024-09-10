# FitLiner Pro

FitLiner Pro is a comprehensive web application designed for managing schedules, user interactions, attendance, payments, and more. It includes functionality for both administrators and users, offering a robust solution for various operational needs.

# Team

- Sathira Sri Sathsara
- Mahesha Nawarathna
- Imalka Senaratne
- Pavithra Sithumini

## Table of Contents

1. [Overview](#overview)
2. [Features](#features)
3. [Installation](#installation)
4. [Usage](#usage)
5. [Contributing](#contributing)
6. [License](#license)
7. [Contact](#contact)

## Overview

FitLiner Pro provides an efficient way to manage gym schedules, user communications, attendance tracking, and payment processing. The system features separate dashboards for administrators and regular users, ensuring that each user type has access to the relevant tools and information.

## Features

- **Admin Dashboard**: 
  - Manage schedules
  - View and respond to user messages
  - Track attendance
  - Process payments
  - Manage user profiles
  
- **User Dashboard**:
  - View personal schedule
  - Send and receive messages
  - Track attendance
  - Manage payment information
  
- **Authentication**: 
  - User registration and login
  - Role-based access control

## Installation

### Prerequisites

- PHP >= 7.4
- MySQL >= 5.7
- Web Server (e.g., Apache or Nginx)

### Setup

1. **Clone the Repository**

   ```bash
   git clone https://github.com/ByteCrackers/FitLinerPro.git
   ```

2. **Navigate to the Project Directory**

   ```bash
   cd fitliner-pro
   ```

3. **Configure the Environment**

   Update the `config.php` file with your database configuration:

   ```
   DB_HOST=localhost
   DB_DATABASE=fitliner_pro
   DB_USERNAME=root
   DB_PASSWORD=
   ```

5. **Create and Populate the Database**

   You need to create the database manually. Execute the SQL scripts located in the `db_file` folder to set up the necessary tables.

6. **Start the Web Server**

   Start your web server and navigate to `http://localhost/FitLinerPro` to access the application.

## Usage

1. **Access the Application**

   - **Admin Dashboard**: `http://localhost/FitLinerPro/public/admin_dashboard.php`
   - **User Dashboard**: `http://localhost/FitLinerPro/public/user_dashboard.php`
   - **Login Page**: `http://localhost/FitLinerPro/index.php`

2. **Authentication**

   - **Login**: Enter your email and password on the login page.
   - **Register**: Fill out the registration form with your details.

3. **Features**

   - Navigate through the dashboard to access different features.
   - Use the sidebar to switch between schedules, messages, attendance, and more.

## Contributing

Contributions are welcome! Please follow these steps to contribute:

1. Fork the repository.
2. Create a new branch for your feature or fix.
3. Make your changes and commit them with a descriptive message.
4. Push your changes to your forked repository.
5. Submit a pull request with a clear description of the changes.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.

## Contact

For questions or support, please contact [your email address].

