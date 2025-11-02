# SchoolSphere - School Management System

A comprehensive PHP-based school management system for managing students, subjects, fees, marks, and academic records.

## 🚀 Features

### Student Management
- Add, edit, and delete student records
- Track student information (name, date of birth, nationality, religion, contact details)
- Student registration management
- Search students by name or index number
- Student notes and related information management

### Academic Management
- Subject management (add, edit, delete subjects)
- Academic year control
- Multiple grade levels support (Primary P1-P6, Junior J1-J3, Secondary S1-S3)
- Term-based marks entry (First Term, Second Term, Third Term, Final Exams)
- Class and subclass management
- Average calculation across terms

### Fees Management
- Fee structure setup
- Fee payment tracking
- Registration fees management
- Payment receipts generation
- Track paid and unpaid fees
- Payment reports by class
- Receipt number management

### Reports & Analytics
- Student reports by class
- Marks reports and term sheets
- Payment reports (paid/unpaid)
- Export to Excel functionality
- Reports by nationality, religion, phone number
- Discount reports
- Historical data reports

### Printing & Documentation
- Print-ready student reports
- Term sheet printing
- Payment receipts
- Class reports
- Bulk printing capabilities

## 📋 Requirements

- PHP 7.4 or higher
- MySQL/MariaDB database
- Apache web server (or compatible)
- Bootstrap 4 (included)
- MySQLi extension enabled

## 🛠️ Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd SchoolSphere
   ```

2. **Configure Database Connection**
   
   Update the following files with your database credentials:

   **File: `code/soloconnection.php`**
   ```php
   $hostname = 'localhost';        // Your database host
   $dbusername = 'root';            // Your database username
   $dbpassword = 'your_password';   // Your database password
   ```

   **File: `code/config.php`**
   ```php
   $dbname = 'highschool';         // Your database name
   ```

3. **Import Database**
   
   Import the SQL file into your MySQL database:
   ```bash
   mysql -u root -p highschool < code/highschool.sql
   ```
   Or use phpMyAdmin to import the SQL file.

4. **Configure Timezone**
   
   The system is set to Africa/Khartoum timezone by default. You can change this in `code/config.php`:
   ```php
   date_default_timezone_set("Africa/Khartoum");
   ```

5. **Set Web Server Document Root**
   
   Point your web server's document root to the `code/` directory, or access files via `http://localhost/SchoolSphere/code/`

## ⚙️ Configuration

### Customize Client Name and System Name

Edit `code/constants.php` to customize your school/system branding:

```php
// Global client name - displayed throughout the system
$CLIENT_NAME = "schoolsphere";  // Change to your school name

// System name tag (used in titles and navigation)
$SYSTEM_NAME = "SchoolSphere";   // Change to your system tag
```

### Database Configuration Files to Check

**IMPORTANT:** Before deploying, ensure you update these files with your production database credentials:

1. **`code/soloconnection.php`**
   - Database hostname
   - Database username
   - Database password

2. **`code/config.php`**
   - Database name (`$dbname`)
   - Timezone settings
   - Session configuration

### Security Notes

⚠️ **Before deploying to production:**
- Change all default database passwords
- Update `$dbpassword` in `soloconnection.php`
- Verify database user permissions are set correctly
- Review session security settings in `config.php`
- Consider moving sensitive configuration outside the web root

## 📁 Project Structure

```
SchoolSphere/
├── code/
│   ├── config.php              # Main configuration file
│   ├── constants.php           # Global variables (client name, system name)
│   ├── soloconnection.php      # Database connection settings
│   ├── sidebar.php             # Navigation sidebar
│   ├── login.php               # Login page
│   ├── index.html              # Welcome page
│   ├── FormStudent.php          # Student form
│   ├── FormSubject.php         # Subject form
│   ├── FormFeesSet.php         # Fee setup form
│   ├── Report*.php              # Various report files
│   ├── termsheet*.php          # Term sheet files
│   ├── css/                     # Stylesheets
│   ├── js/                      # JavaScript files
│   └── highschool.sql          # Database schema
└── README.md                   # This file
```

## 🎯 Usage

1. **Initial Setup**
   - Access the welcome page: `http://your-domain/index.html`
   - Login with admin credentials (set up in database)
   - Configure academic year in "Control Academic Year"

2. **Basic Workflow**
   - Add subjects via "Subject Control"
   - Add students via "Student Control"
   - Register students to classes via "Register Control"
   - Set up fees via "Fees Control"
   - Enter marks via "Marks Control"
   - Generate reports as needed

## 🔧 Features Breakdown

### Student Control
- Add new students with complete information
- Edit/delete existing students
- Add student notes
- View student details

### Subject Control
- Add subjects with codes and priorities
- Edit/delete subjects
- Subject categorization

### Register Control
- Register students to classes
- Manage class assignments
- Control active registrations

### Fees Control
- Set up fee structures by grade
- Record fee payments
- Generate receipts
- Track payment status

### Marks Control
- Enter marks for multiple terms
- Calculate averages
- Print term sheets
- View student progress

### Reports
- Comprehensive reporting system
- Export capabilities
- Multiple filter options
- Print-ready formats

## 🌐 Browser Support

- Chrome (recommended)
- Firefox
- Safari
- Edge

## 📝 License

This project is provided as-is for educational and commercial use.

## 🤝 Contributing

Feel free to fork this project and submit pull requests for any improvements.

## 📧 Support

For issues and questions, please open an issue in the repository.

---

**Note:** This system was originally developed for Comboni College Khartoum and has been customized to be a generic school management system.

