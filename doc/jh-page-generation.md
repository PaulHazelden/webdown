# Generate a Page

## Overview

This document aims to provide an outline (perhaps pseudo-code in places?) of the processing which will be required to turn the files stored on the website into pages which can be displayed in a browser. 

## Processing

### 1. Check the User

Determine whether this is a logged-in User, and set a flag.

### 2. Parse the variable(s) passed

If a page number is passed, open the page index, find the page location and load the page at that location.

### 3. Display the page

If the page contains a CSS file, load that after the system CSS.

Display the page header, with either:
* the name of the User and a 'Logout' button; or 
* 'Guest' and a 'Login' button.

If the User or Guest has not accepted use of cookies, display the notice and an 'Accept' button; if the button is pressed, remove the notice.

I was thinking that we check the directory and see which input files are present but, for better performance, each input file should have a corresponding 'include'.

Display the standard page footer.

If the 'Login' or 'Logout' button is pressed, perform that processing and then reload the page.

