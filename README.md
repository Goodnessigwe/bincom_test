# 🗳️ Election Results Management Portal

A web-based **Election Results Management Portal** built with **PHP, MySQL, HTML, and CSS**.  
This project was developed as part of a **PHP test for an internship role**. The challenge involved working with an existing dataset (Delta State 2011 election polling unit data), importing it into MySQL, and building a portal to query and display election results.  

---

## 🚀 Live Demo
🔗 [View Project](https://bincom-test.free.nf)  

---

## ✨ Features
- 📊 Display results for individual polling units  
- 🏛️ Summarize and display results for all polling units in a selected Local Government Area (LGA)  
- 📝 Store and display results for new polling units across all parties  
- 🔎 Search and filter election results for easier access  
- ⚡ User-friendly interface for interacting with election data  

---

## 🛠 Tech Stack
- **Frontend:** HTML5, CSS3  
- **Backend:** PHP   
- **Database:** MySQL (imported provided dataset `bincom_test.sql`)  

---

## 📦 Setup Instructions

1. Clone this repository:
   ```bash
   git clone https://github.com/Goodnessigwe/election-portal.git

2. Import the provided database:

    Locate the SQL file (bincom_test.sql) inside the project folder.

    Import it into your MySQL server using phpMyAdmin or CLI.

3. Update the database connection in db_connect.php:
    $host = "localhos";
    $user = "root";
    $password = "";
    $dbname = "bincom_test";


    Lessons Learned

1.  Working with real-world election datasets in MySQL

2.  Writing SQL queries to aggregate and filter polling unit results

3.  Structuring PHP code for dynamic data rendering

4.  Building a simple, functional admin-like interface for data entry and result management
   

 Future Improvements

1. Add user authentication for result management

2. Export results to PDF/CSV

3. Add charts/graphs for visual representation of election results

4. Enhance UI with Bootstrap or Tailwind for better responsiveness