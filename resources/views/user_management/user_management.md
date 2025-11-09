/ Student self-registration (university email domain + student ID)
= Email verification before first login
* Login/logout, profile management, password change/reset (all roles)
* Admin-only technician onboarding (create, invite email, resend invite)
* Admin user management: create/edit/deactivate/reactivate/delete, role assignment, search/filter
* Security: password hashing, rate limiting, verification/reset/invite tokens, audit logs
* permissions:
  - STUDENT: register, login/logout, manage own profile, reset/change password
  - TECHNICIAN: login/logout, manage own profile/password; no self-registration
  - ADMIN: user CRUD, roles, deactivate/reactivate, reset passwords, resend invites, audit log
