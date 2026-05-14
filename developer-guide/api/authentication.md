# Πιστοποίηση

Η **Chamilo API** χρησιμοποιεί **JWT (JSON Web Tokens)** για πιστοποίηση, που υλοποιείται μέσω του `lexik/jwt-authentication-bundle`.

## Λήψη Token

Αποστείλτε αίτημα POST στο endpoint πιστοποίησης:

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

## Χρήση του Token

Περιλάβετε το token στην κεφαλίδα `Authorization` των επόμενων αιτημάτων:

```
GET /api/users
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9...
```

## Κύκλος Ζωής Token

* Τα tokens έχουν ρυθμιζόμενο χρόνο λήξης
* Όταν λήξει ένα token, ο πελάτης πρέπει να ζητήσει νέο
* Τα κλειδιά JWT αποθηκεύονται στο `config/jwt/` (ιδιωτικά και δημόσια κλειδιά)

## Δημιουργία Κλειδιών JWT

```bash
php bin/console lexik:jwt:generate-keypair
```

Αυτό δημιουργεί:
* `config/jwt/private.pem` — Ιδιωτικό κλειδί για υπογραφή tokens
* `config/jwt/public.pem` — Δημόσιο κλειδί για επαλήθευση tokens

Ρυθμίστε το passphrase στο `.env`:

```env
JWT_PASSPHRASE=your-passphrase
```

## Τεκμηρίωση API

Όταν οριστεί `APP_ENABLE_API_ENTRYPOINT=1` στο περιβάλλον, η τεκμηρίωση API είναι διαθέσιμη στο `/api`. Αυτό παρέχει μια διαδραστική διεπαφή Swagger/OpenAPI για εξερεύνηση και δοκιμή endpoints.