For this project, you must create an HTML form to upload a CSV file.  When the
CSV file is uploaded you must save it to AFS in an upload directory within your
project.  (You must set permissions for the web server to write to the
directory by doing fsr sa -r ./uploads http write)   After you save the file,
you must forward the user to a page using the "header" function
(https://www.w3schools.com/PhP/func_http_header.asp).  Once the user is
forwarded to the new page, it should open the csv file and display the contents
of the CSV file in an HTML table.  The HTML table should use the table head tag
for the first row of the table and have the field names from the CSV file in
this row.  Attached are two CSV file for you to use for this assignment, your
program should work for any CSV filed uploaded.
