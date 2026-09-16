# Authentication

Το API του Chamilo χρησιμοποιεί **JWT (JSON Web Tokens)** για την ταυτοποίηση, υλοποιημένο μέσω του `lexik/jwt-authentication-bundle`.

## Obtaining a Token

Στείλτε ένα αίτημα POST στο σημείο τερματισμού ταυτοποίησης:

```
POST /api/authentication_token
Content-Type: application/json

{
  "username": "admin",
  "password": "your-password"
}
```

Απάντηση:

```json
{
  "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9..."
}
```

## Using the Token

Συμπεριλάβετε το διακριτικό στην κεφαλίδα `Authorization` των επόμενων αιτημάτων:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Token Lifecycle

* Τα διακριτικά έχουν ρυθμιζόμενο χρόνο λήξης
* Όταν ένα διακριτικό λήξει, ο πελάτης πρέπει να ζητήσει ένα νέο
* Τα κλειδιά JWT αποθηκεύονται στο `config/jwt/` (ιδιωτικά και δημόσια κλειδιά)

## Generating JWT Keys

```bash
php bin/console lexik:jwt:generate-keypair
```

Αυτό δημιουργεί:
* `config/jwt/private.pem` — Ιδιωτικό κλειδί για την υπογραφή διακριτικών
* `config/jwt/public.pem` — Δημόσιο κλειδί για την επαλήθευση διακριτικών

Ρυθμίστε τη φράση πρόσβασης στο `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## API Documentation

Όταν έχει οριστεί `APP_ENABLE_API_ENTRYPOINT=true` στο περιβάλλον, η τεκμηρίωση του API είναι διαθέσιμη στο `/api`. Αυτό παρέχει ένα διαδραστικό περιβάλλον Swagger/OpenAPI για εξερεύνηση και δοκιμή σημείων τερματισμού.

Η ρύθμιση της μεταβλητής από μόνη της δεν αρκεί — η προσωρινή μνήμη του Symfony πρέπει να εκκαθαριστεί ώστε η αλλαγή να τεθεί σε ισχύ. Δείτε [Μεταβλητές περιβάλλοντος (.env)](../../admin-guide/installation/configuration.md#enable-the-api-documentation) στον Οδηγό διαχειριστή.