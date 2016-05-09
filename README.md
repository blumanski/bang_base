###bang_base###

This is the base installation repo for my application set up.

All parts of the development framework have independent respositories and get loaded via composer.

**Components:**

* bang_base -> Base installation
* bang -> Bang Framework Core
* bang_backend_account -> Backend Module to administrate user accounts
* bang_backend_nestedset -> Backend Module to administrate menus and tree structures
* bang_backend_dashboard -> Backend Module to show a dashboard
* bang_backend_error -> Module to display application errors
* bang_content -> Module to administrate content

Well, all more or less in heavy development.

You should not use this.

The only interesting file in here is the composer.json as it has examples on how to load repositories and place them into their destination directory.
