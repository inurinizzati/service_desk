/ Student self-registration (university email domain + student ID)
= Email verification before first login
* Login/logout, profile management, password change/reset (all roles)
* Admin-only technician onboarding (create, invite email, resend invite)
* Admin user management: create/edit/deactivate/reactivate/delete, role assignment, search/filter
* Security: password hashing, rate limiting, verification/reset/invite tokens, audit logs
* Permissions:
    - **STUDENT**: 
        - Register using university email domain and student ID.
        - Login/logout functionality.
        - Manage own profile, including updating personal information.
        - Reset/change password as needed.
    - **TECHNICIAN**: 
        - Login/logout functionality.
        - Manage own profile and password.
        - No self-registration allowed; must be onboarded by an admin.
    - **ADMIN**: 
        - Full user CRUD (Create, Read, Update, Delete) capabilities.
        - Assign and manage roles for users.
        - Deactivate/reactivate user accounts as necessary.
        - Reset passwords for users.
        - Resend invites to technicians.
        - Maintain an audit log for tracking user activities and changes.

*user attribute table:
users
- PK user_id
- FK hostel_id -> hostels.hostel_id (nullable; students typically have a hostel)
- name
- email (unique)
- password_hash
- role {ADMIN, TECHNICIAN, STUDENT}
- phone_num
- status {ACTIVE, INACTIVE, INVITED}
- email_verified_at (nullable)
- created_at, updated_at
    
* Additional Pages to Create:
    - **Student Registration Page**: For students to register with their university email and ID.
    - **Profile Management Page**: For all roles to manage their profiles.
    - **Admin Dashboard**: For admins to manage users, roles, and view audit logs.
    - **Technician Onboarding Page**: For admins to onboard new technicians.

* Security Measures:
    - Implement password hashing for secure storage.
    - Apply rate limiting to prevent brute force attacks.
    - Use verification/reset/invite tokens for secure user actions.
    - Maintain audit logs for accountability and tracking changes.

