<?php
/**
|- Blog Scenario
|--------------------------------------------|
|-          In Frontend
|--------------------------------------------|
|-             Pages
|--------------------------------------------|
|------ Home Page
|------ Post Page
|------ Login Page
|------ Category Page
|------ Contact Us Page
|------ Registration Page
|--------------------------------------------|
|-          Layout System
|--------------------------------------------|
|- Layout System is a layout for all pages which will contain :
|- Header
|- Page Content
|- Footer
|- So the content of any page from the above ones will be set
|- in that section.
|--------------------------------------------|
|-          Home Page Scenario
|--------------------------------------------|
|- In this page we will display our latest posts
|- displaying them vertically so each post
|- will take the hole width of the content
|- A sidebar that will contain recommended posts , some ads etc
|--------------------------------------------|
|-          Post Page Scenario
|--------------------------------------------|
|- This will contain the post its self
|- Related posts for the current post
|- Comments for the post
|- Some Ads in sidebar
|--------------------------------------------|
|-          Login Page Scenario
|--------------------------------------------|
|- We Will display a login form consisting of the following inputs :
|- Email
|- Password
|- Remember Me "As Checkbox"
|--------------------------------------------|
|-          Category Page Scenario
|--------------------------------------------|
|- This page will contain all posts related to that category
|- It will also will contain a sidebar to display its sub categories
|- Some keywords from its posts
|- Some Ads
|--------------------------------------------|
|-          Contact Us Page Scenario
|--------------------------------------------|
|- A Contact form to contact the blog administrators
|- which may contain the following inputs :
|- Name
|- Email
|- Phone
|- Subject
|- Message
|- Recaptcha "for spams"
|--------------------------------------------|
|-          Registration Page Scenario
|--------------------------------------------|
|- The Registration form will contain the following :
|- First Name
|- Last Name
|- Email
|- Password
|- Confirm Password
|- Profile Image
|- Gender
|- Birth Day
|- Recaptcha "for spams"
|--------------------------------------------|
|--------------------------------------------|
|-          In Backend
|--------------------------------------------|
|-             Pages
|--------------------------------------------|
|------ Dashboard Page
|------ Ads Page
|------ Login Page
|------ Settings Page
|------ Users Page CRUD (Displaying users + Creating + Updating + Deleting)
|------ Users Groups CRUD "For Permissions"
|------ Categories Page CRUD
|------ Posts Page CRUD
|------ Contact Us Page (To Vie + reply + Delete)
|--------------------------------------------|
|-          Layout System
|--------------------------------------------|
|- Layout System is a layout for all Pages which will contain :
|- Header
|- Sidebar
|- Page Content
|- Footer
|- So the content of any page from the above ones will be set
|- in that section.
|--------------------------------------------|
|-          Dashboard Page Scenario
|--------------------------------------------|
|- In this page we will display all reports about everything
|- i.e Online Users
|- Total registered Users "All + today"
|- Total Posts "All + today"
|- Mostly Viewed Posts "All + today"
|- etc
|--------------------------------------------|
|-          Login Page Scenario
|--------------------------------------------|
|- This page will contain a form for login
|- (Mostly like in the Frontend)
|--------------------------------------------|
|- Users || Users Groups || Posts || Categories Page Scenario
|--------------------------------------------|
|- When opening "Users || Users Groups || Posts || Categories  page,
|- we will display all users
|- in table with some controls "editing - deleting"
|- Also a button for creating new user
|--------------------------------------------|
|-          Contact Us Page Scenario
|--------------------------------------------|
|- Displaying all contacts in table
|- With some controls "view the message  + Replying to it or deleting it "
|--------------------------------------------|
|-          Settings Page Scenario
|--------------------------------------------|
|- This page will contain all site settings
|--------------------------------------------|
|-          Ads Page Scenario
|--------------------------------------------|
|- This page will contain Ads CRUD
|--------------------------------------------|
*/
