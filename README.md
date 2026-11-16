# AUTOVEX — Worldwide Vehicle Marketplace

A starter project for a global car marketplace. It includes a responsive frontend, account registration, login/logout, a member dashboard, and a PHP/MySQL endpoint for submitting vehicle listings.

## Included
- Home page and vehicle discovery page
- Search/filter demo listings
- Rental landing page (booking workflow is not yet connected)
- Sell-a-vehicle form
- Account registration and login
- Password hashing with PHP `password_hash()` / `password_verify()`
- PHP sessions and protected dashboard/listing endpoint
- MySQL schema

## Run with XAMPP (Windows)
1. Install and open XAMPP.
2. Start **Apache** and **MySQL**.
3. Copy the complete `AUTOVEX` folder into `C:\\xampp\\htdocs\\`.
4. Open `http://localhost/phpmyadmin`.
5. Choose **Import**, select `backend/database.sql`, and import it.
6. Check `backend/config.php`. The default XAMPP MySQL account is often `root` with an empty password. Change the values if yours are different.
7. Visit `http://localhost/AUTOVEX/`.

Do not open the HTML files by double-clicking them. PHP account features need Apache; use the localhost address.

## Important before publishing online
This is a learning/starter build, not a production-ready commercial marketplace. Before launch:
- Use HTTPS and secure session-cookie settings.
- Add CSRF protection, login rate limiting, email verification, password reset and account recovery.
- Validate and moderate all uploaded content; this starter does not yet upload car photos.
- Add server-side authorization checks to every private action.
- Add a secure image-storage service and listing moderation tools.
- Integrate a reputable payment provider only after business, legal and security review. Never store card details yourself.
- Add real rental availability, booking, cancellation and dispute workflows.
- Add privacy policy, terms, seller verification and fraud reporting.
- Configure production database credentials outside publicly served files and use least-privilege database access.

## Current demo limitations
- Vehicle cards on Buy/Rent use sample data and stock photography.
- The listing submission endpoint saves a listing to MySQL, but admin review and public listing retrieval still need to be built.
- Currency display uses the selected currency code; live foreign-exchange conversion is not included.
- Messaging, payments, rentals, maps and dealer verification are planned extensions, not active services.
