# Employee Selection Api

Employee Selection Api is a demo application build on WAMP CodeIgnitor ,jquery and Bootstrap.
It has 3 parts

  - PHP script for sample data Creation
  - PHP backend for selection best team possible in given budget following the team composition input provided
  - Simple HTML form for providing Budget and team composition constraints
  - CRUD for employee

# Assumptions
  - I have assumed Best team possible is about getting employees closest to the budget
  - Length of Random Name is 8 characters in the sample data
  - Number of years of expierence of Junior(1 - 3 Years), Senior(3 - 10 Years) in the sample data
  - Salary ranges are Junior (3 - 6 LPA), Senior(5 - 20 LPA) in the sample data
  
# SetUp
  - Move Employee_dashboard directory in your localhost
  - Update Database credentials in employee_dashboard\application\config\database.php
  - Execute http://localhost/employee_dashboard/InsertRandom in browser to Create a sample database Table of 5000 employees
  - Execute http://localhost/employee_dashboard/Display in browser to get the input form and on Submission get the best Team Members
  - Click on Employee Dashboard tab for getting CRUD layout of employees